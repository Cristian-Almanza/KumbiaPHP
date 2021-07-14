<?php
class Ciudades extends ActiveRecord
{
    
    public function getCiudad($page, $ppage=2)
    {
        return $this->paginate("page: $page", "per_page: $ppage", 'order: id');
    }
}