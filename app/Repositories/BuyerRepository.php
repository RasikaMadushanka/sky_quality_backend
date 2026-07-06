<?php

namespace App\Repositories;

use App\Models\Buyer;
use App\DTO\Buyer\BuyerDTO;

class BuyerRepository
{
    public function create(BuyerDTO $data)
    {
        return Buyer::create([
            'buyer_name'   => $data->buyer_name,
            'status'       => $data->status,
            'created_date' => $data->created_date
        ]);
    }

    public function all()
    {
        return Buyer::all();
    }
}
