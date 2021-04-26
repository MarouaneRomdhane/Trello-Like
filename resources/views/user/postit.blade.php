<style>
    .tableau {
        border: 2px black solid;
        width: 20%;
        min-height: 200px;
        background-color: red;
        text-align: center;
    }

    .border_cards {
        border: 1px black solid;
        text-align: center;
    }

    .lsh_delicon {
        width: 30px;
        border-radius: 50%;
    }
    .lsh_todo{
        margin: 5px;
    }
    .lsh_margin{
        margin:20px;
    }
    .lsh_none {
        margin: 0 !important;
        padding: 0 !important;
    }

    body {
        background-image: url("{{ backgroundForPage('user.postit', 'storage/assets/uploads/login-page.jpg') }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
    .lsh_colCenter {
        justify-content: center;
        display: flex;
        align-items: center;
    }
    .lsh_editicon {
        width: 30px;
        height: 30px;
        border-radius: 50%;
    }

    .lsh_center {
        justify-content: center;
        margin-bottom: 25px;
    }
</style>

@extends('layouts.postit_template')
@section('postit')
<div class="container-fluid">
    <div class="row lsh_center lsh_Colcenter">
        @if($columns->isNotEmpty())

        @foreach ($columns as $column)
        <form method="POST" action="{{ @route('user.addCol',[$column->table_id]) }}">
            @endforeach
            @csrf
            <div>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title lsh_Colcenter">Ajouter une Colonne</h5>
                        <input type="text" name="title">
                        <input type="submit" name="col" value="Ajouter">
                    </div>
                </div>

            </div>
        </form>


        @else
        <div>
            <form method="POST" action="{{ @route('user.addCol',[$table]) }}">
                @csrf
                <div class="card lsh_center" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title lsh_Colcenter">Ajouter une Colonne</h5>
                        <input type="text" name="title">
                        <input type="submit" name="col" value="Ajouter">
                    </div>
                </div>
            </form>
        </div>
        @endif
    </div>
    <div class="row lsh_Colcenter">
        @foreach($columns as $column)

        <div class="col-4 lsh_colCenter">
            <div class="card lsh_center" style="width: 18rem;">
                <div class="card-body">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <h3 class="card-title">{{ $column->title }}</h3>
                        </div>
                        <div class="col ">

                            <!-- Small modal -->
                            <input type="image" class="lsh_editicon" data-toggle="modal"
                                src="../storage/assets/uploads/edit.png" alt="iconEdit"
                                data-target="{{ '.modalColumn'.$column->id }}">



                            <div class="modal fade {{ 'modalColumn'.$column->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">

                                        <form method="POST" action="{{ @route('user.editCol', [$column->id]) }}">
                                            @csrf
                                            <input type="text" name="title">
                                            <input type="submit" name="editCol" value="Edit">
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <form method="POST" action="{{ @route('user.delCol', [$column->id]) }}">
                        @csrf
                        <input class="lsh_delicon" type="image" name="delCol" src="../storage/assets/uploads/del.png"
                            alt="iconDel">

                    </form>

                    <form method="POST" action="{{ @route('user.addCard', [$column->table_id, $column->id]) }}">
                        @csrf
                        <input type="textarea" name="todo" placeholder="Nouvelle Todo">
                        <input type="submit" name="card" value="+">
                    </form>

                </div>

                @foreach ($cards as $card)
                @if($card->column_id == $column->id)
                <div class="border_cards">
                    <div class="row lsh_none lsh_colCenter">

                        <h5 class="lsh_todo"> {{ $card->todo }} </h5>
                    </div>
                    <div class="row lsh_none lsh_colCenter">
                        <div class="col lsh_colCenter">
                            <!-- Small modal -->
                            <input type="image" class="lsh_editicon" data-toggle="modal"
                                src="../storage/assets/uploads/edit.png" alt="iconEdit"
                                data-target="{{ '.modalColumn'.$card->id }}">
                            <div class="modal fade {{ 'modalColumn'.$card->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <form method="POST"
                                            action="{{ @route('user.editCard', [$column->table_id, $card->id]) }}">
                                            @csrf
                                            <input type="textarea" name="todo">
                                            <input type="submit" name="editCard" value="Edit">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row lsh_none .lsh_colCenter">

                            <form method="POST" class="lsh_none" action="{{ @route('user.delCard', [$column->table_id, $card->id]) }}">
                                @csrf
                                <input class="lsh_delicon" type="image" name="delCard" src="../storage/assets/uploads/del.png"
                                    alt="iconDel">
                            </form>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="{{ '.modalComment'.$card->id }}">+</button>
                </div>

                <div class="modal fade {{ 'modalComment'.$card->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <h4 class="lsh_Colcenter">Ajouter un Commentaire<h4>
                            <form class="lsh_Colcenter" method="POST"
                                action="{{ @route('user.addCom', [$column->table_id, $column->id, $card->id]) }}">
                                @csrf
                                <input type="textarea" name="comment" placeholder="Commentez">
                                <input type="submit" name="addCard" value="+">
                            </form>
                            @foreach ($comments as $comment)

                            @if($comment->card_id == $card->id)

                                <h5 class="lsh_todo"> {{ $comment->comment }} </h5>
                                <form class="lsh_todo" method="POST"
                                    action="{{ @route('user.editCom', [$column->table_id, $column->id, $comment->id]) }}">
                                    @csrf
                                    <input type="textarea" name="comment">
                                    <input type="submit" name="editCom" value="Edit">
                                </form>

                            <form method="POST"
                                action="{{ @route('user.delCom', [$column->table_id, $column->id, $comment->id]) }}">
                                @csrf
                                <input class="lsh_delicon" type="image" name="delCom"
                                    src="../storage/assets/uploads/del.png" alt="iconDel">
                            </form>
                            @endif

                            @endforeach

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        @endforeach
    </div>
</div>


@endsection
