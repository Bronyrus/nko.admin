<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Messenger;
use App\Models\UserToMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('messenger.messengerList', [
            'title' => 'Мессенджер',
            'messengers' => Messenger::all()->sortByDesc('created_at')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = UserToEvent::where('event_id', '=', $id)->get();
        $clients = [];
        foreach($users as $user)
        {
            $clients[] = $user->user();
        };
        return view('events.eventDetail', [
            'title' => 'Информация о мероприятии',
            'event' => Event::where('id', '=', $id)->first(),
            'users' => $clients
        ]);
    }

}
