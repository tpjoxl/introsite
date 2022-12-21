<?php

namespace App\Admin\Controllers;

use App\Models\WorkCaseCategory;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class WorkCaseCategoryController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WorkCaseCategory(), function (Grid $grid) {
            // $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            $grid->column('is_top')->switch();
            $grid->column('status')->select([1 => '顯示', 0 => '隱藏']);

            $grid->filter(function (Grid\Filter $filter) {
                // 设置created_at字段的范围查询
                $filter->panel();
                $filter->equal('status')->select([1 => '顯示', 0 => '隱藏'])->width(3);
                $filter->between('created_at')->datetime()->width(6);
            });

            $grid->quickSearch(['title'])->placeholder('請輸入關鍵字......')->width(40); //快速搜尋
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new WorkCaseCategory(), function (Form $form) {
            $form->select('status')->options([1 => '顯示', 0 => '隱藏'])->default(1)->required();
            $form->switch('is_top');
            $form->text('title')->required();

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
