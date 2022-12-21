<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Support\Carbon;

class WorkCaseCategory extends Model
{
    use HasDateTimeFormatter;
    protected $table = 'work_case_categories';

    public function cases()
    {
        return $this->belongsToMany(WorkCase::class, 'work_case_category', 'work_case_category_id', 'work_case_id')->withPivot('rank');
    }
}
