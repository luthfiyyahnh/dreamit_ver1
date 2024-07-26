<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'user_detail';

    protected $fillable = ['user_id', 'cv', 'photo','work_at', 'profesi', 'about', 'no_hp', 'tgl_lahir'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
