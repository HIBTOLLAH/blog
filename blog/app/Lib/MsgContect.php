<?php
namespace App\Lib;
class MsgContect{
    public $email , $name ,$phone ,$content;

    function __construct($email , $name ,$phone ,$content)
    {
      $this->email=$email;
      $this->name=$name;
      $this->phone=$phone;
      $this->content=$content;
    }


}
