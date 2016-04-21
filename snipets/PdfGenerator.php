<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.02.2016
 * Time: 9:12
 */
// include autoloader
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

class PdfGenerator
{

    function Gen()
    {


        $dompdf = new DOMPDF();

        $html = <<<'ENDHTML'
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" lang="ru">
</head>
 <body>
  <script type="text/php">
if (isset($pdf)) {
    // open the PDF object - all drawing commands will
    // now go to the object instead of the current page
    $footer = $pdf->open_object();

    // get height and width1 of page
    $w = $pdf->get_width();
    $h = $pdf->get_height();

    // get font
    $font = Font_Metrics::get_font("DejaVu Sans", "normal");
    $txtHeight = Font_Metrics::get_font_height($font, 8);

    // draw a line along the bottom
    $y = $h - 2 * $txtHeight - 24;
    $color = array(0, 0, 0);
    $pdf->line(16, $y, $w - 16, $y, $color, 1);

    // set page number on the left side
    $pdf->page_text(16, $y, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 8, $color);
    // set additional text
    $text = "Dompdf is awesome";
    $width1 = Font_Metrics::get_text_width1($text, $font, 8);
    $pdf->text($w - $width1 - 16, $y, $text, $font, 8);

    // close the object (stop capture)
    $pdf->close_object();

    // add the object to every page (can also specify
    // "odd" or "even")
    $pdf->add_object($footer, "all");
}
  </script>
  <style>
<!--
 /* Font Definitions */

 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:8px;
	}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-link:"Верхний колонтитул Знак";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:8px;
	}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-link:"Нижний колонтитул Знак";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:8px;
	}
a:link, span.MsoHyperlink
	{color:blue;
	text-decoration:underline;}
a:visited, span.MsoHyperlinkFollowed
	{color:purple;
	text-decoration:underline;}
span.a
	{mso-style-name:"Верхний колонтитул Знак";
	mso-style-link:"Верхний колонтитул";
	}
span.a0
	{mso-style-name:"Нижний колонтитул Знак";
	mso-style-link:"Нижний колонтитул";
	}
.MsoPapDefault
	{margin-bottom:10px;
	line-height:115%;}
 /* Page Definitions */
 @page Section1
	{size:595.3pt 841.9pt;
	margin:1.0cm 1.0cm 14.2pt 1.0cm;}
div.Section1
	{page:Section1;}
-->
</style>


<div class=Section1>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width1=458 valign=top style='width1:274.7pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal><span style='position:absolute;z-index:1;margin-left:1px;
  margin-top:0px;width1:246px;height:74px'><img width1=246 height=74
  src="Полис.files/image001.jpg" alt="Фирменный стиль для WORD"></span></p>
  </td>
  <td width1=458 valign=top style='width1:274.7pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>Страховщик</span></b><span
  style='font-size:8px'>ООО КСК «Возрождение-Кредит»,    660037  </span></p>
  <p class=MsoNormal style='text-align:justify'><span style='font-size:8px'>г.
  Красноярск пр. им. газеты «Красноярский рабочий», 59 расчетный счет
  40701810875150000000 Восточно-Сибирский филиал ПАО Росбанк г. Красноярск
  корреспондентский      счет30101810000000000388,БИК 040407388, ИНН 2462002983,
  КПП 246201001, ОГРН 1022402057358</span></p>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>тел</span></b><b><span
  lang=EN-US style='font-size:8px'>.(391)201-35-66, 201-22-93 e-mail:
  vk@vzkr.ru, www.vzkr.ru</span></b></p>
  </td>
 </tr>
 <tr>
  <td width1=458 style='width1:274.7pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal><b><span lang=EN-US style='font-size:10px'>&nbsp;</span></b></p>
  <p class=MsoNormal><b><span style='font-size:14px'>СТРАХОВОЙ ПОЛИС </span></b></p>
  </td>
  <td width1=458 valign=bottom style='width1:274.7pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal><b><span style='font-size:14px'>серия ??<a name="_GoBack"></a>
  №<span style='color:red'>000001</span></span></b></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='line-height:50%'>&nbsp;</p>

