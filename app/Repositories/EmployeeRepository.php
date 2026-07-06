<?php

namespace App\Repositories;

use App\Models\User;
use App\DTO\User\UserDTO;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository {

    public function create(UserDTO $data) {
        return User::create([
            'emp_card_no'    => $data->emp_card_no,
            'name'           => $data->name,
            'position'       => $data->position,
            'nic'            => $data->nic,
            'contact_number' => $data->contact_number,
            'username'       => $data->username,
            'password_hash'  => Hash::make($data->password),
            'is_active'      => $data->is_active ? 1 : 0,
            'created_date'   => $data->created_date
        ]);
    }

    public function all() {
        return User::all();
    }

    public function update(int $id, UserDTO $data) {
        $user = User::findOrFail($id);
        $user->update([
            'username'      => $data->username,
            'password_hash' => Hash::make($data->password),
        ]);
        return $user;
    }

    public function delete(int $id) {
        $user = User::findOrFail($id);
        return $user->delete();
    }
}
