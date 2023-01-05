@extends('dashboard.templates.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <a href="/category/create" class="btn btn-primary">Add Category</a>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="40px" class="text-center">#</th>
                                <th>Nama</th>
                                <th width="250px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $c)
                            <tr>
                                <td class="text-center">{{ ++$i }}</td>
                                <td>{{ $c->name }}</td>
                                <td class="text-center">
                                    <form action="{{ "/category/delete/" . $c->id }}" method="POST">
                                    <a href="{{ "/category/edit/" . $c->id }}" class="btn btn-secondary">Edit</a>
                                    @csrf
                                    <button class="btn btn-danger" onclick="window.alert('Apakah rill kamu ingin menghapus ini??')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()