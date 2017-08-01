@extends('layouts.master')

@section('content')

<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">

				<span class="ribbon-button-alignment">
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span>
				</span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>Home</li><li>Reservas</li><li>Calendario</li>
        </ol>
    </div>
    <!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    <div id="content">

        <section id="widget-grid" class="">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: -12px">
                    <div class="well well-sm well-light">
                        <h1 class="txt-color-green"><b>
                                <h1 class="txt-color-green"><b>Mantenimiento de Canchas</b></h1>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="text-left">
                                            <button type="button" class="btn btn-labeled bg-color-blue txt-color-white" onclick="new_cancha();">
                                                <span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span>Nuevo
                                            </button>
                                            <!--
                                            <button  type="button" class="btn btn-labeled bg-color-blue txt-color-white" onclick="clickmodmemodesc();">
                                                <span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span>Modificar
                                            </button>
                                            <button  type="button" class="btn btn-labeled btn-danger" onclick="delete_memo_desc();">
                                                <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Eliminar
                                            </button>
                                            <button type="button" class="btn btn-labeled bg-color-magenta txt-color-white" onclick="reporte_memo_desc();">
                                                <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>Imprimir
                                            </button>-->
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                <!-- NEW WIDGET START -->
                <article class="col-sm-12 col-md-12 col-lg-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-greenLight" id="wid-id-3" data-widget-editbutton="false">
                        <!-- widget options:
                        usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                        data-widget-colorbutton="false"
                        data-widget-editbutton="false"
                        data-widget-togglebutton="false"
                        data-widget-deletebutton="false"
                        data-widget-fullscreenbutton="false"
                        data-widget-custombutton="false"
                        data-widget-collapsed="true"
                        data-widget-sortable="false"

                        -->

                        <header>
                            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                            <h2>Listado de canchas </h2>

                        </header>

                        <!-- widget div-->
                        <div>

                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->

                            </div>
                            <!-- end widget edit box -->

                            <!-- widget content -->
                            <div class="widget-body no-padding">

                                <div class="alert alert-info no-margin fade in">
                                    <button class="close" data-dismiss="alert">
                                        ×
                                    </button>
                                    <i class="fa-fw fa fa-info"></i>
                                    Aquí puede visualizar el detalle de sus canchas
                                </div>
                                <div class="table-responsive">
                                    <table class="table" id="jqgrid"></table>
                                    <div id="pjqgrid"></div>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th align="center">#</th>
                                            <th align="center"> <i class="fa fa-sort-amount-desc"></i> Descripción</th>
                                            <th align="center"> <i class="fa fa-long-arrow-right"></i> Largo</th>
                                            <th align="center"> <i class="fa fa-long-arrow-up"></i> Ancho</th>
                                            <th align="center"> <i></i> #Jugadores</th>
                                            <th align="center"> <i class="fa fa-magic"></i> Color</th>
                                            <th align="center"> <i class="fa fa-thumbs-up"></i> Estado</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <input type="hidden" value="{{$cont=1}}">
                                        @foreach($listadocanchas as $cancha)
                                            @if($cont % 2 == 0)
                                            <tr class="success">
                                                <td>{{$cont++}}</td>
                                                <td >
                                                    <a style="cursor:pointer" class="editar_link" href="conf_canchas/{{ $cancha->n_cod_det_neg }}" title="Haga click para editar el cancha"> {{$cancha->c_desc_cancha}}</a>
                                                   </td>
                                                <td >{{$cancha->n_largo_cancha}}</td>
                                                <td >{{$cancha->n_ancho_cancha}}</td>
                                                <td >{{$cancha->n_num_jug_recomen}}</td>
                                                <td align="left"><span class="label" style="background-color: {{ $cancha->c_color_cancha }}"> {{ $cancha->c_color_cancha }}</span> </td>
                                                <td>{{$cancha->c_est_cancha}}</td>
                                            </tr>
                                            @else
                                                <tr class="info">
                                                    <td>{{$cont++}}</td>
                                                    <td>
                                                        <a style="cursor:pointer" class="editar_link" href="conf_canchas/{{ $cancha->n_cod_det_neg }}" title="Haga click para editar el cancha"> {{$cancha->c_desc_cancha}}</a>
                                                    </td>
                                                    <td>{{$cancha->n_largo_cancha}}</td>
                                                    <td>{{$cancha->n_ancho_cancha}}</td>
                                                    <td>{{$cancha->n_num_jug_recomen}}</td>
                                                    <td align="left"><span class="label" style="background-color: {{ $cancha->c_color_cancha }}"> {{ $cancha->c_color_cancha }}</span> </td>
                                                    <td>{{$cancha->c_est_cancha}}</td>
                                                </tr>
                                            @endif

                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->

                </article>
                <!-- WIDGET END -->
            </div>
        </section>
        <!-- end row -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
            </div>
        <div class="modal fade" id="myModal_edit" tabindex="-1" role="dialog">
        </div>
    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

