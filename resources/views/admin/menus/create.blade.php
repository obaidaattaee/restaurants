@extends("admin.layouts.app")

@section("title","Create New Menu")


@section("content")


    <form method="post" enctype="multipart/form-data" action="#" role="form">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">title</label>
                <input  type="text"  class="form-control" id="title" name="title" placeholder="Enter Menu title">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input  type="text"  class="form-control" id="type" name="email" placeholder="Enter type">
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
                <input  type="checkbox" id="published" name="published" >
                <label for="published">published</label>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class='btn btn-danger' href='{{route('menus.index')}}'>Cancel</a>
            </div>
        </div>
    </form>
@endsection
