<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class PageControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_page()
    {
        $response = $this->postJson('/api/pages', [
            'parent_id' => null,
            'title' => 'Test Page',
            'content' => 'Lorem ipsum...',
            'slug' => 'test-page'
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Page created successfully',
            ]);
    }

    /** @test */
    public function it_can_display_a_page()
    {
        $page = Page::factory()->create();

        $response = $this->get("/pages/{$page->slug}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_a_page()
    {
        $page = Page::factory()->create();

        $response = $this->deleteJson("/api/pages/{$page->id}");

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Page deleted successfully',
            ]);

        $this->assertDatabaseMissing('pages', ['id' => $page->id]);
    }
}
