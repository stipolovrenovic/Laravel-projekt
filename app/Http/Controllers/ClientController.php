<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.index', [
        'clients' => Client::all()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*request()->validate([
            'name' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);*/

        $client = new Client();
        $client->name = $request->name;
        $client->address = $request->address;
        $client->postcode = $request->postcode;
        $client->city = $request->city;
        $client->country = $request->country;
        $client->oib = $request->oib;
        $client->save();


        return redirect()->route('clients.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        /*request()->validate([
            'name' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);*/

    
        $client->name = $request->name;
        $client->address = $request->address;
        $client->postcode = $request->postcode;
        $client->city = $request->city;
        $client->country = $request->country;
        $client->oib = $request->oib;
        $client->save();

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}
