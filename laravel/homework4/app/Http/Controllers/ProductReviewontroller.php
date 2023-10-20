<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductReviewRequest;
use Illuminate\Http\Request;
use Throwable;

class ProductReviewController extends Controller
{
    public function create(CreateProductReviewRequest $request)
    {
        $data = $request->validated();
        try{
            $fp = fopen('productReviews.json', 'a');
            fwrite($fp, json_encode($data));
            fwrite($fp, "\n");

            return response()->json([
                'success' => true,
                'message' => 'Product review created successfully'
            ], 201);

        }
        catch(Throwable $e){
            return response()->json([
                'success' => false,
                'message' => 'Product review creation failed'
            ], 500);
        }
        finally{
            fclose($fp);
        }
    }
}
