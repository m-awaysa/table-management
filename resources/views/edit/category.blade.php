@extends('layouts.app')

@section('content')
<form action="{{route('category.update',$category)}}" method="POST" >
    @csrf
    <div class="m-3">
      <label for="exampleInputEmail1" class="form-label">Category name</label>
      <input type="text" class="form-control col-5 " name="name" value="{{$category->name}}">
      @error('name')
          <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
    <div class=" m-3">
      <label  class="form-label ">description</label>
      <textarea type="text" class="form-control col-5" name="description">{{$category->description}}</textarea>
      @error('description')
      <div class="text-danger">{{$message}}</div>
  @enderror
    </div>
    <button type="submit" class="btn btn-primary m-3">Submit</button>
  </form>
@endsection
