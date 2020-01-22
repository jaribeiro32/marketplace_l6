@extends('layouts.app')

@section('content')
    <h1>Criar Loja</h1>

    <form action="{{route('admin.stores.store')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="name">Loja</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">

            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror

        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror">

            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

        </div>

        <div class="form-group">
            <label for="phone">Telefone</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror">

            @error('phone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

        </div>

        <div class="form-group">
            <label for="mobile_phone">WhatsApp</label>
            <input type="text" name="mobile_phone" class="form-control @error('mobile_phone') is-invalid @enderror">

            @error('mobile_phone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn bt-lg btn-success">Criar Loja</button>
        </div>

    </form>
@endsection
