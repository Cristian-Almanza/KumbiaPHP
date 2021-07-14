<?php
    class Empleados extends ActiveRecord{	
    
        public function getEmpleado($page, $ppage=2)
        {
            return $this->paginate("page: $page", "per_page: $ppage",'order: id');
        }
    }