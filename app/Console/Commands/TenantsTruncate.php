<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class TenantsTruncate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        User::all()
            ->each(function (User $user) {
                $this->output->caution("Removing tenant `{$user->email}");
                $user->delete();
            });

        $this->output->success("Tenants has been cleared out!");
    }
}
