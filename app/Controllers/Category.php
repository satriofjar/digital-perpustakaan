<?php

namespace App\Controllers;

use App\models\CategoryModel;

class Category extends BaseController{

    public function __construct(Type $var = null) {
        $this->categoryModel = new CategoryModel();
    }

    public function index(){
        $data = [
            'categories' => $this->categoryModel->findAll()
        ];
        return view('admin', $data);
    }

    public function create(){
        // create category

        if($this->request->getMethod() == 'post'){
            $data = $this->request->getPost();
            $this->categoryModel->insert($data);
            return redirect()-> to(base_url('admin/categories'))->with('success', 'Data berhasil disimpan');
        }
        
        return view('category/new-category');
    }
    
    public function edit($slug = ''){
        // edit category

        $dataCategory = $this->categoryModel->find($slug);
        
        if(empty($dataCategory)){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        if($this->request->getMethod() == 'post'){
            $data = $this->request->getPost();
            $this->categoryModel->update($slug, $data);
            return redirect()-> to(base_url('admin/categories'))->with('success', 'Data berhasil diUpdate');
        }
        $data = [
            'category' => $dataCategory
        ];
        
        return view('category/edit-category', $data);
    }

    public function delete($slug = ''){
        // delete category

        $dataCategory = $this->categoryModel->find($slug);
        
        if(empty($dataCategory)){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = $this->request->getPost();
        $this->categoryModel->delete($slug);
        return redirect()-> to(base_url('admin/categories'))->with('success', 'Data berhasil dihapus');
    }

}
