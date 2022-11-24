@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                  
                    <div class="container">
                        <div class="row">
                            <div class="col">
                    
                                <form action="{{ route('home.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="number" class="form-control" name="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tinggi Badan</label>
                                        <input type="number" class="form-control" name="tinggi">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Berat Badan</label>
                                        <input type="number" class="form-control" name="berat">
                                    </div><div class="mb-3">
                                        <label class="form-label">Tahun Lahir</label>
                                        <input type="number" class="form-control" name="tahunlahir">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Hobi</label>
                                        <input type="text" class="form-control" name="hobi">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Hobi 2</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Hobi 3</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                    
                                <table class="table mt-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">bmi</th>
                                            <th scope="col">Status Berat Badan</th>
                                            <th scope="col">Hobi</th>
                                            <th scope="col">Umur</th>
                                            <th scope="col">Konsultasi Gratis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @isset($data)
                                            <td>{{ $data['bmi'] }}</td>
                                            <td>{{ $data['obes']}}</td>
                                            <td>{{ $data['hobi']}}</td>
                                            <td>{{ $data['umur']}}</td>
                                            <td>{{ $data['konsul']}}</td>
                                            @endisset
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
