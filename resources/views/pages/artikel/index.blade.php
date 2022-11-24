@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary m-3" href="{{ route('artikel.create')}}">Tambah Artikel</a>
                <div class="card">
                    <div class="card-header">{{ __('Data Artikel') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>judul</th>
                                    <th>foto</th>
                                    <th>isi</th>
                                    <th>tanggal</th>
                                    <th>category</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td>
                                            {{ $item->judul}}
                                        </td>
                                        <td>
                                            <img src="{{ Storage::url($item->foto) }}" style="width: auto; height: 50px;">
                                        </td>
                                        <td>
                                            {{ $item->isi}}
                                        </td>
                                        <td>
                                            {{ $item->created_at}}
                                        </td>
                                        <td>
                                            {{ $item->category->nama}}
                                        </td>
                                        <td>
                                            <a class="btn btn-success" href="{{ route('artikel.edit',$item->id) }}">Edit</a>
                                            <form action="{{route('artikel.destroy',$item->id )}}" method="post">
                                            @method("DELETE")
                                            @csrf
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
