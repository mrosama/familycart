<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends \Eloquent {

    protected $guarded = [];

    public function getSection() {
        return $this->belongsTo('App\Section' , 'section_id' , 'id');
    }

}
