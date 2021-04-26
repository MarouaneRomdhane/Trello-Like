<style>
    body {
        background-image: url("{{ backgroundForPage('user.dashboard', 'storage/assets/uploads/robibi.jpg') }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
    .lsh_colCenter {
        justify-content: center;
        display: flex;
        align-items: center;
    }
    .lsh_delicon {
        width: 30px;
        border-radius: 50%;
    }

    .lsh_editicon {
        width: 30px;
        height: 30px;
        border-radius: 50%;
    }

    .lsh_flexRight {
        float: left;
    }

    .lsh_center {
        justify-content: center;
        margin-bottom:25px;
    }

    .lsh_card {
        margin: 35px;
        padding: 0;
    }

    /* .lsh_deliconModal{
        width:25%;
        border-radius: 50%;
    } */
</style>
@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row lsh_center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Ajouter Un Nouveau Tableau:</h5>
                <form method="POST" action="{{ @route('user.sendTable') }}">
                    @csrf
                    <input type="text" name="title" placeholder="Nouvelle Table">
                    <input type="submit" value="Envoyer">
                </form>
            </div>
        </div>
    </div>
    <div class="row lsh_colCenter">
        @foreach ($tables as $table)

        <div class="col-4 lsh_colCenter">
            <div class="card lsh_center" style="width: 18rem;">
                <div class="card-body">
                    <div class="row lsh_colCenter">
                        <div class="col lsh_colCenter"></div>
                        <div class="col lsh_colCenter">
                            <h3 class="card-title">
                                <a href="{{ @route('user.postit',[$table->id]) }}">{{ $table->title }}</a>
                            </h3>
                            <!-- Small modal for EDIT -->
                        </div>
                        <div class="col lsh_colCenter">
                            <input type="image" class="lsh_editicon" data-toggle="modal"
                                src="../storage/assets/uploads/edit.png" alt="iconDel"
                                data-target={{ '.modalComment'.$table->id }}>

                            <div class="modal fade {{ 'modalComment'.$table->id }} " tabindex="-1" role="dialog"
                                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ @route('ediTable',[$table->id]) }}">
                                            @csrf
                                            <input type="text" name="title" value="Changer le Titre">
                                            <input type="hidden" name="test" value='{{$table->id}}'>
                                            <input type="submit" value='modifier'>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row lsh_flexRight">
                        <form method="POST" action="{{ @route('delTable',[$table->id]) }}">
                            @csrf
                            <input class="lsh_delicon" type="image" name="delTab"
                                src="../storage/assets/uploads/del.png" alt="iconDel">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
@endsection
