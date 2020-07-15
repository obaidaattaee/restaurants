@extends('admin.layouts.app')
@section('title' , "Menus")
@section('content')
    <form class='row'>
        <div class='col-md-2'>
            <input type='text' value="{{request()->get('name')}}" id="name" class="form-control"
                   placeholder="name to search" name="name"/></div>
        <div class='col-md-2'>
            <input type='text' value="{{request()->get('blog')}}" id="blog" class="form-control"
                   placeholder="blog name to search " name="blog"/></div>
        <div class='col-md-2'>
            <input type='text' value="{{request()->get('website')}}" id="website" class="form-control"
                   placeholder="website to search " name="website"/></div>
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
@endsection
