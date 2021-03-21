<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IdealTest extends TestCase
{
    use RefreshDatabase;

    /**
     * ゴール名が空欄の場合はバリデーションエラー
     * @test
     */

    public function title()
    {
        $response = $this->post('/ideal/create', [
            'title' => '',
            'due_date' => '2021-03-29',
            'content1' => 'test1',
            'content2' => 'test2',
            'content3' => 'test3',
        ]);

        $response->assertSessionHasErrors([
            'title' => 'The タイトル field is required.',
        ]);
    }

    /**
     * 期限が空欄の場合はバリデーションエラー
     * @test
     */

    public function due_date()
    {
        $response = $this->post('/ideal/create', [
            'title' => 'test',
            'due_date' => '',
            'content1' => 'test1',
            'content2' => 'test2',
            'content3' => 'test3',
        ]);

        $response->assertSessionHasErrors([
            'due_date' => 'The 期限日 field is required.'
        ]);
    }

    /**
     * 方針①が空欄の場合はバリデーションエラー
     * @test
     */

    public function content1()
    {
        $response = $this->post('/ideal/create', [
            'title' => 'test',
            'due_date' => '2021-03-29',
            'content1' => '',
            'content2' => 'test2',
            'content3' => 'test3',
        ]);

        $response->assertSessionHasErrors([
            'content1' => 'The 方針① field is required.',
        ]);
    }

    /**
     * 方針②が空欄の場合はバリデーションエラー
     * @test
     */

    public function content2()
    {
        $response = $this->post('/ideal/create', [
            'title' => 'test',
            'due_date' => '2021-03-29',
            'content1' => 'test1',
            'content2' => '',
            'content3' => 'test3',
        ]);

        $response->assertSessionHasErrors([
            'content2' => 'The 方針② field is required.',
        ]);
    }

    /**
     * 方針③が空欄の場合はバリデーションエラー
     * @test
     */

    public function content3()
    {
        $response = $this->post('/ideal/create', [
            'title' => 'test',
            'due_date' => '2021-03-29',
            'content1' => 'test1',
            'content2' => 'test2',
            'content3' => '',
        ]);

        $response->assertSessionHasErrors([
            'content3' => 'The 方針③ field is required.',
        ]);
    }
}
