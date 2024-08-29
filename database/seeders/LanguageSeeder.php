<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [

            [
                'code' => 'en',
                'name' => 'english',
                'rtl' => false
            ],

            [
                'code' => 'fr',
                'name' => 'french',
                'rtl' => false
            ],

            [
                'code' => 'ur',
                'name' => 'urdu',
                'rtl' => true
            ],

            [
                'code' => 'ar',
                'name' => 'arabic',
                'rtl' => true
            ],

        ];

        foreach ($languages as $language) {

            Language::create([
                'code' => $language['code'],
                'name' => $language['name'],
                'rtl' => $language['rtl']
            ]);

        }

    }
}
