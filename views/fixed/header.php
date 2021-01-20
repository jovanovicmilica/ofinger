<?php
session_start();
require "config/connection.php";

$prikaz=0;
if(isset($_SESSION['korisnik'])){
    $korisnik=$_SESSION['korisnik'];
    $uloga=$korisnik->nazivuloge;
    $imePrezime=$korisnik->ime.' '.$korisnik->prezime;
    if($uloga=='Admin'){
        $prikaz=1;
    }
}
?>

<header id="header">
<div id="logo">
    <a href="index.php">Ofinger</a>
</div>
<nav>
    <ul>
<?php
    if($prikaz==0){
        $dohvatimeni="SELECT * FROM meni WHERE prikaz=0";
        $meni=executeQuery($dohvatimeni);
    }
    else{
        $dohvatimeni="SELECT * FROM meni ";
        $meni=executeQuery($dohvatimeni);
    }
    //var_dump($meni);
    foreach($meni as $m):
?>
    <li>
        <a href="<?=$m->putanja?>"><?=$m->naziv?></a>
    </li>

<?php
    endforeach;
?>
</ul>
</nav>
</header>
<div id="log">

<?php
    if(isset($_SESSION['korisnik'])):
?>
    <div id="korisnik">
        <div id="slika">
        <img src="<?=$korisnik->slikakorisnika?>" alt="">
        </div>
        <span><?=$imePrezime?></span>
    </div>
    <a href="#" id="odjava">Odjavi se</a>
<?php
    else:
?>
    <div></div>
    <a href="index.php?page=reg">Uloguj se / Registruj se</a>
<?php 
    endif;
?>
</div>