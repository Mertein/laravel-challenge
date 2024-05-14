<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Entity;
use Illuminate\Http\Request;
use App\Services\ApiService;

class EntityController extends Controller
{

    private ApiService $apiService;
    public function __construct(ApiService $apiService) {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $entities = Entity::paginate(10);
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

    public function insertData(Request $request)
    {
        try {
            $insertedData = $this->apiService->fetchDataAndInsertEntities();
            return response()->json(['success' => true, 'message' => 'Datos insertados correctamente', 'data' => $insertedData]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al insertar datos: ' . $e->getMessage()], 500);
        }
    }


}
