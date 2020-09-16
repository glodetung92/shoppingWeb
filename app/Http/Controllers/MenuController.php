<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Components\MenuRecusive;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }
    public function index()
    {
        $menu = $this->menu->paginate(10);
        return view('admin.menu.index', compact('menu'));
    }
    public function create()
    {
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('admin.menu.add', compact('optionSelect'));
    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name)
        ]);
        return redirect()->route('menu.index');
    }

    public function edit($id)
    {
        $menu = $this->menu->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($menu->parent_id);
        return view('admin.menu.edit', compact('menu', 'optionSelect'));
    }

    public function update(Request $request, $id)
    {
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name)
        ]);

        return redirect()->route('menu.index');
    }
    public function delete($id)
    {
        $this->menu->find($id)->delete();
        return redirect()->route('menu.index');
    }
}
