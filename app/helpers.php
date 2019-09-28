<?php

use App\Models\UserTenant;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

if (!function_exists('create_database')) {
    function create_database(UserTenant $tenant)
    {
        $pdo = new PDO("mysql:host={$tenant->host}", $tenant->db_user, $tenant->db_password);
        $pdo->query("create database if not exists {$tenant->database}");

        Config::set('database.connections.tenant', $tenant->config + ['driver' => 'mysql']);
        Schema::connection('tenant')->getConnection()->reconnect();
        Artisan::call('migrate --database=tenant --path=database/migrations/tenant');
    }
}

if (!function_exists('delete_database')) {
    function delete_database(UserTenant $tenant)
    {
        $pdo = new PDO("mysql:host=" . env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'));
        $pdo->query("drop database if exists {$tenant->database}");
    }
}
