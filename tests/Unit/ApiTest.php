<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{
    public function testApiRoute()
    {
        // Simula una solicitud a la API con un cliente HTTP ficticio
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
        // Agrega más aserciones según lo necesites
    }
}
