<?php

namespace App\src\DAO;

class ArticleDAO extends DAO{ 
    public function getArticles(){
        $sql = 'SELECT * FROM article ORDER BY id DESC';
        return $this->createQuery($sql);
    }
    public function getArticle($articleId)
    { 
        $sql = 'SELECT * FROM article WHERE id = ?';
        return $this->createQuery($sql, [$articleId]);
    }

}

