<?php
    class BookDisplay{

        public function getBookByISBN($ISBN) { #THIS
            $query = dbConn()->prepare('SELECT * FROM book WHERE ISBN = :isbn');
            $query->bindParam(':isbn', $ISBN);
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        }
    
        public function getRecentlyAddedBooks() { #THIS
            $bookQuery = dbConn()->prepare('SELECT * FROM book ORDER BY DateAcquired DESC LIMIT 10');
            $bookQuery->execute();
            return $bookQuery->fetchAll(PDO::FETCH_OBJ);
        }
    
        public function getBookByTypeEBook() { #THIS
            $bookQuery = dbConn()->prepare('SELECT * FROM book WHERE Type = "E-Book" ORDER BY Type DESC LIMIT 10');
            $bookQuery->execute();
            return $bookQuery->fetchAll(PDO::FETCH_OBJ);
        }
    
        public function getAllBook() { #THIS
            $bookQuery = dbConn()->prepare('SELECT * FROM book');
            $bookQuery->execute();
            return $bookQuery->fetchAll(PDO::FETCH_OBJ);
        }
    
        public function getAllBooks($filters = []) { #THIS
            $query = 'SELECT * FROM book WHERE 1';
            if (!empty($filters)) {
                if (isset($filters['Type'])) {
                    $query .= ' AND Type LIKE :type';
                }
                if (isset($filters['Authors'])) {
                    $query .= ' AND Authors LIKE :authors';
                }
                if (isset($filters['Title'])) {
                    $query .= ' AND Title LIKE :title';
                }
                if (isset($filters['Years'])) {
                    $query .= ' AND PublicationYear LIKE :years';
                }
                $bookQuery = dbConn()->prepare($query);
                // Bind parameters
                if (isset($filters['Type'])) {
                    $type = '%' . $filters['Type'] . '%';
                    $bookQuery->bindParam(':type', $type, PDO::PARAM_STR);
                }
                if (isset($filters['Authors'])) {
                    $authors = '%' . $filters['Authors'] . '%';
                    $bookQuery->bindParam(':authors', $authors, PDO::PARAM_STR);
                }
                if (isset($filters['Title'])) {
                    $title = '%' . $filters['Title'] . '%';
                    $bookQuery->bindParam(':title', $title, PDO::PARAM_STR);
                }
                if (isset($filters['Years'])) {
                    $years = '%' . $filters['Years'] . '%';
                    $bookQuery->bindParam(':years', $years, PDO::PARAM_STR);
                }
                $bookQuery->execute();
            } else {
                $bookQuery = dbConn()->prepare($query);
                $bookQuery->execute();
            }
    
            return $bookQuery->fetchAll(PDO::FETCH_OBJ);
        }
    
        public function getBooksByGenre($genres) { #THIS
            $genreArray = explode(', ', $genres); // Split the input into an array of genres
            $query = 'SELECT * FROM book WHERE';
    
            foreach ($genreArray as $index => $genre) {
                $genreParam = '%' . $genre . '%';
                $query .= ' Genre LIKE :genre' . $index;
    
                if ($index < count($genreArray) - 1) {
                    $query .= ' OR';
                }
            }
    
            $bookQuery = dbConn()->prepare($query);
    
            foreach ($genreArray as $index => $genre) {
                $genreParam = '%' . $genre . '%';
                $bookQuery->bindParam(':genre' . $index, $genreParam, PDO::PARAM_STR);
            }
    
            $bookQuery->execute();
    
            return $bookQuery->fetchAll(PDO::FETCH_OBJ);
        }
    
    
    
    
        public function addBook( #THIS
            $ISBN,
            $Title,
            $Image,
            $Edition,
            $Volume,
            $Authors,
            $Publishers,
            $PublicationYear,
            $Type,
            $Genre,
            $Synopsis,
            $DateAcquired
        ) {
            $book = new Book(
                $ISBN,
                $Title,
                $Image,
                $Edition,
                $Volume,
                $Authors,
                $Publishers,
                $PublicationYear,
                $Type,
                $Genre,
                $Synopsis,
                $DateAcquired
            ); 
    
            // Check if the book already exists in the database
            $checkBookQuery = dbConn()->prepare("SELECT * FROM book WHERE ISBN = :isbn OR Title = :title");
            $checkBookQuery->bindParam(':isbn', $ISBN);
            $checkBookQuery->bindParam(':title', $Title);
            $checkBookQuery->execute();
    
            if ($checkBookQuery->rowCount() > 0) {
                return false;
            } else {
                // Insert the book
                $insertBookQuery = dbConn()->prepare("INSERT INTO book (ISBN, Title, Image, Edition, Volume, Authors, Publishers, PublicationYear, Type, Genre, Synopsis, DateAcquired)
                VALUES (:isbn, :title, :image, :edition, :Volume, :authors, :publishers, :publicationYear, :type, :genre, :synopsis, :dateAcquired)");
    
                // Bind the parameters from the book object
                $insertBookQuery->execute([
                    ':isbn' => $book->getISBN(),
                    ':title' => $book->getTitle(),
                    ':image' => $book->getImage(),
                    ':edition' => $book->getEdition(),
                    ':Volume' => $book->getVolume(),
                    ':authors' => $book->getAuthors(),
                    ':publishers' => $book->getPublishers(),
                    ':publicationYear' => $book->getPublicationYear(),
                    ':type' => $book->getType(),
                    ':genre' => $book->getGenre(),
                    ':synopsis' => $book->getSynopsis(),
                    ':dateAcquired' => $book->getDateAcquired(),
                ]);
    
                return $insertBookQuery->rowCount() > 0;
            }
        }
    
        public static function findBooks($Title, $ISBN) { #THIS
            $query = dbConn()->prepare("SELECT * FROM book WHERE Title LIKE :Title AND ISBN LIKE :ISBN");
            $query->bindValue(':Title', '%' . $Title . '%');
            $query->bindValue(':ISBN', '%' . $ISBN . '%');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
    
    }

?>