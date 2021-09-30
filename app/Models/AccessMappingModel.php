<?php

namespace App\Models;

use CodeIgniter\Model;

class AccessMappingModel extends Model
{
    protected $table      = 't_access_mapping';
    protected $primaryKey = 'access_mapping_pid';
    protected $allowedFields = ['users_email', 'apps_pid', 'created_by', 'updated_at', 'updated_by'];

    public function AccessMappingWithUsersApps($users_email = null, $apps_pid = null)
    {
        return $this->where('users_email', $users_email)
            ->where('apps_pid', $apps_pid)
            ->get()
            ->getRow();
    }

    public function UpdateOnUsers($old_email, $new_email)
    {
        $update = $this->where('users_email', $old_email)
            ->get()
            ->getResult();

        foreach ($update as $key) {
            $this->update($key->access_mapping_pid, [
                'users_email' => $new_email,
                'updated_at'  => date('Y-m-d H:i:s'),
                'updated_by'  => session()->get('users_email')
            ]);
        }
        return $update;
    }
}
