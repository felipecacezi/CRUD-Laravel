@extends('templates.template')
@section('content')

	<h1 class="text-center">VISUALIZAR</h1>

	
	<div class="col-8 m-auto">
        @php
            $user = $book->find($book->id)->relUsers;
        @endphp

        TÍTULO  : {{ $book->title }} <br>
        PÁGINAS : {{ $book->pages }} <br>
        PREÇO   : {{ $book->price }} <br>
        AUTOR   : {{ $user->name }}  <br>
        EMAIL   : {{ $user->email }}
    </div>

@endsection