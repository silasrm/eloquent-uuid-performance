<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\UuidBinaryModelTrait;

class User extends Model
{
    use UuidBinaryModelTrait;
    protected $table = 'users';

    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }
}