@endsection


@section('script')
        <!-- Scripts -->
<script language="JavaScript" type="text/javascript" src="{{ asset('js_local/conf_cancha.js') }}"></script>
<script src="{{asset('js/plugin/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script type="text/javascript">

    // DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function() {

        $('a.editar_link').click(function(event)
        {
            event.preventDefault();
            $('#myModal_edit').load($(this).attr('href'));
            $('#myModal_edit').modal('show');
        });

        $('a.nuevo_link').click(function(event)
        {
            event.preventDefault();
            $('#myModal').load($(this).attr('href'));
            $('#myModal').modal('show');
        });



        pageSetUp();
        $("#menu_configuracion").show();
        $("#conf_canchas").addClass('active');

        var errorClass = 'invalid';
        var errorElement = 'em';

        $("#add-event-form").validate({
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
                descriptiondata : {
                    required : true
                },
                fechaEvento :{
                    required: true
                },
                tiempoEvento :{
                    required: true
                },
                horaEvento: {
                    required: true
                },
                num_cancha: {
                    required: true
                }
            },

            // Messages for form validation
            messages : {
                descriptiondata : {
                    required : 'Este campo es obligatorio'
                },
                fechaEvento :{
                    required: 'Este campo es obligatorio'
                },
                tiempoEvento :{
                    required: 'Este campo es obligatorio'
                },
                horaEvento :{
                    required: 'Este campo es obligatorio'
                },
                num_cancha: {
                    required: 'Este campo es obligatorio'
                }
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });


        $('#horaEvento').timepicker();
        $("#tiempoEvento").spinner();

        "use strict";

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var hdr = {
            left: 'title',
            center: 'month,agendaWeek,agendaDay',
            right: 'prev,today,next'
        };

        var initDrag = function (e) {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end

            var eventObject = {
                title: $.trim(e.children().text()), // use the element's text as the event title
                description: $.trim(e.children('span').attr('data-description')),
                icon: $.trim(e.children('span').attr('data-icon')),
                className: $.trim(e.children('span').attr('class')) // use the element's children as the event class
            };
            // store the Event Object in the DOM element so we can get to it later
            e.data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            e.draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            });
        };

        var addEvent = function (title, priority, description, icon) {
            title = title.length === 0 ? "Untitled Event" : title;
            description = description.length === 0 ? "No Description" : description;
            icon = icon.length === 0 ? " " : icon;
            priority = priority.length === 0 ? "label label-default" : priority;

            var html = $('<li><span class="' + priority + '" data-description="' + description + '" data-icon="' +
                    icon + '">' + title + '</span></li>').prependTo('ul#external-events').hide().fadeIn();

            $("#event-container").effect("highlight", 800);

            initDrag(html);
        };

        /* initialize the external events
         -----------------------------------------------------------------*/

        $('#external-events > li').each(function () {
            initDrag($(this));
        });
