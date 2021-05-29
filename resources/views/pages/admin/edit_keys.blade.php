@extends('layouts.app')

@section('title', 'OGS - Edit Product')



@section('content')

<section class="container">
    <!-- Breadcrumbs -->
    <div class="row mx-0 my-3 p-0">
        <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"> <a href="{{ route('homepage') }}"> Home </a></li>
            <li class="breadcrumb-item"> <a href="{{ route('admin') }}"> Admin Panel </a></li>
            <li class="breadcrumb-item"> <a href="{{ url('admin/products') }}"> Products </a></li>
            <li class="breadcrumb-item active" aria-current="page"> Edit Product {{$game->id}} </li>
        </ol>
    </div>

    <section class="bg-dark p-5 my-4">
        <h4 class="text-shadow row">UPDATE {{ $game->title }} KEYS</h4>
        <span class="text-muted row">Add or remove "{{ $game->title }}" game keys </span>

        <ul class="mt-1">
            @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
            @endforeach
        </ul>

        <form method="POST" action="/admin/products/{{$game->id}}/keys" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="row">
                <span class="col text-light px-0">View used keys</span>
                <div class="col-1"></div>
                <span class="col text-light px-0">Select available keys to remove</span>
            </div>


            <div class="row">
                <select multiple disabled class="form-control col mt-3 bg-secondary text-light"
                    style="min-height:200px">
                    @forelse($used_keys as $key)
                    <option>{{ $key->key }}</option>
                    @empty
                    @endforelse
                </select>
                <div class="col-1"></div>
                <select multiple name="del_keys[]" class="form-control col mt-3 w bg-secondary text-light"
                    style="min-height:200px">
                    @forelse($available_keys as $key)
                    <option value="{{ $key->id }}">{{ $key->key }}</option>
                    @empty
                    @endforelse
                </select>

            </div>

            <div class="row mt-4">
                <div class="col px-0">
                    <label for="m_keys" class="control-label text-light">Add keys</label>
                    <textarea class="form-control bg-secondary text-light" name="m_keys"
                        placeholder="Enter one key per line" rows="6"></textarea>
                </div>
                <div class="col-1"></div>
                <div class="col px-0">
                    <div class="row">
                        <label for="f_keys" class="col control-label text-light">
                            Add from file (txt, one key per line)
                        </label>
                    </div>
                    <div class="row">
                        <input type="file" name="f_keys" class="col mt-2" multiple>
                    </div>
                </div>
            </div>

            <button id="admin-add-game-btn" class="btn row btn-success my-5 btn-lg w-100" type="submit">
                Update {{$game->title}} keys
            </button>





        </form>
    </section>
</section>

@endsection