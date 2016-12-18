<?php

namespace KitAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity(repositoryClass="KitAdminBundle\Repository\AdminRepository")
 */
class Admin extends BaseUser
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
     * @ORM\Column(name="username", type="string", length=60, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=120)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="truename", type="string", length=30, nullable=true)
     */
    private $truename;

    /**
     * @var string
     *
     * @ORM\Column(name="cardid", type="string", length=18)
     */
    private $cardid;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=32, unique=true)
     */
    private $number;

    /**
     * @var int
     *
     * @ORM\Column(name="gender", type="smallint")
     */
    private $gender;

    /**
     * @var int
     *
     * @ORM\Column(name="mobile", type="bigint")
     */
    private $mobile;

    /**
     * @var int
     *
     * @ORM\Column(name="city_id", type="integer")
     */
    private $cityId;

    /**
     * @var int
     *
     * @ORM\Column(name="suboffice_id", type="integer")
     */
    private $subofficeId;

    /**
     * @var string
     *
     * @ORM\Column(name="job_title", type="string", length=64)
     */
    private $jobTitle;

    /**
     * @var int
     *
     * @ORM\Column(name="admin_group_id", type="integer")
     */
    private $adminGroupId;


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
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set truename
     *
     * @param string $truename
     *
     * @return User
     */
    public function setTruename($truename)
    {
        $this->truename = $truename;

        return $this;
    }

    /**
     * Get truename
     *
     * @return string
     */
    public function getTruename()
    {
        return $this->truename;
    }

    /**
     * Set cardid
     *
     * @param string $cardid
     *
     * @return User
     */
    public function setCardid($cardid)
    {
        $this->cardid = $cardid;

        return $this;
    }

    /**
     * Get cardid
     *
     * @return string
     */
    public function getCardid()
    {
        return $this->cardid;
    }

    /**
     * Set number
     *
     * @param string $number
     *
     * @return User
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set gender
     *
     * @param integer $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set mobile
     *
     * @param integer $mobile
     *
     * @return User
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return int
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set cityId
     *
     * @param integer $cityId
     *
     * @return User
     */
    public function setCityId($cityId)
    {
        $this->cityId = $cityId;

        return $this;
    }

    /**
     * Get cityId
     *
     * @return int
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * Set subofficeId
     *
     * @param integer $subofficeId
     *
     * @return User
     */
    public function setSubofficeId($subofficeId)
    {
        $this->subofficeId = $subofficeId;

        return $this;
    }

    /**
     * Get subofficeId
     *
     * @return int
     */
    public function getSubofficeId()
    {
        return $this->subofficeId;
    }

    /**
     * Set jobTitle
     *
     * @param string $jobTitle
     *
     * @return User
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * Get jobTitle
     *
     * @return string
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * Set adminGroupId
     *
     * @param integer $adminGroupId
     *
     * @return User
     */
    public function setAdminGroupId($adminGroupId)
    {
        $this->adminGroupId = $adminGroupId;

        return $this;
    }

    /**
     * Get adminGroupId
     *
     * @return int
     */
    public function getAdminGroupId()
    {
        return $this->adminGroupId;
    }
}

