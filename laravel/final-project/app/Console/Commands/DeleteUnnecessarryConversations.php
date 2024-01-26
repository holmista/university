<?php

namespace App\Console\Commands;

use App\Enums\ConversationStatusEnum;
use App\Models\Conversation;
use Illuminate\Console\Command;

class DeleteUnnecessarryConversations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-unnecessarry-conversations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'if a conversation was closed more than 30 days ago, delete it';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Conversation::where('status', ConversationStatusEnum::Closed->value)->where('closed_at', '<', now()->subDays(30))->delete();
    }
}
