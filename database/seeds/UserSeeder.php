<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create();
        User::updateOrCreate([
            'email' => 'admin@admin.com.br',
            'password' => bcrypt('123456'),
            'adm' => true
        ], [
            'name' => 'admin',
            'email' => 'admin@admin.com.br',
            'password' => bcrypt('123456'),
            'adm' => true
        ]);
    }
}
