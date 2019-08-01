<?php
        class tokens{
            function openToken(){
                $_SESSION['token'] = bin2hex(random_bytes(32));
                return $_SESSION['token'];
            }
        }
session_start();

?>