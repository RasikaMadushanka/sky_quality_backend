<?php

namespace App\Services;

use App\Repositories\BuyerRepository;
use App\DTO\Buyer\BuyerDTO;

class BuyerService
{
    public function __construct(
        protected BuyerRepository $repository
    ) {}

    public function register(BuyerDTO $dto)
    {
        return $this->repository->create($dto);
    }

    public function getAllBuyers()
    {
        return $this->repository->all();
    }

    public function updateBuyer(int $id, BuyerDTO $dto)
    {
        return $this->repository->update($id, $dto);
    }

    public function deleteBuyer(int $id)
    {
        return $this->repository->delete($id);
    }
}
