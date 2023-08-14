<?php
    $list = "SELECT id, user, role FROM users ORDER BY user";
                                
    $rs_select = $bdd->prepare($list);
    $rs_select->execute();
?>