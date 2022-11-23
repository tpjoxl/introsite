<?php

namespace App\Admin\Repositories;

use App\Models\WorkCaseCategory as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WorkCaseCategory extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
