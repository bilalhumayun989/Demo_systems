<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class SoftwareCatalogTest extends TestCase
{
    public function test_homepage_renders_all_six_products_and_sales_actions(): void
    {
        $response = $this->get('/');

        $response
            ->assertViewIs('welcome')
            ->assertSee('Cloud Khata')
            ->assertSee('Vendify')
            ->assertSee('CX Couriers')
            ->assertSee('DOMS')
            ->assertSee('RMS')
            ->assertSee('Paddle')
                ->assertSee('images/software_dashboard.jpeg', false)
            ->assertSee(route('software.contact'), false);
    }

    #[DataProvider('products')]
    public function test_each_product_renders_its_detail_page(string $slug, string $name): void
    {
        $this->get("/software/{$slug}")
            ->assertViewIs('software.show')
            ->assertSee($name)
            ->assertSee('images/software_dashboard.jpeg', false)
            ->assertSee('Buy now');
    }

    public function test_vendify_detail_page_links_to_the_live_demo(): void
    {
        $this->get('/software/vendify')
            ->assertSee('https://pos.broshtech.com/', false)
            ->assertSee('Open live demo');
    }

    public function test_unknown_product_returns_not_found(): void
    {
        $this->get('/software/not-a-product')->assertNotFound();
    }

    public function test_contact_page_displays_selected_product_and_contact_methods(): void
    {
        $this->get('/contact?product=vendify')
            ->assertViewIs('software.contact')
            ->assertSee('Vendify')
            ->assertSee('bill.humayun1@gmail.com')
            ->assertSee('+92 3003662818')
            ->assertSee('https://wa.me/923003662818', false);
    }

    /**
     * @return array<string, array{string, string}>
     */
    public static function products(): array
    {
        return [
            'Cloud Khata' => ['cloud-khata', 'Cloud Khata'],
            'Vendify' => ['vendify', 'Vendify'],
            'CX Couriers' => ['cx-couriers', 'CX Couriers'],
            'DOMS' => ['doms', 'DOMS'],
            'RMS' => ['rms', 'RMS'],
            'Paddle' => ['paddle', 'Paddle'],
        ];
    }
}
