@extends('layouts.app')

@section('title', '商品詳細・変更')

@section('content')
<div class="product-detail-container">
    <!-- 商品詳細エリア -->
    <div class="product-detail">
        <a href="/products" class="back-to-list">&lt; 商品一覧</a>
        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-image">
        <form method="POST" action="/products/{{ $product->id }}/update" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- 商品名 -->
            <label for="name">商品名</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="商品名を入力">
            @error('name')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <!-- 値段 -->
            <label for="price">値段</label>
            <input type="text" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="値段を入力">
            @error('price')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <!-- 季節 -->
            <label>季節</label>
            <div class="season-options">
                @foreach(['春', '夏', '秋', '冬'] as $index => $season)
                <label>
                    <input type="checkbox" name="season[]" value="{{ $index + 1 }}"
                        @foreach ($product->seasons as $product_season)
                            {{ $season == $product_season->name ? 'checked' : '' }}
                        @endforeach
                    >
                    {{ $season }}
                </label>
                @endforeach
            </div>
            @error('season')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <!-- 商品説明 -->
            <label for="description">商品説明</label>
            <textarea id="description" name="description" placeholder="商品の説明を入力">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <!-- 商品画像 -->
            <label for="image">商品画像</label>
            <input type="file" id="image" name="image">
            @error('image')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <!-- ボタンエリア -->
            <div class="button-group">
                <button type="button" class="back-button" onclick="location.href='/products'">戻る</button>
                <button type="submit" class="save-button">変更を保存</button>
                <button type="button" class="delete-button" onclick="location.href='/products/{{ $product->id }}/delete'">&#128465;</button>
            </div>
        </form>
    </div>
</div>
@endsection
