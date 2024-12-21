<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// 商品一覧ページ（表示）
Route::get('/products', [ProductController::class, 'index']);

// 商品登録ページ（フォーム表示）
Route::get('/products/register', [ProductController::class, 'create']);

// 商品詳細ページ
Route::get('/products/{productId}', [ProductController::class, 'show']);

// 商品登録（データ送信）
Route::post('/products/register', [ProductController::class, 'store']);

// 商品更新ページ（フォーム表示）
Route::get('/products/{productId}/update', [ProductController::class, 'edit']);

// 商品更新（データ送信）
Route::patch('/products/{productId}/update', [ProductController::class, 'update']);

// 商品削除
Route::delete('/products/{productId}/delete', [ProductController::class, 'destroy']);

// 商品検索機能
Route::get('/products/search', [ProductController::class, 'search']);
