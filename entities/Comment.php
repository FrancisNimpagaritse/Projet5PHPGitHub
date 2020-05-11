<?php

class Comment
{
    private $id;
    private $articleId;
    private $comment;
    private $authorName;
    private $authorEmail;
    private $createAt;
    private $status;

    


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of articleId
     */ 
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * Set the value of articleId
     *
     * @return  self
     */ 
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;

        return $this;
    }

    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of authorName
     */ 
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * Set the value of authorName
     *
     * @return  self
     */ 
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;

        return $this;
    }

    /**
     * Get the value of authorEmail
     */ 
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    /**
     * Set the value of authorEmail
     *
     * @return  self
     */ 
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;

        return $this;
    }

    /**
     * Get the value of createAt
     */ 
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set the value of createAt
     *
     * @return  self
     */ 
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}