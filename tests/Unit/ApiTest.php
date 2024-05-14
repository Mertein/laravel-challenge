<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{

    //TODO: Verificamos que devuelva las entidades con la categoria Animals
    public function testApiGetEntitiesWithCategoryAnimals()
    {
        $response = $this->get('/api/Animals');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'data' => [
                '*' => [
                    'api',
                    'description',
                    'link',
                    'category' => [
                        'id',
                        'category',
                    ]
                ]
            ]
        ]);
    }

    //TODO: Verificamos que devuela un mensaje de error si la categoría no existe
    public function testApiGetEntitiesWithCategoryNotFound()
    {
        $response = $this->get('/api/sdsdsds');
        $response->assertStatus(404);
        $response->assertJson([
            'success' => false,
            'message' => 'Category not found'
        ]);
    }

    //TODO: Verificamos que devuelva todas las entidades si no se especifica una categoría
    public function testApiGetAllEntities()
    {
        $response = $this->get('/api');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'categories',
            'data' => [
                '*' => [
                    'api',
                    'description',
                    'link',
                    'category' => [
                        'id',
                        'category',
                    ]
                ]
            ]
        ]);
    }
}
