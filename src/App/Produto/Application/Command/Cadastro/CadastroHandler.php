<?php

declare(strict_types=1);

namespace App\Produto\Application\Command\Cadastro;

use App\Produto\Domain\Produto;
use App\Shared\Application\Command\CommandHandlerInterface;
use App\Shared\Domain\Exception\DateTimeException;

final class CadastroHandler implements CommandHandlerInterface
{
    public function __construct(
    ) {
    }

    /**
     * @throws DateTimeException
     */
    public function __invoke(CadastroCommand $command): void
    {
        $produto = Produto::create($command->uuid, $command->nome, $command->descricao);

        // $this->
    }
}