<?php
class Fruits extends Controller {
    public function index()
    {
        $this->fruitModel = $this->model('Fruit');
        
        $this->view('fruits', [
            'title' => 'Fruits page',
            'fruits' => $this->fruitModel->getFruits()
        ]);
    }

    public function apples()
    {
        $this->appleModel = $this->model('Apple');
        
        $this->view('apples', [
            'title' => 'Apples page',
            'apples' => $this->appleModel->getApples()
        ]);
    }
}
