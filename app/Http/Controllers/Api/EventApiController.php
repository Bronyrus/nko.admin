<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Models\Event;
use App\Models\UserToEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EventApiController extends ApiBaseController
{
    public $successStatus = 200;

    public function getEventsByDate(string $date = null)
    {
        if($date == null)
        {
            return response()->json(['errors'=>'Пустая дата'], 404); 
        }

        $events = Event::where('date_start', '=', $date)->get()->toArray();

        return $this->sendResponse($events, 'Events returned');
    }

    public function registerOnEvent(Request $request)
    {

    }

}
