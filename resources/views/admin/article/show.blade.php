@extends('admin.master')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{$article->judul}}</h3>
    </div>
    <div class="card-body">
    {!! $article->konten !!}
    <p><i class="far fa-user pr-2"></i> {{$article->get_user->name}}</p>
    <p><i class="fas fas fa-th pr-2"></i> {{$article->get_category->nama}}</p>
    <p><i class="fas fa-upload pr-2"></i> {{$article->status}}</p>
    </div>
</div>
<div class="pb-3">
    <a href="{{route('article.index')}}" class="btn btn-secondary btn-icon-split ">
        <span class="icon">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Back</span>
    </a>
</div>

@endsection