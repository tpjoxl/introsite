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
        $permission_childs = [
            [
                'name' => '與我聯絡列表',
                'slug' => 'contact',
                'http_method' => 'GET',
                'http_path'   => '/contact',
                'parent_id'   => $permission->id,
            ],
            [
                'name' => '與我聯絡建立',
                'slug' => 'contact',
                'http_method' => 'GET、POST',
                'http_path'   => '/contact*',
                'parent_id'   => $permission->id,
            ],
            [
                'name' => '與我聯絡編輯',
                'slug' => 'contact',
                'http_method' => 'GET、PATCH',
                'http_path'   => '/contact*',
                'parent_id'   => $permission->id,
            ],
            [
                'name' => '與我聯絡刪除',
                'slug' => 'contact',
                'http_method' => 'DELETE',
                'http_path'   => '/contact*',
                'parent_id'   => $permission->id,
            ],
        ];
        foreach ($permission_childs as $child) {
            Permission::create($child);
        }

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
