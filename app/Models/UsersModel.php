<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'm_users';
    protected $primaryKey = 'users_pid';
    protected $allowedFields = ['users_name', 'users_email', 'users_division', 'users_password', 'is_administrator', 'last_login', 'ip', 'location', 'device', 'updated_at', 'updated_by'];

    public function UsersWithApps()
    {
        return $this->select("m_users.*, GROUP_CONCAT(c.apps_name SEPARATOR ', ') apps_name, GROUP_CONCAT(c.apps_subname SEPARATOR ', ') apps_subname")
            ->join('t_access_mapping b', 'b.users_email = m_users.users_email')
            ->join('m_apps c', 'c.apps_pid = b.apps_pid')
            ->groupBy('m_users.users_email')
            ->get()
            ->getResult('array');
    }

    public function UsersWithAppsDetail($users_pid = null)
    {
        return $this->select("m_users.*, GROUP_CONCAT(c.apps_name SEPARATOR ', ') apps_name, GROUP_CONCAT(c.apps_subname SEPARATOR ', ') apps_subname")
            ->join('t_access_mapping b', 'b.users_email = m_users.users_email')
            ->join('m_apps c', 'c.apps_pid = b.apps_pid')
            ->groupBy('m_users.users_email')
            ->where('m_users.users_pid', $users_pid)
            ->get()
            ->getRow();
    }

    public function UpdateUsers($users_pid, $users_email, $users_password)
    {
        return $this->update($users_pid, [
            'users_email' => $users_email,
            'users_password' => password_hash($users_password, PASSWORD_DEFAULT),
            'updated_at' => date("Y-m-d H:i:s"),
            'updated_by' => session()->get('users_email'),
        ]);
    }

    public function GetEmail($users_pid = null)
    {
        return $this->find($users_pid)['users_email'];
    }
}
