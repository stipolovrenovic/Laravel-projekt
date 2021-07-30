<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    { 
        $validated = $request->validated();
        
        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->image)
        {
          $image = $request->file('image')->store('images');
          $user->image = $image;
        }

        $user->save();

        return back()->with(
            ['message' => 'Podaci uspješno ažurirani!']
        );
    }

    public function deleteImage()
    {
        $user = auth()->user();

        Storage::delete($user->image);

        $user->image = null;

        $user->save();

        return back()->with(
            ['message' => 'Profilna slika uspješno izbrisana.']
        );
    }
}
