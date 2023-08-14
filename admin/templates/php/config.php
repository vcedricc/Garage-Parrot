<?PHP

// Configuration :        
        try
        {
        $bdd = new PDO('mysql:host=localhost;dbname=parrot;charset=utf8', 'root', '');
        } 
        catch(Exception $e)
        {
            die('Une erreur est survenue : '.$e->getMessage());
        }


