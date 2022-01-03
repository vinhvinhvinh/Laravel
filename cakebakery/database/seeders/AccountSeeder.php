<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $acc = new Account();
        // $acc->id = 'ACCOUNT2022011251TEST';
        // $acc->tenkh = 'Test';
        // $acc->username = 'acc123456';
        // $acc->password = Hash::make('123456');
        // $acc->diachi = '12/34 ABC Tp.HCM';
        // $acc->email = 'acc123456@gmail.com';
        // $acc->loaitk = 1;
        // $acc->trangthai = 1;
        // $acc->save();

        DB::table('accounts')->insert([
            ['id' => 'ACCOUNT2022010235ADMIN', 'tenkh' => 'ADMIN0001', 'username' => 'admin123', 'password' => Hash::make('123456'), 'diachi' => 'hahahahhaa thg admin ngu nguc', 'email' => 'admin123@gmail.com', 'loaitk' => -1, 'trangthai' => 1],
        ]);
    }
}