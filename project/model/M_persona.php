<?php
 //se DECLARA la clase con todos sus atributos
 class Person {

    private $db;
    private $person;

    public function __construct(){
        $this->db = conex();
        $this->person = array();
    }

    public function get_person(){

        $sql = "select * from persona";
        $resultado = $this->db->query($sql);
        while ($r =$resultado->fetch_assoc())
        {
            $this->person[] = $r;
        }
        return $this->person;
    }

 }



?>