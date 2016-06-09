<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostInc extends Model
{
    protected $table = 'postsinc';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(UserInc::class, 'user_id');
    }
}