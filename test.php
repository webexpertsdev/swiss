<?php

class test
{
    public function decode($code){
        return eval(str_rot13(gzinflate(str_rot13(base64_decode($code)))));
    }
}