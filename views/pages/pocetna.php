<?php
    require "models/pocetna.php";
?>

<div id="naslovna">
    <img src="assets/img/naslovna.jpg" alt="Naslovna">
</div>
    <h1>Ofinger</h1>
    <hr>

<div class="tekst">

    <?php
        foreach($text as $t):
    ?>

        <div class="blok">
        <i class="fas fa-store"></i><span><?=$t?></span>
        </div>

    <?php
        endforeach;
    ?>

</div>
<h2>Naše prednosti</h2>
<hr>
<div class="tekst">
<?php
        foreach($text2 as $ind=>$t):
    ?>

        <div class="blok drugi">
                <i class="fas <?=$t['ico']?>"></i>
                <h3><?=$t['naslov']?></h3>
                <p><?=$t['tekst']?></p>

        </div>

    <?php
        endforeach;
    ?>
</div>
