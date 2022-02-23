<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUser extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    // use SoftDeletes;
    public $timestamps = false;
    public $table = 'role_user';

    public $orderable = [
    ];

    public $filterable = [
    ];

    protected $fillable = [
    ];

    public function role(){
        return $this->hasOne(Role::class, 'role_id', 'id');
    }
}
