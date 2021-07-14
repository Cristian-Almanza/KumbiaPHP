<?php

Load::models('tarjetas');
    
    class TarjetasController extends AppController{	
        
        public function index($page=1){

            $su=new Tarjetas();

            $this->listTargetas=$su->getTargeta($page);

        }

        public function create()
        {
        
            if (Input::hasPost('tarjetas')) {
                
                $tarjeta = new Tarjetas(Input::post('tarjetas'));
                
                if ($tarjeta->create()) {
                    Flash::valid('Operación exitosa');
                    
                    Input::delete();
                    return;
                }
    
                Flash::error('Falló Operación');
            }
        }

        
        public function edit($id)
        {
            $tarjeta = new Tarjetas();
    
            if (Input::hasPost('tarjetas')) {
    
                if ($tarjeta->update(Input::post('tarjetas'))) {
                    Flash::valid('Operación exitosa');

                    return Redirect::to();
                }
                Flash::error('Falló Operación');
                return;
            }

            $this->tarjetas = $tarjeta->find_by_id((int) $id);
    
        }
    }