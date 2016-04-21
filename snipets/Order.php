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
    public $doc_root = 35;

    function __construct()
    {

    }

    /*Сохраняет данные заявки*/
    public function Commit()
    {

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