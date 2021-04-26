<style>
    .bg_font {
        font-family: 'Oleo Script', cursive;
    }
    body {
        background-image: url("{{ backgroundForPage('user.backgrounds', 'storage/assets/uploads/profil.png') }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
</style>
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 bg_font">
            <table class="table">
                <thead>
                    <tr>
                        <th> Image </th>
                        <th> Page </th>
                        <th> Actions </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($backgrounds as $item)
                        <tr>
                            <td>
                                <img src="/storage/assets/uploads/backgrounds/{{ $item->bg_file }}" style="height: 100px;" />
                            </td>
                            <td>
                                {{ $item->page }}
                            </td>
                            <td>
                                <form method="post" action="/background">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="id" value="{{ $item->id }}" />
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form method="post" action="/backgrounds" enctype="multipart/form-data">
                @csrf
                <table class="table">
                    <tfoot>
                        <tr class="row">
                            <td class="col-4">
                                <input type="file" name="image" />
                            </td>
                            <td class="col-4">
                                <select name="page">
                                    @foreach ($page_list as $value => $name)
                                        <option value="{{$value}}">
                                            {{$name}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="col-4">
                                <button class="btn btn-primary" type="submit">Valider</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
@endsection