<p class=MsoNormal style='text-align:justify'><i><span style='font-size:8px'>Настоящий
страховой полис удостоверяет факт заключения Договора добровольного страхования
на случай укуса клеща (далее - Договор), на основании устного заявления
Страхователя, в соответствии с Правилами № 021 добровольного страхования на
случай укуса клеща от 12.12.2013г. (далее - Правила № 021 от 12.12.2013г.),
Программой № 5 добровольного страхования на случай укуса клеща (далее -
Программа № 5), Лицензией Банка России СЛ №1440 от 02.09.2015г.</span></i></p>

<p class=MsoNormal style='text-align:justify'><i><span style='font-size:8px'>                    </span></i></p>

<p class=MsoNormal style='text-align:justify;line-height:50%'><span
style='font-size:8px;line-height:50%'>                                       </span></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width1=910
 style='width1:545.75pt;margin-left:-1.7pt;border-collapse:collapse'>
 <tr>
  <td width1=154 valign=top style='width1:92.15pt;border:none;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal><b><span style='font-size:8px'>Страхователь (ФИО)</span></b></p>
  </td>
  <td width1=307 valign=top style='width1:184.3pt;border:solid windowtext 1px;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><span style='font-size:8px;
  color:red'>Иванов Иван Иванович</span></p>
  </td>
  <td width1=118 valign=top style='width1:70.85pt;border:none;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=right style='text-align:right'><b><span
  style='font-size:8px'>Дата рождения</span></b></p>
  </td>
  <td width1=118 valign=top style='width1:70.9pt;border:solid windowtext 1px;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal><span style='font-size:8px;color:red'>01.01.2001 г.</span></p>
  </td>
  <td width1=106 valign=top style='width1:63.8pt;border:none;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=right style='text-align:right'><b><span
  style='font-size:8px'>Телефон</span></b></p>
  </td>
  <td width1=106 valign=top style='width1:63.75pt;border:solid windowtext 1px;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal><span style='font-size:8px;color:red'>+79131729400</span></p>
  </td>
 </tr>
 <tr>
  <td width1=154 valign=top style='width1:92.15pt;border:none;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal><b><span style='font-size:8px'>Адрес Страхователя</span></b></p>
  </td>
  <td width1=307 valign=top style='width1:184.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><span style='font-size:8px;
  color:red'>г. Красноярск, пр. Красноярский рабочий, 59 - 201</span></p>
  </td>
  <td width1=118 valign=top style='width1:70.85pt;border:none;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=right style='text-align:right'><b><span
  style='font-size:8px'>Паспорт</span></b></p>
  </td>
  <td width1=118 valign=top style='width1:70.9pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal><span style='font-size:8px;color:red'>00 04 000001</span></p>
  </td>
  <td width1=106 valign=top style='width1:63.8pt;border:none;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=right style='text-align:right'><b><span lang=EN-US
  style='font-size:8px'>E</span></b><b><span style='font-size:8px'>-</span></b><b><span
  lang=EN-US style='font-size:8px'>mail</span></b></p>
  </td>
  <td width1=106 valign=top style='width1:63.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:8px;color:red'>ivan@mail.ru</span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='line-height:50%'><span style='font-size:8px;
line-height:50%'>                    </span></p>

<p class=MsoNormal style='margin-right:-.3pt;text-align:justify'><b><span
style='font-size:8px'>Страховой случай:</span></b><span style='font-size:
8px'> совершившиеся в период действия Договора документально подтвержденные
обращения Застрахованного в медицинские и иные учреждения, оговоренные в
Перечне медицинских учреждений, для проведения профилактики клещевых инфекций;
за медицинскими и иными услугами вследствие укуса клеща; при подозрении на
заболевание и/или заболевании, переносчиком которого является клещ; смерть
Застрахованного в результате заболевания, переносимого клещом.</span></p>

<p class=MsoNormal style='margin-right:-.3pt;text-align:justify'><b><span
style='font-size:8px'>                    </span></b></p>

