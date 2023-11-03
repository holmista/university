<?php

namespace Task1;

trait HomeworkTrait
{
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getExpectedCompletionDate(): string
    {
        return $this->expectedCompletionDate;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getActualCompletionDate(): string
    {
        return $this->actualCompletionDate;
    }

    public function end(): void
    {
        $this->status = 'finished';
        $this->actualCompletionDate = now();
    }

    public function toString()
    {
        return "Title: $this->title\nDescription: $this->description\nExpected completion date: $this->expectedCompletionDate\nStatus: $this->status\nActual completion date: $this->actualCompletionDate";
    }
}
