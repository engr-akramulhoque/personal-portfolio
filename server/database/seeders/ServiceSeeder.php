<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'id' => 1,
            'title' => 'Web Design',
            'icon' => '/uploads/icons/icon-design.svg',
            'description' => 'design made at a professional level.'
        ]);

        Service::create([
            'id' => 2,
            'title' => 'Web Development',
            'icon' => '/uploads/icons/icon-design.svg',
            'description' => 'High-quality development of sites at the professional level.'
        ]);

        Service::create([
            'id' => 3,
            'title' => 'Mobile Apps',
            'icon' => '/uploads/icons/icon-design.svg',
            'description' => 'Professional development of applications for iOS and Android.'
        ]);

        Service::create([
            'id' => 4,
            'title' => 'Photography',
            'icon' => '/uploads/icons/icon-design.svg',
            'description' => 'I make high-quality photos of any category at a professional level.'
        ]);
    }
}
