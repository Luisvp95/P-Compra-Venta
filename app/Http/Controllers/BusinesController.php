<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Busines\UpdateRequest;
use App\Models\Busines;

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

        if ($busine->logo) {
            $image_url = asset($busine->logo);
            dd($image_url);
        }

        $busine = Busines::where('id', 1)->firstOrFail();
        if (is_null($busine)) {
            $busine = 'No hay datos disponibles';
        }
        return view('admin.busines.index', compact('busine', 'image_url'));
    }

    public function update(UpdateRequest $request, Busines $busine)
    {
        if ($request->hasFile('picture')) {
            // Obtener el nombre de la imagen actual
            $current_image = $busine->logo;

            $file = $request->file('picture');
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/image/logo'), $image_name);

            // Eliminar la imagen anterior del servidor
            if ($current_image && file_exists(public_path($current_image))) {
                unlink(public_path($current_image));
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
