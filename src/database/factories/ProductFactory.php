<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        static $products = [
            ['name' => 'キウイ', 'price' => 800, 'image' => 'storage/products/kiwi.png', 'description' => 'キウイは甘みと酸味のバランスが絶妙なフルーツです。ビタミンCなどの栄養素も豊富のため、美肌効果や疲労回復効果も期待できます。もぎたてフルーツのスムージーをお召し上がりください！'],
            ['name' => 'ストロベリー', 'price' => 1200, 'image' => 'storage/products/strawberry.png', 'description' => '大人から子供まで大人気のストロベリー。当店では鮮度抜群の完熟いちごを使用しています。ビタミンCはもちろん食物繊維も豊富なため、腸内環境の改善も期待できます。もぎたてフルーツのスムージーをお召し上がりください！'],
            ['name' => 'オレンジ', 'price' => 850, 'image' => 'storage/products/orange.png', 'description' => '当店では酸味と甘みのバランスが抜群のネーブルオレンジを使用しています。酸味は控えめで、甘さと濃厚な果汁が魅力の商品です。もぎたてフルーツのスムージをお召し上がりください！'],
            ['name' => 'スイカ', 'price' => 700, 'image' => 'storage/products/watermelon.png', 'description' => '甘くてシャリシャリ食感が魅力のスイカ。全体の90％が水分のため、暑い日の水分補給や熱中症予防、カロリーが気になる方にもおすすめの商品です。もぎたてフルーツのスムージーをお召し上がりください！'],
            ['name' => 'ピーチ', 'price' => 1000, 'image' => 'storage/products/peach.png', 'description' => '豊潤な香りととろけるような甘さが魅力のピーチ。美味しさはもちろん見た目の可愛さも抜群の商品です。ビタミンEが豊富なため、生活習慣病の予防にもおすすめです。もぎたてフルーツのスムージーをお召し上がりください！'],
            ['name' => 'シャインマスカット', 'price' => 1400, 'image' => 'storage/products/muscat.png', 'description' => '爽やかな香りと上品な甘みが特長的なシャインマスカットは大人から子どもまで大人気のフルーツです。疲れた脳や体のエネルギー補給にも最適の商品です。もぎたてフルーツのスムージーをお召し上がりください！'],
            ['name' => 'パイナップル', 'price' => 800, 'image' => 'storage/products/pineapple.png', 'description' => '甘酸っぱさとトロピカルな香りが特徴のパイナップル。当店では甘さと酸味のバランスが絶妙な国産のパイナップルを使用しています。もぎたてフルーツのスムージをお召し上がりください！'],
            ['name' => 'ブドウ', 'price' => 1100, 'image' => 'storage/products/grapes.png', 'description' => 'ブドウの中でも人気の高い国産の「巨峰」を使用しています。高い糖度と適度な酸味が魅力で、鮮やかなパープルで見た目も可愛い商品です。もぎたてフルーツのスムージーをお召し上がりください！'],
            ['name' => 'バナナ', 'price' => 600, 'image' => 'storage/products/banana.png', 'description' => '低カロリーでありながら栄養満点のため、ダイエット中の方にもおすすめの商品です。1杯でバナナの濃厚な甘みを存分に堪能できます。もぎたてフルーツのスムージーをお召し上がりください！。'],
            ['name' => 'メロン', 'price' => 900, 'image' => 'storage/products/melon.png', 'description' => '香りがよくジューシーで品のある甘さが人気のメロンスムージー。カリウムが多く含まれているためむくみ解消効果も抜群です。もぎたてフルーツのスムージーをお召し上がりください！'],
        ];

        static $index = 0;

        if (!isset($products[$index])) {
            $index = 0; // リセット
        }

        $product = $products[$index];
        $index++;

        return [
            'name' => $product['name'],
            'price' => $product['price'],
            'image' => $product['image'],
            'description' => $product['description'],
        ];
    }
}
