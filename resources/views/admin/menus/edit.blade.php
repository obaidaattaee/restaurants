@extends("admin.layouts.app")

@section("title","Edit New Menu")


@section("content")


    <form method="post" action="{{ route('menus.update' , $menu->id) }}" enctype="multipart/form-data"  role="form">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="title">title</label>
                <input  type="text" value="{{old('title')??$menu->title??''}}" class="form-control" id="title" name="title" placeholder="Enter Menu title">
            </div>
            <div class="form-group">
                <label for="type">Parent Menu</label>
                <select name="parent_id" class="form-control">
                    <option value="0">new menu</option>
                    @foreach(\App\Models\Menu::get() as $menu_item)
                        <option value="{{ $menu_item->id }}">{{ $menu_item->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Enter website"></textarea>
            </div>
            <div class="form-group row">
                <div class='col-sm-6'>
                    <label for="imageFile">Image</label>
                    <div class="custom-file">
                        <input type="file" name="imageFile" class="custom-file-input" id="imageFile">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input  type="checkbox" id="status" name="status" >
                <label for="status">select for active</label>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class='btn btn-danger' href='{{route('menus.index')}}'>Cancel</a>
            </div>
        </div>
    </form>
@endsection
