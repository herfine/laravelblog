<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        
        DB::table('users')->insert([
            [
                'name' => 'HK',
                'email' => 'a@g.cm',
                'password' => bcrypt('zxc'),
            ],
            [
                'name' => 'AB',
                'email' => 'b@g.cm',
                'password' => bcrypt('asd'),
            ],
            [
                'name' => 'CD',
                'email' => 'c@g.cm',
                'password' => bcrypt('qwe'),
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
