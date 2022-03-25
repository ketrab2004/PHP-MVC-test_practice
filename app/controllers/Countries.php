<?php
class Countries extends Controller
{
    protected $countryModel;

    public function __construct()
    {
        $this->countryModel = $this->model('Country');
    }

    public function index()
    {
        $data = $this->countryModel->getCountries();

        for($i = 0; $i < count($data); $i++) {
            $data[$i] = (object) $data[$i]; // cast to object ( so you can do -> instead of [""] )

            $data[$i]->population = number_format($data[$i]->population, 0, ',', '.'); // format 1000 to 1.000
        }

        $this->view('countries/index', [
            'title' => 'Country page',
            'countries' => $data
        ]);
    }

    public function edit()
    {
        $id = $_GET["id"];

        if (!isset($id)) {
            header('Location: ../countries');
        }

        $this->view('countries/edit', [
            'title' => 'Edit Country page',
            'continents' => $this->countryModel->getContinents(),
            'country' => $this->countryModel->getCountry($id)
        ]);
    }

    public function applyChanges()
    {
        $this->countryModel->editCountry(
            intval($_POST["id"]),
            $_POST["name"],
            $_POST["capitalCity"],
            $_POST["continent"],
            intval($_POST["population"])
        );

        header('Location: ../countries');
    }

    public function delete()
    {
        $id = $_GET["id"];

        if (!isset($id)) {
            header('Location: ../countries');
        }

        $this->countryModel->deleteCountry($id);

        header('Location: ../countries');
    }
}
