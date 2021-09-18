<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Nft::factory(10)->create();
    }
}
