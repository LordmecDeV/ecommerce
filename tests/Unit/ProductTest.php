<?php

namespace Tests\Unit;

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseTransactions;

    public function testIndexAuthorized()
    {
        $this->actingAs(User::factory()->create(['role' => 'admin']));
        $response = $this->get('/todosProdutos');
        $response->assertStatus(200);
        $response->assertViewIs('allProducts');
        $response->assertViewHas('todosProdutos');
    }

    public function testIndexUnauthorized()
    {
        $this->actingAs(User::factory()->create(['role' => 'user']));
        $response = $this->get('/todosProdutos');
        $response->assertStatus(403);
    }

    public function testDashboardAuthorized()
    {
        $this->actingAs(User::factory()->create(['role' => 'admin']));
        $response = $this->get('/dashboard');
        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
    }

    public function testDashboardUnauthorized()
    {
        $this->actingAs(User::factory()->create(['role' => 'user']));
        $response = $this->get('/dashboard');
        $response->assertStatus(403);
    }

    public function testStoreAuthorized()
    {
        $this->actingAs(User::factory()->create(['role' => 'admin']));
        $productData = Product::factory()->make()->toArray();
        $productData['status'] = 'available';
        $productData['type_product'] = 'Mosaico';
        $response = $this->post('/storeProduct', $productData);
        $response->assertRedirect('/todosProdutos');
        $this->assertDatabaseHas('products', ['sku' => $productData['sku']]);
    }

    public function testStoreUnauthorized()
    {
        $this->actingAs(User::factory()->create(['role' => 'user']));
        $productData = Product::factory()->make()->toArray();
        $productData['status'] = 'available';
        $productData['type_product'] = 'Mosaico';
        $response = $this->post('/storeProduct', $productData);
        $response->assertStatus(403);
        $this->assertDatabaseMissing('products', ['sku' => $productData['sku']]);
    }

    public function testCreateAuthorized()
    {
        $this->actingAs(User::factory()->create(['role' => 'admin']));
        $response = $this->get('/createProduct');
        $response->assertStatus(200);
        $response->assertViewIs('laravel-examples/user-profile');
    }

    public function testCreateUnauthorized()
    {
        $this->actingAs(User::factory()->create(['role' => 'user']));
        $response = $this->get('/createProduct');
        $response->assertStatus(403);
    }

    public function testHomePage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('clientViews.home');
        $response->assertViewHasAll(['bestSeller', 'launch', 'highlight', 'mosaic', 'lighting']);
    }
}
