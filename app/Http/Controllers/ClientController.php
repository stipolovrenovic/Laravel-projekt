<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->keyword)
            return view('clients.index', [
                'clients' => Client::all()
            ]);
        else
        {
            return view('clients.index', [
                'clients' => Client::where('name', 'like', '%'.$request->keyword.'%')
                ->get()
            ]);
        }
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
    public function store(StoreClientRequest $request)
    {
        $validated = $request->validated();

        $client = new Client();
        $client->name = $request->name;
        $client->address = $request->address;
        $client->postcode = $request->postcode;
        $client->city = $request->city;
        $client->country = $request->country;
        $client->oib = $request->oib;
        $client->type = $request->type;
        $client->international = $request->international;
        $client->email = $request->email;
        $client->services = $request->services;
        $client->active = $request->active;
        $client->save();


        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
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
    public function update(UpdateClientRequest $request, Client $client)
    {
        $validated = $request->validated();

        $client->name = $request->name;
        $client->address = $request->address;
        $client->postcode = $request->postcode;
        $client->city = $request->city;
        $client->country = $request->country;
        $client->oib = $request->oib;
        $client->type = $request->type;
        $client->international = $request->international;
        $client->email = $request->email;
        $client->services = $request->services;
        $client->active = $request->active;
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
