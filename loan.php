<?php
include 'loanDisplay.php';
class Loan extends LoanDisplay{
    private $ISBN;
    private $loanID;
    private $memberID;
    private $Quantity;


    public function __construct($loanID, $ISBN, $memberID, $Quantity) {
        $this->loanID = $loanID;
        $this->ISBN = $ISBN;
        $this->memberID = $memberID;
        $this->Quantity = $Quantity;
    }

    public function setLoanID($loanID) {
        $this->loanID = $loanID;
    }

    public function getLoanID() {
        return $this->loanID;
    }

    public function setISBN($ISBN) {
        $this->ISBN = $ISBN;
    }

    public function getISBN() {
        return $this->ISBN;
    }

    public function setMemberID($memberID) {
        $this->memberID = $memberID;
    }

    public function getMemberID() {
        return $this->memberID;
    }

    public function setQuantity($Quantity) {
        $this->Quantity = $Quantity;
    }

    public function getQuantity() {
        return $this->Quantity;
    }

    public function getdateBorrowed() {
        return date('Y-m-d');
    }

    public function getactualreturnDate() {
        $dateBorrowed = $this->getdateBorrowed();
        $actualreturnDate = date('Y-m-d', strtotime($dateBorrowed . ' +14 days'));
        return $actualreturnDate;
    }

    public function calculateOverdueFees($returnDate, $actualReturnDate) {
        $actualReturnDateTimestamp = strtotime($actualReturnDate);
        $returnDateTimestamp = strtotime($returnDate);
        $currentDateTimestamp = strtotime(date('Y-m-d'));
        $secs = $currentDateTimestamp - $actualReturnDateTimestamp;
        $days = $secs / 86400;
        $fees = 0;

        if ($days > 0 && $returnDateTimestamp == strtotime('0000-00-00')) {
            $difference = $currentDateTimestamp - $actualReturnDateTimestamp;
            $differenceRounded = $difference / (60 * 60 * 24);
            $fees = max(0, round($differenceRounded * 0.1, 2)); // Rounded to 2 decimal places
        } elseif ($returnDateTimestamp == strtotime('0000-00-00')) {
            $fees = 0;
        } else {
            $difference = $returnDateTimestamp - $actualReturnDateTimestamp;
            $differenceRounded = $difference / (60 * 60 * 24);
            $fees = max(0, round($differenceRounded * 0.1, 2)); // Rounded to 2 decimal places
        }

        return array('days' => $days, 'fees' => $fees);
    }


    public function getOverdueReminders($memberEmail) {
        $today = date('Y-m-d');
        $memberID = $this->getMemberIDByEmail($memberEmail);

        $sql = 'SELECT Title FROM loan WHERE memberID = :memberID AND actualreturnDate < :today AND returnDate = "0000-00-00 00:00:00"';

        $loanQuery = dbConn()->prepare($sql);
        $loanQuery->bindParam(':memberID', $memberID);
        $loanQuery->bindParam(':today', $today);
        $loanQuery->execute();

        $overdueReminders = [];

        while ($row = $loanQuery->fetch()) {
            $overdueReminders[] = $row['Title'];
        }
        return $overdueReminders;
    }



    public function addReturnDate()  {
        $currentDate = date('Y-m-d');
        $updateQuery = dbConn()->prepare("UPDATE loan SET returnDate = :currentDate WHERE loanID = :loanID");
        $updateQuery->bindParam(':currentDate', $currentDate);
        $updateQuery->bindParam(':loanID', $this->loanID);

        if ($updateQuery->execute()) {
            return true;
        } else {
            throw new Exception("Error updating return date: " . $updateQuery->errorInfo());
        }
        return false; // No update was performed.
    }

    public function addLoan($ISBN, $memberEmail, $Quantity) {
        $memberID = $this->getMemberIDByEmail($memberEmail);
        $title = $this->getBookTitleByISBN($ISBN);
        $dateBorrowed = $this->getdateBorrowed();
        $actualreturnDate = $this->getactualreturnDate();
        $returnDate = '0000-00-00';

        if (!$title && !$memberID) {
            return false;
        }else{
          $insertLoanQuery = dbConn()->prepare("INSERT INTO loan (ISBN, memberID, Quantity, dateBorrowed, returnDate, actualreturnDate, Title)
              VALUES (:ISBN, :memberID, :Quantity, :dateBorrowed, :returnDate, :actualreturnDate, :title)");

          $insertLoanQuery->bindParam(':ISBN', $ISBN);
          $insertLoanQuery->bindParam(':memberID', $memberID);
          $insertLoanQuery->bindParam(':Quantity', $Quantity);
          $insertLoanQuery->bindParam(':dateBorrowed', $dateBorrowed);
          $insertLoanQuery->bindParam(':returnDate', $returnDate);
          $insertLoanQuery->bindParam(':actualreturnDate', $actualreturnDate);
          $insertLoanQuery->bindParam(':title', $title);

          if ($insertLoanQuery->execute()) {
              return true;
          } else {
              return false;
          }
        }
    }



    public function deleteLoan() {
        $query = dbConn()->prepare("DELETE FROM loan WHERE loanID = :loanID");
        $query->bindParam(':loanID', $this->loanID);
        return $query->execute();
    }
}
?>
