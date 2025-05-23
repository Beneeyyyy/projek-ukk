<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateSuperAdminUser extends Command
{
    protected $signature = 'make:super-admin-user 
                            {name : Name of the user}
                            {email : Email address of the user}
                            {password : Password for the user}';

    protected $description = 'Create a user with the super_admin role';

    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        if (User::where('email', $email)->exists()) {
            $this->error("⚠️  User with email {$email} already exists.");
            return;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $role = Role::firstOrCreate(['name' => 'super_admin']);
        $user->assignRole($role);

        $this->info("✅ Super admin user created: {$email}");
    }
}
