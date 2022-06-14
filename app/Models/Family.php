<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable =['name','community_id '];

    public function community()
    {
        return $this->belongsTo(Community::class,'community_id','id');
    }

    public function parishioners()
    {
        return $this->hasMany(Parishioner::class);
    }
}
