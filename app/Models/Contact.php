<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

class Contact extends Model
{
    use HasDateTimeFormatter;
    protected $table = 'contacts';
    protected $fillable = [
        'name',
        'email',
        'mesg',
        'status',
        'rank',
        'token',
    ];
}
