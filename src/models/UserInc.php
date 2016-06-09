<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserInc extends Model
{
    protected $table = 'usersinc';

    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(PostInc::class, 'user_id');
    }
}