<?php

namespace App\Controllers;
use App\models\BookModel;
use App\models\CategoryModel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Book extends BaseController{

    public function __construct(bookpe $var = null) {
        $this->BookModel = new BookModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index(){
        $data = [
            'books' => $this->BookModel->getAll()
        ];
        return view('admin', $data);
    }

    public function getBookByUserId(){
        $data = [
            'books' => $this->BookModel->getBooksByUserId(user_id())
        ];
        return view('myBook', $data);
    }


    public function export($id){
        $books = $this->BookModel->getBookByUserId($id);
        $book = $books[0];
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Judul');
        $activeWorksheet->setCellValue('B1', 'Kategoeri');
        $activeWorksheet->setCellValue('C1', 'Jumlah');
        $activeWorksheet->setCellValue('D1', 'Deskripsi');
        
        $activeWorksheet->setCellValue('A2', $book['judul']);
        $activeWorksheet->setCellValue('B2', $book['name']);
        $activeWorksheet->setCellValue('C2', $book['jumlah']);
        $activeWorksheet->setCellValue('D2', $book['deskripsi']);


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Buku.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    
    public function create(){
        // create buku
        
        if($this->request->getMethod() == 'post'){
            $coverFile = $this->request->getFile('cover');
            $bookFile = $this->request->getFile('file_buku');

            $coverName = $coverFile->getRandomName();
            $bookName = $bookFile->getRandomName();

            $coverFile->move('media', $coverName);
            $bookFile->move('media', $bookName);
            
            $data = $this->request->getPost();

            $data['user_id'] = user_id();

            $data['cover'] = $coverName;
            $data['file_buku'] = $bookName;

            $this->BookModel->insert($data);
            if(in_groups('admin')){
                return redirect()-> to(base_url('admin/books'))->with('success', 'Data berhasil disimpan');
            }
            return redirect()-> to(base_url('user'))->with('success', 'Data berhasil disimpan');

        }

        $data = [
            'categories' => $this->categoryModel->findAll()
        ];
        
        return view('book/new-book', $data);
    }

    public function edit($slug){
        // edit buku
        $dataBook = $this->BookModel->find($slug);
        
        if(empty($dataBook)){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if($this->request->getMethod() == 'post'){
            $coverFile = $this->request->getFile('cover');
            $bookFile = $this->request->getFile('file_buku');

            if($coverFile->isValid()){
                $coverName = $coverFile->getRandomName();
                $coverFile->move('media', $coverName);
            }else{
                $coverName = $dataBook['cover'];
            }

            if($bookFile->isValid()){
                $bookName = $bookFile->getRandomName();
                $bookFile->move('media', $bookName);

            }else{
                $bookName = $dataBook['file_buku'];
            }

            $data = $this->request->getPost();

            $data['cover'] = $coverName;
            $data['file_buku'] = $bookName;

            $this->BookModel->update($slug, $data);
            if(in_groups('admin')){
                return redirect()-> to(base_url('admin/books'))->with('success', 'Data berhasil diUpdate');
            }
            return redirect()-> to(base_url('user'))->with('success', 'Data berhasil diUpdate');
        }

        $data = [
            'book' => $dataBook,
            'categories' => $this->categoryModel->findAll()
        ];


        return view('book/edit-book', $data);
    }

    public function delete($slug){
        // delete buku

        $dataBook = $this->BookModel->find($slug);
        
        if(empty($dataBook)){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = $this->request->getPost();
        $this->BookModel->delete($slug);
        return redirect()-> to(base_url('admin/books'))->with('success', 'Data berhasil dihapus');
    }

}
