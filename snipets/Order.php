<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.04.2016
 * Time: 19:42
 */
class Order extends John
{
    public $template = 10;
    public $parent = 35;

    function __construct()
    {

    }

    /*Сохраняет данные заявки*/
    public function Commit()
    {



        ClearGet();
        $obj = new stdClass();
        $today = date("d.m.Y");

        $_SESSION['cart']['u_name'];
        $_SESSION['cart']['u_surname'];
        for ($i = 1; $i <= ($_SESSION['cart']['ins_count'] + 0); $i++) {
            if (isset($_SESSION['cart']['ins_FIO_' . $i])) {
                $_SESSION['cart']['ins_FIO_' . $i];
                $_SESSION['cart']['ins_name_' . $i];
                $_SESSION['cart']['ins_lastname_' . $i];
                $_SESSION['cart']['ins_birthday_' . $i];
            }
        }


        $obj->pagetitle=$today."_".$_SESSION['cart']['u_lastname']."_".$_SESSION['cart']['u_name']."_".$_SESSION['cart']['u_surname'];


        $obj->parent=$this->parent;
        $obj->template=$this->template;
        $obj->TV['reg_sity']=$_SESSION['cart']['reg_sity'];
        $obj->TV['reg_street']=$_SESSION['cart']['reg_street'];
        $obj->TV['reg_house']=$_SESSION['cart']['reg_house'];
        $obj->TV['reg_kv']=$_SESSION['cart']['reg_kv'];
        $obj->TV['reg_phone']=$_SESSION['cart']['reg_phone'];
        $obj->TV['reg_email']=$_SESSION['cart']['reg_email'];

        $obj->alias = encodestring($obj->pagetitle);
        $obj->url="orders/" .$obj->alias . ".html";
        $obj->id=IncertPage($obj);

    }
    /*Для аяксов*/
    function Ajax()
    {
        if (isset($_GET['action'])) {
            if($_GET['action']=='Commit')
            {
                $this->Commit();
            }

        }
    }


}