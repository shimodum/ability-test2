@extends('layouts.app')

@section('title', '商品詳細')

@section('content')
<div class="product-detail-container">
    <div class="detail-left">
        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-image">
        <form method="POST" action="{{ url('/products/' . $product->id . '/update') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">商品名</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="price">値段</label>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control">
            </div>

            <div class="form-group">
                <label>季節</label>
                <div class="season-options">
                    <label><input type="radio" name="season" value="春" {{ $product->season == '春' ? 'checked' : '' }}> 春</label>
                    <label><input type="radio" name="season" value="夏" {{ $product->season == '夏' ? 'checked' : '' }}> 夏</label>
                    <label><input type="radio" name="season" value="秋" {{ $product->season == '秋' ? 'checked' : '' }}> 秋</label>
                    <label><input type="radio" name="season" value="冬" {{ $product->season == '冬' ? 'checked' : '' }}> 冬</label>
                </div>
            </div>

            <div class="form-group">
                <label for="description">商品説明</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="form-buttons">
                <a href="{{ url('/products') }}" class="btn btn-secondary">戻る</a>
                <button type="submit" class="btn btn-warning">変更を保存</button>
            </div>
        </form>
    </div>
</div>
@endsection
