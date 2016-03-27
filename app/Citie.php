<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Citie extends Model
{
    //
    protected $fillable = ['id','region_id','country_id','latitude','longitude','name'];

    public static function whereCitie($id){
        return DB::table('cities')
            ->select('name', 'id')
            ->where('region_id', '=', $id)
            ->where('region_id','<>',0)
            ->where('name','<>','')
            ->get();
    }
    public function countrie()
    {
        return $this->belongsTo('\App\countrie','country_id','id');
    }
    public function region()
    {
        return $this->belongsTo('\App\region','region_id','id');
    }
}
