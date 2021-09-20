<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'm_users';
    protected $primaryKey = 'users_email';
    protected $allowedFields = ['users_name', 'users_email', 'users_division', 'users_password', 'is_administrator', 'last_login', 'ip', 'location', 'device', 'updated_at', 'updated_by'];
}
