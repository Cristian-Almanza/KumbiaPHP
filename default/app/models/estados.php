<?php

    
    class Estados extends ActiveRecord{	
    
        public function getEstado($page, $ppage=2)
    {
        return $this->paginate("page: $page", "per_page: $ppage",'order: id');
    }
    }