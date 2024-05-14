<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entity;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entities = [
            [
                'api' => 'https://api.example.com/animals',
                'link' => 'https://api.example.com/animals',
                'description' => 'Get a list of animals',
                'category_id' => 1,
            ],
            [
                'api' => 'https://api.example.com/animals/{id}',
                'description' => 'Get a single animal',
                'link' => 'https://api.example.com/animals/{id}',
                'category_id' => 1,
            ],
            [
                'api' => 'https://api.example.com/security',
                'description' => 'Get a list of security tools',
                'link' => 'https://api.example.com/security',
                'category_id' => 2,
            ],
            [
                'api' => 'https://api.example.com/security/{id}',
                'description' => 'Get a single security tool',
                'link' => 'https://api.example.com/security/{id}',
                'category_id' => 2,
            ]
        ];

        foreach ($entities as $entityData) {
            Entity::create($entityData);
        }
    }
}
