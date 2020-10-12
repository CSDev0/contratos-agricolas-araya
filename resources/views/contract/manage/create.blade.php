
<div class="ui modal" id='create-contract-modal'>
    <i class="close icon red inside"></i>
    <div class="header">
        Registrar un contrato
    </div>
    <div class="content">
        <form class="ui form" action="{{ action('ContractController@create') }}" method="post" id="create-contract-form" enctype="multipart/form-data">

            {{ csrf_field() }}
            <div class="ui basic segment">
                <div class="field medium-bottom-margin">
                    <label>Numero de inscripción</label>
                    <div class="ui left icon input">
                        <input type="text" name="inscriptionNumber" placeholder="N° Inscripción del contrato">
                        <i class="file alternate icon"></i>
                    </div>
                </div>
                <div class="ui stackable two column grid">
                    <div class="column">
                        <div class="ui header">Comprador</div>
                        <div class="field">
                            <label>Nombre del comprador</label>
                            <div class="ui left icon input">
                                <input type="text" name="buyerName" placeholder="Nombre completo">
                                <i class="user icon"></i>
                            </div>
                        </div>
                        <div class="field">
                            <label>RUT del comprador</label>
                            <div class="ui left icon input">
                                <input type="text" name="buyerRut" placeholder="RUT Sin puntos">
                                <i class="address card icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="ui header">Vendedor</div>
                        <div class="field">
                            <label>Nombre del vendedor</label>
                            <div class="ui left icon input">
                                <input type="text" name="sellerName" placeholder="Nombre completo">
                                <i class="user icon"></i>
                            </div>
                        </div>
                        <div class="field">
                            <label>RUT del vendedor</label>
                            <div class="ui left icon input">
                                <input type="text" name="sellerRut" placeholder="RUT Sin puntos">
                                <i class="address card icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui vertical hidden divider">
                </div>
            </div>
            <h4 class="ui basic segment horizontal divider header small-bottom-margin">
                <i class="seedling green icon"></i>
                Productos
            </h4>
            <div id="products-container">
                <div class="ui segment small-margin">
                    <div class="ui stackable two column grid">
                        <div class="column">
                            <div class="field">
                                <label>Producto</label>
                                <select name="products[]" data-type="product-select" class="ui search dropdown" id="product-1">
                                </select>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label>Cantidad de producto</label>
                                <div class="ui right labeled input">
                                    <input type="number" name="quantities[]" placeholder="Ingresar el peso">
                                    <div class="ui basic label">
                                        kg
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui center aligned grid medium-bottom-margin medium-top-margin" id="product-control-buttons">
                <button type="button" class="ui tiny positive icon button" id="add-product">
                    <i class="plus icon"></i>
                </button>
                <button type="button" class="ui tiny negative icon button" id="remove-product" style="display: none;">
                    <i class="minus icon"></i>
                </button>
            </div>
            <h4 class="ui basic segment horizontal divider header">
                <i class="map marker alternate red icon"></i>
                Ubicación
            </h4>
            <div id="location-container">
                <div class="ui segment small-margin">
                    <div class="ui stackable two columns grid">
                        <div class="column">
                            <div class="field">
                                <label>Región</label>
                                <select data-type="region-select" name="regions[]" class="ui search dropdown" id="region-1">
                                </select>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label>Comuna</label>
                                <select data-type="commune-select" name="communes[]" class="ui search dropdown" id="commune-1">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui center aligned grid medium-bottom-margin medium-top-margin" id="location-control-buttons">
                <button type="button" class="ui tiny positive icon button" id="add-location">
                    <i class="plus icon"></i>
                </button>
                <button type="button" class="ui tiny negative icon button" id="remove-location" style="display: none;">
                    <i class="minus icon"></i>
                </button>
            </div>
            <h4 class="ui basic segment horizontal divider header">
                <i class="calendar alternate blue icon"></i>
                Fechas
            </h4>
            <div class="ui basic segment">
                <div class="two fields">
                    <div class="field">
                        <label>Fecha de inscripción</label>
                        <input readonly="true" id="start-contract-text" name="startDate" value="No ha seleccionado una fecha." class="thin-font">
                        <div class="ui calendar tiny-top-margin" id="start-contract-date">
                            <button type="button" class="ui blue button left icon thin-font" >
                                Inicio del contrato
                                <i class="calendar alternate icon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="field">
                        <label>Fecha de termino</label>
                        <input readonly="true" id="end-contract-text" name="endDate" value="No ha seleccionado una fecha." class="thin-font">
                        <div class="ui calendar tiny-top-margin" id="end-contract-date">
                            <button type="button" class="ui blue button left icon thin-font" name="endDate">
                                Fin del contrato
                                <i class="calendar alternate icon"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="ui basic segment horizontal divider header">
                <i class="tree olive icon"></i>
                Predios
            </h4>
            <div class="ui basic segment">
                <div class="ui two columns stackable grid">
                    <div class="row">
                        <div class="column">
                            <div class="field">
                                <label>Rol de predio</label>
                                <div class="ui icon input">
                                    <input type="text" id="input-roll" placeholder="Rol de predio">
                                    <i class="large plus link icon" id="add-roll"></i>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field" id="roll-container-label">
                                <label>Predios agregados</label>
                                <div class="ui basic labels" id="roll-container">
                                    Ningún rol de predio ha sido agregado aún.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
            </div>
            <h4 class="ui basic segment horizontal divider header">
                <i class="edit teal icon"></i>
                Detalles
            </h4>
            <div class="ui small-margin">
                <div class="field">
                    <label>Observaciones</label>
                    <div class="ui left icon input">
                        <input type="text" name="observations" placeholder="Observaciones de la inscripción">
                        <i class="edit icon"></i>
                    </div>
                </div>
            </div>
            <div class="ui placeholder segment">
                <div class="ui icon header">
                    <i class="pdf file outline icon" id="pdf-icon"></i>
                    <span id="file-name">No se ha seleccionado el documento.</span>
                </div>
                <label for="file-upload" class="ui basic labeled icon button">
                    <i class="upload icon"></i> Seleccionar
                </label>
                <input id="file-upload" name='file' type="file" style="display:none;">
            </div>


            <div class="ui error message" tabindex="-1" id='form-errors'></div>
            <div class="ui red message hidden" tabindex="-1" id='response-error'></div>

    </div>

    <div class="actions">
        <div class="ui negative deny button thin-font">
            Cancelar
        </div>
        <button type="submit" class="ui positive right labeled icon submit button thin-font">
            Registrar
            <i class="save icon"></i>
        </button>
    </div>

</form>
</div>


