<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'common_user';
    protected $primaryKey = 'id';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
}
