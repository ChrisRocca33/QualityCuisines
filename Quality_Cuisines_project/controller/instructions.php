<?php
//class to represent an entry on the about table
class Instructions {
    //class properties - match the columns in the
    private $insNo;
    private $insText;

    public function __construct($insNo, $insText)  {
        $this->insNo = $insNo;
        $this->insText = $insText;
    }
    
    //get and set the person properties
    public function getInsNo() {
        return $this->insNo;
    }
    public function setInsNo($value) {
        $this->insNo = $value;
    }

    public function getInsText() {
        return $this->insText;
    }
    public function setInsText($value) {
        $this->insText = $value;
    }
}