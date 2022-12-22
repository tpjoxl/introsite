<?php

use Dcat\Admin\Models\Menu;
use Illuminate\Database\Seeder;
use Dcat\Admin\Models\Permission;

class WorkCaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create([
            'name' => '專案成就管理',
            'slug' => 'workcase',
            'http_method' => '',
            'http_path'   => '',
            'parent_id'   => 0,
        ]);
        $permission_parent1 = Permission::create([
            'name' => '專案成就分類',
            'slug' => 'work_case_category',
            'http_method' => '',
            'http_path'   => '/work_case_category*',
            'parent_id'   => $permission->id,
        ]);
        $permission_parent2 = Permission::create([
            'name' => '專案成就',
            'slug' => 'work_case',
            'http_method' => '',
            'http_path'   => '/work_case*',
            'parent_id'   => $permission->id,
        ]);
        $permission_childs = [
            [
                'name' => '專案成就分類列表',
                'slug' => 'work_case_category',
                'http_method' => 'GET',
                'http_path'   => '/work_case_category*',
                'parent_id'   => $permission_parent1->id,
            ],
            [
                'name' => '專案成就分類建立',
                'slug' => 'work_case_category',
                'http_method' => 'GET、POST',
                'http_path'   => '/work_case_category/create*',
                'parent_id'   => $permission_parent1->id,
            ],
            [
                'name' => '專案成就分類編輯',
                'slug' => 'work_case_category',
                'http_method' => 'GET、PATCH',
                'http_path'   => '/work_case_category*',
                'parent_id'   => $permission_parent1->id,
            ],
            [
                'name' => '專案成就分類刪除',
                'slug' => 'work_case_category',
                'http_method' => '',
                'http_path'   => '/work_case_category*',
                'parent_id'   => $permission_parent1->id,
            ],
            [
                'name' => '專案成就列表',
                'slug' => 'work_case',
                'http_method' => 'GET',
                'http_path'   => '/work_case*',
                'parent_id'   => $permission_parent2->id,
            ],
            [
                'name' => '專案成就建立',
                'slug' => 'work_case',
                'http_method' => 'GET、POST',
                'http_path'   => '/work_case/create*',
                'parent_id'   => $permission_parent2->id,
            ],
            [
                'name' => '專案成就編輯',
                'slug' => 'work_case',
                'http_method' => 'GET、PATCH',
                'http_path'   => '/work_case*',
                'parent_id'   => $permission_parent2->id,
            ],
            [
                'name' => '專案成就刪除',
                'slug' => 'work_case',
                'http_method' => 'DELETE',
                'http_path'   => '/work_case*',
                'parent_id'   => $permission_parent2->id,
            ],
        ];
        foreach ($permission_childs as $child) {
            Permission::create($child);
        }

        $menu = Menu::create([
            'parent_id'     => 0,
            'title'         => '專案成就管理',
            'icon'          => 'fa fa-fw fa-briefcase',
            'uri'           => '/',
        ]);
        $childs = [
            [
                'parent_id'     => $menu->id,
                'title'         => '專案成就分類列表',
                'uri'           => 'work_case_category',
            ],
            [
                'parent_id'     => $menu->id,
                'title'         => '專案成就列表',
                'uri'           => 'work_case',
            ],
        ];
        foreach ($childs as $child) {
            Menu::create($child);
        }
    }
}
