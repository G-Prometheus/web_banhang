<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = [
        'name',
    ];
    protected $table = 'wards';
    protected $primaryKey = 'code';
    public $incrementing = false;
    public function wards()
    {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }
}
