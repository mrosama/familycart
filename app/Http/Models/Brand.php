<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends \Eloquent {

    protected $guarded = [];

    public function getSection() {
        return $this->belongsTo('App\Section', 'section_id', 'id');
    }

    public function getBranch() {
        return $this->belongsTo('App\Branch', 'branch_id', 'id');
    }

    public function getType() {
        return $this->belongsTo('App\Type', 'type_id', 'id');
    }

}
