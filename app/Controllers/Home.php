<?php

namespace App\Controllers;
use App\models\BookModel;

class Home extends BaseController{

    public function __construct(bookpe $var = null) {
        $this->BookModel = new BookModel();
    }

    public function index(): string{
        $data = [
            'books' => $this->BookModel->getAll()
        ];
        return view('index', $data);
    }


}
