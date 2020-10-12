/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function validateContractCreateForm() {
    $('#create-contract-form').form({
        fields: {
            inscriptionNumber: {
                rules: [
                    {type: 'empty', prompt: 'Debes ingresar un <b>Número de inscripción</b>.'}
                    
                ]
            },
            buyerName: {
                rules: [
                    {type: 'empty', prompt: 'Debes ingresar el <b>Nombre del comprador</b>.'}
                ]
            },
            buyerRut: {
                rules: [
                    {type: 'empty', prompt: 'Debes ingresar el <b>RUT del comprador</b>.'},
                    {type: 'minLength[9]', prompt: '<b>RUT del comprador</b> debe tener <b>Minimo 9 caracteres</b>.'},
                    {type: 'maxLength[11]', prompt: '<b>RUT del comprador</b> debe tener <b>Maximo 11 caracteres</b>.'}
                ]
            },
            sellerName: {
                rules: [
                    {type: 'empty', prompt: 'Debes ingresar el <b>Nombre del vendedor</b>.'}
                ]
            },
            sellerRut: {
                rules: [
                    {type: 'empty', prompt: 'Debes ingresar el <b>RUT del vendedor</b>.'},
                    {type: 'minLength[9]', prompt: '<b>RUT del vendedor</b> debe tener <b>Minimo 9 caracteres</b>.'},
                    {type: 'maxLength[11]', prompt: '<b>RUT del vendedor</b> debe tener <b>Maximo 11 caracteres</b>.'}
                ]
            },
            products: {
                identifier: 'products[]',
                rules: [
                    {type: 'empty', prompt: 'Debes seleccionar un <b>Producto de la lista</b>.'},
                ]
            },
            quantities: {
                identifier: 'quantities[]',
                rules: [
                    {type: 'empty', prompt: 'Debes ingresar la <b>Cantidad del producto</b>.'},
                ]
            },
            regions: {
                identifier: 'regions[]',
                rules: [
                    {type: 'empty', prompt: 'Debes seleccionar una <b>Región</b>.'},
                ]
            },
            communes: {
                identifier: 'communes[]',
                rules: [
                    {type: 'empty', prompt: 'Debes seleccionar una <b>Comuna</b>.'},
                ]
            },
            startDate: {
                identifier: 'startDate',
                rules: [
                    {type: 'empty', prompt: 'Debes elegir una <b>Fecha de inicio del contrato</b>.'},
                    {type: 'not[No ha seleccionado una fecha.]', prompt: 'Debes elegir una <b>Fecha de inicio del contrato</b>.'},
                ]
            },
            endDate: {
                identifier: 'endDate',
                rules: [
                    {type: 'empty', prompt: 'Debes elegir una <b>Fecha de termino del contrato</b>.'},
                    {type: 'not[No ha seleccionado una fecha.]', prompt: 'Debes elegir una <b>Fecha de termino del contrato</b>.'},
                ]
            },
            file: {
                identifier: 'file',
                rules: [
                {type: 'empty', prompt: 'Debes seleccionar un <b>Archivo PDF</b>.'}
                ]
            }
        },
        onFailure: function (errors, field) {
            setTimeout(function () {
                $("#form-errors").focus();
                $("#form-errors").transition('bounce');
            }, 100);
            return false;
        },
        onSuccess: function () {
            let products_form = [];
            let quantities_form = [];
            let regions_form = [];
            let communes_form = [];
            let rolls_form = [];
            
            $('select[name="products[]"]').each(function (n) {
                products_form[n] = $(this).dropdown('get value');
            });
            $('input[name="quantities[]"]').each(function (n) {
                quantities_form[n] = $(this).val();
            });
            $('select[name="regions[]"]').each(function (n) {
                regions_form[n] = $(this).dropdown('get value');
            });
            $('select[name="communes[]"]').each(function (n) {
                communes_form[n] = $(this).dropdown('get value');
            });
            $('input[name="rolls[]"]').each(function (n) {
                rolls_form[n] = $(this).val();
            });
            var formData = new FormData();
            let startDate = formatDate($('#start-contract-date').calendar('get date'));
            let endDate = formatDate($('#end-contract-date').calendar('get date'));

            formData.append('_token', $('input[name=_token]').val());
            formData.append('inscriptionNumber', $('input[name=inscriptionNumber]').val());
            formData.append('buyerName', $('input[name=buyerName]').val());
            formData.append('buyerRut', $('input[name=buyerRut]').val());
            formData.append('sellerName', $('input[name=sellerName]').val());
            formData.append('sellerRut', $('input[name=sellerRut]').val());
            formData.append('products', JSON.stringify(products_form));
            formData.append('quantities', JSON.stringify(quantities_form));
            formData.append('regions', JSON.stringify(regions_form));
            formData.append('communes', JSON.stringify(communes_form));
            formData.append('startDate', startDate);
            formData.append('endDate', endDate);
            formData.append('file', $('input[name=file]')[0].files[0]); 
            
            if (rolls_form !== null) {
                formData.append('rolls', JSON.stringify(rolls_form));
            }

            formData.append('observations', $('input[name=observations').val());

            createContract(formData);
            $("#form-errors").hide();
        }
//        on: 'blur',
//        inline: true,
//        onFailure: function (erros, field) {
//            var errorFields = $('.field.error input,.field.error select', this);
//            setTimeout(function () {
//                errorFields.first().focus();
//            }, 100);
//            return false;
//        }
    });
}