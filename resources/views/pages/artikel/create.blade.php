@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Artikel') }}</div>
                    <div class="card-body">
                        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Judul') }}</label>
    
                                <div class="col-md-8">
                                    <input  type="text" class="form-control" name="judul">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('foto') }}</label>
    
                                <div class="col-md-8">
                                    <input  type="file" class="form-control" name="foto">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('category') }}</label>
    
                                <div class="col-md-8">
                                    <select name="id_category" id="" class="form-control">
                                        @foreach ($data as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('pembuat') }}</label>
    
                                <div class="col-md-8">
                                    <input  type="text" class="form-control" name="pembuat" readonly value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('isi') }}</label>
    
                                <div class="col-md-8">
                                    <textarea name="isi" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            
                            <button class="btn-primary btn">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
