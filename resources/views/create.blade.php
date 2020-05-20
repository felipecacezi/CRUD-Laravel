@extends('templates.template')
@section('content')

    <h1 class="text-center">@if(isset($book))EDITAR @else CADASTRAR @endif</h1>
    
        
    
        @if(isset($errors) && count($errors)>=1)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{ $erro }}
                @endforeach
            </div>
        @endif
    

    @if(isset($book))
        <form id="formEdit" name="formEdit" method="post" action="{{ url('books/'.$book->id ?? '') }}">
            @method('PUT')
    @else 
        <form id="formCad" name="formCad" method="post" action="{{ url('books') }}">
    @endif
    @csrf
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <label for="">Titulo</label>
                    <input name="title" type="text" class="form-control" value="{{ $book->title ?? '' }}" required>
                </div>

                <div class="col-12">
                    <label for="">Autor</label>
                    <select name="id_user" class="form-control" value="{{ $book->relUsers->id ?? '' }}"  required>
                        <option value="">Selecione</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" @if(isset($book) && $user->id == $book->relUsers->id) 'selected' @endif>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label for="">Paginas</label>
                    <input name="pages" type="text" class="form-control" value="{{ $book->pages ?? '' }}" required>
                </div>
                
                <div class="col-12">
                    <label for="">Preço</label>
                    <input name="price" type="text" class="form-control" value="{{ $book->price ?? '' }}" required>
                </div>

                <div class="col-12">
                    <br>
                </div>

                <div class="col-12">
                    @if(isset($book))
                        <input  class="btn btn-success" type="submit" value="Gravar">
                    @else 
                        <input  class="btn btn-success" type="submit" value="Cadastrar">
                    @endif                    
                </div>

            </div>
        </div>

    </form>	

@endsection