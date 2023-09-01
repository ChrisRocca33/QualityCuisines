<?php
include_once('instructions.php');
include_once('../model/instructions_db.php');

class InstructionsController {
    private static function rowToUser($row) {
        $instructions = new Instructions(
            $row['InsNo'],
            $row['InsText']);
        return $instructions;
        }
    
    public static function getInstructionsByNo($insNo) {
        $queryRes = InstructionsDB::getInstructions($insNo);

        if($queryRes) {
            return self::rowToUser($queryRes);
        } else {
            return false;
        }
    }
}