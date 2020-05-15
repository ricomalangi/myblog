@extends('admin.master')
@section('content')
<a href="{{route('category.create')}}" class="btn btn-md btn-primary mb-3">Create Category</a>
<div class="table-responsive">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Categoty Name</th>
            <th scope="col">Slug</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @php
                $no = 1
            @endphp
            @foreach ($category as $c)
            <tr>
                <th scope="row">{{$no++}}</th>
                <td>{{$c->nama}}</td>
                <td>{{$c->slug}}</td>
                <td>
                    <a class="btn btn-warning btn-md" href="{{route('category.edit', $c->category_id)}}"><span class="far fa-edit"></span></a>
                    <a id="delete" class="btn btn-danger btn-md" href="{{route('category.destroy', $c->category_id)}}" ><span class="far fa-trash-alt"></a>
                </td>
            </tr>
            @endforeach
            <form action="" method="POST" style="display: none" id="delete-category">
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
       $('a#delete').on('click', function(e) {
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
                    document.getElementById('delete-category').action = href;
                    document.getElementById('delete-category').submit();
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