<?php

namespace App\Models;

use CodeIgniter\Model;

class LogLoginModel extends Model
{
    protected $table      = 't_log_login';
    protected $primaryKey = 'log_login_pid';
    protected $allowedFields = ['users_email', 'login_at', 'ip', 'location', 'device'];
}
