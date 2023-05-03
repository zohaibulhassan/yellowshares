<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Yellow shares',
            'email' => 'admin@yellowshares.com',
            'password' => Hash::make('12345678'),
            'user_type'=>'a',
            'user_status'=>'a',
        ]);
    }
}
