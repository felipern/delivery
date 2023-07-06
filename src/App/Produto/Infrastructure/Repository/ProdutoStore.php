<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Repository;

use App\Produto\Domain\Produto;
use App\User\Domain\Repository\ProdutoRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Uid\Uuid;

final class ProdutoStore implements ProdutoRepositoryInterface
{
    public function __construct(private ServiceEntityRepositoryInterface $serviceEntityRepositoryInterface)
    {
        // $serviceEntityRepositoryInterface->
    }

    public function store(Produto $produto): void
    {
        
    }

    public function get(Uuid $uuid): Produto
    {
        /** @var Produto $produto */
        // $user = $this->($uuid->toString());

        return $user;
    }
}