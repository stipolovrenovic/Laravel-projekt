<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Requests\DeleteClientsRequest;
use Illuminate\Support\Facades\Storage;

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
                'clients' => Client::paginate(10)
            ]);
        else
        {
            return view('clients.index', [
                'clients' => Client::where('name', 'like', '%'.$request->keyword.'%')->paginate(10)
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

        if($request->images)
        {
            foreach($request->images as $image)
            {
                $Image = new Image();
                $Image->path = $image->store('clientImages');
                $Image->client_id = $client->id;

                $Image->save();
            }
        }


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

        if($request->images)
        {
            foreach($request->images as $image)
            {
                $Image = new Image();
                $Image->path = $image->store('clientImages');
                $Image->client_id = $client->id;

                $Image->save();
            }
        }

        if($request->imagesForDeletion)
        {
            foreach($request->imagesForDeletion as $image)
            {
                Storage::delete($image);
                $image->delete();
            }
        }

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
        foreach($client->images as $image)
        {
            Storage::delete($image->path);
        }

        $client->delete();
        return redirect()->route('clients.index');
    }

    public function deleteImage(Image $image)
    {
        Storage::delete($image->path);

        $image->delete();
        return back();
    }

    public function destroyChecked(DeleteClientsRequest $request)
    {
        $validated = $request->validated();

        $clientIds = explode(',', $request->clientsForDeleting);

        foreach($clientIds as $clientId)
        {
           $client = Client::where('id', '=', $clientId);
           $client->delete();
        }

        return back();
    }
}
