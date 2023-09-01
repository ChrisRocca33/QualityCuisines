<?php
include_once('recipe.php');
include_once('../model/recipe_db.php');

class RecipeController {
    private static function rowToUser($row) {
        $recipe = new Recipe(
            $row['RecipeNo'],
            $row['RecipeName'],
            $row['Ingredients']);
        return $recipe;
        }
    
    public static function getRecipeByNo($recipeNo) {
        $queryRes = RecipeDB::getRecipe($recipeNo);

        if($queryRes) {
            return self::rowToUser($queryRes);
        } else {
            return false;
        }
    }
}