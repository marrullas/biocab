<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class region extends Model
{
    //
    protected $fillable = ['id','name','code','country_id'];

    public static function whereRegion($id){
        return DB::table('regions')
            ->select('name', 'id')
            ->where('country_id', '=', $id)
            ->where('name','<>','')
            ->get();
    }

}
