<?php

namespace App\Repositories;

interface TaskRepositoryInterface
{
    public function create(array $data);
    public function show($id);
    public function index($paginate);
    public function delete($id);
    public function update($id, $data);
}
