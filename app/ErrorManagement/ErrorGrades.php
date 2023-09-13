<?php

enum ErrorGrades {

    case Succes;
    case Warning;
    case Fatal;

    public function getLabel(){

        return match($this){
            ErrorGrades::Succes => "succesmsg",
            ErrorGrades::Warning => "warningmsg",
            ErrorGrades::Fatal => "errormsg"
        };

    }

}