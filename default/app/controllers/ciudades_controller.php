<?php
/**
 * Carga del modelo ...
 */
Load::models('ciudades');

class CiudadesController extends AppController {

    /**
     * Obtiene una lista para paginar los menus
     */
    public function index($page=1) 
    {
        $ciudad = new Ciudades();
        $this->listCiudades = $ciudad->getCiudad($page);
    }

    public function create()
    {
        
        if (Input::hasPost('ciudades')) {
           
            $ciudad = new Ciudades(Input::post('ciudades'));
        
            if ($ciudad->create()) {
                Flash::valid('Operación exitosa');
                
                Input::delete();
                return;
            }
 
            Flash::error('Falló Operación');
        }
    }

    
    public function edit($id)
    {
        $ciudad = new Ciudades();
 
        if (Input::hasPost('ciudades')) {
 
            if ($ciudad->update(Input::post('ciudades'))) {
                 Flash::valid('Operación exitosa');
                return Redirect::to();
            }
            Flash::error('Falló Operación');
            return;
        }

        $this->ciudades = $ciudad->find_by_id((int) $id);
 
    }

    
}