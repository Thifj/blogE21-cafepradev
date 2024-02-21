@extends('layouts.admin.template')
@section('title', 'listar artigos')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Artigos</h1>
        </div>
        <div class="d-flex justify-content-end">
            @can('deleta-artigo', 1)
            <a href="{{route("artigos.create")}}" class="btn btn-success">ADICIONAR</a>
            @endcan
        </div>
    </div>

    @if (session()->has('success'))
        <div class="row">
            <div class="col col-sm-12 col-md-6">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>TITULO</th>
                        <th>AUTOR</th>
                        <th>DATA</th>
                        <th>IMAGEM</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $a)
                        <tr>
                            <td>{{ $a->title }}</td>
                            <td>{{ $a->author }}</td>
                            <td>{{ date("d/m/Y", strtotime($a->date)) }}</td>
                            <td><img src="/upload/{{$a->image}}" width="120px"></td>
                            <td>
                                @can('deleta-artigo', 1)
                                <a href="{{ route('artigos.edit', $a->id) }}">Editar</a>
                                <a href="#" onclick="deleteRegistro('delete-form')">Deletar</a>
                                <form id="delete-form" class="d-none" action="{{ route('artigos.destroy', $a->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>  
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-12">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteRegistro(elem) {
            if (confirm("deseja deletar este registro?")) {
                event.preventDefault();
                document.getElementById(elem).submit()
            }
        }
    </script>
@endsection
