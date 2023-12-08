<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Site;


class SitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Site::create([
            'page' => 'home',
            'section' => 'banner',
            'text' => 'conteudo banner',
            'image' => 'caminho_img_banner'
        ]);

        Site::create([
            'page' => 'home',
            'section' => 'sobre',
            'text' => 'conteudo sobre',
            'image' => 'caminho_img_sobre'
        ]);

        Site::create([
            'page' => 'home',
            'section' => 'cta',
            'text' => 'conteudo cta',
            'image' => 'caminho_img_cta'
        ]);

        Site::create([
            'page' => 'home',
            'section' => 'formulario',
            'text' => 'conteudo formulario',
            'image' => 'caminho_img_form'
        ]);
    }
}