<p class=MsoNormal style='margin-right:-.3pt;text-align:justify;line-height:
50%'><span style='font-size:8px;line-height:50%'>&nbsp;</span></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width1=898
 style='width1:19.0cm;margin-left:5.4pt;border-collapse:collapse;border:none'>
 <tr>
  <td width1=42 style='width1:25.15pt;border:solid windowtext 1px;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>№ п/п</span></b></p>
  </td>
  <td width1=395 style='width1:237.1pt;border:solid windowtext 1px;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-right:-4.75pt;text-align:center'><b><span
  style='font-size:10px'>Застрахованный (ФИО)</span></b></p>
  </td>
  <td width1=134 style='width1:80.25pt;border:solid windowtext 1px;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-right:-3.6pt;text-align:center'><b><span
  style='font-size:10px'>Дата рождения</span></b></p>
  </td>
  <td width1=162 style='width1:96.95pt;border:solid windowtext 1px;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-right:-4.65pt;text-align:center'><b><span
  style='font-size:10px'>Страховая сумма</span></b></p>
  <p class=MsoNormal align=center style='margin-right:-4.65pt;text-align:center'><b><span
  style='font-size:10px'>(руб.)</span></b></p>
  </td>
  <td width1=165 style='width1:99.2pt;border:solid windowtext 1px;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-right:-6.1pt;text-align:center'><b><span
  style='font-size:10px'>Страховая премия</span></b></p>
  <p class=MsoNormal align=center style='margin-right:-6.1pt;text-align:center'><b><span
  style='font-size:10px'>(руб.)</span></b></p>
  </td>
 </tr>
 <tr>
  <td width1=42 valign=top style='width1:25.15pt;border:solid windowtext 1px;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-right:-5.1pt;text-align:center'><span
  lang=EN-US style='font-size:10px;color:red'>1</span></p>
  </td>
  <td width1=395 valign=top style='width1:237.1pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><span style='font-size:10px;
  color:red'>Иванов Иван Иванович</span></p>
  </td>
  <td width1=134 valign=top style='width1:80.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10px;color:red'>01.01.2001 г.</span></p>
  </td>
  <td width1=162 valign=top style='width1:96.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10px;color:red'>500&nbsp;000,00</span></p>
  </td>
  <td width1=165 valign=top style='width1:99.2pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10px;color:red'>380,00</span></p>
  </td>
 </tr>
 <tr>
  <td width1=42 valign=top style='width1:25.15pt;border:solid windowtext 1px;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px;color:red'>2 </span></b></p>
  </td>
  <td width1=395 valign=top style='width1:237.1pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:10px;
  color:red'>&nbsp;</span></b></p>
  </td>
  <td width1=134 valign=top style='width1:80.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>&nbsp;</span></b></p>
  </td>
  <td width1=162 valign=top style='width1:96.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>&nbsp;</span></b></p>
  </td>
  <td width1=165 valign=top style='width1:99.2pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr>
  <td width1=42 valign=top style='width1:25.15pt;border:solid windowtext 1px;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px;color:red'>3</span></b></p>
  </td>
  <td width1=395 valign=top style='width1:237.1pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:10px;
  color:red'>&nbsp;</span></b></p>
  </td>
  <td width1=134 valign=top style='width1:80.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>&nbsp;</span></b></p>
  </td>
  <td width1=162 valign=top style='width1:96.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>&nbsp;</span></b></p>
  </td>
  <td width1=165 valign=top style='width1:99.2pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr>
  <td width1=42 valign=top style='width1:25.15pt;border:solid windowtext 1px;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px;color:red'>4</span></b></p>
  </td>
  <td width1=395 valign=top style='width1:237.1pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:10px;
  color:red'>&nbsp;</span></b></p>
  </td>
  <td width1=134 valign=top style='width1:80.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>&nbsp;</span></b></p>
  </td>
  <td width1=162 valign=top style='width1:96.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>&nbsp;</span></b></p>
  </td>
  <td width1=165 valign=top style='width1:99.2pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr>
  <td width1=42 valign=top style='width1:25.15pt;border:solid windowtext 1px;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px;color:red'>5</span></b></p>
  </td>
  <td width1=395 valign=top style='width1:237.1pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:10px;
  color:red'>&nbsp;</span></b></p>
  </td>
  <td width1=134 valign=top style='width1:80.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>&nbsp;</span></b></p>
  </td>
  <td width1=162 valign=top style='width1:96.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>&nbsp;</span></b></p>
  </td>
  <td width1=165 valign=top style='width1:99.2pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr>
  <td width1=42 valign=top style='width1:25.15pt;border:solid windowtext 1px;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px;color:red'>6</span></b></p>
  </td>
  <td width1=395 valign=top style='width1:237.1pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:10px;
  color:red'>&nbsp;</span></b></p>
  </td>
  <td width1=134 valign=top style='width1:80.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>&nbsp;</span></b></p>
  </td>
  <td width1=162 valign=top style='width1:96.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>&nbsp;</span></b></p>
  </td>
  <td width1=165 valign=top style='width1:99.2pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><b><span
  style='font-size:10px'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr>
  <td width1=571 colspan=3 valign=top style='width1:342.5pt;border:solid windowtext 1px;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=right style='text-align:right'><span
  style='font-size:10px'>Итого:</span></p>
  </td>
  <td width1=162 valign=top style='width1:96.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10px;color:red'>500&nbsp;000,00</span></p>
  </td>
  <td width1=165 valign=top style='width1:99.2pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1px;border-right:solid windowtext 1px;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10px;color:red'>380,00</span></p>
  </td>
 </tr>
 <tr>
  <td width1=898 colspan=5 valign=top style='width1:19.0cm;border:solid windowtext 1px;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><span style='font-size:10px'>Итого
  страховая премия:<span style='color:red'>Триста восемьдесят рублей 00 копеек</span></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='line-height:50%'><b><span style='font-size:8px;
