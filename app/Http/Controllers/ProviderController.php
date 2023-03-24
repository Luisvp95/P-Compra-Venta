<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\Provider\StoreRequest;
use App\Http\Requests\Provider\UpdateRequest;


class ProviderController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-proveedor|crear-proveedor|detalle-proveedor|editar-proveedor|borrar-proveedor', ["only"=>['index']]);
        $this->middleware('permission:detalle-proveedor', ['only'=>['show']]);
        $this->middleware('permission:crear-proveedor', ['only'=>['create','store']]);
        $this->middleware('permission:editar-proveedor', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-proveedor', ['only'=>['destroy']]);
    }
    public function index()
    {
        $providers = Provider::get();
        return view('admin.provider.index', compact('providers'));
    }

    public function create()
    {
        return view('admin.provider.create');
    }


    public function store(StoreRequest $request)
    {
        Provider::create($request->all());
        return redirect()->route('providers.index');
    }


    public function show(Provider $provider)
    {
        return view('admin.provider.show', compact('provider'));
    }


    public function edit(Provider $provider)
    {
        return view('admin.provider.edit', compact('provider'));
    }


    public function update(UpdateRequest $request, Provider $provider)
    {
        $provider->update($request->all());
        return redirect()->route('providers.index');
    }


    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('providers.index');
    }
}