<?php

namespace App\DTO\Buyer;

use Carbon\Carbon;

class BuyerDTO
{
    public function __construct(
        public string $buyer_name,
        public string $status = 'active',
        public ?string $created_date = null
    ) {
        $this->created_date ??= Carbon::now()->toDateTimeString();
    }
}
