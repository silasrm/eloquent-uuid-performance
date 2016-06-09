<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\UuidBinaryModelTrait;

class PostOp extends Model
{
    use UuidBinaryModelTrait;
    protected $table = 'postsop';

    protected $guarded = [];
    protected static $uuidOptimization = true;

    public function user()
    {
        return $this->belongsTo(UserOp::class, 'user_id');
    }
}