<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'sites';

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
