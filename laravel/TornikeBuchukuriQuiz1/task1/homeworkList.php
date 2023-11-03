<?php

namespace Task1;

class HomeWorkList
{
    private string $title;
    private string $description;
    private array $homeworks;

    public function __construct(string $title, string $description, array $homeworks = [])
    {
        $this->title = $title;
        $this->description = $description;
        $this->homeworks = $homeworks;
    }

    public function addHomework(array $homework)
    {
        $this->homeworks[] = $homework;
    }

    public function getHomeworks(): array
    {
        return $this->homeworks;
    }

}
