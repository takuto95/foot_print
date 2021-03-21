<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FutureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 足跡名が空欄の場合はバリデーションエラー
     * @test
     */

    public function title()
    {
        $response = $this->post('/futures/create', [
            'title' => '',
            'detail' => 'Sampledetail',
            'due_date' => '2021-03-29',
        ]);

        $response->assertSessionHasErrors([
            'title' => 'The タイトル field is required.'
        ]);
    }

    /**
     * 詳細が空欄の場合はバリデーションエラー
     * @test
     */

    public function detail()
    {
        $response = $this->post('/futures/create', [
            'title' => 'Sampletask',
            'detail' => '',
            'due_date' => '2021-03-29',
        ]);

        $response->assertSessionHasErrors([
            'detail' => 'The 詳細 field is required.'
        ]);
    }

    /**
     * 期限日が空欄の場合はバリデーションエラー
     * @test
     */

    public function due_date()
    {
        $response = $this->post('/futures/create', [
            'title' => 'Sampletask',
            'detail' => 'Sampledetail',
            'due_date' => '',
        ]);

        $response->assertSessionHasErrors([
            'due_date' => 'The 期限日 field is required.'
        ]);
    }
}
