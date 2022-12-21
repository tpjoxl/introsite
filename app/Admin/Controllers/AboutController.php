<?php

namespace App\Admin\Controllers;

use App\Models\Setting;
use Dcat\Admin\Form;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Http\JsonResponse;
use Illuminate\Routing\Controller;


class AboutController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('關於我頁面管理')
            ->body($this->form());
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Setting(), function (Form $form) {
            $settings = new Setting();
            $form->editor('text1')->required()->default($settings->getData('siteset', 'text1'));
            $form->editor('text2')->required()->default($settings->getData('siteset', 'text2'));
            $form->editor('text3')->required()->default($settings->getData('siteset', 'text3'));

            $form->disableListButton();
            $form->disableHeader(); // 隐藏 header

            // 去掉`继续编辑`checkbox
            $form->disableEditingCheck();

            // 去掉`继续创建`checkbox
            $form->disableCreatingCheck();
            $form->disableViewCheck();


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
        });
    }

    public function store()
    {
        $request = request();
        if (empty($allData = $request->all())) {
            return JsonResponse::make()->error('部分資料為必填，請重新填寫！');
        }
        foreach ($allData as $key => $val) {
            $oldD = Setting::where('route_name', 'about')->where('input_name', $key)->first();
            if ($oldD) {
                $oldD->update(['value' => $val]);
            } else {
                Setting::create(['route_name' => 'about', 'input_name' => $key, 'value' => $val]);
            }
        }
        return JsonResponse::make()->success('儲存成功!')->refresh();
    }
}
