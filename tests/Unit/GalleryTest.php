<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GalleryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_an_owner()
    {
        $gallery = factory('App\Gallery')->create();

        $this->assertInstanceOf('App\User', $gallery->owner);
    }

    /** @test */
    public function it_has_photos()
    {
        $gallery = factory('App\Gallery')->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $gallery->photos);
    }
}
