<?php
require_once('database.php');

//class for users table queries
class AboutDB {
    
    public static function getAbout($aboutNo) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = "SELECT * FROM about
                WHERE AboutNo = '$aboutNo'";
            
            $result = $dbConn->query($query);
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}