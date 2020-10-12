/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function createContract(formData)
{
    $.ajax({
        url: baseurl + "/contratos/crear",
        method: "POST",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: formData
    }).done(function (data) {
        $('#response').html(data);

        $("#create-contract-form").find(".ui.segment").each(function () {
            let obj_id = this.id;
            if (obj_id !== '') {
                $('#' + obj_id).remove();
            }
        });
        $("#create-contract-form").find("input[data-type='roll-input']").each(function () {
            let obj_id = this.id;
            if(obj_id !== ''){
                $('#' + obj_id).remove();
            }
        });
        
        $('#create-contract-form').form('reset');
        $('#file-name').html('No se ha seleccionado el documento.');
        $('#pdf-icon').removeClass('red');

        $('#response-error').addClass('hidden');
        var randomSuccess = Math.floor(Math.random() * successTitle.length);
        var title = successTitle[randomSuccess];
        swal2.fire({
            title: title,
            html: "Contrato registrado exitosamente!",
            icon: "success",
            showConfirmButton: false,
            showCancelButton: false,
            timer: 2500,
            allowOutsideClick: false
        });
        $('#create-contract-modal').modal('hide');

    }).fail(function (data) {

        let response = '';
        var errorObj = data.responseJSON; // Esto solo funciona con response de tipo JSON.
        if (errorObj == null) {
            console.log(data.responseText);
            response = 'Hubo un problema al procesaro tu petición, intentalo nuevamente.';
        } else {
            Object.keys(errorObj).forEach(function (k) {
                response += '<i class="chevron right red icon"></i>' + (errorObj[k][0] + '<br>');
            });
        }
//     var errorObj = JSON.parse(data.responseText) Si la response es de tipo texto, se convierte a JSON.


//        let response = '';
////        data.responseText.responseJSON.forEach(element => response = response + element);
        $('#response-error').removeClass('hidden');
        $('#response-error').html(response);
        swal2.fire({
            title: 'No se ha podido registrar el contrato!',
            html: response,
            icon: "error",
            showConfirmButton: true,
            showCancelButton: false,
            confirmButtonText: '<i class="check icon"></i> Entendido',
            allowOutsideClick: false
        });

    });
}

function viewContract()
{
    
}