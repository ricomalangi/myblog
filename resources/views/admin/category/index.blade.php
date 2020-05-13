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
                    <a href="{{route('category.edit', $c->category_id)}}">Edit</a>
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>
@endsection