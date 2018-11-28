<?php

class Article {

    public $id;
    public $title;
    public $headline;
    public $content;
    public $img;
    public $published_at;


    public static function getAll($conn) {
        $sql = "SELECT *
                FROM news
                ORDER BY published_at DESC
                LIMIT 10";

        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByID($conn, $id, $columns = '*') {
        $sql = "SELECT $columns
                FROM news
                WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');

        if ($stmt->execute()) {
            return $stmt->fetch();
        }
        
    }


}