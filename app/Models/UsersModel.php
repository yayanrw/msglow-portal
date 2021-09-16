<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'm_users';
    protected $primaryKey = 'users_email';
}
