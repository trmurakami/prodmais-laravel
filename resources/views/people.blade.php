@extends('layouts.layout')

@section('title', 'Prodmais - Pesquisadores')

@section('content')
<main class="container">
    <h2>Prodmais - Pesquisadores</h2>
    <div class="row">
        <div class="col col-lg-12">
            <h3 class="mt-2">
                Resultado da busca <span class="badge text-bg-light fw-lighter">Exibindo
                    {{ $people->firstItem() }}
                    a {{ $people->lastItem() }} de {{ $people->total() }} registros</span>
            </h3>
            <form action="people" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Pesquisar no título" name="name">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </form>
            <div class="d-flex mt-3 mb-3">
                <div class="mx-auto">
                    {{ $people->links() }}
                </div>
            </div>
        </div>
        <div class="col col-lg-4">
            <h3>Refinar resultados <a href="people" class="btn btn-warning">Limpar busca</a> </h3>
        </div>
        <div class="col col-lg-8">
            <h3>Resultados</h3>
            @if ($people->count() == 0)
            <div class="alert alert-warning" role="alert">
                Nenhum registro encontrado
            </div>
            @endif
            @foreach($people as $key => $value)
            <p><a href="person/{{ $value->id }}">{{ $value->name }}</a></p>
            <ul>
                <p>ORCID: <a href="{{ $value->orcid }}">{{ $value->orcid }}</a></p>
            </ul>
            @endforeach
            <div class=" d-flex mt-3 mb-3">
                <div class="mx-auto">
                    {{ $people->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@stop