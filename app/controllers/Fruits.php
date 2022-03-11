<?php
class Fruits extends Controller {
    public function index()
    {
        $this->fruitModel = $this->model('Fruit');
        
        $rows = "";
        foreach ($this->fruitModel->getFruits() as $fruit):
            $fruit = (object)$fruit; // to object because ['this'] sucks
    
            $rows .= "
            <tr>
                <th>{$fruit->id}</th>
                <td>{$fruit->name}</td>
                <td>{$fruit->color}</td>
                <td>€{$fruit->price}</td>
            </tr>
            ";
        endforeach;

        $this->view('fruits', [
            'title' => 'Fruits page',
            'fruit Rows' => $rows
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
