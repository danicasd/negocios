<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Plomería',
                'description' => 'Servicios relacionados con tuberías, fugas e instalaciones de agua.',
                'status' => true,
            ],
            [
                'name' => 'Electricidad',
                'description' => 'Instalaciones y reparaciones eléctricas.',
                'status' => true,
            ],
            [
                'name' => 'Limpieza',
                'description' => 'Servicios de limpieza para casas y oficinas.',
                'status' => true,
            ],
            [
                'name' => 'Soporte técnico',
                'description' => 'Mantenimiento de computadoras, redes y configuración.',
                'status' => true,
            ],
            [
                'name' => 'Cámaras',
                'description' => 'Instalación de cámaras de seguridad para casa o negocio.',
                'status' => true,
            ],
            [
                'name' => 'Mantenimiento',
                'description' => 'Servicios preventivos y correctivos para el hogar.',
                'status' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['name' => $category['name']],
                [
                    'description' => $category['description'],
                    'status' => $category['status'],
                ]
            );
        }
    }
}