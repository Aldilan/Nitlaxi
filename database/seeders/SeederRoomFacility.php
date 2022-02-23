<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RoomFacility;

class SeederRoomFacility extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roomFacilities = [
            [
                'fasilitas' => '2 kasur, 2 kamar mandi, halaman balkon',
                'luas_kamar' => '7x7 meter'
            ],
            [
                'fasilitas' => '2 kasur, 1 kamar mandi, 1 pemandian air panas',
                'luas_kamar' => '7x7 meter'
            ]
            ];
        foreach ($roomFacilities as $roomFacility) {
            RoomFacility::create($roomFacility);
        }
    }
}
