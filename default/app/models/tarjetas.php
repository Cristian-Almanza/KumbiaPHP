<?php

class Tarjetas extends ActiveRecord
{
    
    public function getTargeta($page, $ppage=2)
    {
        return $this->paginate("page: $page", "per_page: $ppage", 'order: id');
    }
}