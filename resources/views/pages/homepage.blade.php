@extends('layouts.app')

@section('title', 'OGS')

@section('content')

<section id="test">
    <?php
    $users = DB::table('users')->get();
    print_r($users);

?>
</section>

@endsection