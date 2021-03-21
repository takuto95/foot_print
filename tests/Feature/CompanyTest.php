<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * ゴール名が空欄の場合はバリデーションエラー
     * @test
     */

    public function title()
    {
        $response = $this->post('/company/create', [
            'title' => '',
        ]);

        $response->assertSessionHasErrors([
            'title' => 'The タイトル field is required.'
        ]);
    }
}
