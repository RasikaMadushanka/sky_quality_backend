<?php

namespace App\Repositories;

use App\Models\Buyer;
use App\DTO\Buyer\BuyerDTO;

class BuyerRepository
{
    public function create(BuyerDTO $dto)
    {
        return Buyer::create([
            'buyer_name'   => $dto->buyer_name,
            'status'       => $dto->status,
            'created_date' => $dto->created_date,
        ]);
    }

    public function all()
    {
        return Buyer::orderBy('buyer_id', 'desc')->get();
    }

    public function update(int $id, BuyerDTO $dto)
    {
        $buyer = Buyer::findOrFail($id);

        $buyer->update([
            'buyer_name' => $dto->buyer_name,
            'status'     => $dto->status,
        ]);

        return $buyer;
    }

    public function delete(int $id)
    {
        $buyer = Buyer::findOrFail($id);
        return $buyer->delete();
    }
}
