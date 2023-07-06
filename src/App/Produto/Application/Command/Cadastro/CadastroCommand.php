<?php

declare(strict_types=1);

namespace App\Produto\Application\Command\Cadastro;

use App\Produto\Domain\ValueObject\Descricao;
use App\Produto\Domain\ValueObject\Nome;
use App\Shared\Application\Command\CommandInterface;
use Symfony\Component\Uid\Uuid;

final class CadastroCommand implements CommandInterface
{
    public Uuid $uuid;
    public Nome $nome;
    public Descricao $descricao;

    public function __construct(string $uuid, string $nome, string $descricao)
    {
        $this->uuid = Uuid::fromString($uuid);
        $this->nome = Nome::fromString($nome);
        $this->descricao = Descricao::fromString($descricao);
    }
}