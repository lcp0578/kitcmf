<?php

namespace KitNewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="News")
 * @ORM\Entity(repositoryClass="KitNewsBundle\Repository\newsRepository")
 */
class News
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
     * @ORM\Column(name="title", type="string", length=255, options={"comment": "新闻标题"})
     */
    private $title;
    
    /**
     * @var string
     *
     * @ORM\Column(name="thumb", type="string", length=255, options={"comment": "配图"})
     */
    private $thumb;
    
    /**
     * @var string
     *
     * @ORM\Column(name="keyword", type="string", length=255, options={"comment": "关键字"})
     */
    private $keyword;
    
    /**
     * @var string
     *
     * @ORM\Column(name="introduction", type="string", length=255, options={"comment": "简介"})
     */
    private $introduction;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=64, options={"comment": "作者"})
     */
    private $author;

    /**
     * @var int
     *
     * @ORM\Column(name="hits", type="integer", options={"comment": "点击次数"})
     */
    private $hits;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="smallint", options={"comment": "状态，1正常，0审核中"})
     */
    private $status;

    /**
     * @var int
     *
     * @ORM\Column(name="category_id", type="integer", options={"comment": "分类ID"})
     */
    private $categoryId;
    
    /**
     * One news has one category
     * 
     * @ORM\OneToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var int
     *
     * @ORM\Column(name="content_id", type="integer", options={"comment": "内容ID"})
     */
    private $contentId;

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
     * @var int
     *
     * @ORM\Column(name="level", type="smallint", options={"comment": "文章级别"})
     */
    private $level;
    
    

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
     * Set title
     *
     * @param string $title
     *
     * @return News
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
     * Set thumb
     *
     * @param string $title
     *
     * @return News
     */
    public function setThumb($thumb)
    {
        $this->thumb = $thumb;
    
        return $this;
    }
    
    /**
     * Get thumb
     *
     * @return string
     */
    public function getThumb()
    {
        return $this->thumb;
    }
    
    /**
     * Set keyword
     *
     * @param string $keyword
     *
     * @return News
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    
        return $this;
    }
    
    /**
     * Get keyword
     *
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }
    
    /**
     * Set introduction
     *
     * @param string $title
     *
     * @return News
     */
    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;
    
        return $this;
    }
    
    /**
     * Get introduction
     *
     * @return string
     */
    public function getIntroduction()
    {
        return $this->introduction;
    }
    /**
     * Set author
     *
     * @param string $author
     *
     * @return News
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set hits
     *
     * @param integer $hits
     *
     * @return News
     */
    public function setHits($hits)
    {
        $this->hits = $hits;

        return $this;
    }

    /**
     * Get hits
     *
     * @return int
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return News
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
     * Set classifyId
     *
     * @param integer $classifyId
     *
     * @return News
     */
//     public function setClassifyId($classifyId)
//     {
//         $this->classifyId = $classifyId;

//         return $this;
//     }

    /**
     * Get classifyId
     *
     * @return int
     */
//     public function getClassifyId()
//     {
//         return $this->classifyId;
//     }

    /**
     * Set contentId
     *
     * @param integer $contentId
     *
     * @return News
     */
    public function setContentId($contentId)
    {
        $this->contentId = $contentId;

        return $this;
    }

    /**
     * Get contentId
     *
     * @return int
     */
    public function getContentId()
    {
        return $this->contentId;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return News
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
     * @return News
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
     * Set level
     *
     * @param integer $level
     *
     * @return News
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
}

