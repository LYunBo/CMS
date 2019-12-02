<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'common_user';
    protected $primaryKey = 'id';
}
