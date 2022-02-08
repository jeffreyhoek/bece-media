<?php

namespace Database\Seeders;

use App\Models\NfcTags;
use Illuminate\Database\Seeder;

class NfcTagsSeerder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        NfcTags::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            NfcTags::create([
                'tagValue' => $faker->sentence,
                'url' => $faker->sentence,
            ]);
        }
    }
}
