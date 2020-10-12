$(document).ready(function () {
    /*---------------------------------------------------------------
     * 
     * CONFIGURACIÓN DE FORMULARIO CREAR CONTRATO
     *
     * --------------------------------------------------------------*/

    $('#create-contract-form').submit(function (e) {
        e.preventDefault();
    });
    $('.ui.dropdown').dropdown();
    /*---------------------------------------------------------------
     * 
     * ARCHIVO PDF CREAR CONTRATO
     *
     * --------------------------------------------------------------*/

    $('#file-upload').change(function () {
        var i = $(this).prev('label').clone();
        $('#pdf-icon').addClass('red');
        var file = $('#file-upload')[0].files[0].name;
        $('#file-name').text(file);
    });
    /*---------------------------------------------------------------
     * 
     * PRODUCTOS CREAR CONTRATO
     *
     * --------------------------------------------------------------*/
    var product_count = 2;
    var new_product = '';
    $('#add-product').on('click', function () {
        new_product =
                `<div class="ui segment small-margin" id="product-container-` + product_count + `">
            <div class="ui stackable two column grid">
                <div class="column">
                        <div class="field">
                            <label>Producto</label>
                            <select name="products[]" data-type="product-select" class="ui search dropdown" id="product-` + product_count + `">
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
            </div>`;

        $('#products-container').append(new_product);
        $('#product-container-' + product_count).transition('hide');
        $('#product-container-' + product_count).transition({animation: 'swing down', duration: '0.5s'});

        product_count++;

        if (product_count === 3) {
            $('#remove-product').show();
        }

        $("select[data-type='product-select']").each(function () {
            var obj_id = this.id;
            var number = $(this).attr('id').split('-').pop();

            if (number > product_count - 2) {
                $('#' + obj_id).html(product_html);
                $('#' + obj_id).dropdown();
            }
        });
        validateContractCreateForm();
    });
    $('#remove-product').on('click', function () {
        if (product_count === 3) {
            $('#remove-product').hide();
        }
        $('#products-container .segment').last().remove();
        product_count--;
        validateContractCreateForm();
    });

    /*---------------------------------------------------------------
     * 
     * REGIONES Y COMUNAS CREAR CONTRATO
     *
     * --------------------------------------------------------------*/
    var i_region = 0;
    var i_product = 0;
    var product_html = '<option value="">Selecciona un producto</option>';
    var region_html = '<option value="">Seleccione región</option>';
    var commune_html = '<option value="">Seleccione comuna</option>';
    $.each(products, function () {

        product_html += '<option value="' + products[i_product].id + '">' + products[i_product].name + '</option>';
        i_product++;
    });
    $.each(regions_and_communes, function () {
        region_html += '<option value="' + regions_and_communes[i_region].id + '">' + regions_and_communes[i_region].name + '</option>';
        i_region++;
    });
    $('.ui.dropdown').dropdown({placeholder: 'true'});
    $("select[data-type='product-select']").each(function () {
        $(this).html(product_html);
    });
    $("select[data-type='region-select']").each(function () {
        $(this).html(region_html);
    });
    $("select[data-type='commune-select']").each(function () {
        $(this).html(commune_html);
    });

    /*---------------------------------------------------------------
     * 
     * AGREGAR UNA NUEVA REGION Y COMUNA CREAR CONTRATO
     *
     * --------------------------------------------------------------*/
    var location_count = 2;
    var new_location = '';
    $('#add-location').on('click', function () {
        new_location =
                `<div class="ui segment small-margin" id="location-container-` + product_count + `">
                    <div class="ui two columns grid">
                        <div class="column">
                            <div class="field">
                                <label>Región</label>
                                <select name="regions[]" data-type="region-select" class="ui search dropdown" id="region-` + location_count + `">
                                    <option selected value="none">Selecciona una región</option>
                                </select>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label>Comuna</label>
                                <select name="communes[]" data-type="commune-select" class="ui search dropdown" id="commune-` + location_count + `">
                                    <option selected value="none">Selecciona una comuna</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>`;

        $('#location-container').append(new_location);
        $('#location-container-' + location_count).transition('hide');
        $('#location-container-' + location_count).transition({animation: 'swing down', duration: '0.5s'});

        location_count++;



        if (location_count === 3) {
            $('#remove-location').show();
        }

        $("select[data-type='region-select']").each(function () {
            var obj_id = this.id;
            var number = $(this).attr('id').split('-').pop();

            if (number > location_count - 2) {
                $('#' + obj_id).html(region_html);
                $('#' + obj_id).dropdown();
            }

        });
        $("select[data-type='commune-select']").each(function () {
            var obj_id = this.id;
            var number = $(this).attr('id').split('-').pop();

            if (number > location_count - 2) {
                $('#' + obj_id).html(commune_html);
                $('#' + obj_id).dropdown();
                onChangeRegion();
            }
        });
        validateContractCreateForm();
    });
    $('#remove-location').on('click', function () {
        if (location_count === 3) {
            $('#remove-location').hide();
        }
        $('#location-container .segment').last().remove();
        location_count--;
        validateContractCreateForm();
    });

    function onChangeRegion() {
        $("select[data-type='region-select']").change(function () {
            var i_region = 0;
            var region_val = $(this).val();
            var commune_html = '<option value="">Seleccione comuna</option>';

            var region_id_number = $(this).attr('id').split('-').pop();
            $.each(regions_and_communes, function () {

                if (regions_and_communes[i_region].id == region_val) {
                    var i_commune = 0;
                    $.each(regions_and_communes[i_region].communes, function () {
                        commune_html += '<option value="' + regions_and_communes[i_region].communes[i_commune].id + '">' + regions_and_communes[i_region].communes[i_commune].name + '</option>';
                        i_commune++;
                    });
                }
                i_region++;
            });
            $("select[data-type='commune-select']").each(function () {
                var obj_id = this.id;
                var commune_id_number = $(this).attr('id').split('-').pop();

                if (region_id_number == commune_id_number) {
                    $('#' + obj_id).html(commune_html);
                }

            });
        });
    }
    onChangeRegion();

    /*---------------------------------------------------------------
     * 
     * AGREGAR NUEVOS ROLES DE PREDIO CREAR CONTRATO
     *
     * --------------------------------------------------------------*/
    var roll_count = 1;
    $('#add-roll').on('click', function () {
        $('#add-roll').transition({animation: 'pulse', duration: '0.3s'});


        var roll = $('#input-roll').val();
        if (roll !== '') {
            $('#roll-container-label').show();
            var roll_html = `
                    <a class="ui label" id="roll-` + roll_count + `" data-type="roll-input">
                        ` + roll + ` <i class="icon close"></i>
                        <input type="hidden" name="rolls[]" value="` + roll + `">
                    </a>`;

            if (roll_count === 1) {
                $('#roll-container').html('');
            }
            $('#roll-container').html($('#roll-container').html() + roll_html);

            $('#roll-' + roll_count).transition('hide');
            $('#roll-' + roll_count).transition({animation: 'swing down', duration: '0.5s'});
            $('#txtAddRoll').val('');
            roll_count++;

            onClickRemoveRoll();

            $('#add-roll').addClass('olive');
            setTimeout(function () {
                $('#add-roll').removeClass('olive');
            }, 200);
        }
    });

    function onClickRemoveRoll() {
        $("*[data-type='roll-input']").on('click', function () {
            var obj_id = this.id;
            $('#roll-' + roll_count).transition({animation: 'swing down', duration: '0.5s'});
            $('#' + obj_id).remove();
            roll_count--;
            if (roll_count <= 1) {
                $('#roll-container').html('Ningún rol de predio ha sido agregado aún.')
            }
        });

    }
});

