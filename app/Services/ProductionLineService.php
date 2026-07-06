<?php

namespace App\Services;

use App\Repositories\ProductionLineRepository;
use App\DTO\ProductionLine\ProductionLineDTO;

class ProductionLineService
{
    public function __construct(
        protected ProductionLineRepository $repository
    ) {}

    public function register(ProductionLineDTO $dto)
    {
        return $this->repository->create($dto);
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function updateLine(int $id, ProductionLineDTO $dto)
    {
        return $this->repository->update($id, $dto);
    }

    public function deleteLine(int $id)
    {
        return $this->repository->delete($id);
    }
}
