@extends('layout.master')
@section('content')
<div class="ui center aligned padded grid">

    <div class="row">
        <div class="ui vertical segment">
            <span class="ui large text">Este proyecto usa Fomantic UI frontend framework!</span>
        </div>
    </div>
    <div class="row">
        <div class="white column">
            <button class="ui large button" onclick="$('.ui.sidebar').sidebar('toggle');">Vamos allá</button>
            <button class="ui large button" onclick="$('#exampleModal').modal('show');">Iniciar sesión</button>
        </div>
    </div>
</div>
@stop