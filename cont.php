<?php

include_once('apps.php');

    $firstName = trim($_POST['FirstName']);
    $email = trim($_POST['email']);
    $dt = date('Y-d-m H:i:s');
    $logs="";


    if (empty($firstName)) {

        echo 'Укажите имя';
        $logs = "$dt; Отсутствует имя. Регистрация прошла не успешно ;\r\n";

    } elseif (empty($_POST['LastName'])) {

        echo 'Укажите фамилию';
        $logs = "$dt; Отсутствует фамилия. Регистрация прошла не успешно ;\r\n";
    } elseif (empty($_POST['email']) ||  filter_var($email,FILTER_VALIDATE_EMAIL) == false) {

        echo 'Укажите корректный email';
        $logs = "$dt; Некорректный email. Регистрация прошла не успешно ;\r\n";
    } elseif (empty($_POST['password'])) {

        echo 'Укажите пароль';
        $logs = "$dt; Отсутствует пароль. Регистрация прошла не успешно ;\r\n";
    } elseif (empty($_POST['repeatPassword'])) {

        echo 'Укажите Повторить пароль';
        $logs = "$dt; Отсутствует пароль. Регистрация прошла не успешно ;\r\n";
    } elseif((string)$_POST['password'] !== (string)$_POST['repeatPassword']){
        echo 'Пароли должны совпадать';
        $logs = "$dt; Пароли не совпадают. Регистрация прошла не успешно ;\r\n";
    } else{
            if(addApp($firstName,$email,$dt) == true) {
                $logs = "$dt; Успешная регистрация ;\r\n";
            } else {
                $logs = "$dt; Данные email заняты ;\r\n";
            }
    }

    file_put_contents('logs.txt',$logs,FILE_APPEND);