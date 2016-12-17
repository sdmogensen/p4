<?php

namespace Gifter;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    public function retailer() {
        # Gift belongs to Retailer
        return $this->belongsTo('Gifter\Retailer');
    }

    public function user() {
        # Gift belongs to User
        return $this->belongsTo('Gifter\User');
    }
}
