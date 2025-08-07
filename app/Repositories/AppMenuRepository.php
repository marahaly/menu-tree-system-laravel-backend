<?php

namespace App\Repositories;

use App\Models\AppMenu;

class AppMenuRepository
{
    public function all()
    {
        return AppMenu::where('is_delete', false)->get();
    }

    public function find(string $id)
    {
        return AppMenu::where('id', $id)->where('is_delete', false)->first();
    }

    public function create(array $data)
    {
        return AppMenu::create($data);
    }

    public function update(string $id, array $data)
    {
        $menu = $this->find($id);
        if (!$menu) return null;

        $menu->update($data);
        return $menu;
    }

    public function delete(string $id)
    {
        $menu = $this->find($id);
        if (!$menu) return false;

        $menu->update(['is_delete' => true]);
        return true;
    }
}
