<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Models\Event;
use App\Models\UserToEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthApiController extends ApiBaseController
{
    public $successStatus = 200;

    public function getEventsByDate(string $date = null)
    {
        if($date == null)
        {
            return response()->json(['errors'=>'Пустая дата'], 401); 
        }

        $events = Event::where('date_start', '=', $date)->get();

        return $this->sendResponse($events, 'Authorization is successful');
    }

    public function registerOnEvent(Request $request)
    {

    }

}
