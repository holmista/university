<?php

namespace Task1;
use Faker\Generator as Faker;

class Homework implements HomeworkInterface
{
    use HomeworkTrait;

    private string $title;
    private string $description;
    private string $expectedCompletionDate;
    private string $status;
    private string | null $actualCompletionDate;

    public function __construct(
        string $title,
        string $description,
        string $expectedCompletionDate,
        string $status,
        string $actualCompletionDate = null
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->expectedCompletionDate = $expectedCompletionDate;
        $this->status = $status;
        $this->actualCompletionDate = $actualCompletionDate;
    }

    public static function createRandom(): Homework
    {
        $faker = new Faker();
        $title = $faker->sentence(3);
        $description = $faker->sentence(10);
        $expectedCompletionDate = $faker->date();
        $status = 'to do';
        $actualCompletionDate = null;
        $homework = new Homework($title, $description, $expectedCompletionDate, $status, $actualCompletionDate);
        return $homework;
    }
}
