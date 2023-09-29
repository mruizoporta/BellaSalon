	<div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
	    <ul class="side-menu-list">           
            <li>
				<a href="{{ url('/home') }}">
					<i class="glyphicon glyphicon-dashboard"></i>
					<span class="lbl">Dashboard </span>
				</a>
			</li>
	        <li class="blue with-sub">
	            <span>
	                <i class="glyphicon glyphicon-lock"></i>
	                <span class="lbl">Seguridad</span>
	            </span>
	            <ul>
					<li><a href="{{ url('/roles') }}"><span class="lbl">Roles</span></a></li>
	                <li><a href="{{ url('/usuarios') }}"><span class="lbl">Usuarios</span></a></li>	                
	            </ul>
	        </li>
	    
            <li class="blue with-sub">
	            <span>
	                <i class="glyphicon glyphicon-cog"></i>
	                <span class="lbl">Configuracion</span>
	            </span>
	            <ul>
					<a href="{{ url('/empresas') }}"><span class="lbl">Empresas</span></a></li>
	                <li><a href="{{ url('/parametros/1/edit') }}"><span class="lbl">Parametros </span></a></li>	                                     
                    <li><a href="{{ url('/sucursales') }}"><span class="lbl">Sucursales</span></a></li>                    
	            </ul>
	        </li>
	        <li class="blue with-sub">
	            <span>
	                <i class="glyphicon glyphicon-book"></i>
	                <span class="lbl">Catálogos </span>
	            </span>
	            <ul>
					<li><a href="{{ url('/catalogos') }}"><span class="lbl">Catalogos generales</span></a></li>
					<li><a href="{{ url('/almacenes') }}"><span class="lbl">Almacenes</span></a></li>       
	            </ul>
	        </li>
	        	      
            <li class="blue with-sub">
                <span>
					<i class="glyphicon glyphicon-list-alt"></i>
	                <span class="lbl">Inventario</span>
	            </span>
                    <ul>					 
						<li><a href="{{ url('/productos') }}"><span class="lbl">Productos</span></a></li>
						<li><a href="{{ url('/servicios') }}"><span class="lbl">Servicios</span></a></li>
						<li><a href="{{ url('/proveedores') }}"><span class="lbl">Proveedores</span></a></li>												  
                        <li><a href="{{ url('/entradas') }}"><span class="lbl">Entradas</span></a></li>
                        <li><a href="{{ url('/salidas') }}"><span class="lbl">Salidas</span></a></li>     
                        <li><a href="{{ url('/existencias') }}"><span class="lbl">Existencia</span></a></li>   
                        <li><a href="{{ url('/kardex') }}"><span class="lbl">Kardex</span></a></li> 						    
                    </ul>	            
	        </li>

			<li class="blue with-sub">
                <span>
                    <i class="glyphicon glyphicon-duplicate"></i>
	                <span class="lbl">Facturacion</span>
	            </span>
                    <ul>                       				 
                        <li><a href="{{ url('/facturas') }}"><span class="lbl">Factura</span></a></li>     
                        <li><a href="{{ url('/candidatos') }}"><span class="lbl">Devoluciones</span></a></li>  
						<li><a href="{{ url('/descuentos') }}"><span class="lbl">Promociones</span></a></li>     
                    </ul>	            
	        </li>

			<li class="blue with-sub">
                <span>
                    <span class="glyphicon glyphicon-calendar"></span>
	                <span class="lbl">Citas</span>
	            </span>
                    <ul>
                        <li><a href="{{ url('/horario') }}"><span class="lbl">Horarios</span></a></li>
                        <li><a href="{{ url('/citas') }}"><span class="lbl">Calendario de citas</span></a></li>     
						<li><a href="{{ url('/citas') }}"><span class="lbl">Citas registradas</span></a></li>     
                    </ul>	            
	        </li>

			<li class="blue with-sub">
                <span>
                    <i class="glyphicon glyphicon-usd"></i>
	                <span class="lbl">Caja</span>
	            </span>
                    <ul>
                        <li><a href="{{ url('/empresas') }}"><span class="lbl">Configuracion de cajas</span></a></li>
						<li><a href="{{ url('/movimientos') }}"><span class="lbl">Movimientos en caja</span></a></li>  
						<li><a href="{{ url('/ofertas') }}"><span class="lbl">Arqueo de caja</span></a></li> 
						<li><a href="{{ url('/pos') }}"><span class="lbl">POS</span></a></li> 
                        <li><a href="{{ url('/ofertas') }}"><span class="lbl">Recibos</span></a></li>  
						<li><a href="{{ url('/ofertas') }}"><span class="lbl">Depositos</span></a></li>   
                    </ul>	            
	        </li>
			<li class="blue with-sub">
                <span>
                    <i class="glyphicon glyphicon-th-list"></i>
	                <span class="lbl">Cuentas por pagar</span>
	            </span>
                    <ul>                      
                        <li><a href="{{ url('/ofertas') }}"><span class="lbl">Devoluciones</span></a></li>     
                        <li><a href="{{ url('/candidatos') }}"><span class="lbl">Facturas de compras</span></a></li>   
                        <li><a href="{{ url('/solicitudes') }}"><span class="lbl">Notas de crédito a proveedores</span></a></li> 
						<li><a href="bootstrap-datatables.html"><span class="lbl">Estados de cuenta</span></a></li>     
                    </ul>	            
	        </li>

			<li class="blue with-sub">
                <span>
                    <span class="glyphicon glyphicon-folder-close"></span>
	                <span class="lbl">Cuentas por cobrar</span>
	            </span>
                    <ul>
                        <li><a href="{{ url('/empresas') }}"><span class="lbl">Clientes</span></a></li>
                        <li><a href="{{ url('/ofertas') }}"><span class="lbl">Notas de crédito</span></a></li>     
                        <li><a href="{{ url('/candidatos') }}"><span class="lbl">Notas de debito</span></a></li>   
                        <li><a href="{{ url('/solicitudes') }}"><span class="lbl">Recibos</span></a></li> 
						<li><a href="bootstrap-datatables.html"><span class="lbl">Estados de cuenta</span></a></li>     
                    </ul>	            
	        </li>
			<li class="blue with-sub">
                <span>
                    <i class="glyphicon glyphicon-user"></i>
	                <span class="lbl">Recursos humanos</span>
	            </span>
                    <ul>
                        <li><a href="{{ url('/empleados') }}"><span class="lbl">Empleados</span></a></li>
                        <li><a href="{{ url('/facturas') }}"><span class="lbl">Vacaciones</span></a></li>     
                        <li><a href="{{ url('/candidatos') }}"><span class="lbl">Comisiones</span></a></li>  
						<li><a href="{{ url('/descuentos') }}"><span class="lbl">Nomina</span></a></li>     
                    </ul>	            
	        </li>
			<li class="blue with-sub">
                <span>
                    <i class="glyphicon glyphicon-briefcase"></i>
	                <span class="lbl">Contabilidad</span>
	            </span>
                    <ul>
						<li><a href="{{ url('/empresas') }}"><span class="lbl">Parametros contables</span></a></li> 
                        <li><a href="{{ url('/empresas') }}"><span class="lbl">Cuentas contables</span></a></li>
                        <li><a href="{{ url('/ofertas') }}"><span class="lbl">Comprobantes</span></a></li>     
                        <li><a href="{{ url('/candidatos') }}"><span class="lbl">Blance General</span></a></li>   
                        <li><a href="{{ url('/solicitudes') }}"><span class="lbl">Estado de resultados</span></a></li> 
						<li><a href="bootstrap-datatables.html"><span class="lbl">Balanza de comprobacion</span></a></li>     
                    </ul>	            
	        </li>
	    
	    </ul>
	
	</nav><!--.side-menu-->