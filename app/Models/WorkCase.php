<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class WorkCase extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'work_cases';
    
}
