<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Entity;
use App\Models\Category;

class ModelsTest extends TestCase
{
    public function testEntityCreation()
    {
        $entity = Entity::factory()->create();

        $this->assertInstanceOf(Entity::class, $entity);
    }

    public function testCategoryCreation()
    {
        $category = Category::factory()->create();

        $this->assertInstanceOf(Category::class, $category);
    }
}
