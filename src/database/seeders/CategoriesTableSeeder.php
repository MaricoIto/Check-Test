<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 外部キー制約を一時的に無効化
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        // contactsテーブルとcategoriesテーブルのデータを削除
        DB::table('contacts')->delete(); // 外部キー参照先を削除
        DB::table('categories')->delete();

        // AUTO_INCREMENTをリセット
        DB::statement('ALTER TABLE categories AUTO_INCREMENT = 1;');
        DB::statement('ALTER TABLE contacts AUTO_INCREMENT = 1;');

        // 外部キー制約を再び有効化
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        // categoriesテーブルにデータを挿入
        DB::table('categories')->insert([
            ['content' => '商品のお届けについて', 'created_at' => now(), 'updated_at' => now()],
            ['content' => '商品の交換について', 'created_at' => now(), 'updated_at' => now()],
            ['content' => '商品トラブル', 'created_at' => now(), 'updated_at' => now()],
            ['content' => 'ショップへのお問い合わせ', 'created_at' => now(), 'updated_at' => now()],
            ['content' => 'その他', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
