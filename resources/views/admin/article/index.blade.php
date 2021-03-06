@extends('admin.master')
@section('content')
<a href="{{route('article.create')}}" class="btn btn-md btn-primary mb-3">Create Article</a>
<livewire:article-index></livewire:article-index>
@endsection
@push('sweetalert2css')
<link rel="stylesheet" href="{{asset('assets/plugins/sweetalert2/sweetalert2.css')}}">
@endpush
@push('scripts')
@include('admin.partials.alerts')
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