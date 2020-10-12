@extends('layout.master')
@section('content')
@include('contract.manage.create')
<script>
    var products = <?php echo json_encode($products); ?>;
    var regions_and_communes = <?php echo json_encode($regions); ?>;
</script>
<script src="{{asset('js/manage-contracts.js') }}"></script>
<script src="{{asset('js/validations/validate-create-contract.js') }}"></script>
<script src="{{asset('js/ajax/contract.js') }}"></script>
<div class="ui container">
    <div class="ui grid">
        <div class="row"></div>
        <div class="row">
            <div class="eight wide center aligned column">
                <button class="ui basic labeled icon button" onclick="$('#create-contract-modal').modal('toggle');">
                    <i class="plus icon"></i> Registrar un contrato
                </button>
            </div>
            <div class="eight wide center aligned column">
                <button class="ui basic labeled icon button" onclick="$('#login-modal').modal('toggle');">
                    <i class="plus icon"></i> Registrar un contrato
                </button>
            </div>
        </div>
    </div>
    <h4 class="ui horizontal divider header">
        <i class="file blue icon"></i>
        Contratos
    </h4>
    <div class="row">
        <div class="sixteen wide border column">
            <div class="ui menu">
                <div class="item">
                    <div class="ui icon input">
                        <input type="text" placeholder="Search...">
                        <i class="search icon"></i>
                    </div>
                </div>
                <div class="right item">
                    <div class="ui action input">
                        <input type="text" placeholder="Navigate to...">
                        <div class="ui button">Go</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
