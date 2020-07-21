@extends('template_backend.home')
@section('subjudul','Daftar Materi')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
{{ Session('success') }}
</div>
@endif

<a href="{{ route('materi.create')}}" class="btn btn-primary btn-sm">Tambah Materi</a>
<br></br>

<table class ="table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Materi</th>
            <th>Kategori</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($materi as $result => $hasil)
        <tr>
            <td>{{ $result + $materi-> firstitem() }}</td>
            <td>{{ $hasil->judul }}</td>
            <td>{{ $hasil->category->name }}</td>
            <td><img src="{{ asset( $hasil->gambar ) }}" class="img-fluid" style="width:100px"></td>
            <td>
                <form action="{{ route('materi.destroy', $hasil->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('materi.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                   <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $materi->links() }}
@endsection