@extends('layouts.app')

@section('title', '商品登録')

@section('content')
<div class="product-register-container">
    <h2>商品登録</h2>
    <form method="POST" action="{{ url('/products/register') }}" enctype="multipart/form-data">
        @csrf
        
        <!-- 商品名 -->
        <div class="form-group">
            <label for="product-name">商品名 <span class="required">必須</span></label>
            <input type="text" id="product-name" name="name" class="input-text" placeholder="商品名を入力">
            <p class="error-message">商品名を入力してください</p>
        </div>

        <!-- 値段 -->
        <div class="form-group">
            <label for="product-price">値段 <span class="required">必須</span></label>
            <input type="number" id="product-price" name="price" class="input-text" placeholder="値段を入力">
            <p class="error-message">値段を入力してください</p>
        </div>

        <!-- 商品画像 -->
        <div class="form-group">
            <label for="product-image">商品画像 <span class="required">必須</span></label>
            <input type="file" id="product-image" name="image" class="input-file">
            <p class="error-message">商品画像を登録してください</p>
        </div>

        <!-- 季節 -->
        <div class="form-group">
            <label>季節 <span class="required">必須</span> <span class="optional">複数選択可</span></label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="season[]" value="春"> 春</label>
                <label><input type="checkbox" name="season[]" value="夏"> 夏</label>
                <label><input type="checkbox" name="season[]" value="秋"> 秋</label>
                <label><input type="checkbox" name="season[]" value="冬"> 冬</label>
            </div>
            <p class="error-message">季節を選択してください</p>
        </div>

        <!-- 商品説明 -->
        <div class="form-group">
            <label for="product-description">商品説明 <span class="required">必須</span></label>
            <textarea id="product-description" name="description" class="input-textarea" placeholder="商品の説明を入力"></textarea>
            <p class="error-message">商品説明を入力してください</p>
        </div>

        <!-- ボタン -->
        <div class="form-actions">
            <button type="button" onclick="window.location.href='{{ url('/products') }}'" class="btn-back">戻る</button>
            <button type="submit" class="btn-submit">登録</button>
        </div>
    </form>
</div>
@endsection
