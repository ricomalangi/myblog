@extends('admin.master')
@section('content')
<form action="{{route('article.update', $article)}}" method="POST" enctype="multipart/form-data">
    <div class="row">    
        <div class="col-md-6">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Title</label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" value="{{ $article->judul ?? old('judul')}}">
                @error('judul')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" class="form-control select2 @error('category_id') is-invalid @enderror">
                    @foreach ($category as $c)
                        <option value="{{$c->category_id}}" 
                            @if ($article->category_id == $c->category_id)
                            selected 
                            @endif>
                            {{$c->nama}}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control select2 @error('status') is-invalid @enderror">
                    <option disabled selected>status</option>
                    <option value="publish" 
                        @if ($article->status == 'publish')
                            selected
                        @endif>
                        Publish
                    </option>
                    <option value="draft" 
                        @if ($article->status == 'draft')
                            selected
                        @endif>
                        Draft
                    </option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="sampul">Cover</label>
                <div class="custom-file">
                    <input name="sampul" type="file" class="custom-file-input" id="sampul">
                    <label class="custom-file-label" for="sampul">Kosongkan jika tidak ingin mengganti cover</label>
                </div>
                @error('sampul')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <label for="konten">Content</label>
            <textarea name="konten" id="konten">{{ $article->konten ?? old('konten')}}</textarea>
        </div>
    </div>
    <div class="row mt-3 pb-3">
        <div class="col-md">
            <a href="{{route('article.index')}}" class="btn btn-secondary btn-icon-split">
                <span class="icon">
                <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Back</span>
            </a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
    

@endsection
@push('select2css')
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.css')}}">
@endpush
@push('scripts')
<script src="{{asset('assets/plugins/select2/js/select2.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
<script>
    $(document).ready(function() {
    $('.select2').select2();
    });
</script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
    };
</script>
<script>
    CKEDITOR.replace('konten', options);
</script>
@endpush

{{-- <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#konten' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script> --}}