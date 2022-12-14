<?php

namespace App\Admin\Repositories;

use App\Models\WorkCase as Model;
use App\Models\WorkCaseCategory;
use Dcat\Admin\Repositories\EloquentRepository;

class WorkCase extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
