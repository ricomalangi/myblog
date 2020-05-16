@extends('admin.master')
@section('content')
<a href="{{route('article.create')}}" class="btn btn-md btn-primary mb-3">Create Article</a>
<div class="table-responsive">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th>Category</th>
            <th>Cover</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @php
                $no = 1
            @endphp
            @foreach ($article as $a)
            <tr>
                <th scope="row">{{$no++}}</th>
                <td>{{$a->judul}}</td>
                <td>{{$a->get_user->name}}</td>
                <td>{{$a->get_category->nama}}</td>
                <td><img
                   @if (substr($a->sampul,0,5) == "https")
                    src="{{$a->sampul}}"
                   @else
                    src="{{asset('storage/'. $a->sampul)}}"   
                   @endif
                    alt="" width="150" height="150"></td>
                <td>
                    <a class="btn btn-info btn-md" href="{{route('article.show', $a->id)}}"><span class="far fa-eye"></span></a>
                    <a class="btn btn-warning btn-md" href="{{route('article.edit', $a->id)}}"><span class="far fa-edit"></span></a>
                    <a class="btn btn-danger btn-md" id="delete" href="{{route('article.destroy', $a->id)}}"><span class="far fa-trash-alt"></a>
                </td>
            </tr>
            @endforeach
            <form action="" method="POST" style="display: none" id="delete-article">
                @csrf @method('DELETE')
            </form>
        </tbody>
    </table>
</div>
@endsection
@push('sweetalert2css')
<link rel="stylesheet" href="{{asset('assets/plugins/sweetalert2/sweetalert2.css')}}">
@endpush
@push('scripts')
<script src="{{asset('assets/plugins/sweetalert2/sweetalert2.js')}}"></script>
<script>
    $(document).ready(function(){
       $('a#delete').on('click', function(e){
            e.preventDefault();
            let href = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                    document.getElementById('delete-article').action = href;
                    document.getElementById('delete-article').submit();
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            })
       })
    })
</script>
@endpush