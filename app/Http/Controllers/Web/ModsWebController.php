<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ModsWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mods.modsList', [
            'title' => 'Модераторы',
            'mods' => User::all()->sortByDesc('created_at')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.eventCreate', [
            'title' => 'Добавить мероприятие'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->event_head = trim($request->event_head);
        $request->event_body = trim($request->event_body);

        $validator = Validator::make($request->all(), [
            'event_head' => 'required|min:3|max:100|string',
            'event_body' => 'required|min:3|max:20000',
            'event_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('auth.events.create')
                ->withErrors($validator)
                ->withInput();
        }

        Event::create([
            'uuid' => Str::uuid(),
            'head' => $request->input('event_head'),
            'body' => $request->input('event_body'),
            'date_start' => $request->input('event_date')
        ]);

        return redirect()->route('auth.events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
