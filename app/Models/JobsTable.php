<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class JobsTable extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $table = 'carstable';

    protected $fillable = [
        'id','category_id','job_title','job_desc','where','color','model','make','registration'
    ];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function categoryOnId() {
        return $this->belongsTo("App\Models\Category", "category_id", "id");
    }

    public function locationtable() {
        return $this->belongsTo('App\Models\CreateLocationTable');
    }

}
