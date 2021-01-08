<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Ceklogin{
        function cek($username, $password){
            if($username == 'admin' && $password == 'admin'){
                return true;
            } else{
                return false;
            }
        }
    }
?>