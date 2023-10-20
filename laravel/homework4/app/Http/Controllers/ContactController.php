<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use Illuminate\Http\Request;
use Throwable;

class ContactController extends Controller
{
    public function create(CreateContactRequest $request)
    {
        $data = $request->validated();
        try{
            $fp = fopen('contacts.txt', 'a');
            fwrite($fp, json_encode($data));
            fwrite($fp, "\n");

            return response()->json([
                'success' => true,
                'message' => 'Contact created successfully'
            ], 201);
        }
        catch(Throwable $e){
            return response()->json([
                'success' => false,
                'message' => 'Contact creation failed'
            ], 500);
        }
        finally{
            fclose($fp);
        }
    }
}
