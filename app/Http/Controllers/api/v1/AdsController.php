<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index(){
        try {
            $ads = Ads::whereStatus(1)->latest()->first();
            return $this->_response('با موفقیت انجام شد', 1,[
                'ads'=>$ads
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
