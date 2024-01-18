<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Admin;
use App\Controllers\Book;
use App\Controllers\Category;
use App\Controllers\Home;
use App\Controllers\User;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('user', [Book::class, 'getBookByUserId']); // routes untuk menampilkan semua buku milir user yang login

$routes->get('admin/books', [Book::class, 'index'],  ['filter' => 'role:admin']); // routes untuk menampilkan semua buku
$routes->get('admin/categories', [Category::class, 'index'],  ['filter' => 'role:admin']); // routes untuk menampilkan semua buku

// routes handle books 
$routes->get('create-book', [Book::class, 'create']);
$routes->post('create-book', [Book::class, 'create']);
$routes->get('edit-book/(:segment)', [Book::class, 'edit']);
$routes->post('edit-book/(:segment)', [Book::class, 'edit']);
$routes->delete('delete-book/(:segment)', [Book::class, 'delete']);

$routes->get('export-book/(:segment)', [Book::class, 'export']);

// routes handle category
$routes->get('create-category', [Category::class, 'create']);
$routes->post('create-category', [Category::class, 'create']);
$routes->get('edit-category/(:segment)', [Category::class, 'edit']);
$routes->post('edit-category/(:segment)', [Category::class, 'edit']);
$routes->delete('delete-category/(:segment)', [Category::class, 'delete']);