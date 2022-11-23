<?php

namespace App\Admin\Controllers;

use App\Models\WorkCase;
use App\Models\WorkCaseCategory;
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
        return Grid::make(WorkCase::with(['categories']), function (Grid $grid) {
            // $grid->model()->where('id', 2); 過濾列表資料
            // $grid->model()->orderBy(); 設置列表排序
            // $grid->model()->with(['categories']);

            //列表欄位調整
            // $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('categories')->implode('title', '、')->label();
            // $grid->column('categories')->display(function ($cates) {
            //     return $cates->count() > 0 ? $cates->implode('title') : '';
            // });
            $grid->column('url')->display(function ($url) {
                return '<a href="' . $url . '" target="_blank">' . $url . '</a>';
            });
            $grid->column('pic')->display(function ($pic) {
                return $pic ? '<img style="max-width:200px; max-height:200px;" src="' . asset('uploads/' . $pic) . '">' : '';
            });
            $grid->column('is_top')->switch();
            $grid->column('status')->select([1 => '顯示', 0 => '隱藏']);
            // $grid->column('status')->display(function ($status) { //調整呈現結果
            //     return $status == 1 ? '<span class="text-success"><b>顯示</b></span>' : '<span class="text-danger"><b>隱藏</b></span>';
            // });
            // $grid->column('created_at');
            // $grid->column('updated_at')->sortable();

            //列表篩選功能
            $grid->filter(function (Grid\Filter $filter) {
                // 设置created_at字段的范围查询
                $filter->panel();
                $filter->equal('status')->select([1 => '顯示', 0 => '隱藏'])->width(3);
                // $filter->between('created_at')->datetime();
            });
            //表格規格篩選
            // $grid->selector(function (Grid\Tools\Selector $selector) {
            //     $selector->select('status', [1 => '顯示', 0 => '隱藏']);
            // });


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
            $grid->disableRefreshButton();

            $grid->rowSelector()->click(); //點選當前行任一位置選中
            $grid->addTableClass(['table-text-center']);
            $grid->quickSearch(['title', 'categories.title'])->placeholder('請輸入關鍵字......')->width(40); //快速搜尋
        });
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(WorkCase::with(['categories']), function (Form $form) {
            $form->select('status')->options([1 => '顯示', 0 => '隱藏'])->default(1)->required();
            $form->switch('is_top');
            $form->multipleSelect('categories')->options(WorkCaseCategory::where('status', 1)->pluck('title', 'id'))
                ->customFormat(function ($v) { //把選項的資料轉成一維陣列來使資料能夠成功顯示
                    if (!$v) return [];
                    return array_column($v, 'id');
                })->required();
            $form->text('title')->required();
            $form->textarea('desc');
            $form->url('url')->required()->help('連結為新分頁開啟');
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
