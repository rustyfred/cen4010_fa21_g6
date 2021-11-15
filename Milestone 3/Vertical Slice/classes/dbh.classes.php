<?php

class Dbh {

    protected function connect() {
        try {
            // $username = "cen4010_fa21_g06";
            // $password = "Teamg6RCFKT";
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=cen4010_fa21_g06', $username, $password);
            return $dbh;
        } 
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}