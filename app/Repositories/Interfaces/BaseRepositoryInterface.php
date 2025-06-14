<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{

    public function getAll();
    public function findById(int $id);
}
