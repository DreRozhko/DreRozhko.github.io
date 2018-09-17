<?php
header("Content-Type: text/html; charset=utf-8");
$email = htmlspecialchars($_POST["email"]);
$name = htmlspecialchars($_POST["name"]);
$text = htmlspecialchars($_POST["text"]);
$tel = htmlspecialchars($_POST["tel"]);


$refferer = getenv('HTTP_REFERER');
$date=date("d.m.y"); // число.месяц.год  
$time=date("H:i"); // часы:минуты:секунды 
$myemail = "drerozhko@yandex.ru , drerozhko@mail.ru";

$tema = "Заказ звонка";
$message_to_myemail = "Текст письма:
<br><br>
Имя: $name<br>
Процедура: $text<br>
E-mail: $email<br>
Телефон: $tel<br>

Источник (ссылка): $refferer
";

mail($myemail, $tema, $message_to_myemail, "From: Beauty cosmetology <drerozhko@yandex.ru> \r\n Reply-To: Beauty cosmetology \r\n"."MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n" );


$tema = "Заявка на звонок";
$message_to_myemail = "
Ваша заявка принята! <br>
Скоро мы с вами свяжемся!
";
$myemail = $email;
mail($myemail, $tema, $message_to_myemail, "From: LAB Consalting <reg@wayup.in> \r\n Reply-To: LAB Consalting \r\n"."MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n" );


$f = fopen("leads.xls", "a+");
fwrite($f," <tr>");    
fwrite($f," <td>$email</td> <td>$name</td> <td>$tel</td>   <td>$date / $time</td>");   
fwrite($f," <td>$refferer</td>");    
fwrite($f," </tr>");  
fwrite($f,"\n ");    
fclose($f);


?>