<?php
class Fruit extends Controller {
    public function index()
    {
        $this->apples();
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
