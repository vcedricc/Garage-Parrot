<?php
    $list = "SELECT id, name, firstname, text, prestations, notation, statut FROM notice ORDER BY id DESC";
                                
    $rs_select = $bdd->prepare($list);
    $rs_select->execute();
?>