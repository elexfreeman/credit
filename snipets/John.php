<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.01.2016
 * Time: 12:46
 */

require_once 'functions.php';
class John
{

    public $MainTpl = 1;
    public $ProductTpl = 2;
    public $MainPage = 1;
    public $ProductPage = 2;

    public $insurance;

    function __construct()
    {
        /*Получаем данные об тарифах*/
        /*Записанно в странице страхование*/
        $this->insurance = GetPageInfo($this->ProductPage);
    }



    /*Выдает буквы отчества*/
    function GetLastNameShor($LastName)
    {
        if($LastName!='') return mb_substr($LastName,0,1,"UTF-8").'.';
    }

    function GetCurrency()
    {

        $Currency= $this->insurance->TV['сurrency'];
        if($Currency=='')
        {
            return '<i class="fa fa-usd"></i>';
        }
        elseif($Currency=='RUB')
        {
            return '<i class="fa fa-rub"></i>';
        }
        elseif($Currency=='USD')
        {
            return '<i class="fa fa-usd"></i>';
        }
        elseif($Currency=='EU')
        {
            return '<i class="fa fa-eur"></i>';
        }
    }

    function tplCard($card)
    {
        include 'tpl/tplCard.php';
        return $res;
    }

    function GetCardPrice($card)
    {
        $Product = GetPageInfo($this->ProductPage);
        $pocket = $card['pocket'];

        $price=$Product->TV['price_'.$pocket];
        $summa=0;
        for ($i = 1; $i <= ($card['ins_count'] + 0); $i++) {
            if (isset($card['ins_FIO_' . $i])) {
                $summa+=$price;
            }
        }
    }

    function tplInsureInput()
    {
        include 'tpl/tplInsureInput.php';
    }

    function NextStep()
    {
       // print_r($_GET);
        $_SESSION['cart']=$_GET;
        header("Location: /cart.html"); /* Перенаправление броузера */
    }

    /*Страница корзны*/
    function tplCartPage()
    {
        include 'tpl/tplCartPage.php';
    }




    /*выдает цену плана*/
    function GetPocketPrice($plan_n)
    {
        $Product=GetPageInfo($this->ProductPage);
        return $Product->TV['price_'.$plan_n];

    }

    /*Добавляет в корзину застрахованного*/
    function AddInsured()
    {
        $cart=$_GET;
        $res['cart']= $this->tplCard($cart);
        $res['Insurer']=$this->tplInsurer($cart);
        echo json_encode($res);
    }




    /*Добавляет в корзину на чье имя страхуется*/
    function AddU()
    {
        $U = new stdClass();
        $U->u_lastname=mysql_escape_string($_GET['u_lastname']);
        $U->u_name=mysql_escape_string($_GET['u_name']);
        $U->u_surname=mysql_escape_string($_GET['u_surname']);
        $U->u_birthday=mysql_escape_string($_GET['u_birthday']);

        /*Запихиваем в сессию*/
        if(!isset($_SESSION['U']))  $_SESSION['U'] = Array();
        $US= $_SESSION['U'];
        $US[]=$U;
        $_SESSION['U']=$US;
    }

    /*выдает список страхующих лиц*/
    function tplU()
    {

    }


    function tplProductForm($id)
    {
        $this->insurance = GetPageInfo($id);
        include 'tpl/tplProductForm.php';
    }


/*Для списка выбора страхователя*/
    function tplInsurer($cart)
    {
        include "tpl/tplInsurer.php";
        return $res;
    }

    function TestEmail()
    {
        print_r(elex_send_email('elextraza@gmail.com','elex','test msg','test'));
    }

    /*Для аяксов*/
    function Ajax()
    {
        if(isset($_GET['action']))
        {
            if($_GET['action']=='AddInsured')
            {
               $this->AddInsured();
            }
            elseif($_GET['action']=='GetCard')
            {

            }
            elseif($_GET['action']=='AddU')
            {

            }
            elseif($_GET['action']=='tplCard')
            {
                echo $this->tplCard();
            }
            elseif($_GET['action']=='tplU')
            {
                $this->tplU();
            }
            elseif($_GET['action']=='tplInsureInput')
            {
                $this->tplInsureInput();
            }
            elseif($_GET['action']=='NextStep')
            {
                $this->NextStep();
            }
            elseif($_GET['action']=='OrderPay')
            {
                $this->OrderPay();
            }
            elseif($_GET['action']=='tplInsurer')
            {
                $this->tplInsurer($_GET);
            }
            elseif($_GET['action']=='TestEmail')
            {
                $this->TestEmail();
            }
        }
    }

    function GetCartInsuredList()
    {
        $insured = array();
        for ($i = 1; $i <= ($_SESSION['cart']['ins_count'] + 0); $i++) {
            if (isset($_SESSION['cart']['ins_FIO_' . $i])) {
                $obj = new stdClass();
                $obj->surname = $_SESSION['cart']['ins_FIO_' . $i];
                $obj->name = $_SESSION['cart']['ins_name_' . $i];
                $obj->lastname = $_SESSION['cart']['ins_lastname_' . $i];
                $obj->birthday = $_SESSION['cart']['ins_birthday_' . $i];
                $insured[]=$obj;
            }
        }
        return $insured;
    }

    /*выдает инфу по корзине*/
    function GetCart()
    {
        $cart = new stdClass();
        $cart->Insured = $this->GetCartInsuredList();
        $cart->u_lastname = $_SESSION['cart']['u_lastname'];
        $cart->u_name = $_SESSION['cart']['u_name'];
        $cart->u_surname = $_SESSION['cart']['u_surname'];
        $cart->u_birthday = $_SESSION['cart']['u_birthday'];
        $cart->reg_house = $_SESSION['cart']['reg_house'];
        $cart->reg_kv = $_SESSION['cart']['reg_kv'];
        $cart->reg_phone = $_SESSION['cart']['reg_phone'];
        $cart->reg_email = $_SESSION['cart']['reg_email'];
        $cart->u_surname = $_SESSION['cart']['u_surname'];
        return $cart;

    }

    function CartClear()
    {
        unset($_SESSION['cart']);
    }

    function IsCartEmpty()
    {
        if(isset($_SESSION['cart']))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    /*Событите нажатия оплаты*/
    function OrderPay()
    {
        include "tpl/tplEmail.php";

        print_r(elex_send_email($_SESSION['cart']['reg_email'],'Возрождение кредит','Ваш заказ',$msg));
       // $this->CartClear();
       // $res['error']=0;/*Нет ошибок*/
        //echo json_encode($res);

    }

    /*Для снипета*/
    function main($scriptProperties)
    {
        if($scriptProperties['action']=='GetCurrency')
        {
            echo $this->GetCurrency();
        }
        elseif($scriptProperties['action']=='tplCard')
        {
            $this->tplCard();
        }
        elseif($scriptProperties['action']=='tplProductForm')
        {
            $this->tplProductForm($scriptProperties['id']);
        }
        elseif($scriptProperties['action']=='tplCartPage')
        {
            $this->tplCartPage();
        }
    }
}

