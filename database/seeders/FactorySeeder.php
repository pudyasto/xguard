<?php

namespace Database\Seeders;

use App\Models\Factory;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arr = [
            [
                'kode_ref'  => '0',
                'nama'      => 'ALL FACTORY',
                'kode'      => 'ALL',
            ],
            [
                'kode_ref'  => '1',
                'nama'      => 'APPAREL ONE INDONESIA 1',
                'kode'      => 'AOI1',
            ],
            [
                'kode_ref'    => '2',
                'nama'      => 'APPAREL ONE INDONESIA 2',
                'kode'      => 'AOI2',
            ],
            [
                'kode_ref'  => '3',
                'nama'      => 'APPAREL ONE INDONESIA 3',
                'kode'      => 'AOI3',
            ],
        ];
        foreach ($arr as $key => $value) {
            Factory::create($value);
        }
    }
}
