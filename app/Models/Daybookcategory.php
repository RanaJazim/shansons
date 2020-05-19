<?php

namespace App\Models;

use App\Models\MyDaybook\Daybook;
use Illuminate\Database\Eloquent\Model;

class Daybookcategory extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    function daybooks()
    {
        return $this->hasMany(Daybook::class, 'daybookCategory_id');
    }
}
