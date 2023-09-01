<?php
//class to represent an entry on the about table
class Recipe {
    //class properties - match the columns in the
    private $recipeNo;
    private $recipeName;
    private $ingredients;

    public function __construct($recipeNo, $recipeName, $ingredients)  {
        $this->recipeNo = $recipeNo;
        $this->recipeName = $recipeName;
        $this->ingredients = $ingredients;
    }
    
    //get and set the person properties
    public function getRecipeNo() {
        return $this->recipeNo;
    }
    public function setRecipeNo($value) {
        $this->recipeNo = $value;
    }

    public function getRecipeName() {
        return $this->recipeName;
    }
    public function setRecipeName($value) {
        $this->recipeName = $value;
    }

    public function getIngredients() {
        return $this->ingredients;
    }
    public function setIngredients($value) {
        $this->ingredients = $value;
    }
}