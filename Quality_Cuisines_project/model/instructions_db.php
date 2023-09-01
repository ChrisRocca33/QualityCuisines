<?php
require_once('database.php');

//class for users table queries
class InstructionsDB {
    
    public static function getInstructions($insNo) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = "SELECT * FROM instructions
                WHERE InsNo = '$insNo'";
            
            $result = $dbConn->query($query);
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}