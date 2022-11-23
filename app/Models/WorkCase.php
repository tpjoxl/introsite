<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class WorkCase extends Model
{
    use HasDateTimeFormatter;
    protected $table = 'work_cases';

    public function categories()
    {
        return $this->belongsToMany(WorkCaseCategory::class, 'work_case_category',  'work_case_id', 'work_case_category_id')->withPivot('rank');
    }
}
