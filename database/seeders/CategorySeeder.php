<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Plomería',
            'description' => 'Servicios relacionados con tuberías, fugas e instalaciones de agua.',
            'status' => true,
        ]);

        Category::create([
            'name' => 'Electricidad',
            'description' => 'Instalaciones y reparaciones eléctricas.',
            'status' => true,
        ]);

        Category::create([
            'name' => 'Limpieza',
            'description' => 'Servicios de limpieza para casas y oficinas.',
            'status' => true,
        ]);

        Category::create([
            'name' => 'Soporte técnico',
            'description' => 'Mantenimiento de computadoras, redes y configuración.',
            'status' => true,
        ]);

        Category::create([
            'name' => 'Cámaras',
            'description' => 'Instalación de cámaras de seguridad para casa o negocio.',
            'status' => true,
        ]);

        Category::create([
            'name' => 'Mantenimiento',
            'description' => 'Servicios preventivos y correctivos para el hogar.',
            'status' => true,
        ]);
    }
}
