<?php


namespace App\Http\Controllers\Admin;


class MenuController
{
    public function index(){
        return view('admin.menus.index');
    }
    public function create(){
        return view('admin.menus.create');
    }
}
