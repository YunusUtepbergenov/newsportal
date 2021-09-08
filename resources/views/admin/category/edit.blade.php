@extends('admin.admin_layout')

@section('container')
@extends('admin.admin_layout')

@section('container')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Updating category</h4>
                    <form class="forms-sample" method="POST" action="{{route('category.update', $category->id)}}">
                        @csrf
                        @method('PUT')
                      <div class="form-group">
                        <label for="name_en">Category name in English</label>
                        <input type="text" class="form-control" name="name_en" value="{{$category->name_en}}" placeholder="Category name in English">
                      </div>
                      @error('name_en')
                          <span class="text-danger"> {{$message}} </span>
                      @enderror
                      <div class="form-group">
                        <label for="name_ru">Category name in Russian</label>
                        <input type="text" class="form-control" name="name_ru" value="{{$category->name_ru}}" placeholder="Category name in Russian">
                        @error('name_ru')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror                        
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection
@endsection