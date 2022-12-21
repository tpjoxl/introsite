<?php

namespace App\Admin\Controllers;

use App\Models\Contact;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Admin;

class ContactController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Contact(), function (Grid $grid) {
            // $grid->model()->where('id', 2); 過濾列表資料
            // $grid->model()->orderBy(); 設置列表排序
            // $grid->model()->with(['categories']);

            //列表欄位調整
            // $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('email');
            $grid->column('is_top')->switch();
            $grid->column('status')->display(function ($status) { //調整呈現結果
                return $status == 1 ? '<span class="text-success"><b>已處理</b></span>' : '<span class="text-danger"><b>未處理</b></span>';
            });
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->quickSearch(['name', 'email'])->placeholder('請輸入關鍵字搜尋姓名或信箱......')->width(40); //快速搜尋

            //列表篩選功能
            $grid->filter(function (Grid\Filter $filter) {
                // 设置created_at字段的范围查询
                $filter->panel();
                $filter->equal('status')->select([1 => '已處理', 0 => '未處理'])->width(3);
            });
            //表格規格篩選
            // $grid->selector(function (Grid\Tools\Selector $selector) {
            //     $selector->select('status', [1 => '顯示', 0 => '隱藏']);
            // });
        });
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Contact(), function (Form $form) {
            $form->select('status')->options([1 => '已處理', 0 => '未處理'])->default(1)->required();
            $form->switch('is_top');
            $form->text('name')->required();
            $form->text('email');
            $form->textarea('msg');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
