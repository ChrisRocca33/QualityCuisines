<?php
include_once('about.php');
include_once('../model/about_db.php');

class AboutController {
    private static function rowToUser($row) {
        $about = new About(
            $row['AboutNo'],
            $row['AboutText']);
        return $about;
        }
    
    public static function getAboutByNo($aboutNo) {
        $queryRes = AboutDB::getAbout($aboutNo);

        if($queryRes) {
            return self::rowToUser($queryRes);
        } else {
            return false;
        }
    }
}