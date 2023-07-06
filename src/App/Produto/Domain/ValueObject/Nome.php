<?php

declare(strict_types=1);

namespace App\Produto\Domain\ValueObject;

use Assert\Assertion;
use JsonSerializable;

final class Nome implements JsonSerializable, \Stringable
{
    public function __construct(private readonly string $nome)
    {
    }

    /**
     * @throws AssertionFailedException
     */
    public static function fromString(string $nome): self
    {
        Assertion::max($nome, 100, 'O nome do produto não pode passar de 100.');
        Assertion::min($nome, 3, 'O nome do produto não pode ser menor que 3.');

        return new self($nome);
    }

    public function toString(): string
    {
        return $this->nome;
    }

    public function __toString(): string
    {
        return $this->nome;
    }

    public function jsonSerialize(): string
    {
        return $this->toString();
    }
}