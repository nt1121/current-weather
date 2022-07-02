<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $rows = [
            ['name' => '北海道・東北地方', 'created_at' => $now, 'updated_at' => $now],
            ['name' => '関東地方', 'created_at' => $now, 'updated_at' => $now],
            ['name' => '中部地方', 'created_at' => $now, 'updated_at' => $now],
            ['name' => '近畿地方', 'created_at' => $now, 'updated_at' => $now],
            ['name' => '中国・四国地方', 'created_at' => $now, 'updated_at' => $now],
            ['name' => '九州・沖縄地方', 'created_at' => $now, 'updated_at' => $now],
        ];
        foreach ($rows as $row) {
            DB::table('regions')->insert($row);
        }
    }
}
