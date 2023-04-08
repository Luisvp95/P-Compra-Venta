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
        $this->middleware('permission:ver-rol|detalle-rol|crear-rol|editar-rol|borrar-rol', ['only' => ['index']]);
        $this->middleware('permission:crear-rol', ['only' => ['create', 'store']]);
        $this->middleware('permission:detalle-rol', ['only' => ['show']]);
        $this->middleware('permission:editar-rol', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-rol', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::get();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $userPermission = $this->getPermissionsByType('usuario');
        $rolPermission = $this->getPermissionsByType('rol');
        $categoryPermission = $this->getPermissionsByType('categoria');
        $clientPermission = $this->getPermissionsByType('cliente');
        $productPermission = $this->getPermissionsByType('producto');
        $providerPermission = $this->getPermissionsByType('proveedor');
        $purchasePermission = $this->getPermissionsByType('compra');
        $salePermission = $this->getPermissionsByType('venta');
        $reportPermission = $this->getPermissionsByType('dia');
        $reportfechaPermission = $this->getPermissionsByType('por-fecha');
        $consultarfechaPermission = $this->getPermissionsByType('fecha');
        $businesPermission = $this->getPermissionsByType('empresa');
        $printerPermission = $this->getPermissionsByType('impresora');

        return view('admin.role.create', compact('userPermission', 'rolPermission', 'categoryPermission', 'clientPermission', 'productPermission', 'providerPermission', 'purchasePermission', 'salePermission', 'reportPermission', 'reportfechaPermission', 'consultarfechaPermission', 'businesPermission', 'printerPermission'));
    }
    private function getPermissionsByType($type)
    {
        $permissions = Permission::whereIn('name', ["ver-{$type}", "crear-{$type}", "editar-{$type}", "borrar-{$type}", "detalle-{$type}", "estado-{$type}", "pdf-{$type}", "imprimir-{$type}", "historial-{$type}", "consultar-{$type}", "detalle-reporte-{$type}", "ver-reporte-{$type}", "pdf-reporte-{$type}", "imprimir-reporte-{$type}"])->pluck('name', 'id');

        return $permissions;
        //dd($permissions);
    }

    public function store(StoreRequest $request)
    {
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index');
    }

    public function show(Role $role)
    {
        return view('admin.role.show', compact('role'));
    }
    public function edit($id)
    {
        $role = Role::findOrFail($id);

        $userPermission = $this->getPermissionsByType('usuario');
        $rolPermission = $this->getPermissionsByType('rol');
        $categoryPermission = $this->getPermissionsByType('categoria');
        $clientPermission = $this->getPermissionsByType('cliente');
        $productPermission = $this->getPermissionsByType('producto');
        $providerPermission = $this->getPermissionsByType('proveedor');
        $purchasePermission = $this->getPermissionsByType('compra');
        $salePermission = $this->getPermissionsByType('venta');
        $reportPermission = $this->getPermissionsByType('dia');
        $reportfechaPermission = $this->getPermissionsByType('por-fecha');
        $consultarfechaPermission = $this->getPermissionsByType('fecha');
        $businesPermission = $this->getPermissionsByType('empresa');
        $printerPermission = $this->getPermissionsByType('impresora');

        // Obtener los permisos del rol que se va a editar
        $assignedPermissions = $role->permissions->pluck('id')->toArray();

        return view('admin.role.edit', compact('role','userPermission', 'rolPermission', 'categoryPermission', 'clientPermission', 'productPermission', 'providerPermission', 'purchasePermission', 'salePermission', 'reportPermission', 'reportfechaPermission', 'consultarfechaPermission', 'businesPermission', 'printerPermission', 'assignedPermissions'));
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
