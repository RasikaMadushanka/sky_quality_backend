<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;
use App\DTO\User\UserDTO;

class EmployeeService {
    // Constructor Property Promotion
    public function __construct(protected EmployeeRepository $repo) {}

    public function register(UserDTO $dto) {
        return $this->repo->create($dto);
    }
    public function getAllEmployees() { return $this->repo->all(); }

public function updateCredentials(int $id, UserDTO $dto) { return $this->repo->update($id, $dto); }

public function deleteEmployee(int $id) { return $this->repo->delete($id); }
}
