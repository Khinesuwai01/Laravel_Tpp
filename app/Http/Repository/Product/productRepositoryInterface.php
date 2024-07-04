<?php

namespace App\Http\Repository\Product;

interface ProductRepositoryInterface
{

    public function get();

    public function create($data);

    public function edit($id);

    public function findByID($id);




    
}