<?php
include "models/proizvod.php";
include "models/ocena.php";
?>

<div class="proizvodi">

    <div class="proizvoddrzac">
        <img src="<?='assets/img/'.$proizvodjedan->slikasrc?>" alt="<?=$proizvodjedan->slikaalt?>">
    </div>
    <div id='opispr'>
        <h2><?=$proizvodjedan->naziv?></h2>
        <br><br>
        <p><?=$proizvodjedan->cena?> RSD</p><br>
        <p>Oceni proizvod:</p>
        <div>
<?php
        $br=1;
        for($i=0;$i<5;$i++):
        if($i<$ocenaround):
?>
        <i class="fas fa-star" data-id="<?=$br?>" data-proizvod="<?=$proizvodjedan->idproizvod?>"></i>
<?php
        else:
?>
        <i class="far fa-star" data-id="<?=$br?>" data-proizvod="<?=$proizvodjedan->idproizvod?>"></i>
<?php
        endif;
        $br++;
        endfor;
?>
        <span>Broj ocena:<?=$broj?></span><br><br>
        <p id="greskaOcena"></p>
        </div>
        <div class="brend">
            <img src="<?='assets/img/'.$proizvodjedan->slikasrcbrend?>" alt="<?=$proizvodjedan->slikaaltbrend?>">
        </div>
        <div id="bojadrzac">
            <p>Boja: <?=$proizvodjedan->vrednost?></p>
        </div>
    </div>

</div>