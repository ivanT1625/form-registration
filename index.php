<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="jquery-3.6.3.min.js"></script>
</head>

<body class="bg-success-subtle">

    <div class="form_container mb-3 w-25 position-absolute top-50 start-50 translate-middle ">
        <p id="message1" class="text-white m-2%" style="font-size: 3pc"></p>
        <p id="message2" class="text-danger"></p>
        <form = "form-send">

            <label class="form-label">Имя</label><br>
            <input class="form-control" type="text" name="FirstName"><br>

            <label class="form-label">Фамилия</label><br>
            <input class="form-control" type="text" name="LastName"><br>

            <label class="form-label">Email</label><br>
            <input class="form-control" type="email" name="email"><br>

            <label class="form-label">Пароль</label><br>
            <input class="form-control" type="password" name="password"><br>

            <label class="form-label">Повторите пароль</label><br>
            <input class="form-control" type="password" name="repeatPassword"><br>
            <br>
            <div class="mx-auto" style="width: 100px">
                <button class=" btn btn-primary " type="submit">Отправить</button>
            </div>
        </form>
    </div>





<script type="text/javascript" >

         $('form').submit(function(){
             let str = $(this).serialize();
             $.ajax({
                 url: 'cont.php',
                 method: 'post',
                 dataType: 'html',
                 data: str,
                 success: function(html){
                     if(html === "Вы успешно зарегестрировались"){
                         $('form').hide();
                         $("#message2").slideToggle(0);
                         $("#message1").html(html);
                     } else{
                         $("#message2").html(html);
                     }
                 }
             });
             return false;
         });
</script>

</body>

</html>