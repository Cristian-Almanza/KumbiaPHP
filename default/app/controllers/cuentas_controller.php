<?php
/**
 * Carga del modelo ...
 */
Load::models('cuentas');

class CuentasController extends AppController {

    /**
     * Obtiene una lista para paginar los menus
     */
    public function index($page=1) 
    {
        $cuenta = new Cuentas();
        $this->listCuentas= $cuenta->getCuenta($page);
    }

    public function create()
    {
        
        if (Input::hasPost('cuentas')) {
            
            $cuenta = new Cuentas(Input::post('cuentas'));
            
            if ($cuenta->create()) {
                Flash::valid('Operación exitosa');
            
                Input::delete();
                return;
            }
 
            Flash::error('Falló Operación');
        }
    }

    
    public function edit($id)
    {
        $cuenta = new Cuentas();
 
        if (Input::hasPost('cuentas')) {
 
            if ($cuenta->update(Input::post('cuentas'))) {
                 Flash::valid('Operación exitosa');

                return Redirect::to();
            }
            Flash::error('Falló Operación');
            return;
        }

        $this->cuentas = $cuenta->find_by_id((int) $id);
 
    }

    
}