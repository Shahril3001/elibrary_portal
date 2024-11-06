<?php
include 'bookDisplay.php';
class Book extends BookDisplay{
    protected $ISBN;
    protected $Title;
    protected $Image;
    protected $Edition;
    protected $Volume;
    protected $Authors;
    protected $Publishers;
    protected $PublicationYear;
    protected $Type;
    protected $Genre;
    protected $Synopsis;
    protected $DateAcquired;

    public function __construct(
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
        $this->ISBN = $ISBN;
        $this->Title = $Title;
        $this->Image = $Image;
        $this->Edition = $Edition;
        $this->Volume = $Volume;
        $this->Authors = $Authors;
        $this->Publishers = $Publishers;
        $this->PublicationYear = $PublicationYear;
        $this->Type = $Type;
        $this->Genre = $Genre;
        $this->Synopsis = $Synopsis;
        $this->DateAcquired = $DateAcquired;
    }

    public function getISBN() {
        return $this->ISBN;
    }

    public function setISBN($ISBN) {
        $this->ISBN = $ISBN;
    }

    public function getTitle() {
        return $this->Title;
    }

    public function setTitle($Title) {
        $this->Title = $Title;
    }

    public function getImage() {
        return $this->Image;
    }

    public function setImage($Image) {
        $this->Image = $Image;
    }

    public function getEdition() {
        return $this->Edition;
    }

    public function setEdition($Edition) {
        $this->Edition = $Edition;
    }

    public function getVolume() {
        return $this->Volume;
    }

    public function setVolume($Volume) {
        $this->Volume = $Volume;
    }

    public function getAuthors() {
        return $this->Authors;
    }

    public function setAuthors($Authors) {
        $this->Authors = $Authors;
    }

    public function getPublishers() {
        return $this->Publishers;
    }

    public function setPublishers($Publishers) {
        $this->Publishers = $Publishers;
    }

    public function getPublicationYear() {
        return $this->PublicationYear;
    }

    public function setPublicationYear($PublicationYear) {
        $this->PublicationYear = $PublicationYear;
    }

    public function getType() {
        return $this->Type;
    }

    public function setType($Type) {
        $this->Type = $Type;
    }

    public function getGenre() {
        return $this->Genre;
    }

    public function setGenre($Genre) {
        $this->Genre = $Genre;
    }

    public function getSynopsis() {
        return $this->Synopsis;
    }

    public function setSynopsis($Synopsis) {
        $this->Synopsis = $Synopsis;
    }

    public function getDateAcquired() {
        return $this->DateAcquired;
    }

    public function setDateAcquired($DateAcquired) {
        $this->DateAcquired = $DateAcquired;
    }

    public function updateBook() { 
        $query = dbConn()->prepare("UPDATE book
                                   SET Title = :Title, Image = :Image, Edition = :Edition, Volume = :Volume, Authors = :Authors, Publishers = :Publishers, PublicationYear = :PublicationYear, Type = :Type, Genre = :Genre, Synopsis = :Synopsis, DateAcquired = :DateAcquired
                                   WHERE ISBN = :ISBN");
        $query->bindParam(':ISBN', $this->ISBN);
        $query->bindParam(':Title', $this->Title);
        $query->bindParam(':Image', $this->Image);
        $query->bindParam(':Edition', $this->Edition);
        $query->bindParam(':Volume', $this->Volume);
        $query->bindParam(':Authors', $this->Authors);
        $query->bindParam(':Publishers', $this->Publishers);
        $query->bindParam(':PublicationYear', $this->PublicationYear);
        $query->bindParam(':Type', $this->Type);
        $query->bindParam(':Genre', $this->Genre);
        $query->bindParam(':Synopsis', $this->Synopsis);
        $query->bindParam(':DateAcquired', $this->DateAcquired);

        return $query->execute();
    }

    public function deleteBook() {
        $query = dbConn()->prepare("DELETE FROM book WHERE ISBN = :ISBN");
        $query->bindParam(':ISBN', $this->ISBN);
        return $query->execute();
    }
}
?>
