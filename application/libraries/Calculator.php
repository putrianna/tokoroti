<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Calculator{
        function tambah($input1, $input2){
            return $input1+$input2;
        }
        function kurang($input1, $input2){
            return $input1-$input2;
        }
        function kali($input1, $input2){
            return $input1*$input2;
        }
        function bagi($input1, $input2){
            if($input2>0){
                return $input1/$input2;
            } else{
                return 0;
            }            
        }
        function operasi($input1, $input2, $oper){
            switch($oper){
                case '+':
                    return $this->tambah($input1, $input2);
                case '-':
                    return $this->kurang($input1, $input2);
                case '*':
                    return $this->kali($input1, $input2);
                case '/':
                    return $this->bagi($input1, $input2);
            }
        }
    }
?>