/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {

    var $loading = $('#loader');
    $(document)
            .ajaxStart(function () {
                $loading.transition('fade', '200ms');
            })
            .ajaxStop(function () {
                $loading.transition('fade', '50ms');
            });

    $('.ui.sidebar').sidebar('setting', {
        onHide: function () {
            $('.sidebarCollapse').toggleClass('collapsed');
        },
        onVisible: function () {
            $('.sidebarCollapse').toggleClass('collapsed');
        }
    });
    function setCalendarLocale(id, input, start = null, end = null) {

        $(id).calendar({
            startMode: 'year',
            type: 'date',
            startCalendar: $(start),
            endCalendar: $(end),
            firstDayOfWeek: 1,
            onChange: function (date, text) {

                $(input).val(text);
                
            },
            formatter: {
                date: function (date) {
                    if (!date) {
                        return '';
                    }
                    let day = date.getDate() + '', month = (date.getMonth() + 1) + '', year = date.getFullYear();
                    if (day.length < 2) {
                        day = '0' + day;
                    }
                    if (month.length < 2) {
                        month = '0' + month;
                    }
                    return day + '/' + month + '/' + year;
                }
            },
            text: {
                days: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dec'],
                today: 'Hoy',
                now: 'Ahora',
                am: 'AM',
                pm: 'PM'
            }
        });
    }


    $('#create-contract-modal').modal({
        blurring: false,
        onVisible: function () {
            validateContractCreateForm();
            setCalendarLocale('#start-contract-date', '#start-contract-text', '#end-contract-date');
            setCalendarLocale('#end-contract-date', '#end-contract-text', '#start-contract-date');
        },
        onApprove: function () {
            return false; //block the modal here
        }
    });

    $('.sidebarCollapse').on('click', function () {
        $('.ui.sidebar').sidebar('toggle');
    });

    $('.ui.button').on('click', function () {
        $(this).transition({
            animation: 'pulse',
            duration: '0.2s'
        });
    });
    //Inicializar selects y dropdowns globalmente.
    $('.ui.dropdown').dropdown();


});

function formatDate(date) {
    if (!date) {
        return '';
    }
    let day = date.getDate() + '', month = (date.getMonth() + 1) + '', year = date.getFullYear();
    if (day.length < 2) {
        day = '0' + day;
    }
    if (month.length < 2) {
        month = '0' + month;
    }
    return year + '-' + month + '-' + day;
}