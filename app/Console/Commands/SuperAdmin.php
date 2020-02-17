<?php

namespace App\Console\Commands;

use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SuperAdmin extends Command
{
    protected $users;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:super_admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating a new Super User';

    /**
     * MakeAdminUser constructor.
     * @param User $users
     */
    public function __construct(User $users)
    {
        parent::__construct();
        $this->users = $users;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $this->createUser();
    }

    public function createUser()
    {
        $first_name = $this->ask('What is Your First Name?');
        $last_name = $this->ask('What is Your Last Name?');
        $phone = $this->ask('What is Your phone Number?');
        $email = $this->ask('What is Your Email?');
        $password = $this->secret('What is Your Password?');
        $confirm_password = $this->secret('Please confirm your password.');


        if ($password == $confirm_password) {
            $user = $this->users->create(array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phone' => $phone,
                'email' => $email,
                'password' => bcrypt($password),

            ));
            $user->assignRole('super admin');
            $this->info('Super Admin Successfully Created');
            Log::info('Super Admin successfully created');
        } else {
            $this->info("Password mismatch, stopping installation");
            Log::info('password match failed');
        }
    }
}
