@extends('templates.template')
@section('content')

	<h1 class="text-center">CRUD</h1>

	<div class="col-12 text-center">
		<a href="{{ url('books/create') }}">
			<button class="btn btn-success">Cadastrar</button>	
		</a>		
	</div>

	<div class="col-12"><br></div>

	<div class="col-8 m-auto">
		@csrf
		<table class="table">
			<thead class="thead-dark">
				<tr>
				<th scope="col">#</th>
				<th scope="col">Título</th>
				<th scope="col">Autor</th>
				<th scope="col">Preço</th>
				<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($books as $book)
					@php
						$user = $book->find($book->id)->relUsers;
					@endphp
					<tr id="line_{{ $book->id }}">
						<td>{{ $book->id }}</td>
						<td>{{ $book->title }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $book->price }}</td>
						<td>
							<a href="{{ url('books/'.$book->id) }}">
								<button class="btn btn-dark">Visualizar</button>
							</a>
							<a href="{{ url('books/'.$book->id.'/edit') }}">
								<button class="btn btn-primary">Editar</button>
							</a>
							{{-- <a href="{{ url('books/'.$book->id) }}" class="js-del"> --}}
							<button type="button" class="btn btn-danger btn-delete" data-line="line_{{ $book->id }}" data-url="{{ url('books/'.$book->id) }}" >Deletar</button>
							{{-- </a> --}}
						</td>
					</tr>	
				@endforeach
			</tbody>
		</table>
	</div>
	<script src="{{ url('js/deletar.js') }}"></script>
@endsection