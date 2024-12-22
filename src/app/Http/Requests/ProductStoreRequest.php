<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:10000',
            'image' => 'required|file|mimes:png,jpeg',
            'season' => 'required|array', // 必須かつ配列
            'description' => 'required|string|max:120',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください。',
            'price.required' => '値段を入力してください。',
            'price.numeric' => '値段は数値で入力してください。',
            'price.min' => '値段は0以上で入力してください。',
            'price.max' => '値段は10000円以下で入力してください。',
            'image.required' => '商品画像を登録してください。',
            'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください。',
            'season.required' => '季節を選択してください。',
            'description.required' => '商品説明を入力してください。',
            'description.max' => '商品説明は120文字以内で入力してください。',
        ];
    }
}
