<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table            = 'book';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['judul', 'jumlah', 'deskripsi', 'cover', 'file_buku', 'category_id', 'user_id'];

     // Dates
     protected $useTimestamps = true;
     protected $dateFormat    = 'datetime';
     protected $createdField  = 'created_at';
     protected $updatedField  = 'updated_at';
     protected $deletedField  = 'deleted_at';


     public function getAll(){
        $builder = $this->db->table('book');
        $builder->join('category', 'category.id = book.category_id');
        $builder->select('book.id, book.judul, book.jumlah, book.deskripsi, book.cover, book.file_buku, book.category_id, category.name');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getBooksByUserId($user_id){
        return $this->where('user_id', $user_id)->getAll();
    }

    public function getBookByUserId($id){
        return $this->where('id', $id)->getAll();
    }

}
