<?php
class Pages extends Controller {
    public function index()
    {
        $this->userModel = $this->model('User');
        
        $this->view('index', [
            'title' => 'Home page'
        ]);
    }
}
