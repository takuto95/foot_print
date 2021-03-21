<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeamTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * ゴール名が空欄の場合はバリデーションエラー
     * @test
     */

    public function title()
    {
        $response = $this->post('/team/create', [
            'title' => '',
        ]);

        $response->assertSessionHasErrors([
            'title' => 'The タイトル field is required.'
        ]);
    }
}
