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
            <input type="text" id="product-name" name="name" class="input-text" placeholder="商品名を入力" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <p class="error-message">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <!-- 値段 -->
        <div class="form-group">
            <label for="product-price">値段 <span class="required">必須</span></label>
            <input type="number" id="product-price" name="price" class="input-text" placeholder="値段を入力" value="{{ old('price') }}">
            @if ($errors->has('price'))
                <p class="error-message">{{ $errors->first('price') }}</p>
            @endif
        </div>

        <!-- 商品画像 -->
        <div class="form-group">
            <label for="product-image">商品画像 <span class="required">必須</span></label>
            <input type="file" id="product-image" name="image" class="input-file">
            @if ($errors->has('image'))
                <p class="error-message">{{ $errors->first('image') }}</p>
            @endif
        </div>

        <!-- 季節 -->
        <div class="form-group">
            <label>季節 <span class="required">必須</span> <span class="optional">複数選択可</span></label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="season[]" value="春" {{ is_array(old('season')) && in_array('春', old('season')) ? 'checked' : '' }}> 春</label>
                <label><input type="checkbox" name="season[]" value="夏" {{ is_array(old('season')) && in_array('夏', old('season')) ? 'checked' : '' }}> 夏</label>
                <label><input type="checkbox" name="season[]" value="秋" {{ is_array(old('season')) && in_array('秋', old('season')) ? 'checked' : '' }}> 秋</label>
                <label><input type="checkbox" name="season[]" value="冬" {{ is_array(old('season')) && in_array('冬', old('season')) ? 'checked' : '' }}> 冬</label>
            </div>
            @if ($errors->has('season'))
                <p class="error-message">{{ $errors->first('season') }}</p>
            @endif
        </div>

        <!-- 商品説明 -->
        <div class="form-group">
            <label for="product-description">商品説明 <span class="required">必須</span></label>
            <textarea id="product-description" name="description" class="input-textarea" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
                <p class="error-message">{{ $errors->first('description') }}</p>
            @endif
        </div>

        <!-- ボタン -->
        <div class="form-actions">
            <button type="button" onclick="window.location.href='{{ url('/products') }}'" class="btn-back">戻る</button>
            <button type="submit" class="btn-submit">登録</button>
        </div>
    </form>
</div>
@endsection
