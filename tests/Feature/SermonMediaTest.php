<?php

namespace Tests\Feature;

use App\Models\Sermon;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SermonMediaTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_media_index(): void
    {
        $response = $this->get(route('media'));

        $response->assertOk();
    }

    public function test_guest_can_view_sermon_detail(): void
    {
        $sermon = Sermon::factory()->create();

        $response = $this->get(route('media.show', $sermon->slug));

        $response->assertOk();
    }

    public function test_guest_is_redirected_from_admin_sermons(): void
    {
        $response = $this->get(route('admin.sermons.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_non_admin_cannot_access_admin_sermons(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $response = $this->actingAs($user)->get(route('admin.sermons.index'));

        $response->assertForbidden();
    }

    public function test_admin_can_store_sermon(): void
    {
        $user = User::factory()->admin()->create();

        $response = $this->actingAs($user)->post(route('admin.sermons.store'), [
            'title' => 'Sunday Sermon',
            'description' => 'Walking through the text together.',
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'published_at' => null,
        ]);

        $response->assertRedirect(route('admin.sermons.index'));
        $this->assertDatabaseHas('sermons', [
            'title' => 'Sunday Sermon',
        ]);
    }

    public function test_guest_cannot_store_sermon(): void
    {
        $response = $this->post(route('admin.sermons.store'), [
            'title' => 'Hack',
            'description' => 'x',
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);

        $response->assertRedirect(route('login'));
        $this->assertDatabaseCount('sermons', 0);
    }
}
