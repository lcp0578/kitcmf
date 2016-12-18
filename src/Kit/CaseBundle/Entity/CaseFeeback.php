<?php

namespace Kit\CaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CaseFeeback
 *
 * @ORM\Table(name="case_feeback")
 * @ORM\Entity(repositoryClass="Kit\CaseBundle\Repository\CaseFeebackRepository")
 */
class CaseFeeback
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
     * @ORM\Column(name="case_no", type="string", length=64)
     */
    private $caseNo;

    /**
     * @var int
     *
     * @ORM\Column(name="case_register_id", type="integer")
     */
    private $caseRegisterId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="treat_time", type="datetimetz")
     */
    private $treatTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arrive_time", type="datetimetz")
     */
    private $arriveTime;

    /**
     * @var string
     *
     * @ORM\Column(name="treat_content", type="text")
     */
    private $treatContent;

    /**
     * @var int
     *
     * @ORM\Column(name="treat_result_id", type="integer")
     */
    private $treatResultId;

    /**
     * @var string
     *
     * @ORM\Column(name="treat_result_name", type="string", length=64)
     */
    private $treatResultName;

    /**
     * @var string
     *
     * @ORM\Column(name="evoke_content", type="text")
     */
    private $evokeContent;

    /**
     * @var int
     *
     * @ORM\Column(name="case_type", type="integer")
     */
    private $caseType;

    /**
     * @var string
     *
     * @ORM\Column(name="treat_police", type="string", length=64)
     */
    private $treatPolice;


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
     * Set caseNo
     *
     * @param string $caseNo
     *
     * @return CaseFeeback
     */
    public function setCaseNo($caseNo)
    {
        $this->caseNo = $caseNo;

        return $this;
    }

    /**
     * Get caseNo
     *
     * @return string
     */
    public function getCaseNo()
    {
        return $this->caseNo;
    }

    /**
     * Set caseRegisterId
     *
     * @param integer $caseRegisterId
     *
     * @return CaseFeeback
     */
    public function setCaseRegisterId($caseRegisterId)
    {
        $this->caseRegisterId = $caseRegisterId;

        return $this;
    }

    /**
     * Get caseRegisterId
     *
     * @return int
     */
    public function getCaseRegisterId()
    {
        return $this->caseRegisterId;
    }

    /**
     * Set treatTime
     *
     * @param \DateTime $treatTime
     *
     * @return CaseFeeback
     */
    public function setTreatTime($treatTime)
    {
        $this->treatTime = $treatTime;

        return $this;
    }

    /**
     * Get treatTime
     *
     * @return \DateTime
     */
    public function getTreatTime()
    {
        return $this->treatTime;
    }

    /**
     * Set arriveTime
     *
     * @param \DateTime $arriveTime
     *
     * @return CaseFeeback
     */
    public function setArriveTime($arriveTime)
    {
        $this->arriveTime = $arriveTime;

        return $this;
    }

    /**
     * Get arriveTime
     *
     * @return \DateTime
     */
    public function getArriveTime()
    {
        return $this->arriveTime;
    }

    /**
     * Set treatContent
     *
     * @param string $treatContent
     *
     * @return CaseFeeback
     */
    public function setTreatContent($treatContent)
    {
        $this->treatContent = $treatContent;

        return $this;
    }

    /**
     * Get treatContent
     *
     * @return string
     */
    public function getTreatContent()
    {
        return $this->treatContent;
    }

    /**
     * Set treatResultId
     *
     * @param integer $treatResultId
     *
     * @return CaseFeeback
     */
    public function setTreatResultId($treatResultId)
    {
        $this->treatResultId = $treatResultId;

        return $this;
    }

    /**
     * Get treatResultId
     *
     * @return int
     */
    public function getTreatResultId()
    {
        return $this->treatResultId;
    }

    /**
     * Set treatResultName
     *
     * @param string $treatResultName
     *
     * @return CaseFeeback
     */
    public function setTreatResultName($treatResultName)
    {
        $this->treatResultName = $treatResultName;

        return $this;
    }

    /**
     * Get treatResultName
     *
     * @return string
     */
    public function getTreatResultName()
    {
        return $this->treatResultName;
    }

    /**
     * Set evokeContent
     *
     * @param string $evokeContent
     *
     * @return CaseFeeback
     */
    public function setEvokeContent($evokeContent)
    {
        $this->evokeContent = $evokeContent;

        return $this;
    }

    /**
     * Get evokeContent
     *
     * @return string
     */
    public function getEvokeContent()
    {
        return $this->evokeContent;
    }

    /**
     * Set caseType
     *
     * @param integer $caseType
     *
     * @return CaseFeeback
     */
    public function setCaseType($caseType)
    {
        $this->caseType = $caseType;

        return $this;
    }

    /**
     * Get caseType
     *
     * @return int
     */
    public function getCaseType()
    {
        return $this->caseType;
    }

    /**
     * Set treatPolice
     *
     * @param string $treatPolice
     *
     * @return CaseFeeback
     */
    public function setTreatPolice($treatPolice)
    {
        $this->treatPolice = $treatPolice;

        return $this;
    }

    /**
     * Get treatPolice
     *
     * @return string
     */
    public function getTreatPolice()
    {
        return $this->treatPolice;
    }
}

