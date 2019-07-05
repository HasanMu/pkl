<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswas')->insert([
            'nama'      =>  'Hasan',
            'alamat'    =>  'Bandung',
            'umur'      =>  17,
            'bio'       =>  'Lorem Ipsum dolor',
            'status'    =>  'Dewasa'
        ], [
            'nama'      =>  'Harry',
            'alamat'    =>  'Bandung, Jawa Barat',
            'umur'      =>  17,
            'bio'       =>  'Lorem Ipsum dolor',
            'status'    =>  'Dewasa'
        ], [
            'nama'      =>  'Angga',
            'alamat'    =>  'Sompok, Bandung',
            'umur'      =>  17,
            'bio'       =>  'Lorem Ipsum dolor',
            'status'    =>  'Dewasa'
        ], [
            'nama'      =>  'Reynaldi',
            'alamat'    =>  'Rancamanyar, Bandung',
            'umur'      =>  19,
            'bio'       =>  'Lorem Ipsum dolor',
            'status'    =>  'Dewasa Pisan'
        ], [
            'nama'      =>  'Alby',
            'alamat'    =>  'Bandung, Lewih Dulang',
            'umur'      =>  17,
            'bio'       =>  'Lorem Ipsum dolor sit amet',
            'status'    =>  'Remaja'
        ]);

    }
}
