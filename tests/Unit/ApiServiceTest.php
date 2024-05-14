<?php

namespace Tests\Unit\Services;

use App\Services\ApiService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ApiServiceTest extends TestCase
{
    public function testFetchDataAndInsertEntities()
    {
        Http::fake([
            'https://api.publicapis.org/entries' => Http::response([
                'entries' => [
                    [
                        'API' => 'Example API',
                        'Description' => 'This is an example API',
                        'Link' => 'https://example.com/api',
                        'Categories' => ['Animals']
                    ],
                    [
                        'API' => 'Another API',
                        'Description' => 'This is another example API',
                        'Link' => 'https://example.com/another-api',
                        'Categories' => ['Security']
                    ]
                ]
            ], 200)
        ]);

        // Creamos una instancia del servicio
        $apiService = new ApiService();

        // Llamamos al método para probar
        $apiService->fetchDataAndInsertEntities();

        // Verificamos que las entidades se hayan insertado correctamente en la base de datos
        $this->assertDatabaseHas('entities', ['api' => 'Example API']);
        $this->assertDatabaseHas('entities', ['api' => 'Another API']);
    }
}

