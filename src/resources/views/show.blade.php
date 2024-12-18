@extends('layouts.app')

@section('title', '商品詳細')

@section('content')
<div class="product-detail-container">
    <!-- パンくずリスト -->
    <a href="{{ url('/products') }}" class="breadcrumb">商品一覧 > {{ $product->name }}</a>

    <!-- 商品詳細エリア -->
    <div class="product-content">
        <!-- 画像エリア -->
        <div class="product-image-area">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="image" class="file-input">
            </form>
        </div>

        <!-- 商品情報フォーム -->
        <form method="POST" action="{{ url('/products/' . $product->id . '/update') }}" class="product-form">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">商品名</label>
                <input type="text" name="name" value="{{ $product->name }}">
            </div>

            <div class="form-group">
                <label for="price">値段</label>
                <input type="number" name="price" value="{{ $product->price }}">
            </div>

            <div class="form-group">
                <label>季節</label>
                <label><input type="radio" name="season" value="春" {{ $product->season == '春' ? 'checked' : '' }}> 春</label>
                <label><input type="radio" name="season" value="夏" {{ $product->season == '夏' ? 'checked' : '' }}> 夏</label>
                <label><input type="radio" name="season" value="秋" {{ $product->season == '秋' ? 'checked' : '' }}> 秋</label>
                <label><input type="radio" name="season" value="冬" {{ $product->season == '冬' ? 'checked' : '' }}> 冬</label>
            </div>

            <div class="form-group">
                <label for="description">商品説明</label>
                <textarea name="description">{{ $product->description }}</textarea>
            </div>

            <!-- ボタンエリア -->
            <div class="button-area">
                <a href="{{ url('/products') }}" class="btn btn-back">戻る</a>
                <button type="submit" class="btn btn-save">変更を保存</button>
                <form method="POST" action="{{ url('/products/' . $product->id . '/delete') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete">削除</button>
                </form>
            </div>
        </form>
    </div>
</div>
@endsection
