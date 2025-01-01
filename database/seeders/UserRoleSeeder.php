<?php

// database/seeders/UserRoleSeeder.php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        // Attach random roles to users
        $users = User::all();
        $roles = Role::all();

        // If there are no roles in the system, exit
        if ($roles->isEmpty()) {
            $this->command->info('No roles found in the system.');
            return;
        }

        foreach ($users as $user) {
            // Attach 1 or more roles to each user, but not more than available roles
            $rolesToAttach = $roles->random(rand(1, min(2, $roles->count())));

            $user->roles()->attach(
                $rolesToAttach->pluck('id')->toArray()
            );
        }
    }
}
