<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class SeederRoom extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            [
                'nama_kamar' => 'Kamar Luxury',
                'jumlah_kamar' => '5',
                'fasilitas_id' => '1',
                'harga' => '2850000',
                'foto' => 'room/Aq5gxhmoUO5nCMxqq0hckglnqrCIqU2GEtN4PqUc.png'
            ],
            [
                'nama_kamar' => 'Luxury Suite',
                'jumlah_kamar' => '3',
                'fasilitas_id' => '2',
                'harga' => '2950000',
                'foto' => 'room/lOPB9UrhjDbOgOg3sWLl8LjsmcIRKNms9l8wvwV1.png'
            ]
            ];
        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
