<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 商品一覧ページ
    public function index() {
        $products = Product::paginate(6); // 商品を取得
        return view('index', compact('products')); // index.blade.phpにデータを渡す
    }

    // 商品詳細ページ
    public function show($productId) {
        $product = Product::find($productId);

        // データが存在しない場合の処理
        if (!$product) {
            abort(404, '商品が見つかりません');
        }

        return view('show', compact('product'));
    }

    // 商品登録フォーム表示
    public function create() {
        return view('create');
    }

    // 商品登録処理
    public function store(Request $request) {
        Product::create($request->all()); // バリデーションは後で追加
        return redirect('/products');
    }

    // 商品更新フォーム表示
    public function edit($productId) {
        $product = Product::find($productId);
        return view('edit', compact('product'));
    }

    // 商品更新処理
    public function update(Request $request, $productId) {
        $product = Product::find($productId);
        $product->update($request->all());
        return redirect('/products');
    }

    // 商品削除処理
    public function destroy($productId) {
        Product::find($productId)->delete();
        return redirect('/products');
    }

    // 商品検索機能
    public function search(Request $request) {
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'LIKE', "%{$keyword}%")->get();
        return view('index', compact('products'));
    }
}
