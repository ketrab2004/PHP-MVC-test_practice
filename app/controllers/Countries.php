<?php
class Countries extends Controller {
    public function index()
    {
        $this->countryModel = $this->model('Country');

        $data = $this->countryModel->getCountries();

        for($i = 0; $i < count($data); $i++) {
            $data[$i] = (object) $data[$i]; // cast to object ( so you can do -> instead of [""] )

            $data[$i]->population = number_format($data[$i]->population, 0, ',', '.'); // format 1000 to 1.000
        }
        
        $this->view('countries/index', [
            'title' => 'Home page',
            'countries' => $data
        ]);
    }
}
