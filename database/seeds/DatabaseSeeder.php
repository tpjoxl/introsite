<?php

use Dcat\Admin\Models\AdminSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(SitesetSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(WorkCaseSeeder::class);
        $this->call(ContactSeeder::class);
    }
}
