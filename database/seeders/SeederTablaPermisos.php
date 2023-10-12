<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operaciones sobre tabla usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            //Operacions sobre tabla categorias
            'ver-categoria',
            'crear-categoria',
            'editar-categoria',
            'borrar-categoria',

            //Operaciones sobre tabla personas
            'ver-persona',
            'crear-persona',
            'editar-persona',
            'borrar-persona',

            //Operaciones sobre tabla subcategoria
            'ver-subcategoria',
            'crear-subcategoria',
            'editar-subcategoria',
            'borrar-subcategoria',

            //Operaciones sobre tabla servicios
            'ver-servicio',
            'crear-servicio',
            'editar-servicio',
            'borrar-servicio',

            //Operaciones sobre tabla redsocials
            'ver-redsocial',
            'crear-redsocial',
            'editar-redsocial',
            'borrar-redsocial',

            //Operaciones sobre tabla imagens
            'ver-imagen',
            'crear-imagen',
            'editar-imagen',
            'borrar-imagen',

            //Operaciones sobre tabla direccions
            'ver-direccion',
            'crear-direccion',
            'editar-direccion',
            'borrar-direccion',

            //Permisos adicionales
            'habilitar-servicio',
            'habilitar-redsocial',
            'habilitar-imagen',
            'ver-contenido',
            'ver-vista'

        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
