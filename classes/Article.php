<?php
/**
 * Artilce 
 * 
 * A piece of writing for publication
 * 
 */
class Article {

    public $id;
    public $title;
    public $headline;
    public $content;
    public $img;
    public $published_at;
    public $errors = [];
/**
 * 
 * Get all the articles 
 * 
 * @param object $conn Connection to the database
 * 
 * @return array An associative array of all article records
 */

    public static function getAll($conn) {
        $sql = "SELECT *
			FROM news
			ORDER BY published_at DESC
			LIMIT 6";

	    $results = $conn->query($sql);

	    return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get a page of articles
     * 
     * @param object $conn Connection to database
     * @param integer $limit Number of records to return
     * @param integer $offset Number of records to skips
     * 
     * @return array An array of the page of article records
     */
    public static function getPage($conn, $limit, $offset) {
        $sql = "SELECT *
			FROM news
			ORDER BY published_at DESC
            LIMIT :limit
            OFFSET :offset";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

 /**
  * Get the article record based on the ID
 * 
 * @param object $conn connection to the database
 * 
 * @param integer $id the article ID
 * 
 * @param string $columns Optional list of columns for the select, defaults to *
 * 
 * @return mixed an object array containing the article with that ID, or null if not found
 * 
 */

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
/**
 * Update the article with its current property values
 * 
 * @param object $conn Connection to the database
 * 
 * @return boolean True if the updates was successful, false otherwise
 */
    public function update($conn) {
        if ($this->validate()) {
            $sql = "UPDATE news 
				SET title = :title,
                    headline = :headline,
                    content = :content,
                    img = :img,
                    published_at = :published_at
                WHERE id = :id";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindValue(':headline', $this->headline, PDO::PARAM_STR);
            $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);
        
            if ($this->published_at == '') {
                $stmt->bindValue(':published_at', null, PDO::PARAM_NULL);
            } else {
                $stmt->bindValue(':published_at', $this->published_at, PDO::PARAM_STR);
            }

            if ($this->img == '') {
                $stmt->bindValue(':img', 'banner.jpg', PDO::PARAM_STR);
            } else {
                $stmt->bindValue(':img', $this->img, PDO::PARAM_STR);
            }

            return $stmt->execute();
        } else {
            return false;
        }
    }

    /**
    * Validate the Article Properties 
    *  
    * @return boolean True if the current properties are valid, false if not
    */

    protected function validate() {
   
    
    if ($this->title == '') {
        $this->errors[] = 'Title is Required';
    }
    if ($this->headline == '') {
        $this->errors[] = 'Headline is Required';
    }
    if ($this->content == '') {
        $this->errors[] = 'Content is Required';
    }

    if ($this->published_at != '') {
        $date_time = date_create_from_format('Y-m-d H:i:s', $published_at);

        if ($date_time === false) {
            $this->errors[] = 'Invalid date and time';
        }
    }

    return empty($this->errors);
}
    /**
     * Delete Current Article 
     * 
     * @param object $conn Connection to database
     * 
     * @return boolean True if the delete was successful, false otherwise
    */
    public function delete($conn) {
        $sql = "DELETE FROM news 
                WHERE id = :id";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);

            return $stmt->execute();
    }

    /**
     * Update the article with its current property values
     * 
     * @param object $conn Connection to the database
     * 
     * @return boolean True if the insert was successful, false otherwise
     */
    public function create($conn) {
        if ($this->validate()) {
            $sql = "INSERT INTO news (title, headline, content, img, published_at)
                    VALUES (:title, :headline, :content, :img, :published_at)";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindValue(':headline', $this->headline, PDO::PARAM_STR);
            $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);
        
            if ($this->published_at == '') {
                $stmt->bindValue(':published_at', null, PDO::PARAM_NULL);
            } else {
                $stmt->bindValue(':published_at', $this->published_at, PDO::PARAM_STR);
            }
            if ($this->img == '') {
                $stmt->bindValue(':img', 'banner.jpg', PDO::PARAM_STR);
            } else {
                $stmt->bindValue(':img', $this->img, PDO::PARAM_STR);
            }




            if ($stmt->execute()) {
                $this->id = $conn->lastInsertId();
                return true;
            }
        } else {
            return false;
        }
    }
    /**
     * Get a count of the total number of records
     * 
     * @param object $conn Connection to the database
     * 
     * @return integer Total number of records
     */
    public static function getTotal($conn) {
        return $conn->query('SELECT COUNT(*) FROM news')->fetchColumn();
    }

    /**
     * Update the image property 
     * 
     * @param object $conn Connection to the database
     * @param string $filename The filename of the image
     * 
     * @return boolean True if it was successful, false otherwise
     */
    public function setImageFile($conn, $filename) {
        $sql = "UPDATE news
                SET img = :img
                WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindValue(':img', $filename, $filename == null ? PDO::PARAM_NULL : PDO::PARAM_STR);

        return $stmt->execute();


    }

}