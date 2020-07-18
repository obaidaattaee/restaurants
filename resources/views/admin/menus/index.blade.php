@extends('admin.layouts.app')
@section('title' , "Menus")
@section('content')
    <form class='row'>
        <div class='col-md-2'>
            <input type='text' value="{{request()->get('name')}}" id="name" class="form-control"
                   placeholder="name to search" name="name"/></div>
        <div class='col-md-2'>
            <input type='text' value="{{request()->get('user')}}" id="user" class="form-control"
                   placeholder="user name to search " name="user"/></div>
        <div class='col-md-2'>
            <input type='text' value="{{request()->get('parent')}}" id="parent" class="form-control"
                   placeholder="parent menu to search " name="parent"/></div>
        <div class='col-md-2'>
            <select name='published' class='form-control'>
                <option value=''>Any status</option>
                <option value='1'>Active</option>
                <option value='0'>InActive</option>
            </select>
        </div>
        <div class='col-md-2'>
            <button type='submit' class='btn btn-primary'><i class="fa fa-search"></i>search</button>
        </div>
        <div class='col-md-2'>
            <a href="{{route('menus.create')}}" class='btn btn-success'>
                create menu
            </a>
        </div>

    </form>


    @if($menus->count()>0)
        <table align="center" class="table mt-3 table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>title</th>
                <th>created by</th>
                <th>parent menu</th>
                <th>description</th>
                <th>image</th>
                <th>status</th>
                <th width="20%"></th>

            </tr>
            </thead>
            <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->title }}</td>
                    <td>{{ $menu->user->name }}</td>
                    <td>{{ $menu->parentMenu->title??'main menu' }}</td>
                    <td>{{ $menu->description }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Popup image</button>

                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="{{asset("storage/".$menu->image)}}" class="img-responsive" alt="No Image Found" width="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <input type="checkbox" {{ $menu->status? 'checked':'' }} disabled>
                    </td>

                    <td width="20%">
                        <form method="post" action="{{ route('menus.destroy', $menu->id) }}">

                            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-primary btn-sm"><i
                                    class='fa fa-edit'></i></a>
                            <button onclick='return confirm("Are you sure??")' type="submit"
                                    class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                            @csrf
                            @method("DELETE")
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $menus->links() }}
    @else
        <div class='alert mt-3 alert-warning'>Sorry, there is no results to your search</div>

    @endif
@endsection
