@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="{{route('category.update', $category)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="category_name" value="{{ $category->nama ?? old('nama')}}">
                @error('nama')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection