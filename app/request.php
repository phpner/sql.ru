<?php
if ($_SERVER['REQUEST_METHOD'] == POST){
  echo $_POST['gu'];
}else{
    echo "fff";
}
class Request{

    function ddd(){
        if ($_SERVER['REQUEST_METHOD'] == POST){
            echo "eeee";
        }else{
            echo "fff";
        }
    }
}