@extends('layout.master')
@section('content')
<div class="ui center aligned padded grid">
    <div class="blue sixteen wide column">
        <h1 class="">Registra tu Contrato</h1>
    </div>
    <div class="row">
        <div class="ui vertical segment">
            <span class="ui large text">Solo he utilizado Bootstrap, pero decidi utilizar Semantic UI para este proyecto!</span>
        </div>
    </div>
    <div class="row">
        <div class="white column">
            <button class="ui large button" onclick="$('.ui.sidebar').sidebar('toggle');">Vamos allá</button>
            <button class="ui large button" onclick="$('#exampleModal').modal('show');">Iniciar sesión</button>
        </div>
    </div>
</div>
<div class="ui modal" id='exampleModal'>
    <i class="close icon red inside"></i>
    <div class="header">
        Iniciar sesión
    </div>
    <div class="content">
        <form class="ui form">
            <div class="field">
                <label>Correo</label>
                <div class="ui large left icon input">
                    <input type="email" name="txtEmail" placeholder="correo@mail.com">
                    <i class="envelope icon"></i>
                </div>
            </div>
            <div class="field">
                <label>Contraseña</label>
                <div class="ui large left icon input">
                    <input type="password" name="txtPassword" placeholder="******">
                    <i class="lock icon"></i>
                </div>
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input type="checkbox" tabindex="0">
                    <label>Mantener sesión iniciada</label>
                </div>
            </div>
            <br>
            <div class="actions">
                <div class="ui large gray deny button">
                    Cancelar
                </div>
                <button type="submit" class="ui large primary right labeled icon button">
                    Iniciar Sesión
                    <i class="send icon"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@stop