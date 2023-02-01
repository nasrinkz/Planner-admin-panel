<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        try {
            $categories = Category::orderBy('title')->get();
            return $this->_response('با موفقیت انجام شد', 1,[
                'categories'=>$categories
            ]);

        }catch (\Exception $e){
            return $this->_response('خطایی سمت سرور اتفاق افتاده است', -2,[]);
        }
    }

    private function _response(string $message, int $statusCode, array $data)
    {
        $response = [
            'message' => $message,
            'statusCode' => $statusCode,
        ];
        if (count($data) != 0) {
            $response = [
                'message' => $message,
                'statusCode' => $statusCode,
                'responseData' => $data,
            ];
        }
        return response()->json($response, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8']);
    }
}
