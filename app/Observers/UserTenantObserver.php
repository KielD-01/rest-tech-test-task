<?php

namespace App\Observers;

use App\Models\UserTenant;

class UserTenantObserver
{
    /**
     * Handle the user tenant "created" event.
     *
     * @param \App\Models\UserTenant $userTenant
     * @return void
     */
    public function created(UserTenant $userTenant)
    {
        create_database($userTenant);
    }

    /**
     * Handle the user tenant "updated" event.
     *
     * @param \App\Models\UserTenant $userTenant
     * @return void
     */
    public function updated(UserTenant $userTenant)
    {
        //
    }

    /**
     * Handle the user tenant "deleted" event.
     *
     * @param \App\Models\UserTenant $userTenant
     * @return void
     */
    public function deleted(UserTenant $userTenant)
    {
        delete_database($userTenant);
    }

    /**
     * Handle the user tenant "restored" event.
     *
     * @param \App\Models\UserTenant $userTenant
     * @return void
     */
    public function restored(UserTenant $userTenant)
    {
        //
    }

    /**
     * Handle the user tenant "force deleted" event.
     *
     * @param \App\Models\UserTenant $userTenant
     * @return void
     */
    public function forceDeleted(UserTenant $userTenant)
    {
        //
    }
}
