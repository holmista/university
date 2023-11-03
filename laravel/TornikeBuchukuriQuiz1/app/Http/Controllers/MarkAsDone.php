<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Task1\Homework;

class MarkAsDone extends Controller
{
    public function __invoke()
    {
        $homework = Homework::createRandom();
        $homework->end();
        return response()->json($homework);
    }
}
