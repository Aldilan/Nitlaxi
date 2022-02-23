<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HotelFacility;

class SeederHotelFacility extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotelFacilities = [
            [
                'fasilitas' => '2 kasur, 2 kamar mandi, halaman balkon',
                'keterangan' => '7x7 meter',
                'foto' => 'fasilitasHotel/UTYHMWGo5eIFPTMw0DRREpQnl8zlqxBxE7GSVo79.png'
            ],
            [
                'fasilitas' => '2 kasur, 1 kamar mandi, 1 pemandian air panas',
                'keterangan' => '7x7 meter',
                'foto' => 'fasilitasHotel/UTYHMWGo5eIFPTMw0DRREpQnl8zlqxBxE7GSVo79.png'
            ]
            ];
        foreach ($hotelFacilities as $hotelFacility) {
            HotelFacility::create($hotelFacility);
        }
    }
    
}
