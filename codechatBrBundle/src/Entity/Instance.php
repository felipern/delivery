<?php

namespace CodechatBrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity()]
#[ORM\Table(name: 'wpb_instance')]
class Instance
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(type: 'uuid')]
    private Uuid $uuid;

    #[ORM\Column(type: 'text')]
    private string $name;

    public function __construct(Uuid $uuid = null)
    {
        $this->uuid = $uuid ?: Uuid::v6();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function setUuid(Uuid $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

}