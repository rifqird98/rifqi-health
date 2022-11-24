@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary m-3" href="{{ route('user.create')}}">Tambah Category</a>
                <div class="card">
                    <div class="card-header">{{ __('Category') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Roles</th>
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
                                            {{ $item->name}}
                                        </td>
                                        <td>
                                            {{ $item->email}}
                                        </td>
                                        <td>
                                            {{ $item->role}}
                                        </td>
                                        <td>
                                            <a class="btn btn-success" href="{{ route('user.edit',$item->id) }}">Edit</a>
                                            <form action="{{route('user.destroy',$item->id )}}" method="post">
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
