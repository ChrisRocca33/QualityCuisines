<?php
require_once('database.php');

//class for users table queries
class RecipeDB {
    
    public static function getRecipe($recipeNo) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = "SELECT * FROM recipe
                WHERE RecipeNo = '$recipeNo'";
            
            $result = $dbConn->query($query);
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}