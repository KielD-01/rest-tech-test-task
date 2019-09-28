<?php

namespace App\Observers;

use App\User;
use Illuminate\Support\Facades\Log;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param \App\User $user
     * @return void
     */
    public function created(User $user)
    {
        Log::info($user);
        $user->tenant()
            ->create([
                'host' => env('DB_HOST'),
                'db_user' => 'root',
                'db_password' => 'root',
                'database' => $this->makeDatabaseName($user->email)
            ]);
    }

    /**
     * Handle the user "updated" event.
     *
     * @param \App\User $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param \App\User $user
     * @return void
     * @throws \Exception
     */
    public function deleted(User $user)
    {
        $user->tenant->delete();
    }

    /**
     * Handle the user "restored" event.
     *
     * @param \App\User $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param \App\User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }

    /**
     * @param string $email
     * @return string|string[]|null
     */
    private function makeDatabaseName(string $email): string
    {
        list($raw_name) = explode('@', $email);
        return preg_replace('/([^a-zA-Z0-9])/', '_', $raw_name) . '_tenant';
    }
}
