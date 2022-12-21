<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    use HasDateTimeFormatter;

    public function getImage()
    {
        return asset('uploads/' . $this->pic);
    }

    public $sortBy = 'desc';
    public function scopeOrdered($query, $rank = 'rank')
    {
        if ($rank == 'rank') {
            $rank = $this->getTable() . "." . $rank;
        }
        return $query->orderBy('is_top', 'desc')
            ->orderByRaw("CASE
                WHEN $rank > 0 THEN 10
                WHEN $rank = 0 THEN 20
                END $this->sortBy")
            ->orderBy($rank, 'desc')
            ->orderBy('created_at', $this->sortBy)
            ->orderBy('id', $this->sortBy);
    }
    public function scopeDisplay($query)
    {
        if (method_exists($this, 'categories')) {
            $result = $query->whereHas('categories', function ($query) {
                $query->display();
            });
        } else {
            $result = $query;
        }

        return $result->where($this->getTable() . '.status', 1);
    }
}
