<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parishioner extends Model
{
    use HasFactory;
    protected $fillable =['first_name','last_name','phone','email','ubatizo_place'
    ,'ubatizo_date','komunio_place','komunio_date','ndoa','status',
    'user_id'];
    public function contributions(){
        return $this->hasMany(Contribution::class);
    }

    public function family()
    {
        return $this->belongsTo(Family::class,'family_id','id');
    }

   
}
