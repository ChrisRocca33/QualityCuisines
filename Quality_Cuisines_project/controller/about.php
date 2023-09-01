<?php
//class to represent an entry on the about table
class About {
    //class properties - match the columns in the
    private $aboutNo;
    private $aboutText;

    public function __construct($aboutNo, $aboutText)  {
        $this->aboutNo = $aboutNo;
        $this->aboutText = $aboutText;
    }
    
    //get and set the person properties
    public function getAboutNo() {
        return $this->aboutNo;
    }
    public function setAboutNo($value) {
        $this->aboutNo = $value;
    }

    public function getAboutText() {
        return $this->aboutText;
    }
    public function setAboutText($value) {
        $this->aboutText = $value;
    }
}