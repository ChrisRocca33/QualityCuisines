<?php
namespace Validation;

//validate password
function pwValid($val, $len) {
    if (strlen($val) <=0) {
        return 'Required';
    }
    elseif(strlen($val) < $len) {
        return 'Must be at least ' . $len . ' characters.';
    }
    else {
        return '';
    }
}

//first name validator function
function firstNameValid($val, $len) {
    if (strlen($val) <=0) {
        return 'Required';
    }
    elseif(strlen($val) < $len) {
        return 'Must be at least ' . $len . ' characters.';
    }
    else {
        return '';
    }
}
//lastname validation function
function lastNameValid($val, $len) {
    if (strlen($val) <=0) {
        return 'Required';
    }
    elseif(strlen($val) < $len) {
        return 'Must be at least ' . $len . ' characters.';
    }
    else {
        return '';
    }
}

//function for email validation
function emailValid($val, &$msg) {
    if(strlen($val) <= 0)
        $msg = 'Required';
    elseif(strlen($val) > 0) {
        if(!filter_var($val, FILTER_VALIDATE_EMAIL)) 
        $msg = "Not a valid Email address.";
    }
}

