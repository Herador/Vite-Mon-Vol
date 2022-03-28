<?php 
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=vite_mon_vol;charsel=utf8', 'root', '');
    }catch(Exception $e)
    {die('Erreur'.$e->getMessage());
    }
?>