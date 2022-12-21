<?php

use Dcat\Admin\Models\Menu;
use Illuminate\Database\Seeder;
use Dcat\Admin\Models\Permission;

class ContactSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create([
            'name' => '與我聯絡管理',
            'slug' => 'contact_us',
            'http_method' => '',
            'http_path'   => '',
            'parent_id'   => 0,
        ]);
        Permission::create([
            'name' => '與我聯絡列表',
            'slug' => 'contact',
            'http_method' => '',
            'http_path'   => '/contact*',
            'parent_id'   => $permission->id,
        ]);

        $menu = Menu::create([
            'parent_id'     => 0,
            'title'         => '與我聯絡管理',
            'icon'          => 'fa fa-fw fa-phone',
            'uri'           => '/',
        ]);
        Menu::create([
            'parent_id'     => $menu->id,
            'title'         => '與我聯絡列表',
            'uri'           => 'contact',
        ]);
    }
}
