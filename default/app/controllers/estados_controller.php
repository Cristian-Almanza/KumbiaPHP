<?php

Load::models('estados');
    
    class EstadosController extends AppController{

        public function index($page=1)
        {
            $est = new Estados();
            
            $this->listEstados=$est->getEstado($page);

        }

        public function create()
    {
        
        if (Input::hasPost('estados')) {
            
            $estado = new Estados(Input::post('estados'));
            
            if ($estado->create()) {
                Flash::valid('Operación exitosa');
                
                Input::delete();
                return;
            }
 
            Flash::error('Falló Operación');
        }
    }

    
    public function edit($id)
    {
        $estado = new Estados();
 
        if (Input::hasPost('estados')) {
 
            if ($estado->update(Input::post('estados'))) {
                 Flash::valid('Operación exitosa');
                
                return Redirect::to();
            }
            Flash::error('Falló Operación');
            return;
        }

        
        $this->estados = $estado->find_by_id((int) $id);
 
    }
    
    }