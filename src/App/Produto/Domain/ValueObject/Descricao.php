<?php

declare(strict_types=1);

namespace App\Produto\Domain\ValueObject;

use Assert\Assertion;
use JsonSerializable;

final class Descricao implements JsonSerializable, \Stringable
{
    public function __construct(private readonly string $descricao)
    {
    }

    /**
     * @throws AssertionFailedException
     */
    public static function fromString(string $descricao): self
    {
        Assertion::max($descricao, 100, 'A descrição do produto não pode passar de 255.');
        Assertion::min($descricao, 3, 'A descrição do produto não pode ser menor que 10.');

        return new self($descricao);
    }

    public function toString(): string
    {
        return $this->descricao;
    }

    public function __toString(): string
    {
        return $this->descricao;
    }

    public function jsonSerialize(): string
    {
        return $this->toString();
    }
}