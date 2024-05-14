<?php

namespace Tests\Unit\Services;

use App\Models\Entity;
use App\Services\ApiService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ApiServiceTest extends TestCase
{
    //TODO: Verifica si se crearon los 5 registros en la base de datos
    public function testFetchDataAndInsertEntities()
    {
        // Crea una instancia del servicio ApiService
        $apiService = new ApiService();

        // Llama al método fetchDataAndInsertEntities
       $data =  $apiService->fetchDataAndInsertEntities();

        // Verifica si se crearon los 5 registros en la base de datos
        $this->assertCount(5, $data);
    }
}
