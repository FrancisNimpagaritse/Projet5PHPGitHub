<?php

require_once('core/Model.php');
require_once('entities/Post.php');

class PostManager extends Model
{
    private $pdoStmt;
    
    public function create(Post &$post)
    {
        $pdo = $this->getPdo();
        $this->pdoStmt = $pdo->prepare('INSERT INTO posts(title, category, chapo, content, authorId, postImage) VALUES(:title, :category, :chapo, :content, :authorId, :postImage)');
        
        $this->pdoStmt->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':category', $post->getCategory(), PDO::PARAM_STR);        
        $this->pdoStmt->bindValue(':chapo', $post->getChapo(), PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':authorId', $post->getAuthorId(), PDO::PARAM_INT);
        $this->pdoStmt->bindValue(':postImage', $post->getPostImage(), PDO::PARAM_STR);
         
        $isExecuteOk = $this->pdoStmt->execute();

        if ($isExecuteOk==false) {
            return false;
        } else { 
            return true;
        }
    }

    //Find all posts
    public function findAll()
    {        
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->query('SELECT p.id, p.title, p.category, p.chapo, p.content, p.authorId, p.postImage, p.updatedAt, p.status, u.firstname, COUNT(c.id) as nbrComments FROM users u
        INNER JOIN posts p ON u.id = p.authorId LEFT JOIN comments c ON p.id = c.postid
        GROUP BY p.id, p.title, p.category, p.chapo, p.content, p.authorId, p.updatedAt, p.postImage, p.status, u.firstname
        ORDER BY p.updatedAt DESC');
        
        $this->pdoStmt->execute();
        $posts = $this->pdoStmt->fetchAll(PDO::FETCH_OBJ);
        if (!$posts) {
            return null;
        } else {
            return $posts;
        }
    }

    //count all posts
    public function countAllPosts()
    {
        $pdo = $this->getPdo();
        
        $this->pdoStmt = $pdo->query('SELECT COUNT(*) as nbPosts FROM posts');

        $result = $this->pdoStmt->fetch(PDO::FETCH_OBJ);
        if ($result == null) {
            return [];
        }
        return $result;
    }

    //count all posts
    public function countAllPublishedPosts()
    {
        $pdo = $this->getPdo();
        
        $this->pdoStmt = $pdo->query('SELECT COUNT(*) as nbPosts FROM posts WHERE status="publié"');

        $result = $this->pdoStmt->fetch(PDO::FETCH_OBJ);
        if ($result == null) {
            return [];
        }
        return $result;
    }

    //count all posts
    public function countAllUnPublishedPosts()
    {
        $pdo = $this->getPdo();
        
        $this->pdoStmt = $pdo->query('SELECT COUNT(*) as nbPosts FROM posts where status="attente"');

        $result = $this->pdoStmt->fetch(PDO::FETCH_OBJ);
        if ($result == null) {
            return [];
        }
        return $result;
    }

    //Find all posts
    public function findAllPublished()
    {        
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->query('SELECT p.id, p.title, p.category, p.chapo, p.content, p.authorId, p.postImage, p.updatedAt, p.status, u.firstname, COUNT(c.id) as nbrComments FROM users u
        INNER JOIN posts p ON u.id = p.authorId LEFT JOIN comments c ON p.id = c.postid WHERE p.status = "publié"
        GROUP BY p.id, p.title, p.category, p.chapo, p.content, p.authorId, p.updatedAt, p.postImage, p.status, u.firstname
        ORDER BY p.updatedAt DESC');
        
        $this->pdoStmt->execute();
        $posts = $this->pdoStmt->fetchAll(PDO::FETCH_OBJ);
        if (!$posts) {            
            return null;
        } else {
            return $posts;
        } 
    }

    public function findTopFivePopular()
    {        
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->query('SELECT p.id, p.title, p.category, p.chapo, p.content, p.authorId, p.postImage, p.updatedAt, p.status, u.firstname, COUNT(c.id) as nbrComments FROM users u
        INNER JOIN posts p ON u.id = p.authorId INNER JOIN comments c ON p.id = c.postid
        GROUP BY p.id, p.title, p.category, p.chapo, p.content, p.authorId, p.updatedAt, p.postImage, p.status, u.firstname
        ORDER BY COUNT(c.id) DESC LIMIT 5');
        
        $this->pdoStmt->execute();
        $results = $this->pdoStmt->fetchAll(PDO::FETCH_OBJ);
   
        if (!$results) {            
            return null;
        } else {
            return $results;
        } 
    }

    public function findPopular()
    {        
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->query('SELECT p.id, p.title, p.category, p.chapo, p.content, p.authorId, p.postImage, p.updatedAt, p.status, u.firstname, COUNT(c.id) as nbrComments FROM users u
        INNER JOIN posts p ON u.id = p.authorId INNER JOIN comments c ON p.id = c.postid
        GROUP BY p.id, p.title, p.category, p.chapo, p.content, p.authorId, p.updatedAt, p.postImage, p.status, u.firstname
        ORDER BY COUNT(c.id) DESC LIMIT 1');
        
        $this->pdoStmt->execute();
        $popularPost = $this->pdoStmt->fetch(PDO::FETCH_OBJ);
   
        if (!$popularPost) {            
            return null;
        } else {
            return $popularPost;
        } 
    }

    public function findNew()
    {        
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->query('SELECT p.id, p.title, p.category, p.chapo, p.content,p.authorId, p.postImage, p.updatedAt, p.status, u.firstname, COUNT(c.id) as nbrComments FROM users u
        INNER JOIN posts p ON u.id = p.authorId INNER JOIN comments c ON p.id = c.postid
        GROUP BY p.id, p.title, p.category, p.chapo, p.content, p.updatedAt, p.authorId, p.postImage, p.status, u.firstname
        ORDER BY p.updatedAt DESC LIMIT 1');
        
        $this->pdoStmt->execute();
        $newPost = $this->pdoStmt->fetch(PDO::FETCH_OBJ);
   
        if (!$newPost) {            
            return null;
        } else {
            return $newPost;
        }
    }

    /* Find by Id that return the object or null */
    public function findById($id)
    {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
        
        $this->pdoStmt->bindValue(':id', $id, PDO::PARAM_INT);

        $isExecuteOk = $this->pdoStmt->execute();

        if ($isExecuteOk) {
            $post = $this->pdoStmt->fetchObject('Post');
            return $post;
        } else {
            return null;
        }     
    }

    public function showOneById($id)
    {        
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare('SELECT p.id, p.title, p.category, p.chapo, p.content,p.authorId, p.postImage, p.updatedAt, p.status, u.firstname, COUNT(c.id) as nbrComments FROM users u
        INNER JOIN posts p ON u.id = p.authorId LEFT JOIN comments c ON p.id = c.postid WHERE p.id = :id
        GROUP BY p.id, p.title, p.category, p.chapo, p.content, p.updatedAt, p.authorId, p.postImage, p.status, u.firstname
        ORDER BY p.updatedAt DESC LIMIT 1');

        $this->pdoStmt->bindValue(':id', $id, PDO::PARAM_INT);

        $this->pdoStmt->execute();
        $result = $this->pdoStmt->fetch(PDO::FETCH_OBJ);
        
        return $result;
    }

    public function countPostsByCategory()
    {
        $pdo = $this->getPdo();
        
        $this->pdoStmt = $pdo->query('SELECT category, COUNT(*) as nbPosts FROM posts GROUP BY category');

        $results = $this->pdoStmt->fetchAll(PDO::FETCH_ASSOC);        
        
        if ($results == null) {
            return [];
        }        
        return $results;
    }
    
    public function update(Post $post)
     {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare("UPDATE posts SET title = :title, category = :category, chapo = :chapo, content =:content, authorId =:authorId, postImage =:postImage WHERE id = :id");
        
        $this->pdoStmt->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':category', $post->getCategory(), PDO::PARAM_STR);        
        $this->pdoStmt->bindValue(':chapo', $post->getChapo(), PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':authorId', $post->getAuthorId(), PDO::PARAM_INT);
        $this->pdoStmt->bindValue(':postImage', $post->getPostImage(), PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':id',$post->getId(),PDO::PARAM_INT);

        return $this->pdoStmt->execute();
    }

    public function publishOne(Post $post)
     {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare("UPDATE posts SET status = :status WHERE id = :id");
        
        $this->pdoStmt->bindValue(':status','publié',PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':id',$post->getId(),PDO::PARAM_INT);

        return $this->pdoStmt->execute();
    }

    public function unPublishOne(Post $post)
     {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare("UPDATE posts SET status = :status WHERE id = :id");
        
        $this->pdoStmt->bindValue(':status','attente',PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':id',$post->getId(),PDO::PARAM_INT);

        return $this->pdoStmt->execute();
    }

    public function delete(Post $post)
    {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare("DELETE FROM users WHERE id=:id LIMIT 1");

        $this->pdoStmt->bindValue(':id',$post->getId(),PDO::PARAM_INT);

        return $this->pdoStmt->execute();
    }
}