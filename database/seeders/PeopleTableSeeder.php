<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'taro',
            'mail' => 'taro@yamada.jp',
            'age'  => '16',
        ];
        DB::table('people')->insert($param);
        $param = [
            'name' => 'sachiko',
            'mail' => 'sachiko@hanai.jp',
            'age'  => '16',
        ];
        DB::table('people')->insert($param);
        $param = [
            'name' => 'ichikawa',
            'mail' => 'ichikawa@sido.jp',
            'age'  => '16',
        ];
        DB::table('people')->insert($param);
    }
}