/*
        $('#add-event').click(function () {
            var title = $('#num_cancha option:selected').text(),
                    priority = $('input:radio[name=priority]:checked').val(),
                    description = $('#description').val(),
                    icon = $('input:radio[name=iconselect]:checked').val();

            addEvent(title, priority, description, icon);
        });*/

        /* initialize the calendar
         -----------------------------------------------------------------*/

        $('#calendar').fullCalendar({

            header: hdr,
            editable: false,
            droppable: true, // this allows things to be dropped onto the calendar !!!

            drop: function (date, allDay) { // this function is called when something is dropped

                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');

                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);

                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }

            },

            select: function (start, end, allDay) {
                var title = prompt('Event Title:');
                if (title) {
                    calendar.fullCalendar('renderEvent', {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            }, true // make the event "stick"
                    );
                }
                calendar.fullCalendar('unselect');
            },
            events: '{{url('/wsobteventosweb')}}',
            eventClick: function(event) {

                $.ajax({
                    type: 'POST',
                    url: "{{route("form.editar.evento")}}",
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'n_cod_event': event.id
                    },
                    success: function(data) {
                        //alert(data);
                        //event.preventDefault();
                        $('#myModal').modal('show');
                        $('#myModal').show().html(data);
                    },

                });

            },
            eventRender: function (event, element, icon) {
                if (!event.description == "") {
                    element.find('.fc-title').append("<br/><span class='ultra-light'>" + event.description +
                            "</span>");
                }
                if (!event.icon == "") {
                    element.find('.fc-title').append("<i class='air air-top-right fa " + event.icon +
                            " '></i>");
                }
            },
            windowResize: function (event, ui) {
                $('#calendar').fullCalendar('render');
            }
        });

        /* hide default buttons */
        $('.fc-right, .fc-center').hide();


        $('#calendar-buttons #btn-prev').click(function () {
            $('.fc-prev-button').click();
            return false;
        });

        $('#calendar-buttons #btn-next').click(function () {
            $('.fc-next-button').click();
            return false;
        });

        $('#calendar-buttons #btn-today').click(function () {
            $('.fc-today-button').click();
            return false;
        });

        $('#mt').click(function () {
            $('#calendar').fullCalendar('changeView', 'month');
        });

        $('#ag').click(function () {
            $('#calendar').fullCalendar('changeView', 'agendaWeek');
        });

        $('#td').click(function () {
            $('#calendar').fullCalendar('changeView', 'agendaDay');
        });


    });

    function agregarEvento(){
        if($("#add-event-form").valid()){

         var icon = $('input:radio[name=iconselect]:checked').val();
         var id_cancha =  $('#num_cancha').val();
         var n_cod_neg =  $('#n_cod_neg').val();
         var c_des_neg =  $('#descriptiondata').val();
         var color = "#FFFFFF";
         var tiempo = $('#tiempoEvento').val();
         var fecha = $('#fechaEvento').val().split("/");
         var dia = fecha[0];
         var mes = fecha[1];
         var anio = fecha[2];
         var hora = $('#horaEvento').val().split(" ");
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
         color = "#AAFFEE";
         }

         var fecha_ini = $('#fechaEvento').val() + " " +hora_ini + ":" + min_ini;
         var fecha_fin = $('#fechaEvento').val() + " " +hora_fin + ":" + min_fin;

         // alert("fecha ini:" + fecha_ini + " fecha fin: " + fecha_fin);

         $.ajax({
         method: "POST",
         url: "{{route("insertar.evento")}}",
         dataType:"json",
         data: {
             '_token': CSRF_TOKEN,
             'fecha_ini': fecha_ini,
             'fecha_fin': fecha_fin,
             'icon': icon,
             'id_cancha': id_cancha,
             'n_cod_neg': n_cod_neg,
             'color': color,
             'c_des_neg': c_des_neg
         },
         success: function (data) {

         // var jsonObj = JSON.parse(data);
         // alert(JSON.stringify(data));
         //alert();

         if(data['response']) {
         $.smallBox({
         title : "Se agregó el evento correctamente",
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
         title : "No se pudo agregar el evento",
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
        }


    }


</script>

@endsection
