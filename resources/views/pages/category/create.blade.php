@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Category') }}</div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST">
                            @method('POST')
                            @csrf
                            <input type="text" placeholder="nama" name="nama" class="m-3 form-control">
                            <button class="btn-primary btn">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
