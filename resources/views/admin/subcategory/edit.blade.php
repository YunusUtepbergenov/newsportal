@extends('admin.admin_layout')

@section('container')
@extends('admin.admin_layout')

@section('container')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create new Subcategory</h4>
                    <form class="forms-sample" method="POST" action="{{route('subcategory.update', $category->id)}}">
                        @csrf
                        @method('PUT')
                      <div class="form-group">
                        <label for="name_en">Subcategory name in English</label>
                        <input type="text" class="form-control" name="name_en" value="{{$category->name_en}}" placeholder="Subcategory name in English">
                      </div>
                      @error('name_en')
                          <span class="text-danger"> {{$message}} </span>
                      @enderror
                      <div class="form-group">
                        <label for="name_ru">Subcategory name in Russian</label>
                        <input type="text" class="form-control" name="name_ru" value="{{$category->name_ru}}" placeholder="Subcategory name in Russian">
                        @error('name_ru')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror                        
                      </div>
                      <div class="form-group">
                        <label for="parent_id">Parent Category</label>
                        <select class="form-control" name="parent_id" form-control-lg">
                          @foreach ($parents as $parent)
                            @if ($category->parent_id == $parent->id)
                            <option selected value="{{$parent->id}}">{{$parent->name_en}}</option>                              
                            @else
                            <option value="{{$parent->id}}">{{$parent->name_en}}</option>
                            @endif
                          @endforeach
                        </select>
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