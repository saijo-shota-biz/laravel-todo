<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ["プライベート", "仕事", "旅行"];

        $now = Carbon::now();

        foreach ($titles as $title) {
            DB::table("folders")->insert([
                "title" => $title,
                "created_at" => $now,
                "updated_at" => $now,
            ]);
        }
    }
}
