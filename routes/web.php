<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ManageContentController;
use App\Http\Controllers\PricesAndSizesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExportandImportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');
	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
	Route::get('/usuarios', [InfoUserController::class, 'show'])->name('users');
	Route::post('/criarUsuario', [InfoUserController::class, 'criarUsuario']);
	Route::get('/adicionarUsuario', [InfoUserController::class, 'viewCreateUser'])->name('create.users');
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
	//adm products
	Route::get('/todosProdutos', [ProductController::class, 'index'])->name('todosProdutos');
	Route::get('/precos-e-tamanhos', [PricesAndSizesController::class, 'index'])->name('precos-e-tamanhos');
	Route::get('/criar-precos-e-tamanhos', [PricesAndSizesController::class, 'getStore'])->name('criar-precos-e-tamanhos');
	Route::post('/store-preco-e-tamanhos', [PricesAndSizesController::class, 'store'])->name('store-preco-e-tamanhos');
	Route::get('/administrar-conteudo', [ManageContentController::class, 'index'])->name('administrar-conteudo');
	Route::post('/criarProduto/cadastro', [ProductController::class, 'store'])->name('storeProduct');
	Route::get('/administrarProduto/{id}', [ProductController::class, 'show'])->name('administrarProduto');
	Route::put('/atualizarProduto/{id}', [ProductController::class, 'update'])->name('atualizarProduto');
	//export e import
	Route::get('export',  [ExportandImportController::class, 'export'])->name('export');
	Route::post('import',  [ExportandImportController::class, 'import'])->name('import');
});
	Route::get('/home',  [ProductController::class, 'homePage'])->name('homePage');
	Route::get('/produto/{id}',  [ProductController::class, 'showProductClient'])->name('showProductClient');
	Route::get('/categoria/luminaria',  [ProductController::class, 'categoryLighting'])->name('categoryLighting');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');