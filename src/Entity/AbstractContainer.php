<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="container_base")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"folder" = "Folder", "client" = "Client", "project" = "Project"})
 */
abstract class AbstractContainer
{
    use EntityUlidTrait;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\OneToMany(targetEntity=TaskList::class, mappedBy="container")
     */
    private $taskLists;

    public function __construct()
    {
        $this->taskLists = new ArrayCollection();
    }

    /**
     * @return Collection|TaskList[]
     */
    public function getTaskLists(): Collection
    {
        return $this->taskLists;
    }

    public function addTaskList(TaskList $taskList): self
    {
        if (!$this->taskLists->contains($taskList)) {
            $this->taskLists[] = $taskList;
            $taskList->setContainer($this);
        }

        return $this;
    }

    public function removeTaskList(TaskList $taskList): self
    {
        if ($this->taskLists->removeElement($taskList)) {
            // set the owning side to null (unless already changed)
            if ($taskList->getContainer() === $this) {
                $taskList->setContainer(null);
            }
        }

        return $this;
    }
}