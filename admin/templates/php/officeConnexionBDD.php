<?php
    $list = "SELECT phone, address, mail, days1, days2, hours1, hours2 FROM office";
                                
    $rs_select = $bdd->prepare($list);
    $rs_select->execute();
?>