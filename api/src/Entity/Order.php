<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource
 * @ORM\Table(name="orders__order")
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 * @ApiFilter(SearchFilter::class, properties={"title"})
 * @ORM\HasLifecycleCallbacks()
 */
class Order
{
    /**
     * @var int The entity Id
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string $title
     * @Assert\NotBlank
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string $short
     * @ORM\Column(name="short", type="text", nullable=true)
     */
    private $short;

    /**
     * @var string $description
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var boolean $promoted
     * @ORM\Column(name="promoted", type="boolean", nullable=true)
     */
    private $promoted = false;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(
     *   targetEntity="OrderItem",
     *   mappedBy="order",
     *   cascade={"persist"}
     * )
     */
    private $items;

    public function __construct() {
        $this->items = new ArrayCollection();
    }

    public function __toString() {
        return $this->getTitle();
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getShort(): string
    {
        return $this->short;
    }

    /**
     * @param string $short
     */
    public function setShort(string $short): void
    {
        $this->short = $short;
    }

    /**
     * @return bool
     */
    public function getPromoted(): bool
    {
        return $this->promoted;
    }

    /**
     * @param bool $promoted
     */
    public function setPromoted(bool $promoted): void
    {
        $this->promoted = $promoted;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return ArrayCollection
     */
    public function getItems() {
        return $this->items ? : $this->items = new ArrayCollection();
    }

    /**
     * Sets the user Items
     *
     * @param array $items
     */
    public function setItem(Array $items) {

        foreach ($items as $item) {
            $this->addItem($item);
        }
    }

    /**
     * Add a order
     *
     * @param OrderItem $item
     * @return $this
     */
    public function addItem(OrderItem $item) {
        if (!$this->getItems()->contains($item)) {
            $this->getItems()->add($item);
        }

        return $this;
    }


    /**
     * @param OrderItem $item
     * @return $this
     */
    public function removeItem(OrderItem $item) {
        if ($this->getItems()->contains($item)) {
            $this->getItems()->removeElement($item);
        }

        return $this;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return $this
     */
    public function setUpdatedAt(\DateTime $updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    // ---
    // --- LIFECYCLECALLBACKS ACTIONS
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue() {
        if (!$this->getCreatedAt()) {
            $this->createdAt = new \DateTime();
        }
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue() {
        $this->updatedAt = new \DateTime();
    }
}
