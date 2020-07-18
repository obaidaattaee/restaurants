<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\MenuRrequest;
use App\Models\Menu;

class MenuController
{
    public function index(){
        $menus = Menu::orderBy('id');
        $name = request()->get('name');
        $parent = request()->get('parent');
        $user = request()->get('user');
        $published = request()->get('published')??'' ;
        if ($name != null){
            $menus = $menus->where('title' , 'like' , "%{$name}%");
        }
        if ($parent != null){
            $menus = $menus->where('parent_id' , $parent);
        }

        if ($user != null){
            $menus = $menus->where('user_id' , $user);
        }

        if ($published != null){
            $menus = $menus->where('active' , $published);
        }
        $menus = $menus->paginate(10)->appends(['name'=> $name , 'parent' =>$parent , 'user'=>$user , 'published' =>$published]);
        return view('admin.menus.index')->with('menus' , $menus);
    }
    public function create(){
        return view('admin.menus.create');
    }
    public function store(MenuRrequest $request){
        $request['status'] = $request['status']?1:0 ;
        $request['type'] = $request['type']??0 ;
        $request['user_id'] = auth()->user()->id ;
        $imageName = basename($request->imageFile->store("public"));
        $request['image'] = $imageName;

        Menu::create($request->all());
        session()->flash('msg' , 'menu created successfuly');
        return redirect(route('menus.index'));
    }

    public function destroy ($menu){
        $menu_item = Menu::find($menu) ;
        if (!$menu_item){
            session()->flash('msg' , 'w: sorry this menu is not exist');
            return redirect(route('menus.index'));
        }
        else{
            Menu::destroy($menu);
            session()->flash('msg' , 's: menu deleted successfully');
            return redirect(route('menus.index'));
        }
    }
    public function edit($id){
        $menu = Menu::find($id);
        if (!$menu){
            session()->flash('msg' , 'w: sorry this menu is not exist');
            return redirect(route('menus.index'));
        }
        return view('admin.menus.edit')->with('menu' , $menu);
    }
    public function update(MenuRrequest $request , $id){
        $request['status'] = $request['status']?1:0 ;
        $request['type'] = $request['type']??0 ;
        $request['user_id'] = auth()->user()->id ;
        $imageName = basename($request->imageFile->store("public"));
        $request['image'] = $imageName;
        Menu::find($id)->update($request->all());
        session()->flash('msg' , 'menu updated successfuly');
        return redirect(route('menus.index'));
    }
}
