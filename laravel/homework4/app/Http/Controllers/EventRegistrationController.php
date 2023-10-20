<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRegistrationRequest;
use Illuminate\Http\Request;
use Throwable;

class EventRegistrationController extends Controller
{
    public function create(CreateEventRegistrationRequest $request)
    {
        $data = $request->validated();
        try{
            $fp = fopen('eventRegistrations.csv', 'a');
            fputcsv($fp, $data);

            return response()->json([
                'success' => true,
                'message' => 'Event registration created successfully'
            ], 201);
        }
        catch(Throwable $e){
            return response()->json([
                'success' => false,
                'message' => 'Event registration creation failed'
            ], 500);
        }
        finally{
            fclose($fp);
        }
    }
}
