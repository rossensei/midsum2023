<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $clients = Client::orderBy('last_name')->orderBy('first_name')->get();

        return inertia('Clients/Index',[
            'clients' => $clients
        ]);
    }

    public function show(Client $client) {
        return inertia('Clients/Show', compact('client'));
    }

    public function edit(Client $client) {
        return inertia('Clients/Edit', compact('client'));
    }

    public function update(Client $client, Request $request) {
        $request->validate([
            'last_name' => 'string|required',
            'first_name' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|required',
            'bdate' => 'date|required',
        ]);

        $client->update($request->all());

        return redirect('/clients/' . $client->id)->with('info', 'Client has been updated successfully!');
    }

    public function destroy(Client $client) {
        $client->delete();
        return redirect('/clients')->with('info', 'Client has been removed.');
    }

    public function create() {
        return inertia('Clients/Create');
    }

    public function store(Request $request) {

        // dd($request->profile_pic);
        
        $fields = $request->validate([
            'last_name' => 'string|required',
            'first_name' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|required',
            'bdate' => 'date|required',
        ]);
        // dd($request->profile_pic);
        if($request->profile_pic) {
            $filename = time().'.'.$request->profile_pic->extension();
            $request->profile_pic->move(public_path('uploads/profile_pic'), $filename);
            $path = "uploads/profile_pic/" . $filename;
        }

        // dd($request->all());

        // $c = Client::create($request->all());
        $c = Client::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'bdate' => $request->bdate,
            'bio' => $request->bio,
            'profile_pic' => $path,
        ]);

        return redirect('/clients/' . $c->id);
    }

    public function search($searchKey) {
        // dd($searchKey);
        return inertia('Clients/Index', [
            'clients' => Client::where('last_name', 'like', "%$searchKey%")->orWhere('first_name', 'like', "%$searchKey%")->get()
        ]);
    }

    public function toggle(Client $client) {
        $client->active = !$client->active;
        $client->save();
        
        return back();
    }
}
