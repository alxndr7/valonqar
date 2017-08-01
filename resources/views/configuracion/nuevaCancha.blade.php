<script>
// add function

var errorClass = 'invalid';
var errorElement = 'em';

$("#edit_form_evento").validate({
    errorClass		: errorClass,
    errorElement	: errorElement,
    highlight: function(element) {
        $(element).parent().removeClass('state-success').addClass("state-error");
        $(element).removeClass('valid');
    },
    unhighlight: function(element) {
        $(element).parent().removeClass("state-error").addClass('state-success');
        $(element).addClass('valid');
    },
    // Rules for form validation
    rules : {
        descriptiondata1 : {
            required : true
        },
        fechaEvento1 :{
            required: true
        },
        tiempoEvento1 :{
            required: true
        },
        horaEvento1: {
            required: true
        },
        num_cancha1: {
            required: true
        }
    },

    // Messages for form validation
    messages : {
        descriptiondata1 : {
            required : 'Este campo es obligatorio'
        },
        fechaEvento1 :{
            required: 'Este campo es obligatorio'
        },
        tiempoEvento1 :{
            required: 'Este campo es obligatorio'
        },
        horaEvento1 :{
            required: 'Este campo es obligatorio'
        },
        num_cancha1: {
            required: 'Este campo es obligatorio'
        }
    },

    // Do not change code below
    errorPlacement : function(error, element) {
        error.insertAfter(element.parent());
    }
});


function editarEvento(){
    if($("#edit_form_evento").valid()){

        var icon = $('input:radio[name=iconselect1]:checked').val();
        var n_cod_event = $('#n_cod_event').val();
        var id_cancha =  $('#num_cancha1').val();
        var n_cod_neg =  $('#n_cod_neg1').val();
        var color = "#FFFFFF";
        var tiempo = $('#tiempoEvento1').val();
        var fecha = $('#fechaEvento1').val().split("/");
        var dia = fecha[0];
        var mes = fecha[1];
        var anio = fecha[2];
        var hora = $('#horaEvento1').val().split(" ");
        var tmp_hora = hora[0].split(":");
        var am_pm = hora[1];
        var hora_ini = tmp_hora[0];
        if(am_pm == "PM" && hora_ini !=12)
            hora_ini = Number(hora_ini) +  12;
        var min_ini = tmp_hora[1];
        var hora_fin = Number(hora_ini) + Number(tiempo);
        var min_fin = min_ini;

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        if(hora_fin > 23){
            hora_fin = 23;
            min_fin = 59;
        }

        switch(id_cancha) {
            case '1':
                color = "#9C27B0";
                break;
            case '2':
                color = "#009688";
                break;
            case '3':
                color = "#CDDC39";
                break;
            case '4':
                color = "#4CAF50";
                break;
            case '5':
                color = "#FF9800";
                break;
            default:
                color = "#AAFFAA";
        }

        var fecha_ini = $('#fechaEvento1').val() + " " +hora_ini + ":" + min_ini;
        var fecha_fin = $('#fechaEvento1').val() + " " +hora_fin + ":" + min_fin;

        // alert("fecha ini:" + fecha_ini + " fecha fin: " + fecha_fin);

        $.ajax({
            method: "POST",
            url: "{{route("editar.evento")}}",
            dataType:"json",
            data: {
                '_token': CSRF_TOKEN,
                'n_cod_event': n_cod_event,
                'fecha_ini': fecha_ini,
                'fecha_fin': fecha_fin,
                'icon': icon,
                'id_cancha': id_cancha,
                'n_cod_neg': n_cod_neg,
                'color': color
            },
            success: function (data) {

                // var jsonObj = JSON.parse(data);
                // alert(JSON.stringify(data));
                //alert();

                if(data['response']) {
                    $.smallBox({
                        title : "Se editó el evento correctamente",
                        content : "<i class='fa fa-clock-o'></i> <i>hace 2 segundos</i>",
                        color : "#296191",
                        iconSmall : "fa fa-check-square bounce animated",
                        timeout : 4000
                    });

                    $('#calendar').fullCalendar('removeEvents');
                    $('#calendar').fullCalendar('addEventSource', '/wsobteventosweb');
                    $('#calendar').fullCalendar('rerenderEvents' );
                }
                else{
                    $.smallBox({
                        title : "No se pudo editar el evento",
                        content : "<i class='fa fa-clock-o'></i> <i>hace 2 segundos</i>",
                        color : "#f44336",
                        iconSmall : "fa fa-minus-square bounce animated",
                        timeout : 4000
                    });
                }



            },
            error: function (e) {
                //something went wrong with the request
                alert("Error" + e.responseText);
            }

        });
        event.preventDefault();
        $('#myModal').modal('hide');
    }


}
$('#colorpicker-1').colorpicker();
$('#horaEvento1').timepicker();
$("#tiempoEvento1").spinner();
$("#fechaEvento1").datepicker({
    dateFormat : 'yy/mm/dd'
});


</script>
<!-- Modal -->

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    <img src="/img/logo.png" width="150" alt="SmartAdmin">
                </h4>
            </div>
            <div class="modal-body no-padding">

                <form id="edit_form_evento" class="smart-form">
                    <input type="hidden" id="n_cod_event" value="">
                    <fieldset>
                        <div class="row">
                            <section class="col col-4">
                                <label class="label">Descripción:</label>
                                <label class="select">
                                    <input class="form-control" type="text" name="fechaEvento1" id="fechaEvento1" placeholder=" Descripción" value=""> </label>
                                <input type="hidden" id="n_cod_neg1" value="">
                            </section>
                            <section class="col col-4">
                                <label class="label">Largo:</label>
                                <label class="input">
                                    <input class="form-control" type="text" name="fechaEvento1" id="fechaEvento1" placeholder="00.00" value="">
                                </label>
                            </section>
                            <section class="col col-4">
                                <label class="label">Ancho:</label>
                                <label class="input">
                                    <input class="form-control" type="text" name="fechaEvento1" id="fechaEvento1" placeholder="00.00" value="">
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-4">
                                <label class="label">Jug. Recomendados:</label>
                                <label class="select">
                                    <input class="form-control" type="text" name="fechaEvento1" id="fechaEvento1" placeholder=" Descripción" value=""> </label>
                                <input type="hidden" id="n_cod_neg1" value="">
                            </section>
                            <section class="col col-4">
                                <label class="label">Color:</label>
                                <label class="input">
                                    <input class="form-control" id="colorpicker-1" type="text" value="#8fff00">

                                </label>
                            </section>
                            <section class="col col-4">
                                <label class="label">Estado:</label>
                                <label class="input">
                                    <select class="form-control" name="num_cancha1" id="num_cancha1">
                                        <option value="0" selected="">Seleccione Estado</option>
                                        <option value="1">Activo</option>
                                        <option value="2" >Inactivo</option>
                                    </select> <i></i>
                                </label>
                            </section>
                        </div>

                    </fieldset>

                    <footer>
                        <button type="button" class="btn btn-primary" onclick="editarEvento()">
                           Editar
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Cancelar
                        </button>

                    </footer>
                </form>


            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->



<script>

</script>