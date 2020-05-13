@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="{{route('category.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="category_name" value="{{old('nama')}}">
                @error('nama')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <a href="{{route('category.index')}}" class="btn btn-secondary btn-icon-split">
                <span class="icon">
                  <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Back</span>
            </a>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection