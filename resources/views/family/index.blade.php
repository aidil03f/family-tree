@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3>Keluarga</h3>
                        <a href="{{ route('family.create') }}" class="btn btn-primary"> Tambah</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Parent</th>
                                <th>Status Family</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($family as $item)     
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->gender == 'male' ? 'Laki-laki':'Perempuan' }}</td>
                                    <td>{{ $item->parentDetail() }}</td>
                                    <td>{{ $item->status_family }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('family.edit',$item) }}" class="btn btn-warning"> Edit</a>
                                            <form action="{{ route('family.delete',$item) }}" method="POST" onclick="return confirm('Apakah anda yakin ? Data yang dihapus tidak bisa dikembalikan')" style="margin-left:4px">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"> Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $family->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
