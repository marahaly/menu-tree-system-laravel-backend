<?php

namespace App\Services;

use App\Repositories\AppMenuRepository;

class AppMenuService
{
    protected $repo;

    public function __construct(AppMenuRepository $repo)
    {
        $this->repo = $repo;
    }

    public function list()
    {
        return $this->repo->all();
    }

    public function detail(string $id)
    {
        return $this->repo->find($id);
    }

    public function create(array $data)
    {
        return $this->repo->create($data);
    }

    public function update(string $id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function delete(string $id)
    {
        return $this->repo->delete($id);
    }
}
