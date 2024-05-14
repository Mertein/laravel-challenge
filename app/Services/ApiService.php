<?php

namespace App\Services;

use App\Models\Entity;
use Illuminate\Support\Facades\Http;
use App\Models\Category;

class ApiService
{
    public function fetchDataAndInsertEntities()
    {
        $response = Http::get('https://api.publicapis.org/entries');
        $data = $response->json();

        foreach ($data['entries'] as $entry) {
            if (in_array('Animals', $entry['Categories']) || in_array('Security', $entry['Categories'])) {
                Entity::create([
                    'api' => $entry['API'] ?? '',
                    'description' => $entry['Description'] ?? '',
                    'link' => $entry['Link'] ?? '',
                    'category_id' => $this->getCategoryId($entry['Categories']) ?? 1
                ]);
            }
        }
    }

    private function getCategoryId($categories)
    {
        $categoryIds = [];

        $category = Category::where('category', $categories)->first();

        if ($category) {
            return $category->id;
        } else {
            return null;
        }
    }
}
