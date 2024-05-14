<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Entity;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function index()
    {
        $entities = Entity::all();
        return view('welcome', compact('entities'));
    }

    public function getAllCategories()
    {
        $categories = Category::all();
        $responseData = [];

        foreach ($categories as $category) {
            $responseData[] = [
                'id' => $category->id,
                'category' => $category->category,
            ];
        }

        $response = [
            'success' => true,
            'data' => $responseData,
        ];

        return response()->json($response);
    }

    public function getEntitiesByCategory(Request $request, $category = null)
    {

        if ($category && !Category::where('category', $category)->exists()) {
            return response()->json(['success' => false, 'message' => 'Category not found'], 404);
        }
        $responseData = [];
        if($category) {
            $entities = Entity::whereHas('category', function ($query) use ($category) {
                $query->where('category', $category);
            })->get();
        } else {
            $entities = Entity::all();
        }
        foreach ($entities as $entity) {
            $responseData[] = [
                'api' => $entity->api,
                'description' => $entity->description,
                'link' => $entity->link,
                'category' => [
                    'id' => $entity->category->id,
                    'category' => $entity->category->category,
                ]
            ];
        }
        $response = [
            'success' => true,
            'categories' => $category ?? 'All Categories',
            'data' => $responseData,
        ];
        return response()->json($response);
    }

}
