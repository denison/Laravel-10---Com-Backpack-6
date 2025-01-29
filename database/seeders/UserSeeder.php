<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = $this->getList();

        foreach($list as $item) {
            $userData = Arr::except($item, ['role']);
            
            User::updateOrCreate(['email' => data_get($userData, 'email')], $userData);
        }
    }

    /**
     * @return array
     */
    protected function getList(): array
    {
        return [
            [
                'name'      => 'Super Admin',
                'email'     => 'super@admin.com',
                'password'  => Hash::make('password')
            ],
        ];
    }
}
