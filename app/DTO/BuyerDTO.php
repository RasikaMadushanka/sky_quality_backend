<?php

namespace App\DTO\Buyer;

class BuyerDTO
{
    public function __construct(
        public string $buyer_name,
        public string $status = 'active'
    ) {}
}
