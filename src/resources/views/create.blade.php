@extends('layouts.app')

@section('title', '商品登録')

@section('content')
<div class="form-container">
    <h1>商品登録</h1>
    <form action="/products/register" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- 商品名 -->
        <div class="form-group">
            <label for="name">商品名 <span class="required">必須</span></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="商品名を入力">
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <!-- 値段 -->
        <div class="form-group">
            <label for="price">値段 <span class="required">必須</span></label>
            <input type="text" id="price" name="price" value="{{ old('price') }}" placeholder="値段を入力">
            @error('price')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <!-- 商品画像 -->
        <div class="form-group">
            <label for="image">商品画像 <span class="required">必須</span></label>
            <input type="file" id="image" name="image">
            @error('image')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <!-- 季節 -->
        <div class="form-group">
            <label>季節 <span class="required">必須</span> <span class="note">複数選択可</span></label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="season[]" value="春" {{ is_array(old('season')) && in_array('春', old('season')) ? 'checked' : '' }}> 春</label>
                <label><input type="checkbox" name="season[]" value="夏" {{ is_array(old('season')) && in_array('夏', old('season')) ? 'checked' : '' }}> 夏</label>
                <label><input type="checkbox" name="season[]" value="秋" {{ is_array(old('season')) && in_array('秋', old('season')) ? 'checked' : '' }}> 秋</label>
                <label><input type="checkbox" name="season[]" value="冬" {{ is_array(old('season')) && in_array('冬', old('season')) ? 'checked' : '' }}> 冬</label>
            </div>
            @error('season')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <!-- 商品説明 -->
        <div class="form-group">
            <label for="description">商品説明 <span class="required">必須</span></label>
            <textarea id="description" name="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <!-- ボタン -->
        <div class="form-group">
            <a href="/products" class="btn btn-secondary">戻る</a>
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </form>
</div>
@endsection
