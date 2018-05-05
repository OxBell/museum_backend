<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GalleriesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_unauthenticated_user_cant_browse_galleries()
    {
        $response = $this->get('/api/galleries');
        $response->assertStatus(401);
    }

    /** @test */
    public function anr_unauthenticated_user_cant_read_a_single_gallery()
    {
        $gallery = factory('App\Gallery')->create();

        $response = $this->get('/api/galleries/' . $gallery->id);
        $response->assertStatus(401);
    }

    /** @test */
    public function an_authenticated_user_can_browse_galleries()
    {
        $gallery = factory('App\Gallery')->create();

        // Can't list galleries
        $response = $this->get('/api/galleries');
        $response->assertStatus(200);

        // Can't get a specific gallery
        $response = $this->get('/api/galleries/' . $gallery->id);
        $response->assertStatus(200);
    }

    /** @test */
    public function an_authenticated_user_can_read_a_single_gallery()
    {
        $gallery = factory('App\Gallery')->create();

        $response = $this->get('/api/galleries/' . $gallery->id);
        $response->assertStatus(200);
    }
}