line-height:50%'>&nbsp;</span></b></p>

<p class=MsoNormal><b><span style='font-size:8px'>&nbsp;</span></b></p>

<p class=MsoNormal><b><span style='font-size:8px'>Лимиты ответственности по
Программе № 5:       </span></b><span style='font-size:8px'>                                       </span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:8px'>Оплата
медицинских препаратов, диагностики, лечения (кроме
реабилитационно-восстановительного) на сумму до 250 000 рублей;</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:8px'>Оплата
реабилитационно-восстановительного лечения на сумму до 150 000 рублей;               </span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:8px'>Выплата
в случае смерти Застрахованного 100 000 рублей.</span><span style='font-size:
7px'>   </span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:8px'>                                                                               </span></p>

<p class=MsoNormal style='text-align:justify;line-height:50%'><span
style='font-size:8px;line-height:50%'>&nbsp;</span></p>

<p class=MsoNormal><b><span style='font-size:8px'>Срок страхования:  </span></b><span
style='font-size:8px;color:red'>с 00:00 11.04.2016 г. по 24:00 10.04.2017 г.</span></p>

<p class=MsoNormal><span style='font-size:8px;color:red'>&nbsp;</span></p>

<p class=MsoNormal style='line-height:50%'><span style='font-size:8px;
line-height:50%'>                                                                                                                                          </span></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
 style='margin-left:5.4pt;border-collapse:collapse;border:none'>
 <tr>
  <td width1=118 style='width1:70.9pt;border:solid windowtext 1px;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal><span style='font-size:8px'>Особые условия</span></p>
  </td>
  <td width1=782 valign=top style='width1:469.1pt;border:solid windowtext 1px;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><span style='font-size:8px'>При
  повторных укусах клеща введение иммуноглобулина производится не ранее, чем
  через 31 день после предыдущего введения профилактической дозы
  иммуноглобулина.</span></p>
  <p class=MsoNormal style='text-align:justify'><span style='font-size:8px'>Настоящим
  стороны определили, что факсимильное воспроизведение подписи уполномоченного
  Страховщиком лица и оттиска печати Страховщика имеют правовую силу
  оригинальной собственной подписи уполномоченного Страховщиком лица и оттиска
  печати Страховщика.</span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='text-align:justify;line-height:50%'><span
style='font-size:7px;line-height:50%'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:7px'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:7px'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify;text-indent:1.0cm'><span
style='font-size:8px'>Страхователь дает согласие (подтверждает наличие
письменного согласия каждого Застрахованного, в пользу которого заключен
Договор) на обработку персональных данных, указанных в Договоре, в соответствии
с Федеральным законом от 27.07.2006г. №150-ФЗ «О персональных данных». Данное
согласие предоставляется в целях исполнения Договора с момента его подписания и
действует в течение пяти лет после исполнения договорных обязательств.
Страховщику так же предоставляется согласие на получение и дальнейшую обработку
данных, касающихся состояния здоровья Застрахованных и иных сведений,
составляющих врачебную тайну, в соответствии с положениями действующего
законодательства. Страхователь дает согласие на информирование о других
продуктах и услугах Страховщика. Согласие может быть отозвано письменным
заявлением субъекта персональных данных.</span></p>

