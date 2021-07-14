<?php

class Usuarios extends ActiveRecord
{
    
    public function getUsuario($page, $ppage=2)
    {
        return $this->paginate("page: $page", "per_page: $ppage", 'order: id');
    }
}