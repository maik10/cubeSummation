<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CubeControllerTest extends TestCase
{
    
    /** @test */

    public function can_create_cube() {

    	$CommandResponse = $this->post(route('process'), ['command' => '4 5']);

    	$CommandResponse->assertStatus(200);

    	$CommandResponse->assertViewHas('response', 'Creado');

    }

    /** @test
    	@depends can_create_cube
     */

    public function can_update_cube(){

    	$CommandResponse = $this->post(route('process'), ['command' => 'UPDATE 2 2 2 4']);

    	$CommandResponse->assertStatus(200);

    	$CommandResponse->assertViewHas('response', 'Actualizado');

    }

}
