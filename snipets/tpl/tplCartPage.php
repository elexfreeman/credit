
<div class="chkdatabox">
    <h1 class="chkh1">Проверка данных</h1>

    <?php     if(($_SESSION['cart']['ins_count']+0)>0)  {?>

    <div class="divredline"></div>
    <div class="chkleft">
        <div class="chkstrahlist">
        <?php
        $k=1;
       for($i=1;$i<=($_SESSION['cart']['ins_count']+0);$i++)
       {
           if(isset($_SESSION['cart']['ins_FIO_'.$i]))
           {
               ?>

            <div class="w-clearfix chkstrahitem">
                <div class="stitemnumber"><?php echo $k;$k++; ?></div>
                <div class="chitemtext1">Застрахованный:</div>
                <div class="stitemfio"><?php echo $_SESSION['cart']['ins_FIO_'.$i]." ".$_SESSION['cart']['ins_name_'.$i]." ".$_SESSION['cart']['ins_lastname_'.$i];?></div>
                <div class="shitemdata"><?php echo $_SESSION['cart']['ins_birthday_'.$i];?></div>
            </div>
        <?php
           }
       }
        ?>

        </div>
        <div class="strahovatelinfoblock"><h3 class="chkh3">Страхователь:</h3>

            <div class="strahovatelinfoitem">ФИО: <span class="strhinfoitemspan">
                    <?php echo $_SESSION['cart']['u_lastname'].' '.$_SESSION['cart']['u_name'].' '.$_SESSION['cart']['u_surname']; ?>
                </span></div>
            <div class="strahovatelinfoitem">Дата Рождения: <span class="strhinfoitemspan"><?php echo $_SESSION['cart']['u_birthday'];?></span>
            </div>
            <!--<div class="strahovatelinfoitem">Паспорт: <span class="strhinfoitemspan"></span></div> -->
            <div class="strahovatelinfoitem">Адрес: <span class="strhinfoitemspan">
                    <?php echo $_SESSION['cart']['reg_sity'].' '.$_SESSION['cart']['reg_street'].' '.$_SESSION['cart']['reg_house'].' '.$_SESSION['cart']['reg_kv']; ?>
                </span></div>
            <div class="strahovatelinfoitem">Телефон: <span class="strhinfoitemspan"><?php echo $_SESSION['cart']['reg_phone'];?></span></div>
            <div class="strahovatelinfoitem">e-mail: <span class="strhinfoitemspan"><?php echo $_SESSION['cart']['reg_email'];?></span></div>
        </div>
        <div class="infostext error">Вы не дали свое согласие!</div>
        <div class="w-clearfix commitchkblock">
            <img src="/img/chk-empty.jpg" class="chkbox click" id="agreement_img" onclick="John.Agreement();">
            <input type="hidden" name="agreement" id="agreement" value="0">

            <div class="infostext">Все указанные данные мною верны. С <a class="infos" href="/rule.html">правилами
                    страхования</a> согласен
            </div>
        </div>
    </div>
    <div class="chrr1">
        <div class="chkright">
            <?php
                echo $this->tplCard( $_SESSION['cart']);
            ?>
        </div>
        <input onclick="Order.OrderPay();" type="button" id="payButton" data-loading-text="Подождите..."  class="chkpaybutton" value="Оформить" />
    </div>
    <?php } else {?>
    Корзина пустая
    <?php } ?>
</div>