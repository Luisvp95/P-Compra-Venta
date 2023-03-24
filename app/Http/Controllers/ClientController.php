<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-cliente|:detalle-cliente|crear-cliente|editar-cliente|borrar-cliente', ['only' => ['index']]);
        $this->middleware('permission:detalle-cliente', ['only' => ['show']]);
        $this->middleware('permission:crear-cliente', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-cliente', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-cliente', ['only' => ['destroy']]);
    }
    public function index()
    {
        // Obtiene el ID del usuario logueado
        $userId = Auth::id();
        
        // Obtiene solo los registros que el usuario logueado creó
        $clients = Client::where('user_id', $userId)->get();

        return view('admin.client.index', compact('clients'));
    }
    

    public function create()
    {
        return view('admin.client.create');
    }

    public function store(StoreRequest $request)
    {
        Client::create($request->all()+[
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('clients.index');
    }

    public function show(Client $client)
    {
        return view('admin.client.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('admin.client.edit', compact('client'));
    }

    public function update(UpdateRequest $request, Client $client)
    {
        $client->update($request->all()+[
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}
