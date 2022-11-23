<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\WorkCase;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Admin;

class WorkCaseController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WorkCase(), function (Grid $grid) {
            // $grid->model()->where('id', 2); 過濾列表資料
            // $grid->model()->orderBy(); 設置列表排序

            //列表欄位調整
            // $grid->column('id')->sortable();
            $grid->column('title');
            // $grid->column('desc');
            $grid->column('url')->display(function ($url) {
                return '<a href="' . $url . '" target="_blank">' . $url . '</a>';
            });
            $grid->column('pic')->display(function ($pic) {
                return $pic ? '<img style="max-width:200px; max-height:200px;" src="' . asset('uploads/' . $pic) . '">' : '';
            });
            $grid->column('is_top')->switch();
            $grid->column('status')->select(['1' => "顯示", '0' => "隱藏"]);
            // $grid->column('status')->display(function ($status) { //調整呈現結果
            //     return $status == 1 ? '<span class="text-success"><b>顯示</b></span>' : '<span class="text-danger"><b>隱藏</b></span>';
            // });
            // $grid->column('created_at');
            // $grid->column('updated_at')->sortable();

            //列表篩選功能
            $grid->filter(function (Grid\Filter $filter) {
                // 设置created_at字段的范围查询
                $filter->like('title');
                $filter->equal('status');
                $filter->equal('is_top');
                // $filter->between('created_at')->datetime();
            });

            $grid->toolsWithOutline(false); //功能按鈕樣式調整


            // 禁用新增按鈕
            // $grid->disableCreateButton();
            // 显示新增按鈕
            // $grid->showCreateButton();

            //開啟彈窗創建表單 设置弹窗宽高，默认值为 '700px', '670px'
            $grid->enableDialogCreate();
            $grid->setDialogFormDimensions('70%', '70%');

            //禁用詳情按鈕
            $grid->disableViewButton();

            $grid->rowSelector()->click(); //點選當前行任一位置選中
            $grid->addTableClass(['table-text-center']);
            // $grid->disableActions();
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new WorkCase(), function (Show $show) {
            // $show->field('id');
            $show->field('title');
            $show->field('desc');
            $show->field('url');
            $show->field('pic');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new WorkCase(), function (Form $form) {
            // $form->display('id');
            $form->select('status')->options(['1' => "顯示", '0' => "隱藏"])->required();
            $form->switch('is_top');
            $form->text('title')->required();
            $form->textarea('desc');
            $form->url('url')->required();
            $form->image('pic')->autoUpload();

            // 数字输入框
            // $form->number('rate', '打分');

            // 添加日期时间选择框
            // $form->datetime('release_at', '发布时间');

            //分隔線
            //$form->divider();

            //選擇
            // $directors = [
            //     1 => 'John',
            //     2 => 'Smith',
            //     3 => 'Kate',
            // ];

            // $form->select('director', '导演')->options($directors);

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
