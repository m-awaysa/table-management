@extends('layouts.app')

@section('content')
<form action="{{route('product.update',$product)}}" method="POST" >
    @csrf
    <div class="m-3">
      <label for="exampleInputEmail1" class="form-label">Product name</label>
      <input type="text" class="form-control col-5 " name="name" value="{{$product->name}}">
      @error('name')
          <div class="text-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="m-3">
        <label for="exampleInputEmail1" class="form-label">company</label>
        <input type="text" class="form-control col-5 " name="company" value="{{$product->company}}">
        @error('company')
            <div class="text-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="m-3">
        <label for="exampleInputEmail1" class="form-label">discount</label>
        <input type="number" class="form-control col-5 " name="discount" value="{{$product->discount}}">
        @error('discount')
            <div class="text-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="m-3">
        <label for="exampleInputEmail1" class="form-label">amount</label>
        <input type="text" class="form-control col-5 " name="amount" value="{{$product->amount}}">
        @error('amount')
            <div class="text-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="m-3">
        <label for="exampleInputEmail1" class="form-label">price</label>
        <input type="number" class="form-control col-5 " name="price" value="{{$product->price}}">
        @error('price')
            <div class="text-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="m-3">
        <label for="exampleInputEmail1" class="form-label">color</label>
        <input type="text" class="form-control col-5 " name="color" value="{{$product->color}}">
        @error('color')
            <div class="text-danger">{{$message}}</div>
        @enderror
      </div>
    <div class=" m-3">
      <label  class="form-label ">description</label>
      <textarea type="text" class="form-control col-5" name="description">{{$product->description}}</textarea>
      @error('description')
      <div class="text-danger">{{$message}}</div>
  @enderror
    </div>
    <button type="submit" class="btn btn-primary m-3">Submit</button>
  </form>
@endsection
