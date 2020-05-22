<div class="card">
    <div class="card-header">
        <div class="card-tools">
            {{$articles->links()}}
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th>Category</th>
                <th>Status</th>
                <th>Cover</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $no = 1
                @endphp
                @foreach ($articles as $a)
                <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>{{$a->judul}}</td>
                    <td>{{$a->get_user->name}}</td>
                    <td>{{$a->get_category->nama}}</td>
                    <td><span class="badge badge-pill {{($a->status == 'publish' ? 'badge-success' : 'badge-danger')}}">{{$a->status}}</span></td>
                    <td><img
                       @if (substr($a->sampul,0,5) == "https")
                        src="{{$a->sampul}}"
                       @else
                        src="{{asset('storage/'. $a->sampul)}}"   
                       @endif
                        alt="null.jpg" width="100" height="100"></td>
                    <td>
                        <a class="btn btn-info btn-md btn-sm" href="{{route('article.show', $a->id)}}"><span class="far fa-eye"></span></a>
                        <a class="btn btn-warning btn-md btn-sm " href="{{route('article.edit', $a->id)}}"><span class="far fa-edit"></span></a>
                        <a class="btn btn-danger btn-md btn-sm" id="delete" href="{{route('article.destroy', $a->id)}}"><span class="far fa-trash-alt"></a>
                    </td>
                </tr>
                @endforeach
                <form action="" method="POST" style="display: none" id="delete-article">
                    @csrf @method('DELETE')
                </form>
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
       
    </div>
</div>