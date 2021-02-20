<?php

namespace App\Entity;

use App\Repository\TaskListRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TaskListRepository::class)
 */
class TaskList
{
    use EntityUlidTrait;

    /**
     * @ORM\ManyToOne(targetEntity=AbstractContainer::class, inversedBy="taskLists")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?AbstractContainer $container;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContainer(): ?AbstractContainer
    {
        return $this->container;
    }

    public function setContainer(?AbstractContainer $container): self
    {
        $this->container = $container;

        return $this;
    }
}
