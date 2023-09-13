<?php

class QRCode {

    static function generateUrl($data, $size="150x150"){
        return "https://api.qrserver.com/v1/create-qr-code/?size=".$size."&data=".$data."";
    }

}