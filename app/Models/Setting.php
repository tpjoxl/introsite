<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

class Setting extends Model
{
    use HasDateTimeFormatter;
    protected $table = 'settings';
    protected $fillable = [
        'route_name',
        'input_name',
        'value',
    ];

    public function getData($route, $input)
    {
        return $this->where('route_name', $route)->where('input_name', $input)->first() ? $this->where('route_name', $route)->where('input_name', $input)->first()->value : '';
    }
}
