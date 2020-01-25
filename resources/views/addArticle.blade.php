@extends('layouts.app')
    @section('content')
        <div class="container">
            <h1>Adicione aqui seu artigo!</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Titulo</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Titulo">
                </div>
                <div class="form-group">
                    <label for="">Escolha a qual categoria pertence o seu artigo:</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            @if(!empty($categories))
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            @endif
                        </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Escreva seu artigo:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Imagem</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <input type="submit" value="Enviar" >
                </div>
            </form>
        </div>
    @endsection
