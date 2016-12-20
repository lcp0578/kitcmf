<?php

namespace Kit\CaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CaseRegister
 *
 * @ORM\Table(name="case_register")
 * @ORM\Entity(repositoryClass="Kit\CaseBundle\Repository\CaseRegisterRepository")
 */
class CaseRegister
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
     * @ORM\Column(name="case_no", type="string", length=32, options={"comment": "案件编号"})
     */
    private $caseNo;

    /**
     * @var int
     *
     * @ORM\Column(name="city_id", type="integer", options={"comment": "所属地市ID"})
     */
    private $cityId;

    /**
     * @var int
     *
     * @ORM\Column(name="suboffice_id", type="integer", options={"comment": "分局ID"})
     */
    private $subofficeId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="add_time", type="datetimetz", options={"comment": "接警时间"})
     */
    private $addTime;

    /**
     * @var int
     *
     * @ORM\Column(name="receive_id", type="integer", options={"comment": "接警方式ID"})
     */
    private $receiveId;

    /**
     * @var string
     *
     * @ORM\Column(name="receive_name", type="string", length=64, options={"comment": "接警方式名称"})
     */
    private $receiveName;

    /**
     * @var string
     *
     * @ORM\Column(name="alarm_name", type="string", length=32, options={"comment": "报警人姓名"})
     */
    private $alarmName;

    /**
     * @var int
     *
     * @ORM\Column(name="alarm_gender", type="smallint", options={"comment": "报警人性别"})
     */
    private $alarmGender;

    /**
     * @var string
     *
     * @ORM\Column(name="alarm_contact", type="string", length=64, options={"comment": "联系方式"})
     */
    private $alarmContact;

    /**
     * @var string
     *
     * @ORM\Column(name="alarm_address", type="string", length=255, options={"comment": "工作单位或者住址"})
     */
    private $alarmAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="case_address", type="string", length=255, options={"comment": "现场地址"})
     */
    private $caseAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="case_content", type="string", length=255, options={"comment": "接警情况"})
     */
    private $caseContent;

    /**
     * @var int
     *
     * @ORM\Column(name="admin_id", type="integer", options={"comment": "添加者ID"})
     */
    private $adminId;

    /**
     * @var string
     *
     * @ORM\Column(name="admin_name", type="string", length=64, options={"comment": "管理员用户名"})
     */
    private $adminName;


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
     * @return CaseRegister
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
     * Set cityId
     *
     * @param integer $cityId
     *
     * @return CaseRegister
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
     * @return CaseRegister
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
     * Set addTime
     *
     * @param \DateTime $addTime
     *
     * @return CaseRegister
     */
    public function setAddTime($addTime)
    {
        $this->addTime = $addTime;

        return $this;
    }

    /**
     * Get addTime
     *
     * @return \DateTime
     */
    public function getAddTime()
    {
        return $this->addTime;
    }

    /**
     * Set receiveId
     *
     * @param integer $receiveId
     *
     * @return CaseRegister
     */
    public function setReceiveId($receiveId)
    {
        $this->receiveId = $receiveId;

        return $this;
    }

    /**
     * Get receiveId
     *
     * @return int
     */
    public function getReceiveId()
    {
        return $this->receiveId;
    }

    /**
     * Set receiveName
     *
     * @param string $receiveName
     *
     * @return CaseRegister
     */
    public function setReceiveName($receiveName)
    {
        $this->receiveName = $receiveName;

        return $this;
    }

    /**
     * Get receiveName
     *
     * @return string
     */
    public function getReceiveName()
    {
        return $this->receiveName;
    }

    /**
     * Set alarmName
     *
     * @param string $alarmName
     *
     * @return CaseRegister
     */
    public function setAlarmName($alarmName)
    {
        $this->alarmName = $alarmName;

        return $this;
    }

    /**
     * Get alarmName
     *
     * @return string
     */
    public function getAlarmName()
    {
        return $this->alarmName;
    }

    /**
     * Set alarmGender
     *
     * @param integer $alarmGender
     *
     * @return CaseRegister
     */
    public function setAlarmGender($alarmGender)
    {
        $this->alarmGender = $alarmGender;

        return $this;
    }

    /**
     * Get alarmGender
     *
     * @return int
     */
    public function getAlarmGender()
    {
        return $this->alarmGender;
    }

    /**
     * Set alarmContact
     *
     * @param string $alarmContact
     *
     * @return CaseRegister
     */
    public function setAlarmContact($alarmContact)
    {
        $this->alarmContact = $alarmContact;

        return $this;
    }

    /**
     * Get alarmContact
     *
     * @return string
     */
    public function getAlarmContact()
    {
        return $this->alarmContact;
    }

    /**
     * Set alarmAddress
     *
     * @param string $alarmAddress
     *
     * @return CaseRegister
     */
    public function setAlarmAddress($alarmAddress)
    {
        $this->alarmAddress = $alarmAddress;

        return $this;
    }

    /**
     * Get alarmAddress
     *
     * @return string
     */
    public function getAlarmAddress()
    {
        return $this->alarmAddress;
    }

    /**
     * Set caseAddress
     *
     * @param string $caseAddress
     *
     * @return CaseRegister
     */
    public function setCaseAddress($caseAddress)
    {
        $this->caseAddress = $caseAddress;

        return $this;
    }

    /**
     * Get caseAddress
     *
     * @return string
     */
    public function getCaseAddress()
    {
        return $this->caseAddress;
    }

    /**
     * Set caseContent
     *
     * @param string $caseContent
     *
     * @return CaseRegister
     */
    public function setCaseContent($caseContent)
    {
        $this->caseContent = $caseContent;

        return $this;
    }

    /**
     * Get caseContent
     *
     * @return string
     */
    public function getCaseContent()
    {
        return $this->caseContent;
    }

    /**
     * Set adminId
     *
     * @param integer $adminId
     *
     * @return CaseRegister
     */
    public function setAdminId($adminId)
    {
        $this->adminId = $adminId;

        return $this;
    }

    /**
     * Get adminId
     *
     * @return int
     */
    public function getAdminId()
    {
        return $this->adminId;
    }

    /**
     * Set adminName
     *
     * @param string $adminName
     *
     * @return CaseRegister
     */
    public function setAdminName($adminName)
    {
        $this->adminName = $adminName;

        return $this;
    }

    /**
     * Get adminName
     *
     * @return string
     */
    public function getAdminName()
    {
        return $this->adminName;
    }
}

