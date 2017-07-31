<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                        <img src="{{ asset('/img/avatars/sunny.png')}}" alt="me" class="online" />
						<span>
							{{ Auth::user()->c_nom_usu }}
						</span>
                        <i class="fa fa-angle-down"></i>
                    </a>

				</span>
    </div>
    <!-- end user info -->

    <nav>
        <!--
        NOTE: Notice the gaps after each icon usage <i></i>..
        Please note that these links work a bit different than
        traditional href="" links. See documentation for details.
        -->

        <ul>

            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-user"><em>3</em></i> <span class="menu-item-parent">Reservas</span></a>
                <ul>
                    <li>
                        <a href="calendar.html"><i class="fa fa-lg fa-fw fa-calendar"></i> <span class="menu-item-parent">Calendario</span></a>
                    </li>
                    <li>
                        <a href="gmap-xml.html"><i class="fa fa-lg fa-fw fa-map-marker"></i> <span class="menu-item-parent">GMap Skins</span><span class="badge bg-color-greenLight pull-right inbox-badge">9</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">Administrar</span></a>
                <ul>
                    <li>
                        <a href="{{route('list.evento')}}">Eventos</a>
                    </li>
                    <li>
                        <a href="datatables.html">Pagos<span class="badge inbox-badge bg-color-greenLight hidden-mobile">responsive</span></a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Reportes</span></a>
                <ul>
                    <li>
                        <a href="flot.html">Flot Chart</a>
                    </li>
                    <li>
                        <a href="morris.html">Morris Charts</a>
                    </li>
                    <li>
                        <a href="sparkline-charts.html">Sparklines</a>
                    </li>
                    <li>
                        <a href="easypie-charts.html">EasyPieCharts</a>
                    </li>
                    <li>
                        <a href="dygraphs.html">Dygraphs</a>
                    </li>
                    <li>
                        <a href="chartjs.html">Chart.js</a>
                    </li>
                    <li>
                        <a href="hchartable.html">HighchartTable <span class="badge pull-right inbox-badge bg-color-yellow">new</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>


			<span class="minifyme" data-action="minifyMenu">
				<i class="fa fa-arrow-circle-left hit"></i>
			</span>

</aside>
<!-- END NAVIGATION -->
