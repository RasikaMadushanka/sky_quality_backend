<?php

namespace App\Services;

use App\Repositories\StyleRepository;
use App\DTO\Style\StyleDTO;

class StyleService
{
    public function __construct(
        protected StyleRepository $repository
    ) {}

    public function register(StyleDTO $dto)
    {
        return $this->repository->create($dto);
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function updateStyle(int $id, StyleDTO $dto)
    {
        return $this->repository->update($id, $dto);
    }

    public function deleteStyle(int $id)
    {
        return $this->repository->delete($id);
    }
}
