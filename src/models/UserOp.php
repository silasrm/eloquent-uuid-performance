<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\UuidBinaryModelTrait;

class UserOp extends Model
{
    use UuidBinaryModelTrait;
    protected $table = 'usersop';

    protected $guarded = [];
    protected static $uuidOptimization = true;

    public function posts()
    {
        return $this->hasMany(PostOp::class, 'user_id');
    }
}