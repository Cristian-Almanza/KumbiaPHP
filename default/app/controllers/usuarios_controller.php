<?php

Load::models('usuarios');
    class UsuariosController extends AppController{	

        public function index($page=1){

            $us= new Usuarios();
            $this->listUsuarios=$us->getUsuario($page);

        }

        public function create()
        {
        
            if (Input::hasPost('usuarios')) {
                
                $usuario = new Usuarios(Input::post('usuarios'));
                
                if ($usuario->create()) {
                    Flash::valid('Operación exitosa');
                    
                    Input::delete();
                    return;
                }
    
                Flash::error('Falló Operación');
            }
        }

        
        public function edit($id)
        {
            $usuario = new Usuarios();
    
            if (Input::hasPost('usuarios')) {
    
                if ($usuario->update(Input::post('usuarios'))) {
                    Flash::valid('Operación exitosa');

                    return Redirect::to();
                }
                Flash::error('Falló Operación');
                return;
            }

            $this->usuarios = $usuario->find_by_id((int) $id);
    
        }
    
    }