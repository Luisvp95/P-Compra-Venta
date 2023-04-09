<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Busines\UpdateRequest;
use App\Models\Busines;
use Illuminate\Support\Facades\Storage;

class BusinesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-empresa|editar-empresa', ['only' => ['index']]);
        $this->middleware('permission:editar-empresa', ['only' => ['edit', 'update']]);
    }
    public function index(Busines $busine)
    {
        $image_url = null;

        if (isset($busine->logo)) {
            $image_url = asset($busine->logo);
            dd($image_url);
        }

        $busine = Busines::where('id', 1)->first();
        if (is_null($busine)) {
            $busine = null;
            //dd($busine);    
        }

        return view('admin.busines.index', compact('busine', 'image_url'));
    }

    public function update(UpdateRequest $request, Busines $busine)
{
    if ($request->hasFile('picture')) {
        // Obtener el nombre de la imagen actual
        $current_image = public_path($busine->logo);
        //dd($current_image);

        $file = $request->file('picture');
        $image_name = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('/image/logo'), $image_name);
        //dd($file);
        // Eliminar la imagen anterior del servidor
        if ($current_image && file_exists($current_image)) {
            //dd($current_image);
            unlink($current_image);
        }
        $busine->update(
            $request->all() + [
                'logo' => 'image/logo/' . $image_name,
            ],
        );
    } else {
        $busine->update($request->all());
    }

    return redirect()->route('busines.index');
}

}
