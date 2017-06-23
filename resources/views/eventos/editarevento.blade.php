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
                color = "#AAFFHH";
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
                    <input type="hidden" id="n_cod_event" value="{{ $evento[0]->n_cod_event }}">
                    <fieldset>
                        <div class="row">
                            <section class="col col-6">
                                <label class="label">Seleccionar # cancha:</label>
                                <label class="select">
                                    <select name="num_cancha1" id="num_cancha1">
                                        <option value="0" selected="">Seleccione cancha</option>
                                        @foreach ($canchas as $c)
                                            @if($evento[0]->n_cod_cancha == $c->n_cod_det_neg)
                                                <option value="{{ $c->n_cod_det_neg }}" selected>{{ $c->c_desc_cancha }} - {{ $c->n_largo_cancha }} x {{ $c->n_ancho_cancha }}</option>
                                            @else
                                                <option value="{{ $c->n_cod_det_neg }}">{{ $c->c_desc_cancha }} - {{ $c->n_largo_cancha }} x {{ $c->n_ancho_cancha }}</option>
                                            @endif

                                        @endforeach
                                    </select> <i></i> </label>
                                <input type="hidden" id="n_cod_neg1" value="{{ $c->n_cod_neg }}">
                            </section>
                            <section class="col col-6">
                                <label class="label">Seleccione icono:</label>
                                <label class="input">
                                    <div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons">
                                        <label class="btn btn-default active">
                                            <input type="radio" name="iconselect1" id="icon-1" value="fa-info" checked>
                                            <i class="fa fa-info text-muted"></i> </label>
                                        <label class="btn btn-default">
                                            <input type="radio" name="iconselect1" id="icon-2" value="fa-warning">
                                            <i class="fa fa-warning text-muted"></i> </label>
                                        <label class="btn btn-default">
                                            <input type="radio" name="iconselect1" id="icon-3" value="fa-check">
                                            <i class="fa fa-check text-muted"></i> </label>
                                        <label class="btn btn-default">
                                            <input type="radio" name="iconselect1" id="icon-4" value="fa-user">
                                            <i class="fa fa-user text-muted"></i> </label>
                                        <label class="btn btn-default">
                                            <input type="radio" name="iconselect1" id="icon-5" value="fa-lock">
                                            <i class="fa fa-lock text-muted"></i> </label>
                                        <label class="btn btn-default">
                                            <input type="radio" name="iconselect1" id="icon-6" value="fa-clock-o">
                                            <i class="fa fa-clock-o text-muted"></i> </label>
                                    </div>
                                </label>
                            </section>
                        </div>


                            <section>
                                <label class="textarea">Descripción: <i class="icon-append fa fa-comment"></i>
                                    <textarea rows="2" id="descriptiondata1" maxlength="40" name="descriptiondata1" placeholder="Máximo 120 caracteres" >{{$evento[0]->c_desc_even}}</textarea>
                                </label>
                            </section>

                        <section>


                            <div class="row">
                                <section class="col col-4">
                                    <label class="label">Fecha:</label>
                                    <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                        <input type="text" name="fechaEvento1" id="fechaEvento1" placeholder="Select a date" class="form-control datepicker" data-dateformat="yy/mm/dd" value="{{$evento[0]->fecha}}">
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Hora:</label>
                                    <label class="input"> <i class="icon-append fa fa-clock-o"></i>
                                    <input class="form-control" id="horaEvento1" name="horaEvento1" type="text" placeholder="Select time" value="{{$evento[0]->hora}}">
                                        </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Tiempo(horas):</label>
                                    <label class="input">
                                        <input class="form-control spinner-rigth"  name="tiempoEvento1" id="tiempoEvento1" name="spinner" type="text" value="{{$evento[0]->tiempo}}">
                                    </label>
                                </section>
                            </div>


                        </section>

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