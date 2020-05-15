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
                <td>{{$a->sampul}}</td>
                <td>
                    <a class="btn btn-warning btn-md" href="#"><span class="far fa-edit"></span></a>
                    <a class="btn btn-danger btn-md" href="#"><span class="far fa-trash-alt"></a>
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>
@endsection