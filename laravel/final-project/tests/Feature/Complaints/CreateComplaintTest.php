<?php

namespace Tests\Feature\Complaints;

use App\Models\Courier;
use App\Models\User;
use App\Notifications\ComplaintCreateNotification;
use App\Notifications\ComplaintReceiveNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Notification;
use Mockery\Matcher\Not;

class CreateComplaintTest extends TestCase
{
    public function test_successfully_create_complaint()
    {
        $user = User::factory()->create();
        $courier = Courier::factory()->create();

        $res = $this->postJson(route('complaints.store'), [
            'complainer_id' => $user->id,
            'complainee_id' => $courier->id,
            'complainer_type' => 'User',
            'complainee_type' => 'Courier',
            'content' => 'content',
        ]);

        $res->assertCreated();
        $this->assertDatabaseHas('complaints', [
            'complainer_id' => $user->id,
            'complainee_id' => $courier->id,
            'complainer_type' => User::class,
            'complainee_type' => Courier::class,
            'content' => 'content',
        ]);
    }

    public function test_send_notifications_if_complaint_is_created()
    {
        Notification::fake();

        $user = User::factory()->create();
        $courier = Courier::factory()->create();

        $this->postJson(route('complaints.store'), [
            'complainer_id' => $user->id,
            'complainee_id' => $courier->id,
            'complainer_type' => 'User',
            'complainee_type' => 'Courier',
            'content' => 'content',
        ]);


        Notification::assertSentTo(
            [$courier],
            ComplaintReceiveNotification::class
        );

        Notification::assertSentTo(
            [$user],
            ComplaintCreateNotification::class
        );

        Notification::assertCount(2);
    }

    public function test_return_error_if_complainer_id_is_not_provided()
    {
        $courier = Courier::factory()->create();

        $res = $this->postJson(route('complaints.store'), [
            'complainer_id' => null,
            'complainee_id' => $courier->id,
            'complainer_type' => 'User',
            'complainee_type' => 'Courier',
            'content' => 'content',
        ]);

        $res->assertStatus(422);
        $res->assertJsonValidationErrors('complainer_id');
    }

    public function test_return_error_if_complainer_id_is_provided_but_does_not_exist()
    {
        $courier = Courier::factory()->create();

        $res = $this->postJson(route('complaints.store'), [
            'complainer_id' => -1,
            'complainee_id' => $courier->id,
            'complainer_type' => 'User',
            'complainee_type' => 'Courier',
            'content' => 'content',
        ]);

        $res->assertStatus(422);
        $res->assertJsonValidationErrors('complainer_id');
    }

    public function test_return_error_if_complainee_id_is_not_provided()
    {
        $user = User::factory()->create();

        $res = $this->postJson(route('complaints.store'), [
            'complainer_id' => $user->id,
            'complainee_id' => null,
            'complainer_type' => 'User',
            'complainee_type' => 'Courier',
            'content' => 'content',
        ]);

        $res->assertStatus(422);
        $res->assertJsonValidationErrors('complainee_id');
    }

    public function test_return_error_if_complainee_id_is_provided_but_does_not_exist()
    {
        $user = User::factory()->create();

        $res = $this->postJson(route('complaints.store'), [
            'complainer_id' => $user->id,
            'complainee_id' => -1,
            'complainer_type' => 'User',
            'complainee_type' => 'Courier',
            'content' => 'content',
        ]);

        $res->assertStatus(422);
        $res->assertJsonValidationErrors('complainee_id');
    }
}
