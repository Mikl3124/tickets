<?php

namespace App;

use App\Keyword;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    public $table = 'sites';

    protected $hidden = [
      'password',
      'remember_token',
  ];

  protected $dates = [
      'updated_at',
      'created_at',
      'delivery_date',
  ];

    protected $casts = [
        'keywords' => 'array'
    ];

  protected $fillable = [
      'name',
      'url',
      'type',
      'medias',
      'logo',
      'contact_id',
      'updated_by',
      'description',
      'keywords',
      'ticket_time',
      'email_verified_at',
  ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function contact()
    {
        return $this->belongsTo(User::class, 'contact_id');
    }

    public function userUpdate()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function keywords()
    {
        return $this->hasMany(Keyword::class, 'site_id');
    }
}
