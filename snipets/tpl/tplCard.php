<?php
$res='<div class="prodplantitle">Стоимость</div>';
$Product = GetPageInfo($this->ProductPage);
$pocket = $card['pocket'];

$price=$Product->TV['price_'.$pocket];
$summa=0;
for ($i = 1; $i <= ($card['ins_count'] + 0); $i++) {
    if (isset($card['ins_FIO_' . $i])) {
        $summa+=$price;
        $res.='<div class="prodstoimostitem">';
            $res.=$card['ins_FIO_' . $i] . ' ' .
                $this->GetLastNameShor($card['ins_name_' . $i]) . ' ' .
                $this->GetLastNameShor($card['ins_lastname_' . $i]);
           $res.='<strong data-new-link="true"> '.$this->GetCurrency() . $price.'</strong></div>';

    }
}

$res.='<div class="chkritog">Итого: <span class="chkritogsumma"> '.$this->GetCurrency() . $summa.'</span></div>';
