<?php

namespace App\Models\MyDaybook;

use App\Models\Daybookcategory;
use Illuminate\Database\Eloquent\Model;

class Daybook extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    function daybookCategory()
    {
        return $this->belongsTo(Daybookcategory::class, 'daybookCategory_id');
    }
}
