<?php

namespace KitNewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NewsContent
 *
 * @ORM\Table(name="news_content")
 * @ORM\Entity(repositoryClass="KitNewsBundle\Repository\NewsContentRepository")
 */
class NewsContent
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
     * @ORM\Column(name="content", type="text", options={"comment": "新闻内容"})
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="news_id", type="integer", options={"comment": "新闻ID"})
     */
    private $newsId;
    /**
     * 
     * @var News
     * 
     * @ORM\OneToOne(targetEntity="News", mappedBy="content")
     */
    private $news;

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
     * Set content
     *
     * @param string $content
     *
     * @return NewsContent
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
     * Set news
     *
     * @param integer $newsId
     *
     * @return NewsContent
     */
    public function setNews($news)
    {
        $this->news = $news;

        return $this;
    }

    /**
     * Get newsId
     *
     * @return int
     */
    public function getNews()
    {
        return $this->news;
    }
}

