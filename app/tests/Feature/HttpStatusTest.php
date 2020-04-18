<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HttpStatusTest extends TestCase
{
    /**
     * index ページのステータスコードは 200
     *
     * @return void
     */
    public function testIndexStatus()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }


}
