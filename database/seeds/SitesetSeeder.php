<?php

use Dcat\Admin\Models\Menu;
use Illuminate\Database\Seeder;
use Dcat\Admin\Models\Permission;

class SitesetSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create([
            'name' => '網站基本內容管理',
            'slug' => 'site_set',
            'http_method' => '',
            'http_path'   => '',
            'parent_id'   => 0,
        ]);
        $permission_childs = [
            [
                'name' => '網站基本內容頁面',
                'slug' => 'siteset_page',
                'http_method' => 'GET',
                'http_path'   => '/siteset',
                'parent_id'   => $permission->id,
            ],
            [
                'name' => '網站基本內容儲存',
                'slug' => 'siteset_page_store',
                'http_method' => 'POST',
                'http_path'   => '/siteset',
                'parent_id'   => $permission->id,
            ]
        ];
        foreach ($permission_childs as $child) {
            Permission::create($child);
        }

        $menu = Menu::create([
            'parent_id'     => 0,
            'title'         => '網站基本內容管理',
            'icon'          => 'fa fa-fw fa-cogs',
            'uri'           => '/',
        ]);
        Menu::create([
            'parent_id'     => $menu->id,
            'title'         => '網站基本內容',
            'uri'           => 'siteset',
        ]);
    }
}
