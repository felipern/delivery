<?php

declare(strict_types=1);

namespace App\Produto\Domain\Repository;

use App\Produto\Domain\Produto;
use Symfony\Component\Uid\Uuid;

interface ProdutoRepositoryInterface
{
    public function get(Uuid $uuid): Produto;

    public function store(Produto $produto): void;
}