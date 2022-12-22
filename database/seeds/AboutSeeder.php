<?php

use Dcat\Admin\Models\Menu;
use Illuminate\Database\Seeder;
use Dcat\Admin\Models\Permission;

class AboutSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create([
            'name' => '關於我管理',
            'slug' => 'about_me',
            'http_method' => '',
            'http_path'   => '',
            'parent_id'   => 0,
        ]);
        $permission_childs = [
            [
                'name' => '關於我頁面內容',
                'slug' => 'about_page',
                'http_method' => 'GET',
                'http_path'   => '/about',
                'parent_id'   => $permission->id,
            ],
            [
                'name' => '關於我頁面儲存',
                'slug' => 'about_page_store',
                'http_method' => 'POST',
                'http_path'   => '/about',
                'parent_id'   => $permission->id,
            ]
        ];
        foreach ($permission_childs as $child) {
            Permission::create($child);
        }

        $menu = Menu::create([
            'parent_id'     => 0,
            'title'         => '關於我管理',
            'icon'          => 'fa fa-fw fa-address-card-o',
            'uri'           => '/',
        ]);
        Menu::create([
            'parent_id'     => $menu->id,
            'title'         => '關於我頁面管理',
            'uri'           => 'about',
        ]);
    }
}
