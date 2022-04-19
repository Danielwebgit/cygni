<?php

namespace Database\Seeders;

use App\Models\Player;
use DateTime;
use Faker\Provider\cs_CZ\DateTime as Cs_CZDateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Player::factory(5)->create();
    }
}
