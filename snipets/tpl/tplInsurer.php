<?php

$Product = GetPageInfo($this->ProductPage);
$pocket = $cart['pocket'];
$res='';
$price=$Product->TV['price_'.$pocket];
$summa=0;
for ($i = 1; $i <= ($cart['ins_count'] + 0); $i++) {
    if (isset($cart['ins_FIO_' . $i])) {
        $summa+=$price;
        $res.='<div id="insurer_'.$i.'" class="sruseritem click" onclick="John.SelectInsurer('.$i.')">'.$cart['ins_FIO_' . $i] . ' ' .$cart['ins_name_' . $i].' ' .$cart['ins_lastname_' . $i].'</div>';

    }
}




