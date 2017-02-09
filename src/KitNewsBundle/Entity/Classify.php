<?php

namespace KitNewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Classify
 *
 * @ORM\Table(name="classify")
 * @ORM\Entity(repositoryClass="KitNewsBundle\Repository\ClassifyRepository")
 */
class Classify
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, options={"comment": "类名称"})
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="pid", type="integer", options={"comment": "父级ID"})
     */
    private $pid;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="smallint", options={"comment": "状态1正常，0禁用"})
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_at", type="datetime", options={"comment": "创建时间"})
     */
    private $createAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_at", type="datetime", options={"comment": "更新时间"})
     */
    private $updateAt;

    /**
     * One Category has Many Categories.
     * 
     * @ORM\ManyToOne(targetEntity="Classify", inversedBy="children")
     * @ORM\JoinColumn(name="pid", referencedColumnName="id")
     */
    private $parent;
    
    /**
     * Many Categories have One Category.
     * 
     * @ORM\OneToMany(targetEntity="Classify", mappedBy="parent")
     */
    private $children;
    
    /**
     * 
     */
    public function __construct()
    {
        $this->children = new ArrayCollection();
    }
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Classify
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set parent
     *
     * @param Classify $pid
     *
     * @return Classify
     */
    public function setParent(Classify $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return Classify
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Classify
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return Classify
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return Classify
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }
}

