<?php

abstract class FactoryBase
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=sql.decinfo-cchic.ca;port=33306;dbname=h24_web_transac_2131820;charset=utf8', 'dev-2131820', 'Cegepdemarde1');
        //a fix
        return $db;
    }
}
