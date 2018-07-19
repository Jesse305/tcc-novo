<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'name' => 'Jesse de Oliveira',
          'email' => 'jesse.ti.305@gmail.com',
          'cpf' => '000.786.221-07',
          'password' => bcrypt('jesse.abreu@123'),
        ]);
    }
}
