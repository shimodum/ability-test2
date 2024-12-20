@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
<div class="product-container">
    <!-- 左側エリア -->
    <aside class="sidebar">
        <h2>商品一覧</h2>
        <form method="GET" action="/products" class="search-sort-form">
            <!-- 商品検索 -->
            <input type="text" name="keyword" value="{{ request('keyword') }}" class="search-input" placeholder="商品名で検索">
            <button type="submit" class="search-btn">検索</button>

            <!-- 並び替え -->
            <div class="sort-box">
                <label for="sort-select">価格順で表示</label>
                <select id="sort-select" name="sort" class="sort-select" onchange="this.form.submit()">
                    <option value="" {{ request('sort') == '' ? 'selected' : '' }}>選択してください</option>
                    <option value="high" {{ request('sort') == 'high' ? 'selected' : '' }}>高い順に表示</option>
                    <option value="low" {{ request('sort') == 'low' ? 'selected' : '' }}>低い順に表示</option>
                </select>
            </div>
        </form>
    </aside>


    <!-- 右側エリア -->
    <div class="product-list-area">
        <!-- 商品追加ボタン -->
        <div class="add-btn-container">
            <a href="/products/register" class="add-btn">+ 商品を追加</a>
        </div>

        <!-- 商品カード一覧 -->
        <div class="product-list">
            @foreach ($products as $product)
                <div class="product-card">
                  <a href="/products/{{ $product->id }}">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p>¥{{ number_format($product->price) }}</p>
                  </a>
                </div>
            @endforeach
        </div>

        <!-- ページネーション -->
        <div class="pagination">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection