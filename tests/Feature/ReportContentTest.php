<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportContentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 報告コメントが空欄の場合はバリデーションエラー
     * @test
     */

    public function comment()
    {
        $response = $this->post('/reportcontents/create', [
            'comment' => '',
        ]);

        $response->assertSessionHasErrors([
            'comment' => 'The 報告コメント field is required.',
        ]);
    }
}
