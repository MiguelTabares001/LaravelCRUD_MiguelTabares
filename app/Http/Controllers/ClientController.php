<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $clients = Client::all();
        // dd($clients);
        return view('pages.client.list', compact('clients'));
    }

    public function create() {
        return view('pages.client.add');
    }

    public function store(Request $request) {
        $client = new Client();
        $client->name = $request->input('name');
        $client->address = $request->input('address');
        $client->phone = $request->input('phone');
        $client->mail = $request->input('mail');
        $client->save();
        return redirect()->route('list.client');
    }

    public function edit(string $id) {
        $client = Client::find($id);
        // dd($client);
        return view('pages.client.edit', compact('client'));
    }

    public function update(Request $request, $id) {
        $client = Client::find($id);
        $client->name = $request->input('name');
        $client->address = $request->input('address');
        $client->phone = $request->input('phone');
        $client->mail = $request->input('mail');
        $client->updated_at = Carbon::now()->setTimezone('America/Bogota');
        $client->save();
        return redirect()->route('list.client');
    }

    public function delete($id) {
        $client = Client::find($id);
        return view('pages.client.delete', compact('client'));
    }

    public function destroy($id) {
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('list.client');
    }
}