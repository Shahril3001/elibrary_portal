<?php
  class Staff {
    protected $staffID;
    protected $staffName;
    protected $staffEmail;
    protected $staffPhone;
    protected $staffPassword;
    protected $lastLogin;

    public function __construct($staffID, $staffName, $staffEmail, $staffPhone, $staffPassword, $lastLogin) {
        $this->staffID = $staffID;
        $this->staffName = $staffName;
        $this->staffEmail = $staffEmail;
        $this->staffPhone = $staffPhone;
        $this->staffPassword = $staffPassword;
        $this->lastLogin = $lastLogin;
    }

    public function getAllStaff() {
        $staffQuery = dbConn()->prepare('SELECT * FROM staff');
        $staffQuery->execute();
        return $staffQuery->fetchAll(PDO::FETCH_OBJ);
    }

    public function getStaffID() {
       return $this->staffID;
   }

   public function setStaffID($staffID) {
       $this->staffID = $staffID;
       return $this;
   }

   public function getStaffName() {
       return $this->staffName;
   }

   public function setStaffName($staffName) {
       $this->staffName = $staffName;
       return $this;
   }

   public function getStaffEmail() {
       return $this->staffEmail;
   }

   public function setStaffEmail($staffEmail) {
       $this->staffEmail = $staffEmail;
       return $this;
   }

   public function getStaffPhone() {
       return $this->staffPhone;
   }

   public function setStaffPhone($staffPhone) {
       $this->staffPhone = $staffPhone;
       return $this;
   }

   public function getStaffPassword() {
       return $this->staffPassword;
   }

   public function setStaffPassword($staffPassword) {
       $this->staffPassword = $staffPassword;
       return $this;
   }

   public function getLastLogin() {
       return $this->lastLogin;
   }

   public function setLastLogin($lastLogin) {
       $this->lastLogin = $lastLogin;
       return $this;
   }

   public function login($staffEmail, $staffPassword) {
       if (empty($staffEmail) || empty($staffPassword)) {
           return ["success" => false, "message" => "Empty field"];
       } else {
           // Check if the user exists.
           $userExistsQuery = dbConn()->prepare("SELECT COUNT(*) as count FROM staff WHERE staffEmail=:staffEmail");
           $userExistsQuery->bindParam(':staffEmail', $staffEmail);
           $userExistsQuery->execute();
           $userExistsResult = $userExistsQuery->fetch(PDO::FETCH_ASSOC);

           if ($userExistsResult['count'] > 0) {
               $query = dbConn()->prepare("SELECT * FROM staff WHERE staffEmail=:staffEmail AND staffPassword=:staffPassword");
               $query->bindParam(':staffEmail', $staffEmail);
               $query->bindParam(':staffPassword', $staffPassword);
               $query->execute();

               if ($query->rowCount() >= 1) {
                   $query1 = dbConn()->prepare('SELECT * FROM staff WHERE staffEmail=:staffEmail');
                   $query1->bindParam(':staffEmail', $staffEmail);
                   $query1->execute();
                   $staffs = $query1->fetchAll(PDO::FETCH_OBJ);

                   $staffEmail = $role = '';

                   // Iterate through the results (though there should be only one).
                   foreach ($staffs as $staff) {
                       $staffEmail = $staff->staffEmail;
                       $role = $staff->role;
                   }

                   return ["success" => true, "staffEmail" => $staffEmail, "role" => $role];
               } else {
                   return ["success" => false, "message" => "Invalid Login Attempt"];
               }
           } else {
               return ["success" => false, "message" => "User does not exist"];
           }
       }
   }



    public function addStaff($staffName, $staffEmail, $staffPhone, $staffPassword) {
        $checkStaffQuery = dbConn()->prepare("SELECT * FROM staff WHERE staffName = :staffName OR staffEmail = :staffEmail");
        $checkStaffQuery->bindParam(':staffName', $staffName);
        $checkStaffQuery->bindParam(':staffEmail', $staffEmail);
        $checkStaffQuery->execute();

        if ($checkStaffQuery->rowCount() > 0) {
            return false; // Staff member with the same name or email already exists.
        } else {
            $insertStaffQuery = dbConn()->prepare("INSERT INTO staff (staffName, staffEmail, staffPhone, staffPassword, role, lastLogin)
                                                 VALUES (:staffName, :staffEmail, :staffPhone, :staffPassword, 'admin', '00/00/0000')");
            $insertStaffQuery->bindParam(':staffName', $staffName);
            $insertStaffQuery->bindParam(':staffEmail', $staffEmail);
            $insertStaffQuery->bindParam(':staffPhone', $staffPhone);
            $insertStaffQuery->bindParam(':staffPassword', $staffPassword);

            if ($insertStaffQuery->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function findStaff($staffName, $staffEmail) {
        $query = dbConn()->prepare("SELECT * FROM staff WHERE staffName LIKE :staffName AND staffEmail LIKE :staffEmail");
        $query->bindValue(':staffName', '%' . $staffName . '%');
        $query->bindValue(':staffEmail', '%' . $staffEmail . '%');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateProfile() {
        $query = dbConn()->prepare("UPDATE staff
                                   SET staffName = :staffName,
                                       staffPhone = :staffPhone,
                                       staffPassword = :staffPassword, 
                                   WHERE staffEmail = :staffEmail");

        $query->bindParam(':staffName', $this->staffName);
        $query->bindParam(':staffPhone', $this->staffPhone);
        $query->bindParam(':staffPassword', $this->staffPassword);
        $query->bindParam(':staffEmail', $this->staffEmail);
        return $query->execute();
    }

    public function deleteStaff() {
        $query = dbConn()->prepare("DELETE FROM staff WHERE staffID = :staffID");
        $query->bindParam(':staffID', $this->staffID);
        return $query->execute();
    }
  }
?>
