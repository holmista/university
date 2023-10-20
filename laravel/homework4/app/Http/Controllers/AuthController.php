<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use Illuminate\Http\Request;
use Throwable;

class AuthController extends Controller
{
    public function register(UserRegistrationRequest $request)
    {
        $validated = $request->validated();
        try{
            $fp = fopen('users.txt', 'a');
            fwrite($fp, json_encode($validated));
            fwrite($fp, "\n");

            return response()->json([
                'success' => true,
                'message' => 'User registered successfully'
            ], 201);
        }
        catch(Throwable $e){
            return response()->json([
                'success' => false,
                'message' => 'User registration failed'
            ], 500);
        }
        finally{
            fclose($fp);
        }
    }
}
