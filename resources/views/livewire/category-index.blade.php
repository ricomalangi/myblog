<div class="card">
    <div class="card-header">
        <div class="card-tools">
            {{$category->links()}}
        </div>
    </div>
    <div class="card-body table-responsive">
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
                        <a class="btn btn-warning btn-sm" href="{{route('category.edit', $c->category_id)}}"><span class="far fa-edit"></span></a>
                        <a id="delete" class="btn btn-danger btn-sm" href="{{route('category.destroy', $c->category_id)}}" ><span class="far fa-trash-alt"></a>
                    </td>
                </tr>
                @endforeach
                <form action="" method="POST" style="display: none" id="delete-category">
                    @csrf @method('DELETE')
                </form>
            </tbody>
        </table>
    </div>
</div>