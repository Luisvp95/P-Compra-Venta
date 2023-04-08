<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class TablePermissions extends Seeder
{
public function run()
    {
       $permisos = [

        'ver-usuario',
        'crear-usuario',
        'editar-usuario',
        'borrar-usuario',
        'detalle-usuario',

        'ver-rol',
        'crear-rol',
        'editar-rol',
        'borrar-rol',
        'detalle-rol',
        
        'ver-categoria',
        'crear-categoria',
        'editar-categoria',
        'borrar-categoria',
        'detalle-categoria',
        
        'ver-empresa',
        'editar-empresa',

        'ver-impresora',
        'editar-impresora',

        'ver-reporte-dia',
        'pdf-reporte-dia',
        'imprimir-reporte-dia',
        'detalle-reporte-dia',
        'ver-reporte-por-fecha',
        'pdf-reporte-por-fecha',
        'imprimir-reporte-por-fecha',
        'detalle-reporte-por-fecha',
        'consultar-fecha',

        'ver-cliente',
        'crear-cliente',
        'editar-cliente',
        'borrar-cliente',
        'detalle-cliente',

        'ver-producto',
        'crear-producto',
        'editar-producto',
        'borrar-producto',
        'detalle-producto',

        'ver-proveedor',
        'crear-proveedor',
        'editar-proveedor',
        'borrar-proveedor',
        'detalle-proveedor',

        'ver-compra',
        'crear-compra',
        'detalle-compra',
        'pdf-compra',
        'estado-compra',

        'ver-venta',
        'crear-venta',
        'pdf-venta',
        'imprimir-venta',
        'detalle-venta',
        'estado-venta',
       ];
       foreach($permisos as $permiso){
        Permission::create(['name'=>$permiso]);
       }
    }
}