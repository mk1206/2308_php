<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BoardTest extends TestCase
{
    // php artisan make:test 테스트파일명
    // 테스트파일명의 끝이 Test로 끝날 것

    use RefreshDatabase;

    // 게스트로 리다이렉트 했을 때
    public function test_index_게스트_리다이렉트() {
        $response = $this->get('/board');
        $response->assertRedirect('/user/login');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
