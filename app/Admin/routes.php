<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('siteset', 'SitesetController')->only(['index', 'store']);
    $router->resource('about', 'AboutController')->only(['index', 'store']);

    $router->resource('work_case_category', 'WorkCaseCategoryController');
    $router->resource('work_case', 'WorkCaseController');

    $router->resource('contact', 'ContactController')->except(['create']);
});
