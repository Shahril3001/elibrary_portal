<?php
  class Member {
    protected $memberID;
    protected $memberName;
    protected $memberEmail;
    protected $memberPhone;
    protected $memberAddress;
    protected $memberPassword;
    protected $lastLogin;
    protected $memberProfileImg; // New property
    protected $memberDOB; // New property

    public function __construct($memberID, $memberName, $memberEmail, $memberPhone, $memberDOB, $memberProfileImg, $memberAddress, $memberPassword, $lastLogin,) {
        $this->memberID = $memberID;
        $this->memberName = $memberName;
        $this->memberEmail = $memberEmail;
        $this->memberPhone = $memberPhone;
        $this->memberDOB = $memberDOB;
        $this->memberProfileImg = $memberProfileImg;
        $this->memberAddress = $memberAddress;
        $this->memberPassword = $memberPassword;
        $this->lastLogin = $lastLogin;
    }

    public function getAllMember() {
        $memberQuery = dbConn()->prepare('SELECT * FROM member');
        $memberQuery->execute();
        return $memberQuery->fetchAll(PDO::FETCH_OBJ);
    }

    public function getMemberID() {
          return $this->memberID;
    }

    public function setMemberID($memberID) {
          $this->memberID = $memberID;
          return $this;
    }

    public function getMemberName() {
          return $this->memberName;
    }

    public function setMemberName($memberName) {
          $this->memberName = $memberName;
          return $this;
    }

    public function getMemberEmail() {
          return $this->memberEmail;
    }

    public function setMemberEmail($memberEmail) {
          $this->memberEmail = $memberEmail;
          return $this;
    }

    public function getMemberPhone() {
          return $this->memberPhone;
    }

    public function setMemberPhone($memberPhone) {
          $this->memberPhone = $memberPhone;
          return $this;
    }

    public function getMemberAddress() {
          return $this->memberAddress;
    }

    public function setMemberAddress($memberAddress) {
          $this->memberAddress = $memberAddress;
          return $this;
    }

    public function getMemberPassword() {
          return $this->memberPassword;
    }

    public function setMemberPassword($memberPassword) {
          $this->memberPassword = $memberPassword;
          return $this;
    }

    public function getLastLogin(){
        return $this->lastLogin;
    }

    public function setLastLogin($lastLogin){
        $this->lastLogin = $lastLogin;
        return $this;
    }

    public function getMemberProfileImg() {
        return $this->memberProfileImg;
    }

    public function setMemberProfileImg($memberProfileImg) {
        $this->memberProfileImg = $memberProfileImg;
        return $this;
    }

    public function getMemberDOB() {
        return $this->memberDOB;
    }

    public function setMemberDOB($memberDOB) {
        $this->memberDOB = $memberDOB;
        return $this;
    }

    public function login($memberEmail, $memberPassword) {
        if (empty($memberEmail) || empty($memberPassword)) {
            return ["success" => false, "message" => "Empty field"];
        } else {
            // Check if the user exists.
            $userExistsQuery = dbConn()->prepare("SELECT COUNT(*) as count FROM member WHERE memberEmail=:memberEmail");
            $userExistsQuery->bindParam(':memberEmail', $memberEmail);
            $userExistsQuery->execute();
            $userExistsResult = $userExistsQuery->fetch(PDO::FETCH_ASSOC);

            if ($userExistsResult['count'] > 0) {
                $query = dbConn()->prepare("SELECT * FROM member WHERE memberEmail=:memberEmail AND memberPassword=:memberPassword");
                $query->bindParam(':memberEmail', $memberEmail);
                $query->bindParam(':memberPassword', $memberPassword);
                $query->execute();

                if ($query->rowCount() >= 1) {
                    $query1 = dbConn()->prepare('SELECT * FROM member WHERE memberEmail=:memberEmail');
                    $query1->bindParam(':memberEmail', $memberEmail);
                    $query1->execute();
                    $members = $query1->fetchAll(PDO::FETCH_OBJ);

                    foreach ($members as $member) {
                        $memberEmail = $member->memberEmail;
                        $role = $member->role;
                    }
                    return ["success" => true, "memberEmail" => $memberEmail, "role" => $role];
                } else {
                    return ["success" => false, "message" => "Invalid Login Attempt"];
                }
            } else {
                return ["success" => false, "message" => "User does not exist"];
            }
        }
    }

    public function addMember($memberName, $memberEmail, $memberPhone, $memberDOB, $memberProfileImg, $memberAddress, $memberPassword) {
          $checkMemberQuery = dbConn()->prepare("SELECT * FROM member WHERE memberEmail LIKE :memberEmail");
          $memberEmailPattern = '%' . $memberEmail . '%';
          $checkMemberQuery->bindParam(':memberEmail', $memberEmailPattern);
          $checkMemberQuery->execute();

          if ($checkMemberQuery->rowCount() > 0) {
              return false;
          } else {
              $insertMemberQuery = dbConn()->prepare("INSERT INTO member (memberName, memberEmail, memberPhone, memberDOB, memberProfileImg, memberAddress, memberPassword, role, lastLogin)
                                                     VALUES (:memberName, :memberEmail, :memberPhone, :memberDOB, :memberProfileImg, :memberAddress, :memberPassword, 'member', '00/00/0000')");
              $insertMemberQuery->bindParam(':memberName', $memberName);
              $insertMemberQuery->bindParam(':memberEmail', $memberEmail);
              $insertMemberQuery->bindParam(':memberPhone', $memberPhone);
              $insertMemberQuery->bindParam(':memberDOB', $memberDOB);
              $insertMemberQuery->bindParam(':memberProfileImg', $memberProfileImg);
              $insertMemberQuery->bindParam(':memberAddress', $memberAddress);
              $insertMemberQuery->bindParam(':memberPassword', $memberPassword);

              if ($insertMemberQuery->execute()) {
                  return true;
              } else {
                  return false;
              }
          }
    }

    public static function findMembers($memberName, $memberEmail)
    {
        $query = dbConn()->prepare("SELECT * FROM member WHERE memberName =  :memberName AND memberEmail LIKE  :memberEmail");
        $query->bindParam(':memberName', $memberName);
        $query->bindValue(':memberEmail', '%' . $memberEmail . '%');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateProfile(){
        $query = dbConn()->prepare("UPDATE member
                                   SET memberName = :memberName,
                                       memberPhone = :memberPhone,
                                       memberDOB = :memberDOB,
                                       memberProfileImg = :memberProfileImg,
                                       memberAddress = :memberAddress,
                                       memberPassword = :memberPassword
                                   WHERE memberEmail = :memberEmail");

        $query->bindParam(':memberName', $this->memberName);
        $query->bindParam(':memberPhone', $this->memberPhone);
        $query->bindParam(':memberDOB', $this->memberDOB);
        $query->bindParam(':memberProfileImg', $this->memberProfileImg);
        $query->bindParam(':memberAddress', $this->memberAddress);
        $query->bindParam(':memberPassword', $this->memberPassword);
        $query->bindParam(':memberEmail', $this->memberEmail);
        return $query->execute();
    }

    public function deleteMember() {
        $query = dbConn()->prepare("DELETE FROM member WHERE memberID = :memberID");
        $query->bindParam(':memberID', $this->memberID);
        return $query->execute();
    }
  }
?>
