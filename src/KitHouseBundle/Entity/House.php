<?php

namespace KitHouseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * House
 *
 * @ORM\Table(name="house")
 * @ORM\Entity(repositoryClass="KitHouseBundle\Repository\HouseRepository")
 */
class House
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
     * @var int
     *
     * @ORM\Column(name="sell_status", type="smallint")
     */
    private $sellStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=64, unique=true)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="smallint")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="trait", type="string", length=255)
     */
    private $trait;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var int
     *
     * @ORM\Column(name="area_id", type="integer")
     */
    private $areaId;

    /**
     * @var float
     *
     * @ORM\Column(name="property_fee", type="float")
     */
    private $propertyFee;

    /**
     * @var string
     *
     * @ORM\Column(name="property_company", type="string", length=255)
     */
    private $propertyCompany;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=64)
     */
    private $location;

    /**
     * @var int
     *
     * @ORM\Column(name="price_type", type="smallint")
     */
    private $priceType;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="owership", type="integer")
     */
    private $owership;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=64)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="sell_address", type="string", length=255)
     */
    private $sellAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="bus", type="string", length=255)
     */
    private $bus;

    /**
     * @var string
     *
     * @ORM\Column(name="education", type="string", length=255)
     */
    private $education;

    /**
     * @var string
     *
     * @ORM\Column(name="hospital", type="string", length=255)
     */
    private $hospital;

    /**
     * @var string
     *
     * @ORM\Column(name="bank", type="string", length=255)
     */
    private $bank;

    /**
     * @var float
     *
     * @ORM\Column(name="plan_area", type="float")
     */
    private $planArea;

    /**
     * @var float
     *
     * @ORM\Column(name="build_area", type="float")
     */
    private $buildArea;

    /**
     * @var int
     *
     * @ORM\Column(name="households", type="integer")
     */
    private $households;

    /**
     * @var int
     *
     * @ORM\Column(name="carport", type="integer")
     */
    private $carport;

    /**
     * @var float
     *
     * @ORM\Column(name="plot_ratio", type="float")
     */
    private $plotRatio;

    /**
     * @var float
     *
     * @ORM\Column(name="greening_rate", type="float")
     */
    private $greeningRate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="open_date", type="datetimetz")
     */
    private $openDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="completion_date", type="datetimetz")
     */
    private $completionDate;

    /**
     * @var string
     *
     * @ORM\Column(name="building_type", type="string", length=255)
     */
    private $buildingType;

    /**
     * @var string
     *
     * @ORM\Column(name="developers", type="string", length=255)
     */
    private $developers;

    /**
     * @var int
     *
     * @ORM\Column(name="decorate_type", type="smallint")
     */
    private $decorateType;

    /**
     * @var string
     *
     * @ORM\Column(name="bbs", type="string", length=255)
     */
    private $bbs;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=255)
     */
    private $tags;

    /**
     * @var float
     *
     * @ORM\Column(name="set_price", type="float")
     */
    private $setPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="thumb_one", type="string", length=255)
     */
    private $thumbOne;

    /**
     * @var string
     *
     * @ORM\Column(name="thumb_two", type="string", length=255)
     */
    private $thumbTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="thumb_three", type="string", length=255)
     */
    private $thumbThree;

    /**
     * @var string
     *
     * @ORM\Column(name="editor", type="string", length=64)
     */
    private $editor;

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="smallint")
     */
    private $level;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="smallint")
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="hits", type="string", length=255)
     */
    private $hits;

    /**
     * @var int
     *
     * @ORM\Column(name="tpl_id", type="integer")
     */
    private $tplId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_at", type="datetime")
     */
    private $createAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_at", type="datetime")
     */
    private $updateAt;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;


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
     * Set sellStatus
     *
     * @param integer $sellStatus
     *
     * @return House
     */
    public function setSellStatus($sellStatus)
    {
        $this->sellStatus = $sellStatus;

        return $this;
    }

    /**
     * Get sellStatus
     *
     * @return int
     */
    public function getSellStatus()
    {
        return $this->sellStatus;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return House
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return House
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set trait
     *
     * @param string $trait
     *
     * @return House
     */
    public function setTrait($trait)
    {
        $this->trait = $trait;

        return $this;
    }

    /**
     * Get trait
     *
     * @return string
     */
    public function getTrait()
    {
        return $this->trait;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return House
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set areaId
     *
     * @param integer $areaId
     *
     * @return House
     */
    public function setAreaId($areaId)
    {
        $this->areaId = $areaId;

        return $this;
    }

    /**
     * Get areaId
     *
     * @return int
     */
    public function getAreaId()
    {
        return $this->areaId;
    }

    /**
     * Set propertyFee
     *
     * @param float $propertyFee
     *
     * @return House
     */
    public function setPropertyFee($propertyFee)
    {
        $this->propertyFee = $propertyFee;

        return $this;
    }

    /**
     * Get propertyFee
     *
     * @return float
     */
    public function getPropertyFee()
    {
        return $this->propertyFee;
    }

    /**
     * Set propertyCompany
     *
     * @param string $propertyCompany
     *
     * @return House
     */
    public function setPropertyCompany($propertyCompany)
    {
        $this->propertyCompany = $propertyCompany;

        return $this;
    }

    /**
     * Get propertyCompany
     *
     * @return string
     */
    public function getPropertyCompany()
    {
        return $this->propertyCompany;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return House
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set priceType
     *
     * @param integer $priceType
     *
     * @return House
     */
    public function setPriceType($priceType)
    {
        $this->priceType = $priceType;

        return $this;
    }

    /**
     * Get priceType
     *
     * @return int
     */
    public function getPriceType()
    {
        return $this->priceType;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return House
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set owership
     *
     * @param integer $owership
     *
     * @return House
     */
    public function setOwership($owership)
    {
        $this->owership = $owership;

        return $this;
    }

    /**
     * Get owership
     *
     * @return int
     */
    public function getOwership()
    {
        return $this->owership;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return House
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set sellAddress
     *
     * @param string $sellAddress
     *
     * @return House
     */
    public function setSellAddress($sellAddress)
    {
        $this->sellAddress = $sellAddress;

        return $this;
    }

    /**
     * Get sellAddress
     *
     * @return string
     */
    public function getSellAddress()
    {
        return $this->sellAddress;
    }

    /**
     * Set bus
     *
     * @param string $bus
     *
     * @return House
     */
    public function setBus($bus)
    {
        $this->bus = $bus;

        return $this;
    }

    /**
     * Get bus
     *
     * @return string
     */
    public function getBus()
    {
        return $this->bus;
    }

    /**
     * Set education
     *
     * @param string $education
     *
     * @return House
     */
    public function setEducation($education)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * Get education
     *
     * @return string
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Set hospital
     *
     * @param string $hospital
     *
     * @return House
     */
    public function setHospital($hospital)
    {
        $this->hospital = $hospital;

        return $this;
    }

    /**
     * Get hospital
     *
     * @return string
     */
    public function getHospital()
    {
        return $this->hospital;
    }

    /**
     * Set bank
     *
     * @param string $bank
     *
     * @return House
     */
    public function setBank($bank)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get bank
     *
     * @return string
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * Set planArea
     *
     * @param float $planArea
     *
     * @return House
     */
    public function setPlanArea($planArea)
    {
        $this->planArea = $planArea;

        return $this;
    }

    /**
     * Get planArea
     *
     * @return float
     */
    public function getPlanArea()
    {
        return $this->planArea;
    }

    /**
     * Set buildArea
     *
     * @param float $buildArea
     *
     * @return House
     */
    public function setBuildArea($buildArea)
    {
        $this->buildArea = $buildArea;

        return $this;
    }

    /**
     * Get buildArea
     *
     * @return float
     */
    public function getBuildArea()
    {
        return $this->buildArea;
    }

    /**
     * Set households
     *
     * @param integer $households
     *
     * @return House
     */
    public function setHouseholds($households)
    {
        $this->households = $households;

        return $this;
    }

    /**
     * Get households
     *
     * @return int
     */
    public function getHouseholds()
    {
        return $this->households;
    }

    /**
     * Set carport
     *
     * @param integer $carport
     *
     * @return House
     */
    public function setCarport($carport)
    {
        $this->carport = $carport;

        return $this;
    }

    /**
     * Get carport
     *
     * @return int
     */
    public function getCarport()
    {
        return $this->carport;
    }

    /**
     * Set plotRatio
     *
     * @param float $plotRatio
     *
     * @return House
     */
    public function setPlotRatio($plotRatio)
    {
        $this->plotRatio = $plotRatio;

        return $this;
    }

    /**
     * Get plotRatio
     *
     * @return float
     */
    public function getPlotRatio()
    {
        return $this->plotRatio;
    }

    /**
     * Set greeningRate
     *
     * @param float $greeningRate
     *
     * @return House
     */
    public function setGreeningRate($greeningRate)
    {
        $this->greeningRate = $greeningRate;

        return $this;
    }

    /**
     * Get greeningRate
     *
     * @return float
     */
    public function getGreeningRate()
    {
        return $this->greeningRate;
    }

    /**
     * Set openDate
     *
     * @param \DateTime $openDate
     *
     * @return House
     */
    public function setOpenDate($openDate)
    {
        $this->openDate = $openDate;

        return $this;
    }

    /**
     * Get openDate
     *
     * @return \DateTime
     */
    public function getOpenDate()
    {
        return $this->openDate;
    }

    /**
     * Set completionDate
     *
     * @param \DateTime $completionDate
     *
     * @return House
     */
    public function setCompletionDate($completionDate)
    {
        $this->completionDate = $completionDate;

        return $this;
    }

    /**
     * Get completionDate
     *
     * @return \DateTime
     */
    public function getCompletionDate()
    {
        return $this->completionDate;
    }

    /**
     * Set buildingType
     *
     * @param string $buildingType
     *
     * @return House
     */
    public function setBuildingType($buildingType)
    {
        $this->buildingType = $buildingType;

        return $this;
    }

    /**
     * Get buildingType
     *
     * @return string
     */
    public function getBuildingType()
    {
        return $this->buildingType;
    }

    /**
     * Set developers
     *
     * @param string $developers
     *
     * @return House
     */
    public function setDevelopers($developers)
    {
        $this->developers = $developers;

        return $this;
    }

    /**
     * Get developers
     *
     * @return string
     */
    public function getDevelopers()
    {
        return $this->developers;
    }

    /**
     * Set decorateType
     *
     * @param integer $decorateType
     *
     * @return House
     */
    public function setDecorateType($decorateType)
    {
        $this->decorateType = $decorateType;

        return $this;
    }

    /**
     * Get decorateType
     *
     * @return int
     */
    public function getDecorateType()
    {
        return $this->decorateType;
    }

    /**
     * Set bbs
     *
     * @param string $bbs
     *
     * @return House
     */
    public function setBbs($bbs)
    {
        $this->bbs = $bbs;

        return $this;
    }

    /**
     * Get bbs
     *
     * @return string
     */
    public function getBbs()
    {
        return $this->bbs;
    }

    /**
     * Set tags
     *
     * @param string $tags
     *
     * @return House
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set setPrice
     *
     * @param float $setPrice
     *
     * @return House
     */
    public function setSetPrice($setPrice)
    {
        $this->setPrice = $setPrice;

        return $this;
    }

    /**
     * Get setPrice
     *
     * @return float
     */
    public function getSetPrice()
    {
        return $this->setPrice;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return House
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set thumbOne
     *
     * @param string $thumbOne
     *
     * @return House
     */
    public function setThumbOne($thumbOne)
    {
        $this->thumbOne = $thumbOne;

        return $this;
    }

    /**
     * Get thumbOne
     *
     * @return string
     */
    public function getThumbOne()
    {
        return $this->thumbOne;
    }

    /**
     * Set thumbTwo
     *
     * @param string $thumbTwo
     *
     * @return House
     */
    public function setThumbTwo($thumbTwo)
    {
        $this->thumbTwo = $thumbTwo;

        return $this;
    }

    /**
     * Get thumbTwo
     *
     * @return string
     */
    public function getThumbTwo()
    {
        return $this->thumbTwo;
    }

    /**
     * Set thumbThree
     *
     * @param string $thumbThree
     *
     * @return House
     */
    public function setThumbThree($thumbThree)
    {
        $this->thumbThree = $thumbThree;

        return $this;
    }

    /**
     * Get thumbThree
     *
     * @return string
     */
    public function getThumbThree()
    {
        return $this->thumbThree;
    }

    /**
     * Set editor
     *
     * @param string $editor
     *
     * @return House
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Get editor
     *
     * @return string
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set level
     *
     * @param integer $level
     *
     * @return House
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return House
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
     * Set hits
     *
     * @param string $hits
     *
     * @return House
     */
    public function setHits($hits)
    {
        $this->hits = $hits;

        return $this;
    }

    /**
     * Get hits
     *
     * @return string
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * Set tplId
     *
     * @param integer $tplId
     *
     * @return House
     */
    public function setTplId($tplId)
    {
        $this->tplId = $tplId;

        return $this;
    }

    /**
     * Get tplId
     *
     * @return int
     */
    public function getTplId()
    {
        return $this->tplId;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return House
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
     * @return House
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

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return House
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }
}

