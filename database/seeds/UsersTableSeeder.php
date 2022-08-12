<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'firstname'      => 'Prénom Admin',
                'lastname'       => 'Nom Admin',
                'email'          => 'admin@gmail.com',
                'password'       => '$2y$10$UnLIBQB1uZZC1r5msFWTPuZCZsMBUpZINpJ48G5FmMxz6yVGP83rO',
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'firstname'      => 'Prénom Agent 1',
                'lastname'       => 'Nom Agent 1',
                'email'          => 'agent1@gmail.com',
                'password'       => '$2y$10$UnLIBQB1uZZC1r5msFWTPuZCZsMBUpZINpJ48G5FmMxz6yVGP83rO',
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'firstname'      => 'Prénom Agent 2',
                'lastname'       => 'Nom Agent 2',
                'email'          => 'agent2@gmail.com',
                'password'       => '$2y$10$UnLIBQB1uZZC1r5msFWTPuZCZsMBUpZINpJ48G5FmMxz6yVGP83rO',
                'remember_token' => null,
            ],
            [
                'id'             => 4,
                'firstname'      => 'Prénom Agent 3',
                'lastname'       => 'Nom Agent 3',
                'email'          => 'agent3@gmail.com',
                'password'       => '$2y$10$UnLIBQB1uZZC1r5msFWTPuZCZsMBUpZINpJ48G5FmMxz6yVGP83rO',
                'remember_token' => null,
            ],
            [
              'id'             => 5,
              'firstname'      => 'Prénom Client 1',
              'lastname'       => 'Nom Client 1',
              'email'          => 'client1@gmail.com',
              'password'       => '$2y$10$UnLIBQB1uZZC1r5msFWTPuZCZsMBUpZINpJ48G5FmMxz6yVGP83rO',
              'remember_token' => null,
          ],
          [
            'id'             => 6,
            'firstname'      => 'Prénom Client 2',
            'lastname'       => 'Nom Client 2',
            'email'          => 'client2@gmail.com',
            'password'       => '$2y$10$UnLIBQB1uZZC1r5msFWTPuZCZsMBUpZINpJ48G5FmMxz6yVGP83rO',
            'remember_token' => null,
        ],
        ];

        User::insert($users);
    }
}
