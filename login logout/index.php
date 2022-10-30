<?php
    echo "Kullanici Adi = Berkay ";
    echo "<br> Sifre = Java </br>";
    $message = "";
    session_start();
    if(isset($_SESSION["GirisDurumu"])){
        if( $_SESSION["GirisDurumu"] == 1){
            $message=basariliGiris();
        } else{
            $message = "";
        }
    }

        function basariliGiris(){
        ob_start();
        

        $message = " Giris Basarili ";
        ?>
        <form action=""><button name="Cikis">  Cikis </button></form>
            

            <?php

        return $message;
    }

        function hataliGiris(){
        $message = "  Hatali Giris ";
        return $message;
    }

    if(isset($_POST['kullanici_adi']) && ($_POST['sifre'])){
        $kullaniciAdi = "Berkay";
        $sifre = "Java";

        if ($_POST['kullanici_adi'] == $kullaniciAdi && $_POST['sifre'] == $sifre){
            $message = basariliGiris();
            $_SESSION["GirisDurumu"] = 1;
        }else{
            $message = hataliGiris();
            $_SESSION["GirisDurumu"] = 0;
            ob_end_clean();
        }
    }   
    if (isset($_GET["Cikis"])){
        $_SESSION["GirisDurumu"] = 0;
    }
?>

<html lang="tr">
<head>
    <meta charset="UTF-8">
 
</head>
<body>
    <form action="" method="post">
        <input type="text" name="kullanici_adi" placeholder="" />
        <input type="password" name="sifre" placeholder="" />
        <input type="submit" value="Giris">
    </form>
    <?php
        echo $message;
    ?>
</body>
</html>
