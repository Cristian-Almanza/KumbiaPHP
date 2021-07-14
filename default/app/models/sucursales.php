<?php
    
    class Sucursales extends ActiveRecord{	
    
        public function getSucursal($page, $ppage=2)
        {
            return $this->paginate("page: $page", "per_page: $ppage",'order: id');
        }
    }