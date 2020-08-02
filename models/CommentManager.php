<?php

require_once('Model.php');
require_once('entities/Comment.php');

class CommentManager extends Model
{
    private $pdoStmt;
    
    public function create(Comment &$comment)
    {
        $pdo = $this->getPdo();
        $this->pdoStmt = $pdo->prepare('INSERT INTO comments(postid, message, authorId) VALUES(:postid, :message, :userid)');
        
        $this->pdoStmt->bindValue(':postid', $comment->getPostId(), PDO::PARAM_INT);
        $this->pdoStmt->bindValue(':message', $comment->getMessage(), PDO::PARAM_STR);        
        $this->pdoStmt->bindValue(':userid', $comment->getAuthorId(), PDO::PARAM_INT);
         
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

        $this->pdoStmt = $pdo->query('SELECT c.id, c.postid, c.message, u.firstname as author, c.createdAt, c.status FROM comments c INNER JOIN users u ON c.authorId = u.id ORDER BY c.createdAt DESC');
        $this->pdoStmt->execute();
        $comments = $this->pdoStmt->fetchAll(PDO::FETCH_OBJ);
    
        if (!$comments) {            
            return null;
        } else {
            return $comments;
        } 
    }

    //count all comments
    public function countAllComments()
    {
        $pdo = $this->getPdo();
        
        $this->pdoStmt = $pdo->query('SELECT COUNT(*) as nbComments FROM comments');

        $result = $this->pdoStmt->fetch(PDO::FETCH_OBJ);
        if ($result == null) {
            return [];
        }
        return $result;
    }

    //count all comments
    public function countAllApprovedComments()
    {
        $pdo = $this->getPdo();
        
        $this->pdoStmt = $pdo->query('SELECT COUNT(*) as nbComments FROM comments WHERE status="publié"');

        $result = $this->pdoStmt->fetch(PDO::FETCH_OBJ);
        if ($result == null) {
            return [];
        }
        return $result;
    }

    //count all approved comments
    public function countAllUnApprovedComments()
    {
        $pdo = $this->getPdo();
        
        $this->pdoStmt = $pdo->query('SELECT COUNT(*) as nbComments FROM comments WHERE status="attente"');

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

        $this->pdoStmt = $pdo->query('SELECT c.id, c.postid, c.message, u.firstname as author, c.createdAt, c.status FROM comments c 
        INNER JOIN users u ON c.authorId = u.id WHERE p.status = "publié" ORDER BY c.createdAt DESC');
        $this->pdoStmt->execute();
        $comments = $this->pdoStmt->fetchAll(PDO::FETCH_OBJ);
    
        if (!$comments) {            
            return null;
        } else {
            return $comments;
        } 
    }

    //Only published comment
    public function findCommentsByPost($id)
    {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare('SELECT c.id, c.postid, c.authorId, c.message, c.createdAt, c.status, u.firstname, u.lastname FROM posts p 
        INNER JOIN comments c ON p.id = c.postid INNER JOIN users u ON c.authorId = u.id
        WHERE c.postid = :id AND c.status="publié"
        ORDER BY c.createdAt DESC');
        
        $this->pdoStmt->bindValue(':id', $id, PDO::PARAM_INT);
        $this->pdoStmt->execute();
        $comments = $this->pdoStmt->fetchAll(PDO::FETCH_OBJ);
    
        if (!$comments) {            
            return null;
        } else {
            return $comments;
        } 
    }

    /* Find by Id that return the object or null */
    public function findById($id)
    {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare('SELECT * FROM comments WHERE id = :id');
        
        $this->pdoStmt->bindValue(':id', $id, PDO::PARAM_INT);

        $isExecuteOk = $this->pdoStmt->execute();

        if ($isExecuteOk) {
            $comment = $this->pdoStmt->fetchObject('Comment');

            if ($comment==false) {
                return null;
            } else {
                return $comment;
            }
        } else {
             return false;
        }        
    }

    public function showOneById($id)
    {        
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare('SELECT p.id, p.title, p.category, p.chapo, p.content,p.authorId, p.postImage, p.updatedAt, p.status, u.firstname, COUNT(c.id) as nbrComments FROM users u
        INNER JOIN posts p ON u.id = p.authorId INNER JOIN comments c ON p.id = c.postid WHERE p.id = :id
        GROUP BY p.id, p.title, p.category, p.chapo, p.content, p.updatedAt, p.authorId, p.postImage, p.status, u.firstname
        ORDER BY p.updatedAt DESC LIMIT 1');

        $this->pdoStmt->bindValue(':id', $id, PDO::PARAM_INT);

        $this->pdoStmt->execute();
        $result = $this->pdoStmt->fetch(PDO::FETCH_OBJ);
   
        if (!$result) {            
            return null;
        } else {
            return $result;
        } 
    }    
    
    public function publishOne(Comment $comment)
    {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare('UPDATE comments SET status = :status WHERE id = :id');
        $this->pdoStmt->bindValue(':status','publié',PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':id',$comment->getId(),PDO::PARAM_INT);

        return $this->pdoStmt->execute();
    }

    public function unPublishOne(Comment $comment)
    {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare('UPDATE comments SET status = :status WHERE id = :id');
        $this->pdoStmt->bindValue(':status','attente',PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':id',$comment->getId(),PDO::PARAM_INT);

        return $this->pdoStmt->execute();
    }

    public function delete(Comment $comment)
    {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare('DELETE FROM comments WHERE id=:id LIMIT 1');

        $this->pdoStmt->bindValue(':id',$comment->getId(),PDO::PARAM_INT);

        return $this->pdoStmt->execute();
    }

}