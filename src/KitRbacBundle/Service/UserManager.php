<?php
namespace KitRbacBundle\Service;

class UserManager
{
    public function create($username, $password)
    {
        return file_put_contents('debug.log', '['.date('Y-m-d').']username:' . $username . '|' . $password, FILE_APPEND);
    } 
}