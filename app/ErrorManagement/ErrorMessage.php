<?php

class ErrorMessage {

    private $label;

    public function __construct(
        public $message,
        public $grade = ErrorGrades::Fatal
    )
    {
        $this->label = $this->grade->getLabel() . "=" . $this->message;
    }

    public function getLabel(){
        return $this->label;
    }

    static function getErrorLabel($message){
        $errMsg = new ErrorMessage($message);
        return $errMsg->getLabel();
    }

    static function getWarningLabel($message){
        $errMsg = new ErrorMessage($message, ErrorGrades::Warning);
        return $errMsg->getLabel();
    }

    static function getSuccessLabel($message){
        $errMsg = new ErrorMessage($message, ErrorGrades::Succes);
        return $errMsg->getLabel();
    }

}