<?php

namespace Task1;

interface HomeworkInterface
{
    public function getTitle(): string;


    public function getDescription(): string;


    public function getExpectedCompletionDate(): string;


    public function getStatus(): string;


    public function getActualCompletionDate(): string;


    public function end(): void;


    public function toString(): string;
}
