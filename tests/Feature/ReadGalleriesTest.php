<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadGalleriesTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->gallery = factory('App\Gallery')->create();
    }

    /** @test */
    public function an_user_can_browse_galleries()
    {
        $response = $this->get('/api/galleries')
            ->assertStatus(200);
    }

    /** @test */
    public function an_user_can_read_a_single_gallery()
    {
        $response = $this->get('/api/galleries/' . $this->gallery->id)
            ->assertStatus(200);
    }

    /** @test */
    public function an_user_can_read_photos_associated_with_a_gallery()
    {
        factory('App\Photo')->create(['gallery_id' => $this->gallery->id]);
        $response = json_decode(
            $this->get('/api/galleries/' . $this->gallery->id)
                ->content()
        );

        $this->assertObjectHasAttribute('photos', $response);
        $this->assertGreaterThan(0, count($response->photos));
    }
}
