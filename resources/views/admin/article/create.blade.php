@extends('admin.master')
@section('content')
<form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{old('title')}}" placeholder="Title">
                @error('title')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_name">Category</label>
                <select name="category" id="category_name" class="form-control select2 @error('category') is-invalid @enderror">
                    <option selected disabled>Choose category</option>
                    @foreach ($category as $c)
                    <option value="{{$c->category_id}}">{{$c->nama}}</option>
                    @endforeach
                </select>
                @error('category')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                    <option disabled selected>Select status</option>
                    <option value="publish">Publish</option>
                    <option value="draft">Draft</option>
                  </select>
                @error('status')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="cover">Cover</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="cover" name="sampul">
                    <label class="custom-file-label" for="cover">Choose file</label>
                    <small class="form-text text-muted">
                        jika belum punya sampul biarkan kosong
                    </small>
                </div>
                @error('category')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <label for="content">Content</label>
            <textarea name="konten" id="content" class="form-control"></textarea>
        </div>
    </div>    
    <div class="row mt-3">
        <div class="col-md">
            <a href="{{route('article.index')}}" class="btn btn-secondary btn-icon-split">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Back</span>
            </a>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>
@endsection
@push('select2css')
    <link href="{{asset('assets/plugins/select2/css/select2.css')}}" rel="stylesheet" >
@endpush
@push('select2js')
    <script src="{{asset('assets/plugins/select2/js/select2.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.select2').select2();
        });
    </script>
@endpush
@push('ckeditor')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endpush
