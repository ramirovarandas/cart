<?php

namespace Tests\Feature\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexPageTest extends TestCase
{

    public function test_show_index_page_with_cart_and_checkout_data()
    {
        $response = $this->get('/');

        $response
            ->assertStatus(200)
            ->assertSeeText('Macbook Pro 2019');
    }
}
