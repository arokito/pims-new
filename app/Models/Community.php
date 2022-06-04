<?php

namespace App\Models;

use App\Models\Zone;
use App\Models\Family;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Community extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable =['name','zone_id '];

    public function zone(){
        return $this->belongsTo(Zone::class);
    }

    public function families(){
        return $this->hasMany(Family::class);
    }
}
