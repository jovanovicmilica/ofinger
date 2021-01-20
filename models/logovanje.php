<?php
session_start();
require_once "../config/connection.php";
header('Content-Type:application/json');
if(isset($_POST['dugmeLog'])){
    $mail=$_POST['mail'];
    $pass=$_POST['pass'];

    $regEmail="/^\w[.\d\w]*\@[a-z]{2,10}(\.[a-z]{2,3})+$/";
    $regPass="/^.{4,50}$/";
    $greske=[];
        if(!preg_match($regEmail,$mail)){
            array_push($greske,"Format e-maila: milica.jovanovic.88.18@ict.edu.rs");
        }
        if(!preg_match($regPass,$pass) && strlen($pass)<8){
            array_push($greske,"Lozinka mora imati barem 8 karaktera");
        }
    if(count($greske)==0){
        $upit="SELECT * FROM korisnik k INNER JOIN uloga u ON k.iduloga=u.iduloga WHERE email=:mail AND lozinka=:pass";
        $pass=md5($pass);
        $priprema=$conn->prepare($upit);
        $priprema->bindParam(":mail",$mail);
        $priprema->bindParam(":pass",$pass);
        try{
            $priprema->execute();
            if($priprema->rowCount()==1){
                $korisnik=$priprema->fetch();
                $_SESSION['korisnik']=$korisnik;
                $kod=201;
                $data="OK";
            }
            else{
                $kod=422;
                $data = "Korisnik nije pronadjen!";
                mail($mail, "Obaveštenje", "Neko je probao da se uloguje sa Vasom e-mail adresom", "Prodavnica ofinger");
            }
        }
        catch(PDOException $e){
            $kod=500;
            $data = "Doslo je do greske sa serverom";
            zabeleziGresku($e);
        }
        
    }
}   
else{
    $kod=404;
    $poruka="Stranica nije pronadjena";
}

echo json_encode($data);
http_response_code($kod);
?>