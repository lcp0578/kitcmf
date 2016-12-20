<?php
namespace KitAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity(repositoryClass="KitAdminBundle\Repository\AdminRepository")
 */
class Admin implements UserInterface
{

    /**
     *
     * @var int @ORM\Column(name="id", type="integer")
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @var string @ORM\Column(name="username", type="string", length=60, unique=true, options={"comment": "用户名"})
     */
    protected $username;

    /**
     *
     * @var string @ORM\Column(name="password", type="string", length=120)
     */
    protected $password;

    /**
     *
     * @var string @ORM\Column(name="truename", type="string", length=30, nullable=true)
     */
    private $truename;

    /**
     *
     * @var string @ORM\Column(name="cardid", type="string", length=18)
     */
    private $cardid;

    /**
     *
     * @var string @ORM\Column(name="number", type="string", length=32, unique=true)
     */
    private $number;

    /**
     *
     * @var int @ORM\Column(name="gender", type="smallint")
     */
    private $gender;

    /**
     *
     * @var int @ORM\Column(name="mobile", type="bigint")
     */
    private $mobile;

    /**
     *
     * @var int @ORM\Column(name="city_id", type="integer")
     */
    private $cityId;

    /**
     *
     * @var int @ORM\Column(name="suboffice_id", type="integer")
     */
    private $subofficeId;

    /**
     *
     * @var string @ORM\Column(name="job_title", type="string", length=64)
     */
    private $jobTitle;

    /**
     *
     * @var int @ORM\Column(name="admin_group_id", type="integer")
     */
    private $adminGroupId;
    
    /**
     * Many admins have One group.
     * @ORM\ManyToOne(targetEntity="AdminGroup", inversedBy="admins")
     * @ORM\JoinColumn(name="admin_group_id", referencedColumnName="id")
     */
    private $group;
    
    public function __construct() {
        $this->group = new ArrayCollection();
    }
    
    /**
     * Get group
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getGroup()
    {
        return $this->group;
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

    /**
     * -----------------------------------------
     * 
     * -----------------------------------------
     */
    
    /**
     * Gets the canonical username in search and sort queries.
     *
     * @return string
     */
    public function getUsernameCanonical()
    {}

    /**
     * Sets the canonical username.
     *
     * @param string $usernameCanonical            
     *
     * @return self
     */
    public function setUsernameCanonical($usernameCanonical)
    {}

    /**
     *
     * @param string|null $salt            
     */
    public function setSalt($salt){}
    public function getSalt(){}
    /**
     * Gets email.
     *
     * @return string
     */
    public function getEmail()
    {}

    /**
     * Sets the email.
     *
     * @param string $email            
     *
     * @return self
     */
    public function setEmail($email)
    {}

    /**
     * Gets the canonical email in search and sort queries.
     *
     * @return string
     */
    public function getEmailCanonical()
    {}

    /**
     * Sets the canonical email.
     *
     * @param string $emailCanonical            
     *
     * @return self
     */
    public function setEmailCanonical($emailCanonical)
    {}

    /**
     * Gets the plain password.
     *
     * @return string
     */
    public function getPlainPassword()
    {}

    /**
     * Sets the plain password.
     *
     * @param string $password            
     *
     * @return self
     */
    public function setPlainPassword($password)
    {}

    /**
     * Tells if the the given user has the super admin role.
     *
     * @return bool
     */
    public function isSuperAdmin()
    {}

    /**
     *
     * @param bool $boolean            
     *
     * @return self
     */
    public function setEnabled($boolean)
    {}

    /**
     * Sets the super admin status.
     *
     * @param bool $boolean            
     *
     * @return self
     */
    public function setSuperAdmin($boolean)
    {}

    /**
     * Gets the confirmation token.
     *
     * @return string
     */
    public function getConfirmationToken()
    {}

    /**
     * Sets the confirmation token.
     *
     * @param string $confirmationToken            
     *
     * @return self
     */
    public function setConfirmationToken($confirmationToken)
    {}

    /**
     * Sets the timestamp that the user requested a password reset.
     *
     * @param null|\DateTime $date            
     *
     * @return self
     */
    public function setPasswordRequestedAt(\DateTime $date = null)
    {}

    /**
     * Checks whether the password reset request has expired.
     *
     * @param int $ttl
     *            Requests older than this many seconds will be considered expired
     *            
     * @return int
     */
    public function isPasswordRequestNonExpired($ttl)
    {}

    /**
     * Sets the last login time.
     *
     * @param \DateTime $time            
     *
     * @return self
     */
    public function setLastLogin(\DateTime $time = null)
    {}

    /**
     * Never use this to check if this user has access to anything!
     *
     * Use the AuthorizationChecker, or an implementation of AccessDecisionManager
     * instead, e.g.
     *
     * $authorizationChecker->isGranted('ROLE_USER');
     *
     * @param string $role            
     *
     * @return bool
     */
    public function hasRole($role)
    {}

    /**
     * Sets the roles of the user.
     *
     * This overwrites any previous roles.
     *
     * @param array $roles            
     *
     * @return self
     */
    public function setRoles(array $roles)
    {}
    public function getRoles()
    {}

    /**
     * Adds a role to the user.
     *
     * @param string $role            
     *
     * @return self
     */
    public function addRole($role)
    {}

    /**
     * Removes a role to the user.
     *
     * @param string $role            
     *
     * @return self
     */
    public function removeRole($role)
    {}

    /**
     * Checks whether the user's account has expired.
     *
     * Internally, if this method returns false, the authentication system
     * will throw an AccountExpiredException and prevent login.
     *
     * @return bool true if the user's account is non expired, false otherwise
     *        
     * @see AccountExpiredException
     */
    public function isAccountNonExpired()
    {}

    /**
     * Checks whether the user is locked.
     *
     * Internally, if this method returns false, the authentication system
     * will throw a LockedException and prevent login.
     *
     * @return bool true if the user is not locked, false otherwise
     *        
     * @see LockedException
     */
    public function isAccountNonLocked()
    {}

    /**
     * Checks whether the user's credentials (password) has expired.
     *
     * Internally, if this method returns false, the authentication system
     * will throw a CredentialsExpiredException and prevent login.
     *
     * @return bool true if the user's credentials are non expired, false otherwise
     *        
     * @see CredentialsExpiredException
     */
    public function isCredentialsNonExpired()
    {}

    /**
     * Checks whether the user is enabled.
     *
     * Internally, if this method returns false, the authentication system
     * will throw a DisabledException and prevent login.
     *
     * @return bool true if the user is enabled, false otherwise
     *        
     * @see DisabledException
     */
    public function isEnabled()
    {}

    public function serialize()
    {}

    /**
     *
     * @param
     *            serialized
     */
    public function unserialize($serialized)
    {}

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {}
}

