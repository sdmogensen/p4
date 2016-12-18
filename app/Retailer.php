<?php

namespace Gifter;

use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    public function gifts() {
        # Retailer has many gifts
        return $this->hasMany('Gifter\Gift');
    }

    public function user() {
        # Retailer belongs to User
        return $this->belongsTo('Gifter\User');
    }

    public static function getForDropdown($user_id) {
        $retailers = Retailer::where('user_id', '=', $user_id)->orderBy('name', 'ASC')->get();
        $retailers_for_dropdown = [];
        foreach($retailers as $retailer) {
            $retailers_for_dropdown[$retailer->id] = $retailer->name;
        }
        return $retailers_for_dropdown;
    }

    public static function addRetailersToUser($user_id) {

        $retailers = array('Amazon', 'Best Buy', 'Walmart');

        for ($i = 0; $i < sizeof($retailers); $i++) {
            $retailer = new Retailer();
            $retailer->name = $retailers[$i];
            $retailer->user_id = $user_id;
            $retailer->save();
        }
    }
}
