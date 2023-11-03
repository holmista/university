<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHomeworkRequest;
use Illuminate\Http\Request;
use Task1\Homework;
use Task1\HomeworkList;

class HomeworkController extends Controller
{
    public function create(CreateHomeworkRequest $request)
    {
        $data = $request->validated();
        $homework = new Homework(
            $data['title'],
            $data['description'],
            $data['expectedCompletionDate'],
            $data['status'],
            $data['actualCompletionDate']
        );

        return response()->json($homework);
    }

    public function createBulk(CreateHomeworkRequest $request)
    {
        $amount = $request->input('amount');
        $data = $request->validated();
        $homeworks = [];
        for($i = 0; $i < $amount; $i++){
            $homework = Homework::createRandom();
            $homeworks[] = $homework;
        }
        $homeworksList = new HomeworkList($data['title'], $data['description'], $homeworks);
        $allHomeworks = $homeworksList->getHomeworks();
        $allHomeworksJson = json_encode($allHomeworks);

        return response()->json($allHomeworksJson);
    }
}
