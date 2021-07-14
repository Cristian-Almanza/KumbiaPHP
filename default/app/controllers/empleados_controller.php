<?php

Load::models('empleados');

    class EmpleadosController extends AppController{	

        public function index($page=1){
            //View::template('mi_template');
            $emp= new Empleados();

            $this->listEmpleados=$emp->getEmpleado($page);
        }


        public function create()
    {
        /**
         * Se verifica si el usuario envío el form (submit) y si además
         * dentro del array POST existe uno llamado "menus"
         * el cual aplica la autocarga de objeto para guardar los
         * datos enviado por POST utilizando autocarga de objeto
         */
        if (Input::hasPost('empleados')) {
            /**
             * se le pasa al modelo por constructor los datos del form y ActiveRecord recoge esos datos
             * y los asocia al campo correspondiente siempre y cuando se utilice la convención
             * model.campo
             */
            $empleado = new Empleados(Input::post('empleados'));
            //En caso que falle la operación de guardar
            if ($empleado->create()) {
                Flash::valid('Operación exitosa');
                //Eliminamos el POST, si no queremos que se vean en el form
                Input::delete();
                return;
            }
 
            Flash::error('Falló Operación');
        }
    }

    
    public function edit($id)
    {
        $empleado = new Empleados();
 
        //se verifica si se ha enviado el formulario (submit)
        if (Input::hasPost('empleados')) {
 
            if ($empleado->update(Input::post('empleados'))) {
                 Flash::valid('Operación exitosa');
                //enrutando por defecto al index del controller
                return Redirect::to();
            }
            Flash::error('Falló Operación');
            return;
        }

        //Aplicando la autocarga de objeto, para comenzar la edición
        $this->empleados = $empleado->find_by_id((int) $id);
 
    }
    
    }