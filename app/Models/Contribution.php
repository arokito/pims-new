<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function parishioner()
    {
        return $this->belongsTo(Parishioner::class,'parishioner_id','id');
    }

    public function contribution_category()
    {
        return $this->belongsTo(ContributionCategory::class);
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
