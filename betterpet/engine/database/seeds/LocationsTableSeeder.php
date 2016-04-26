<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('domicile')->insert([
			['id'=>1,'location'=>'Jakarta Utara'],
			['id'=>2,'location'=>'Jakarta Timur'],
			['id'=>3,'location'=>'Jakarta Pusat'],
			['id'=>4,'location'=>'Jakarta Barat'],
			['id'=>5,'location'=>'Jakarta Selatan'],
			['id'=>6,'location'=>'Bogor'],
			['id'=>7,'location'=>'Depok'],
			['id'=>8,'location'=>'Tangerang'],
			['id'=>9,'location'=>'Bekasi']
		]);
    }
}
