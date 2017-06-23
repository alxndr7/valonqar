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
        <!-- end breadcrumb -->

        <!-- You can also add more buttons to the
        ribbon for further usability

        Example below:

        <span class="ribbon-button-alignment pull-right">
        <span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
        <span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
        <span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
        </span> -->

    </div>
    <!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    <div id="content">

        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark"><i class="fa fa-calendar fa-fw "></i>
                    Calendario
							<span>>
							Agregar Eventos
							</span>
                </h1>
            </div>

        </div>
        <!-- row -->

        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-12">
                <!-- new widget -->
                <div class="jarviswidget jarviswidget-color-blueDark">
                    <header>
                        <h2> Nueva reserva </h2>
                    </header>

                    <!-- widget div-->
                    <div>

                        <div class="widget-body">
                            <!-- content goes here -->

                            <form id="add-event-form" novalidate="novalidate">
                                <fieldset>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                                            <div class="form-group">
                                                <label>Seleccionar # cancha</label>
                                                <select name="num_cancha" id="num_cancha" class="form-control">
                                                    <option value="0" selected="" disabled="">Seleccione cancha</option>
                                                    @foreach ($canchas as $c)
                                                        <option value="{{ $c->n_cod_det_neg }}">{{ $c->c_desc_cancha }} - {{ $c->n_largo_cancha }} x {{ $c->n_ancho_cancha }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" id="n_cod_neg" value="{{ $c->n_cod_neg }}">

                                            </div>
                                        </div>
                                        <!--  <div class="form-group">
                                              <label>Event Title</label>
                                              <input class="form-control"  id="title" name="title" maxlength="40" type="text" placeholder="Event Title">
                                          </div>-->


                                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                                            <div class="form-group">
                                                <label>Seleccione icono</label>
                                                <div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons">
                                                    <label class="btn btn-default active">
                                                        <input type="radio" name="iconselect" id="icon-1" value="fa-info" checked>
                                                        <i class="fa fa-info text-muted"></i> </label>
                                                    <label class="btn btn-default">
                                                        <input type="radio" name="iconselect" id="icon-2" value="fa-warning">
                                                        <i class="fa fa-warning text-muted"></i> </label>
                                                    <label class="btn btn-default">
                                                        <input type="radio" name="iconselect" id="icon-3" value="fa-check">
                                                        <i class="fa fa-check text-muted"></i> </label>
                                                    <label class="btn btn-default">
                                                        <input type="radio" name="iconselect" id="icon-4" value="fa-user">
                                                        <i class="fa fa-user text-muted"></i> </label>
                                                    <label class="btn btn-default">
                                                        <input type="radio" name="iconselect" id="icon-5" value="fa-lock">
                                                        <i class="fa fa-lock text-muted"></i> </label>
                                                    <label class="btn btn-default">
                                                        <input type="radio" name="iconselect" id="icon-6" value="fa-clock-o">
                                                        <i class="fa fa-clock-o text-muted"></i> </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">

                                            <div class="form-group">
                                                <label>Select Event Color</label>
                                                <div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">
                                                    <label class="btn bg-color-darken active">
                                                        <input type="radio" name="priority" id="option1" value="bg-color-darken txt-color-white" checked>
                                                        <i class="fa fa-check txt-color-white"></i> </label>
                                                    <label class="btn bg-color-blue">
                                                        <input type="radio" name="priority" id="option2" value="bg-color-blue txt-color-white">
                                                        <i class="fa fa-check txt-color-white"></i> </label>
                                                    <label class="btn bg-color-orange">
                                                        <input type="radio" name="priority" id="option3" value="bg-color-orange txt-color-white">
                                                        <i class="fa fa-check txt-color-white"></i> </label>
                                                    <label class="btn bg-color-greenLight">
                                                        <input type="radio" name="priority" id="option4" value="bg-color-greenLight txt-color-white">
                                                        <i class="fa fa-check txt-color-white"></i> </label>
                                                    <label class="btn bg-color-blueLight">
                                                        <input type="radio" name="priority" id="option5" value="bg-color-blueLight txt-color-white">
                                                        <i class="fa fa-check txt-color-white"></i> </label>
                                                    <label class="btn bg-color-red">
                                                        <input type="radio" name="priority" id="option6" value="bg-color-red txt-color-white">
                                                        <i class="fa fa-check txt-color-white"></i> </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <textarea class="form-control" placeholder="Máximo 120 caracteres" rows="2" maxlength="120" id="descriptiondata" name="descriptiondata"></textarea>
                                            </div>
                                            </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Fecha:</label>
                                                <div class="input-group">
                                                    <input type="text" name="fechaEvento" id="fechaEvento" placeholder="Select a date" class="form-control datepicker" data-dateformat="yy/mm/dd">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Hora:</label>
                                                <div class="input-group">
                                                    <input class="form-control" id="horaEvento" name="horaEvento" type="text" placeholder="Select time">
                                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-4 col-lg-2">

                                            <div class="form-group">
                                                <label>Tiempo(horas):</label>
                                                <input class="form-control spinner-rigth"  name="tiempoEvento" id="tiempoEvento" name="spinner" value="1" type="text">
                                            </div>

                                        </div>

                                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-2">
                                            <div class="form-group">
                                                <label>Agregar</label>
                                                        <button class="btn btn-primary form-control" onclick="agregarEvento()" type="button" id="add-event2" >
                                                            Agregar reserva
                                                        </button>
                                            </div>
                                        </div>

                                    </div>
                                </fieldset>
                            </form>

                            <!-- end content -->
                        </div>

                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->
<!--
                <div class="well well-sm" id="event-container">
                    <form>
                        <fieldset>
                            <legend>
                                Reservas sin asignar
                            </legend>
                            <ul id='external-events' class="list-unstyled">
                                <li>
                                    <span class="bg-color-darken txt-color-white" data-description="Currently busy" data-icon="fa-time">Office Meeting</span>
                                </li>
                                <li>
                                    <span class="bg-color-blue txt-color-white" data-description="No Description" data-icon="fa-pie">Lunch Break</span>
                                </li>
                                <li>
                                    <span class="bg-color-red txt-color-white" data-description="Urgent Tasks" data-icon="fa-alert">URGENT</span>
                                </li>
                            </ul>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="drop-remove" class="checkbox style-0" checked="checked">
                                    <span>remove after drop</span> </label>

                            </div>
                        </fieldset>
                    </form>

                </div>-->
            </div>
        </div>

        <div class="row">


            <div class="col-sm-12 col-md-12 col-lg-12">

                <!-- new widget -->
                <div class="jarviswidget jarviswidget-color-blueDark">

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
                        <span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
                        <h2> Mi calendario de Reservas </h2>
                        <div class="widget-toolbar">
                            <!-- add: non-hidden - to disable auto hide -->
                            <div class="btn-group">
                                <button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
                                    Vista <i class="fa fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu js-status-update pull-right">
                                    <li>
                                        <a href="javascript:void(0);" id="mt">Mensual</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" id="ag">Agenda</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" id="td">Diaria</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>

                    <!-- widget div-->
                    <div>

                        <div class="widget-body no-padding">
                            <!-- content goes here -->
                            <div class="widget-body-toolbar">

                                <div id="calendar-buttons">

                                    <div class="btn-group">
                                        <a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-prev"><i class="fa fa-chevron-left"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-next"><i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div id="calendar"></div>

                            <!-- end content -->
                        </div>

                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->

            </div>

        </div>
        <!-- end row -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
            </div>
    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

@endsection


@section('script')
        <!-- Scripts -->

<script type="text/javascript">

    // DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function() {

        pageSetUp();

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
            events: '/wsobteventosweb',
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
         color = "#AAFFHH";
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
