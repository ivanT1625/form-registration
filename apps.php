<?php

    function getApps():array
    {
        $getContentsUser = file_get_contents('apps.txt');
        return json_decode($getContentsUser,true);

    }
    
    function addApp(string $FirstName, string $email, $dt ): bool{
        $getContentsUser = getApps();

        if(empty($getContentsUser)){
            $idContent=1;
        } else {
            foreach ($getContentsUser as $value){
                    if($_POST['email'] == $value["email"] ) {
                        echo "Данные email заняты";
                        return false;
                    }
            }
            $idContent = (int)current(end($getContentsUser));
            $idContent+= 1;
        }


        $newUser = ['id' => (string)$idContent, 'FerstName'=> $FirstName, 'email' => $email];
        $getContentsUser[] = $newUser;

        return saveApps($getContentsUser);
    }
    

    function saveApps(array $array ) : bool {
        $str = json_encode($array,JSON_UNESCAPED_UNICODE);
        file_put_contents('apps.txt',$str);
        echo "Вы успешно зарегестрировались";
        return true;
    }