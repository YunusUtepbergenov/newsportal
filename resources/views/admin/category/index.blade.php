@extends('admin.admin_layout')

@section('container')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Categories</h4>
                    <a href="{{route('category.create')}}" class="btn btn-info btn-fw" style="float:right; margin-bottom: 10px; padding: 10px 10px 10px 10px;">Add Category</a>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Category name En </th>
                            <th> Category name Ru </th>
                            <th> Actions </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($categories as $category)
                            <tr>
                                <td> {{$loop->index + 1}} </td>
                                <td> {{$category->name_en}} </td>
                                <td> {{$category->name_ru}}</td>
                                <td> <a class="btn btn-primary btn-rounded btn-fw" href="{{route('category.edit', $category->id)}}">Edit</a>
                                  <a class="btn btn-danger btn-rounded btn-fw" href="{{route('category.delete', $category->id)}}">Delete</a></td>
                            </tr>
                          @endforeach  
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection