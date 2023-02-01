<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        try {
            $events = Event::with(['category'])->orderBy('title')->get();
            return $this->_response('با موفقیت انجام شد', 1,[
                'events'=>$events
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
