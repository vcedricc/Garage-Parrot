<?php
    $list = "SELECT id, title1, pictures1, pictures2, textCourt, underTitle1, text1, underTitle2, text2, text3, price, duration, notation, title2 FROM prestations";
                                
    $rs_select = $bdd->prepare($list);
    $rs_select->execute();
?>