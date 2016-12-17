<?php

namespace Gifter;

use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    /* Relationship method */
    public function gifts() {
        # Retailer has many gifts
        return $this->hasMany('Gifter\Gift');
    }

    public static function getForDropdown() {
        $retailers = Retailer::orderBy('name', 'ASC')->get();
        $retailers_for_dropdown = [];
        foreach($retailers as $retailer) {
            $retailers_for_dropdown[$retailer->id] = $retailer->name;
        }
        return $retailers_for_dropdown;
    }
}
