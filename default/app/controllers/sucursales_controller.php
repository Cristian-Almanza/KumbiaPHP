<?php

Load::models('sucursales');
    
    class SucursalesController extends AppController{	
        
        public function index($page=1){

            $su=new Sucursales();

            $this->listSucursales=$su->getSucursal($page);

        }

        public function create()
        {
        
            if (Input::hasPost('sucursales')) {
                
                $sucursal = new Sucursales(Input::post('sucursales'));
                
                if ($sucursal->create()) {
                    Flash::valid('Operación exitosa');
                    
                    Input::delete();
                    return;
                }
    
                Flash::error('Falló Operación');
            }
        }

        
        public function edit($id)
        {
            $sucursal = new Sucursales();
    
            if (Input::hasPost('sucursales')) {
    
                if ($sucursal->update(Input::post('sucursales'))) {
                    Flash::valid('Operación exitosa');

                    return Redirect::to();
                }
                Flash::error('Falló Operación');
                return;
            }

            $this->sucursales = $sucursal->find_by_id((int) $id);
    
        }
    }