<?php

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (): View {
    return view('welcome', ['products' => config('software.products')]);
})->name('software.index');

Route::get('/software/{slug}', function (string $slug): View {
    $products = config('software.products');

    abort_unless(array_key_exists($slug, $products), 404);

    return view('software.show', [
        'product' => $products[$slug],
        'slug' => $slug,
        'products' => $products,
    ]);
})->where('slug', '[a-z0-9-]+')->name('software.show');

Route::get('/contact', function (Request $request): View {
    $products = config('software.products');
    $slug = $request->string('product')->toString();
    $product = array_key_exists($slug, $products) ? $products[$slug] : null;

    return view('software.contact', [
        'product' => $product,
        'slug' => $product ? $slug : null,
    ]);
})->name('software.contact');
