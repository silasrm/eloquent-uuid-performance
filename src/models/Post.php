<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\UuidBinaryModelTrait;

class Post extends Model
{
    use UuidBinaryModelTrait;
    protected $table = 'posts';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}