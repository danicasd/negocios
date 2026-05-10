<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Category;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categorías
        $plomeria = Category::where('name', 'Plomería')->first();
        $electricidad = Category::where('name', 'Electricidad')->first();
        $limpieza = Category::where('name', 'Limpieza')->first();
        $soporte = Category::where('name', 'Soporte técnico')->first();
        $camaras = Category::where('name', 'Cámaras')->first();
        $mantenimiento = Category::where('name', 'Mantenimiento')->first();

        /*
        |--------------------------------------------------------------------------
        | PLOMERÍA
        |--------------------------------------------------------------------------
        */

        Service::create([
            'name' => 'Reparación de fugas',
            'category_id' => $plomeria->id,
            'description' => 'Baños, cocinas, lavabos y tuberías.',
            'base_price' => 350,
            'estimated_duration' => 90,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Destape de drenaje',
            'category_id' => $plomeria->id,
            'description' => 'Lavabos, fregaderos y tuberías.',
            'base_price' => 450,
            'estimated_duration' => 120,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Instalación de grifos',
            'category_id' => $plomeria->id,
            'description' => 'Llaves y mezcladoras.',
            'base_price' => 400,
            'estimated_duration' => 60,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Reparación de WC',
            'category_id' => $plomeria->id,
            'description' => 'Fugas, tanque, descarga y fallas comunes.',
            'base_price' => 450,
            'estimated_duration' => 90,
            'status' => true,
        ]);

        /*
        |--------------------------------------------------------------------------
        | ELECTRICIDAD
        |--------------------------------------------------------------------------
        */

        Service::create([
            'name' => 'Instalación de contactos',
            'category_id' => $electricidad->id,
            'description' => 'Contactos y apagadores.',
            'base_price' => 350,
            'estimated_duration' => 60,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Instalación de lámparas',
            'category_id' => $electricidad->id,
            'description' => 'Lámparas y focos decorativos.',
            'base_price' => 400,
            'estimated_duration' => 60,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Revisión de apagones',
            'category_id' => $electricidad->id,
            'description' => 'Diagnóstico básico eléctrico.',
            'base_price' => 500,
            'estimated_duration' => 90,
            'status' => true,
        ]);

        /*
        |--------------------------------------------------------------------------
        | LIMPIEZA
        |--------------------------------------------------------------------------
        */

        Service::create([
            'name' => 'Limpieza básica',
            'category_id' => $limpieza->id,
            'description' => 'Limpieza general del hogar.',
            'base_price' => 500,
            'estimated_duration' => 180,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Limpieza profunda',
            'category_id' => $limpieza->id,
            'description' => 'Cocina, baño y áreas difíciles.',
            'base_price' => 800,
            'estimated_duration' => 300,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Limpieza post obra',
            'category_id' => $limpieza->id,
            'description' => 'Polvo, residuos y acabados.',
            'base_price' => 1200,
            'estimated_duration' => 360,
            'status' => true,
        ]);

        /*
        |--------------------------------------------------------------------------
        | SOPORTE TÉCNICO
        |--------------------------------------------------------------------------
        */

        Service::create([
            'name' => 'Mantenimiento de computadora',
            'category_id' => $soporte->id,
            'description' => 'Limpieza, optimización y revisión general.',
            'base_price' => 350,
            'estimated_duration' => 120,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Formateo e instalación',
            'category_id' => $soporte->id,
            'description' => 'Sistema operativo y configuración básica.',
            'base_price' => 500,
            'estimated_duration' => 180,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Configuración WiFi',
            'category_id' => $soporte->id,
            'description' => 'Router, internet y red doméstica.',
            'base_price' => 400,
            'estimated_duration' => 60,
            'status' => true,
        ]);

        /*
        |--------------------------------------------------------------------------
        | CÁMARAS
        |--------------------------------------------------------------------------
        */

        Service::create([
            'name' => 'Instalación de cámara',
            'category_id' => $camaras->id,
            'description' => 'Montaje y configuración básica.',
            'base_price' => 700,
            'estimated_duration' => 180,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Kit de cámaras',
            'category_id' => $camaras->id,
            'description' => 'Instalación de sistema múltiple.',
            'base_price' => 1500,
            'estimated_duration' => 360,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Configuración de app',
            'category_id' => $camaras->id,
            'description' => 'Acceso remoto y monitoreo móvil.',
            'base_price' => 350,
            'estimated_duration' => 60,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Revisión de sistema de seguridad',
            'category_id' => $camaras->id,
            'description' => 'Diagnóstico de cámaras, conexiones y funcionamiento.',
            'base_price' => 600,
            'estimated_duration' => 120,
            'status' => true,
        ]);

        /*
        |--------------------------------------------------------------------------
        | MANTENIMIENTO GENERAL
        |--------------------------------------------------------------------------
        */

        Service::create([
            'name' => 'Reparaciones menores',
            'category_id' => $mantenimiento->id,
            'description' => 'Ajustes y arreglos básicos del hogar.',
            'base_price' => 400,
            'estimated_duration' => 90,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Armado de muebles',
            'category_id' => $mantenimiento->id,
            'description' => 'Ensamble de muebles nuevos.',
            'base_price' => 450,
            'estimated_duration' => 120,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Instalación de repisas',
            'category_id' => $mantenimiento->id,
            'description' => 'Montaje seguro en muro.',
            'base_price' => 350,
            'estimated_duration' => 60,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Pintura básica por habitación',
            'category_id' => $mantenimiento->id,
            'description' => 'Aplicación de pintura interior en una habitación estándar.',
            'base_price' => 1000,
            'estimated_duration' => 300,
            'status' => true,
        ]);
    }
}
