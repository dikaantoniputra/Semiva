<?php

namespace Database\Seeders;


use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $jsonFile = base_path('database/seeders/data/bus.json');

        if (!File::exists($jsonFile)) {
            $this->command->error('File ' . $jsonFile . ' not found.');
            return;
        }

        $json = File::get($jsonFile);

        $data = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->command->error('Unable to parse JSON: ' . json_last_error_msg());
            return;
        }

        foreach ($data as $article) {
            DB::table('buses')->insert($article);
        }

        $this->command->info('Data seeded successfully.');
    }
}
