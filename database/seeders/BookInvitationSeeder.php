<?php

namespace Database\Seeders;

use App\Models\BookInvitation;
use Illuminate\Database\Seeder;

class BookInvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookInvitation::factory(5)->create();
    }
}
