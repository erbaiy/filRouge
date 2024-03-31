<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleRoute extends Model
{
    use HasFactory;
    protected $table = 'route_role';
    protected $fillable = ['role_id', 'route_id'];
}
