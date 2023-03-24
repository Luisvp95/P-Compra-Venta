<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;

use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-producto|detalle-producto|crear-producto|editar-producto|borrar-producto', ['only' => ['index']]);
        $this->middleware('permission:detalle-producto', ['only' => ['show']]);
        $this->middleware('permission:crear-producto', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-producto', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-producto', ['only' => ['destroy']]);
    }
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.create', compact('categories', 'providers'));
    }

    public function store(StoreRequest $request)
    {
        $image_name = null; // inicializa la variable como nula por defecto

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/image'), $image_name);
        }

        $productData = $request->all();

        // Si el nombre del archivo de imagen existe, agreguelo al campo de imagen del producto.
        if ($image_name) {
            $productData['image'] = 'image/' . $image_name;
        }

        $product = Product::create($productData);
        $product->update(['code' => $product->id]);
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {   
        $image_url = null;

        if ($product->image) {
            $image_url = asset($product->image);
        }
       
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.edit', compact('product', 'categories', 'providers', 'image_url'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        if ($request->hasFile('picture')) {
            // Obtener el nombre de la imagen actual
            $current_image = $product->image;

            $file = $request->file('picture');
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/image'), $image_name);

            // Eliminar la imagen anterior del servidor
            if ($current_image && file_exists(public_path($current_image))) {
                unlink(public_path($current_image));
                
            }
            $product->update(
                $request->all() + [
                    'image' => 'image/' . $image_name,
                ],
            );
        } else {
            $product->update($request->all());
        }

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function change_status(Product $product)
    {
        if ($product->status == 'ACTIVE') {
            $product->update(['status' => 'DEACTIVATED']);
            return redirect()->back();
        } else {
            $product->update(['status' => 'ACTIVE']);
            return redirect()->back();
        }
    }
}
