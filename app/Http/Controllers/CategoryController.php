<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-categoria|detalle-categoria|crear-categoria|editar-categoria|borrar-categoria', ['only' => ['index']]);
        $this->middleware('permission:detalle-categoria', ['only' => ['show']]);
        $this->middleware('permission:crear-categoria', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-categoria', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-categoria', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreRequest $request)
    {
        Category::create($request->all());

        return redirect()
            ->route('categories.index')
            ->with('success', 'La categoría se ha creado correctamente.')
            ->with('alert-type', 'alert-success');
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect()
            ->route('categories.index')
            ->with('success', 'La categoría se ha actualizado correctamente.')
            ->with('alert-type', 'alert-warning');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'La categoría se ha eliminado correctamente.')
            ->with('alert-type', 'alert-danger');
    }
}
