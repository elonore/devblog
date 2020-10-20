<?php

namespace App\src\DAO;

class CommentDAO extends DAO
{ 
    public function getCommentsFromArticle($articleId)
    { 
        $sql = 'SELECT id,id_user,createdAt FROM comment WHERE id_article
        = ? ORDER BY createdAt DESC';
        return $this->createQuery($sql, [$articleId]);
    }
}