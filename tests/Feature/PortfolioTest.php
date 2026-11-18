<?php

namespace Tests\Feature;

use Tests\TestCase;

class PortfolioTest extends TestCase
{
    public function test_home_page_loads(): void
    {
        $this->get('/')->assertOk()->assertSee('id="app"', false);
    }

    public function test_portfolio_api_returns_owner_content(): void
    {
        $this->getJson('/api/portfolio')
            ->assertOk()
            ->assertJsonPath('owner.name', 'Kaiser T. Zamora')
            ->assertJsonStructure([
                'owner' => ['name', 'role', 'status', 'available'],
                'tree',
                'files' => ['readme', 'opac', 'ulrc', 'buklat', 'about', 'resume', 'contact'],
            ]);
    }

    public function test_portfolio_api_includes_projects_in_the_tree(): void
    {
        $response = $this->getJson('/api/portfolio')->assertOk();

        foreach (['opac', 'ulrc', 'buklat'] as $project) {
            $this->assertArrayHasKey($project, $response->json('files'));
            $this->assertSame('case', $response->json("files.$project.kind"));
        }

        $this->assertSame('/images/projects/ulrc-appointment.png', $response->json('files.ulrc.coverImage'));
        $this->assertSame('/images/projects/opac-catalog.jpg', $response->json('files.opac.coverImage'));
        $this->assertSame('/images/projects/opac-catalog.jpg', $response->json('files.opac.thumb'));
        $this->assertCount(2, $response->json('files.opac.gallery'));
        $this->assertSame('zakiser546@gmail.com', $response->json('files.contact.email'));
    }
}
