<?php
    $list = "SELECT id, category, title, price, km, years, pictures1, pictures2, pictures3, textCourt, description1, 
    description2, characteristic FROM vehicules";
                                
    $rs_select = $bdd->prepare($list);
    $rs_select->execute();
?>