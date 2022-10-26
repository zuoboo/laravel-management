<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => 'MacBook',
                'user_id' => '1',
                'type' => '2',
                'detail' => 'Macbookの詳細',
            ],
            [
                'name' => 'どうぶつの森',
                'user_id' => '1',
                'type' => '3',
                'detail' => 'どうぶつの森の詳細',
            ],
            [
                'name' => '非常識な成功法則',
                'user_id' => '1',
                'type' => '1',
                'detail' => '非常識な成功法則の詳細',
            ],
        ]);
    }
}
