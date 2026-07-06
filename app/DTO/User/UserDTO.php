<?php

namespace App\DTO\User; // Change 'app' to 'App'

use Carbon\Carbon;

class UserDTO {
    public function __construct(
        public ?int $employee_id = null,
        public string $emp_card_no,
        public string $name,
        public string $position,
        public string $username,
        public string $password,
        public ?string $nic = null,
        public ?string $contact_number = null,
        public bool $is_active = true,
        public ?string $created_date = null
    ) {
        $this->created_date = $created_date ?? Carbon::now()->toDateTimeString();
    }
}
