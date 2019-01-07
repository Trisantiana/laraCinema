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
			[
				'id' => '1',
				'name' => 'admin1',
				'role' => 'admin',
				'username' => 'admin1',
				'password' => bcrypt('admin1'),
			], 
			
			[
				'id' => '2',
				'name' => 'admin2',
				'role' => 'admin',
				'username' => 'admin2',
				'password' => bcrypt('admin2'),
			],

			[
				'id' => '3',
				'name' => 'user1',
				'role' => 'user',
				'username' => 'user1',
				'password' => bcrypt('user1'),
			], 
		]);
    }
}
