<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VenueSeeder extends Seeder
{
    public function run()
    {
        DB::table('venue')->insert([
            [
                'name' => 'Venue A',
                'photo' => 'photo_a.jpg',
                'address' => 'Address A',
                'layout' => 'Layout A',
                'capacity' => 500,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
