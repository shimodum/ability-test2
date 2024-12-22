@extends('layouts.app')

@section('title', '商品変更')

@section('content')
<div class="product-edit-container">
    <h2>商品変更</h2>
    <form method="POST" action="/products/{{ $product->id }}/update" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <!-- 商品名 -->
        <div class="form-group">
            <label for="product-name">商品名</label>
            <input type="text" id="product-name" name="name" class="input-text" value="{{ old('name', $product->name) }}" placeholder="商品名を入力">
            @if ($errors->has('name'))
                <p class="error-message">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <!-- 値段 -->
        <div class="form-group">
            <label for="product-price">値段</label>
            <input type="number" id="product-price" name="price" class="input-text" value="{{ old('price', $product->price) }}" placeholder="値段を入力">
            @if ($errors->has('price'))
                <p class="error-message">{{ $errors->first('price') }}</p>
            @endif
        </div>

        <!-- 商品画像 -->
        <div class="form-group">
            <label for="product-image">商品画像</label>
            <input type="file" id="product-image" name="image" class="input-file">
            @if ($errors->has('image'))
                <p class="error-message">{{ $errors->first('image') }}</p>
            @endif
        </div>

        <!-- 季節 -->
        <div class="form-group">
            <label>季節</label>
            @foreach (['春', '夏', '秋', '冬'] as $season)
                <label>
                    <input type="checkbox" name="season[]" value="{{ $season }}" {{ in_array($season, $product->seasons->pluck('name')->toArray()) ? 'checked' : '' }}>
                    {{ $season }}
                </label>
            @endforeach
        </div>

        <!-- 商品説明 -->
        <div class="form-group">
            <label for="product-description">商品説明</label>
            <textarea id="product-description" name="description" class="input-textarea" placeholder="商品の説明を入力">{{ old('description', $product->description) }}</textarea>
            @if ($errors->has('description'))
                <p class="error-message">{{ $errors->first('description') }}</p>
            @endif
        </div>

        <!-- ボタン -->
        <div class="form-actions">
            <button type="button" onclick="window.location.href='/products'" class="btn-back">戻る</button>
            <button type="submit" class="btn-submit">変更を保存</button>
        </div>
    </form>

    <!-- 削除ボタン -->
    <form method="POST" action="/products/{{ $product->id }}/delete">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-btn">
            <img src="{{ asset('images/trash-icon.png') }}" alt="削除">
        </button>
    </form>
</div>
@endsection
