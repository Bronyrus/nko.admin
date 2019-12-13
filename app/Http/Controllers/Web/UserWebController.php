<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserWebController extends Controller
{
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.userEdit', [
            'title' => 'Сменить пароль'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $request->old_password = trim($request->old_password);
        $request->old_password_confirmation = trim($request->old_password_confirmation);
        $request->new_password = trim($request->new_password);
        $request->new_password_confirmation = trim($request->new_password_confirmation);

        $validator = Validator::make($request->all(), [
            'old_password' => 'required|confirmed',
            'new_password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('auth.user.edit', ['id' => Auth::user()->id])
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('id', '=', $id)->first('password');

        if (Hash::check($request->old_password, $user->password))
        {
            return 'suc';
        }
        else
        {
            $validator->getMessageBag()->add('old_password', 'Текущий пароль не совпадает');

            if ($validator->fails()) {
                return redirect()
                    ->routeroute('auth.user.edit', ['id' => Auth::user()->id])
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        // User::create([
        //     'name' => $request->input('mod_name'),
        //     'email' => $request->input('email'),
        //     'password' => Hash::make($request->input('password')),
        //     'admin' => 0
        // ]);

        // return redirect()->route('auth.user.edit', ['id' => Auth::user()->id]);
    }

}
