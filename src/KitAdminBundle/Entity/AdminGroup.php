<?php

namespace KitAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdminGroup
 *
 * @ORM\Table(name="admin_group")
 * @ORM\Entity(repositoryClass="KitAdminBundle\Repository\AdminGroupRepository")
 */
class AdminGroup
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
     * @ORM\Column(name="name", type="string", length=64)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="access_ids", type="string", length=255)
     */
    private $accessIds;

    /**
     * @var string
     *
     * @ORM\Column(name="access_list", type="text")
     */
    private $accessList;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="smallint")
     */
    private $status;


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
     * @return AdminGroup
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
     * Set accessIds
     *
     * @param string $accessIds
     *
     * @return AdminGroup
     */
    public function setAccessIds($accessIds)
    {
        $this->accessIds = $accessIds;

        return $this;
    }

    /**
     * Get accessIds
     *
     * @return string
     */
    public function getAccessIds()
    {
        return $this->accessIds;
    }

    /**
     * Set accessList
     *
     * @param string $accessList
     *
     * @return AdminGroup
     */
    public function setAccessList($accessList)
    {
        $this->accessList = $accessList;

        return $this;
    }

    /**
     * Get accessList
     *
     * @return string
     */
    public function getAccessList()
    {
        return $this->accessList;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return AdminGroup
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
}

