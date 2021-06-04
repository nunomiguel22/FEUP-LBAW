@extends('layouts.app')

@section('title', 'OGS - Edit Product')

@section('scripts')
<script src="{{ asset('js/image-panel.js') }}" defer></script>
@endsection

@section('breadcrumbs')
<div class="row mx-0 my-3 p-0">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"> <a href="{{ route('homepage') }}"> Home </a></li>
        <li class="breadcrumb-item"> <a href="{{ route('admin') }}"> Admin Panel </a></li>
        <li class="breadcrumb-item"> <a href="{{ url('/admin/products') }}"> Products </a></li>
        <li class="breadcrumb-item"> <a href="{{ url('/products/'.$game->id) }}"> {{ $game->title }} </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Edit Product </li>
    </ol>
</div>
@endsection

@section('content')

<section class="container">

    <section class="bg-dark p-5 my-4">
        <h4 class="text-shadow">EDIT A GAME</h4>
        <span class="text-muted">Edit game "{{ $game->title }}" with id {{$game->id}} </span>

        <ul class="mt-1">
            @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
            @endforeach
        </ul>

        <form method="POST" action="/admin/products/{{$game->id}}/edit" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('partials.admin.product-form')

            <hr>
            <h4 class="mt-5 text-shadow">IMAGES AND TAGS</h4>
            <span class="text-muted">Add, edit or remove the images and tags for this game</span>


            <div class="my-2 row ">

                <div class="col-6">
                    <div class="row">
                        <label for="rem-image-sel" class="col control-label text-light">Remove images from the
                            gallery</label>
                    </div>
                    <div class="row">
                        <select multiple hidden id="rem-image-sel" name="images_del[]">
                        </select>
                        <div class="col-12 image-panel bg-secondary ml-3">
                            @forelse($game->images as $image)
                            <img value="{{$image->id}}" class="selectable-image" src="{{ $image->getPath() }}">
                            @empty
                            @endforelse
                        </div>
                    </div>

                    <div class="row mt-2">
                        <label for="images" class="col control-label text-light">Add new gallery Images</label>
                    </div>
                    <div class="row">
                        <input type="file" name="images[]" class="col mt-2" multiple>
                    </div>
                </div>

                <div class="col-6">
                    <label for="tags" class="text-light">Tags</label>
                    <select multiple name="tags[]" class="form-control bg-dark text-light">
                        @forelse($tags as $tag)
                        @if ($game->tags->contains($tag->id))
                        <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                        @else
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endif
                        @empty
                        @endforelse
                    </select>
                    <div class="row mt-2">
                        <div class="col-9 pr-0">
                            <input type="text" class="form-control bg-secondary text-light"
                                placeholder="Add New Tag Name">
                        </div>
                        <div class="col-3 pl-0">
                            <button type="button" id="dev_adder" class="btn btn-sm btn-success my-auto"
                                style="width:100%; height:95%;">
                                +
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <button class="btn btn-success my-5 btn-lg w-100" type="submit">
                        EDIT GAME</button>
                </div>
                <div class="col-6">
                    <button class="btn btn-danger my-5 btn-lg w-100" data-toggle="modal" data-target="#deleteGameModal"
                        type="button">
                        DELETE GAME</button>
                </div>
            </div>
        </form>
    </section>
</section>

<aside class="modal fade" id="deleteGameModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="container">

                <!-- Modal Header -->
                <div class="row mt-4 mb-3 float-right">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="row mt-4 mb-3">
                    <div class="col-12" align="center">
                        <img src="{{ Storage::url('images/logo/logo_transparent.png')}}" width="100" height="100"
                            alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-10 ml-auto mr-auto">
                        <p>DELETE GAME FROM SYSTEM</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 ml-auto mr-auto">
                        <p class="text-danger">
                            Warning: Deleting this product from the system will also delete all information
                            related to it. This includes reviews, purchase histories, wishlist selections, game keys,
                            etc, along with all of the products information. Consider delisting instead if you are
                            not certain.
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5 ml-auto">
                        <form method="POST" action="/admin/products/{{$game->id}}/delete" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger my-5 btn-lg w-100" data-toggle="modal"
                                data-target="#deleteGameModal" type="submit">
                                DELETE GAME</button>
                        </form>
                    </div>

                    <div class="col-5 mr-auto">
                        <button class="btn btn-info my-5 btn-lg w-100" type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            GO BACK</button>
                    </div>

                </div>
                </form>

            </div>
        </div>
    </div>
</aside>

@endsection