<p class=MsoNormal style='text-align:justify;text-indent:1.0cm'><span
style='font-size:8px'>Подтверждаю, что Застрахованный не страдает следующими
заболеваниями: онкологическими, туберкулезом, сахарным диабетом (все формы),
венерическими, психическими, алкоголизмом, наркоманией, токсикоманией, СПИДом,
бронхиальной астмой, тяжелыми расстройствами центральной нервной системы и не
является инвалидом I, II групп, не находится на амбулаторном (стационарном)
лечении. На момент заключения Договора отрицаю факт укуса клещом
Застрахованных. Подтверждаю полноту и достоверность сведений, изложенных в
Договоре.</span></p>

<p class=MsoNormal style='text-align:justify;text-indent:1.0cm'><span
style='font-size:8px'>Страхователь с Правилами № 021 от 12.12.2013г.,
Программой № 5 , Перечнем медицинских учреждений ознакомлен и согласен,
Правила № 021 от 12.12.2013г.,  Программу № 5, Перечень медицинских учреждений
и медицинские карточки (по количеству Застрахованных) получил. Страхователь
принимает на себя обязательство по  доведению до сведения каждого
Застрахованного и выдачу им Правил № 021 от 12.12.2013г., Программы № 5,
Перечня медицинских учреждений и медицинской карточки. </span></p>

<p class=MsoNormal style='text-align:justify;text-indent:1.0cm'><span
style='font-size:8px'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify;text-indent:1.0cm'><span
style='font-size:8px'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify;text-indent:1.0cm'><span
style='font-size:8px'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify;text-indent:1.0cm'><span
style='font-size:8px'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify;text-indent:1.0cm'><span
style='font-size:8px'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify;text-indent:1.0cm'><span
style='font-size:8px'>&nbsp;</span></p>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 style='margin-left:5.4pt;border-collapse:collapse;border:none'>
 <tr>
  <td width1=299 valign=top style='width1:179.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>Страхователь</span></b></p>
  </td>
  <td width1=299 valign=top style='width1:179.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>Страховщик</span></b></p>
  </td>
  <td width1=299 valign=top style='width1:179.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr>
  <td width1=299 valign=top style='width1:179.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>&nbsp;</span></b></p>
  </td>
  <td width1=299 valign=top style='width1:179.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>&nbsp;</span></b></p>
  </td>
  <td width1=299 valign=top style='width1:179.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr>
  <td width1=299 valign=top style='width1:179.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>Ф.И.О.
  <span style='color:red'>Иванов Иван Иванович</span></span></b></p>
  </td>
  <td width1=299 valign=top style='width1:179.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>Ф.И.О.
  Ревкуц Наталья Валерьевна</span></b></p>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>(Здесь
  будет факсим. Подпись и оттиск печати)</span></b></p>
  </td>
  <td width1=299 valign=top style='width1:179.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>М.П.</span></b></p>
  </td>
 </tr>
 <tr>
  <td width1=299 valign=top style='width1:179.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>&nbsp;</span></b></p>
  </td>
  <td width1=299 valign=top style='width1:179.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=right style='text-align:right'><b><span
  style='font-size:8px'>&nbsp;</span></b></p>
  </td>
  <td width1=299 valign=top style='width1:179.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr>
  <td width1=299 valign=top style='width1:179.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>Подпись_________________________</span></b></p>
  </td>
  <td width1=299 valign=top style='width1:179.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>Подпись_________________________</span></b></p>
  </td>
  <td width1=299 valign=top style='width1:179.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='text-align:justify'><b><span style='font-size:8px'>Дата
  выдачи страхового полиса <span style='color:red'>01.01.2016г.</span></span></b></p>
  </td>
 </tr>
</table>

<p class=MsoNormal>&nbsp;</p>

</div>

 </body>
</html>
ENDHTML;

        $dompdf->load_html($html);
        $dompdf->render();

        $dompdf->stream("hello.pdf");

    }
}