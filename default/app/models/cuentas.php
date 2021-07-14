<?php

class Cuentas extends ActiveRecord
{
    
    public function getCuenta($page, $ppage=2)
    {
        return $this->paginate("page: $page", "per_page: $ppage", 'order: id');
    }
}