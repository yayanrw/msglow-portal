<?php

namespace App\Models;

use CodeIgniter\Model;

class LogErrorModel extends Model
{
    protected $table      = 't_log_error';
    protected $primaryKey = 'log_error_pid';
    protected $allowedFields = ['log_error_controller', 'log_error_method', 'log_error_desc', 'created_at', 'created_by'];

    public function InsertLog($controller, $method, $desc = null, $created_by = "notlogin")
    {
        return $this->insert([
            'log_error_controller'  => $controller,
            'log_error_method'      => $method,
            'log_error_desc'        => $desc,
            'created_by'            => $created_by,
        ]);
    }
}
