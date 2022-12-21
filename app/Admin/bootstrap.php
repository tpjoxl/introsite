<?php

use Dcat\Admin\Admin;
use Dcat\Admin\Grid;
use Dcat\Admin\Form;
use Dcat\Admin\Grid\Filter;
use Dcat\Admin\Layout\Navbar;
use Dcat\Admin\Show;

/**
 * Dcat-admin - admin builder based on Laravel.
 * @author jqh <https://github.com/jqhph>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 *
 * extend custom field:
 * Dcat\Admin\Form::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Column::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Filter::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */
//雙擊列表資料進行修改
$script = <<<JS
      $("#grid-table > tbody > tr").on("dblclick",function() {
            var obj = $(this).find(".feather.icon-edit");
            if (obj.length == 1) {
                obj.trigger("click");
            }
      })
JS;
Admin::script($script);

Admin::navbar(function (Navbar $navbar) {
    $navbar->right('<a href="' . env('APP_URL') . '" class="btn btn-primary" target="_blank" type="button">前台</a>');
});

Grid::resolving(function (Grid $grid) {
    $grid->toolsWithOutline(false); //功能按鈕樣式調整

    $grid->model()->orderBy('is_top', 'desc')->orderBy('created_at', 'desc');

    //開啟彈窗創建表單 设置弹窗宽高，默认值为 '700px', '670px'
    // $grid->enableDialogCreate();
    $grid->setDialogFormDimensions('70%', '70%');

    //禁用詳情按鈕
    $grid->disableViewButton();
    $grid->disableRefreshButton();

    $grid->rowSelector()->click(); //點選當前行任一位置選中
    $grid->addTableClass(['table-text-center']);
});

Form::resolving(function (Form $form) {
    // 去掉`继续编辑`checkbox
    $form->disableEditingCheck();

    // 去掉`继续创建`checkbox
    $form->disableCreatingCheck();
    $form->disableViewCheck();
});
