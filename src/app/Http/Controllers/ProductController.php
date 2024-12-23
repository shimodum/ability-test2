<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 商品一覧ページ + 検索 + 並び替え
    public function index(Request $request) {
        $query = Product::query();

        // 検索機能
        if ($request->filled('keyword')) {
            $query->where('name', 'LIKE', "%" . $request->input('keyword') . "%");
        }

        // 並び替え機能
        if ($request->filled('sort')) {
            $sort = $request->input('sort');
            if ($sort === 'high') {
                $query->orderBy('price', 'desc');
            } elseif ($sort === 'low') {
                $query->orderBy('price', 'asc');
            }
        }

        $products = $query->paginate(6);

        return view('index', compact('products'));
    }

    // 商品詳細ページ
    public function show($productId) {
        $product = Product::findOrFail($productId);
        return view('show', compact('product'));
    }

    // 商品登録フォーム表示
    public function create() {
        return view('create');
    }

    // 商品登録処理
    public function store(ProductStoreRequest $request) {
        // ファイルアップロード処理
        $imagePath = 'storage/' . $request->file('image')->store('products', 'public');

        // 商品データの保存
        $product = Product::create(array_merge(
            $request->validated(),
            ['image' => $imagePath]
        ));

        // 季節の保存
        if ($request->has('season')) {
            $product->seasons()->attach($request->input('season'));
        }

        return redirect('/products');
    }

    // 商品更新フォーム表示
    public function edit($productId) {
        $product = Product::findOrFail($productId);
        return view('edit', compact('product'));
    }

    // 商品更新処理
    public function update(ProductUpdateRequest $request, $productId) {
        $product = Product::findOrFail($productId);

        // 新しい画像をアップロードする場合
        if ($request->hasFile('image')) {
            $imagePath = 'storage/' . $request->file('image')->store('products', 'public');
            $product->update(array_merge(
                $request->validated(),
                ['image' => $imagePath]
            ));
        } else {
            // 商品データの更新
            $product->update($request->validated());
        }

        // 季節の更新
        if ($request->has('season')) {
            $product->seasons()->sync($request->input('season'));
        }

        return redirect('/products');
    }

    // 商品削除処理
    public function destroy($productId) {
        $product = Product::findOrFail($productId);

        // 関連する画像ファイルを削除
        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect('/products');
    }

    // 商品検索機能
    public function search(Request $request) {
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'LIKE', "%{$keyword}%")->paginate(6);
        return view('index', compact('products'));
    }
}
