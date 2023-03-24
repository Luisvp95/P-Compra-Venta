<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-rol|detalle-rol|crear-rol|editar-rol|borrar-rol',['only'=>['index']]);
        $this->middleware('permission:crear-rol', ['only'=>['create','store']]);
        $this->middleware('permission:detalle-rol', ['only'=>['show']]);
        $this->middleware('permission:editar-rol', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-rol', ['only'=>['destroy']]);
    }

    public function index()
    {
        $roles = Role::get();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        //$permission = Permission::get();

        //$permission = Permission::pluck('name', 'id');
        $userPermission = Permission::where('name', 'LIKE', '%ver-usuario%')
                        ->orWhere('name', 'LIKE', '%crear-usuario%')
                        ->orWhere('name', 'LIKE', '%editar-usuario%')
                        ->orWhere('name', 'LIKE', '%borrar-usuario%')
                        ->orWhere('name', 'LIKE', '%detalle-usuario%')
                        ->pluck('name', 'id');
        

        $rolPermission = Permission::where('name', 'LIKE', '%ver-rol%')
                        ->orWhere('name', 'LIKE', '%crear-rol%')
                        ->orWhere('name', 'LIKE', '%editar-rol%')
                        ->orWhere('name', 'LIKE', '%borrar-rol%')
                        ->orWhere('name', 'LIKE', '%detalle-rol%')
                        ->pluck('name', 'id');

        $categoryPermission = Permission::where('name', 'LIKE', '%ver-categoria%')
                        ->orWhere('name', 'LIKE', '%crear-categoria%')
                        ->orWhere('name', 'LIKE', '%editar-categoria%')
                        ->orWhere('name', 'LIKE', '%borrar-categoria%')
                        ->orWhere('name', 'LIKE', '%detalle-categoria%')
                        ->pluck('name', 'id');

        $clientPermission = Permission::where('name', 'LIKE', '%ver-cliente%')
                        ->orWhere('name', 'LIKE', '%crear-cliente%')
                        ->orWhere('name', 'LIKE', '%editar-cliente%')
                        ->orWhere('name', 'LIKE', '%borrar-cliente%')
                        ->orWhere('name', 'LIKE', '%detalle-cliente%')
                        ->pluck('name', 'id');

        $productPermission = Permission::where('name', 'LIKE', '%ver-producto%')
                        ->orWhere('name', 'LIKE', '%crear-producto%')
                        ->orWhere('name', 'LIKE', '%editar-producto%')
                        ->orWhere('name', 'LIKE', '%borrar-producto%')
                        ->orWhere('name', 'LIKE', '%detalle-producto%')
                        ->pluck('name', 'id');

        $providerPermission = Permission::where('name', 'LIKE', '%ver-proveedor%')
                        ->orWhere('name', 'LIKE', '%crear-proveedor%')
                        ->orWhere('name', 'LIKE', '%editar-proveedor%')
                        ->orWhere('name', 'LIKE', '%borrar-proveedor%')
                        ->orWhere('name', 'LIKE', '%detalle-proveedor%')
                        ->pluck('name', 'id');

        $purchasePermission = Permission::where('name', 'LIKE', '%ver-compra%')
                        ->orWhere('name', 'LIKE', '%crear-compra%')
                        ->orWhere('name', 'LIKE', '%detalle-compra%')
                        ->orWhere('name', 'LIKE', '%pdf-compra%')
                        ->orWhere('name', 'LIKE', '%estado-compra%')
                        ->pluck('name', 'id');

        $salePermission = Permission::where('name', 'LIKE', '%ver-venta%')
                        ->orWhere('name', 'LIKE', '%crear-venta%')
                        ->orWhere('name', 'LIKE', '%detalle-venta%')
                        ->orWhere('name', 'LIKE', '%pdf-venta%')
                        ->orWhere('name', 'LIKE', '%imprimir-venta%')
                        ->orWhere('name', 'LIKE', '%estado-venta%')
                        ->pluck('name', 'id');

        $reportPermission = Permission::where('name', 'LIKE', '%ver-reporte-dia%')
                        ->orWhere('name', 'LIKE', '%ver-reporte-por-fecha%')
                        ->orWhere('name', 'LIKE', '%consultar-fecha%')
                        ->orWhere('name', 'LIKE', '%pdf-reporte-dia%')
                        ->orWhere('name', 'LIKE', '%detalle-reporte-dia%')
                        ->orWhere('name', 'LIKE', '%detalle-reporte-por-fecha%')
                        ->orWhere('name', 'LIKE', '%pdf-reporte-dia%')
                        ->orWhere('name', 'LIKE', '%imprimir-reporte-dia%')
                        ->orWhere('name', 'LIKE', '%imprimir-reporte-por-fecha%')
                        ->pluck('name', 'id');

        $businesPermission = Permission::where('name', 'LIKE', '%ver-empresa%')
                        ->orWhere('name', 'LIKE', '%editar-empresa%')
                        ->pluck('name', 'id');

        $printerPermission = Permission::where('name', 'LIKE', '%ver-impresora%')
                        ->orWhere('name', 'LIKE', '%editar-impresora%')
                        ->pluck('name', 'id');




        return view('admin.role.create', compact('userPermission', 'rolPermission', 'categoryPermission', 'clientPermission', 'productPermission'
        , 'providerPermission', 'purchasePermission', 'salePermission', 'reportPermission', 'businesPermission', 'printerPermission'));
    }

  
    public function store(StoreRequest $request)
    {
        $role = Role::create(['name'=> $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index');
    }


    public function show(Role $role)
    {
        return view('admin.role.show', compact('role'));
    }
    public function edit($id)
    {
        $role = Role::find($id);
        //$permission = Permission::get();

        $userPermission = Permission::where('name', 'LIKE', '%ver-usuario%')
                        ->orWhere('name', 'LIKE', '%crear-usuario%')
                        ->orWhere('name', 'LIKE', '%editar-usuario%')
                        ->orWhere('name', 'LIKE', '%borrar-usuario%')
                        ->orWhere('name', 'LIKE', '%detalle-usuario%')
                        ->pluck('name', 'id');
        

        $rolPermission = Permission::where('name', 'LIKE', '%ver-rol%')
                        ->orWhere('name', 'LIKE', '%crear-rol%')
                        ->orWhere('name', 'LIKE', '%editar-rol%')
                        ->orWhere('name', 'LIKE', '%borrar-rol%')
                        ->orWhere('name', 'LIKE', '%detalle-rol%')
                        ->pluck('name', 'id');

        $categoryPermission = Permission::where('name', 'LIKE', '%ver-categoria%')
                        ->orWhere('name', 'LIKE', '%crear-categoria%')
                        ->orWhere('name', 'LIKE', '%editar-categoria%')
                        ->orWhere('name', 'LIKE', '%borrar-categoria%')
                        ->orWhere('name', 'LIKE', '%detalle-categoria%')
                        ->pluck('name', 'id');

        $clientPermission = Permission::where('name', 'LIKE', '%ver-cliente%')
                        ->orWhere('name', 'LIKE', '%crear-cliente%')
                        ->orWhere('name', 'LIKE', '%editar-cliente%')
                        ->orWhere('name', 'LIKE', '%borrar-cliente%')
                        ->orWhere('name', 'LIKE', '%detalle-cliente%')
                        ->pluck('name', 'id');

        $productPermission = Permission::where('name', 'LIKE', '%ver-producto%')
                        ->orWhere('name', 'LIKE', '%crear-producto%')
                        ->orWhere('name', 'LIKE', '%editar-producto%')
                        ->orWhere('name', 'LIKE', '%borrar-producto%')
                        ->orWhere('name', 'LIKE', '%detalle-producto%')
                        ->pluck('name', 'id');

        $providerPermission = Permission::where('name', 'LIKE', '%ver-proveedor%')
                        ->orWhere('name', 'LIKE', '%crear-proveedor%')
                        ->orWhere('name', 'LIKE', '%editar-proveedor%')
                        ->orWhere('name', 'LIKE', '%borrar-proveedor%')
                        ->orWhere('name', 'LIKE', '%detalle-proveedor%')
                        ->pluck('name', 'id');

        $purchasePermission = Permission::where('name', 'LIKE', '%ver-compra%')
                        ->orWhere('name', 'LIKE', '%crear-compra%')
                        ->orWhere('name', 'LIKE', '%detalle-compra%')
                        ->orWhere('name', 'LIKE', '%pdf-compra%')
                        ->orWhere('name', 'LIKE', '%estado-compra%')
                        ->pluck('name', 'id');

        $salePermission = Permission::where('name', 'LIKE', '%ver-venta%')
                        ->orWhere('name', 'LIKE', '%crear-venta%')
                        ->orWhere('name', 'LIKE', '%detalle-venta%')
                        ->orWhere('name', 'LIKE', '%pdf-venta%')
                        ->orWhere('name', 'LIKE', '%imprimir-venta%')
                        ->orWhere('name', 'LIKE', '%estado-venta%')
                        ->pluck('name', 'id');

        $reportPermission = Permission::where('name', 'LIKE', '%ver-reporte-dia%')
                        ->orWhere('name', 'LIKE', '%ver-reporte-por-fecha%')
                        ->orWhere('name', 'LIKE', '%consultar-fecha%')
                        ->orWhere('name', 'LIKE', '%pdf-reporte-dia%')
                        ->orWhere('name', 'LIKE', '%detalle-reporte-dia%')
                        ->orWhere('name', 'LIKE', '%detalle-reporte-por-fecha%')
                        ->orWhere('name', 'LIKE', '%pdf-reporte-dia%')
                        ->orWhere('name', 'LIKE', '%imprimir-reporte-dia%')
                        ->orWhere('name', 'LIKE', '%imprimir-reporte-por-fecha%')
                        ->pluck('name', 'id');

        $businesPermission = Permission::where('name', 'LIKE', '%ver-empresa%')
                        ->orWhere('name', 'LIKE', '%editar-empresa%')
                        ->pluck('name', 'id');

        $printerPermission = Permission::where('name', 'LIKE', '%ver-impresora%')
                        ->orWhere('name', 'LIKE', '%editar-impresora%')
                        ->pluck('name', 'id');

        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        return view('admin.role.edit', compact('role','rolePermissions','userPermission', 'rolPermission', 'categoryPermission', 'clientPermission', 'productPermission'
        , 'providerPermission', 'purchasePermission', 'salePermission', 'reportPermission', 'businesPermission', 'printerPermission'));
    }


    public function update(UpdateRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index');
    }


    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index');
    }
}

