<?Php
    class LoanDisplay{
        public function getAllLoan() { #THIS
            $query = 'SELECT * FROM loan ORDER BY dateBorrowed DESC, loanID DESC';
            $loanQuery = dbConn()->prepare($query);
            $loanQuery->execute();
            return $loanQuery->fetchAll(PDO::FETCH_OBJ);
        }
    
        public function calculateTotalBookLoanQuantity($memberEmail) { #THIS
            $memberID = $this->getMemberIDByEmail($memberEmail);
            $sql = 'SELECT SUM(Quantity) FROM loan WHERE memberID = :memberID AND returnDate = "0000-00-00 00:00:00"';
    
            $loanQuery = dbConn()->prepare($sql);
            $loanQuery->bindParam(':memberID', $memberID);
            $loanQuery->execute();
    
            return $loanQuery->fetchColumn();
        }
    
    
        public function getAllLoanBymemberEmail($memberEmail) { #THIS
            $memberID = $this->getMemberIDByEmail($memberEmail);
            $query = 'SELECT * FROM loan WHERE memberID = :memberID ORDER BY dateBorrowed DESC, loanID DESC';
            $loanQuery = dbConn()->prepare($query);
            $loanQuery->bindParam(':memberID', $memberID);
            $loanQuery->execute();
            return $loanQuery->fetchAll(PDO::FETCH_OBJ);
        }

        public function getBookTitleByISBN($ISBN) { #THIS
            $query = dbConn()->prepare("SELECT Title FROM book WHERE ISBN = :ISBN");
            $query->bindParam(':ISBN', $ISBN);
    
            if ($query->execute()) {
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result ? $result['Title'] : false;
            } else {
                return false;
            }
        }
    
        public function getMemberIDByEmail($memberEmail) { #THIS
            $query = dbConn()->prepare("SELECT memberID FROM member WHERE memberEmail = :memberEmail");
            $query->bindParam(':memberEmail', $memberEmail);
    
            if ($query->execute()) {
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result ? $result['memberID'] : false;
            } else {
                return false;
            }
        }
    
        public function getMemberNameByID($memberID) { #THIS
            $query = dbConn()->prepare("SELECT memberName FROM member WHERE memberID = :memberID");
            $query->bindParam(':memberID', $memberID);
    
            if ($query->execute()) {
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result ? $result['memberName'] : false;
            } else {
                return false;
            }
        }
    }

?>