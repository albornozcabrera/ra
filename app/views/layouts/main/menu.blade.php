@if (Session::has('usuario.accesos'))    
<nav class="menu_principal">                
        <ul>
            @if(isset(Session::get('usuario.accesos')->call->return))
                @foreach (Session::get('usuario.accesos')->call->return as $m)
                    @if (!isset($m->descripcion))
                        <li><a href="#" class="">@if(isset($m->nombre)) {{ $m->nombre }}@endif<span class="ico_desplegar">{{ HTML::image('img/plantilla/flecha_abajo.png', '', array('class' => '','width'=>'13', 'height'=>'7')) }}</span></a>                                
                            <ul ng-cloak>
                                @if (isset($m->listaFormulario))
                                    @if (count($m->listaFormulario) > 1)
                                        @foreach ($m->listaFormulario as $l)
                                            @if (!isset($l->listaFormulario))
                                                <li>
                                                    <?= HTML::link($l->descripcion, $l->nombre, array()) ?>
                                                </li>                                                        
                                            @else
                                                @if (isset($l->listaFormulario))
                                                        <li><a href="#" class="">{{$l->nombre}}<span class="ico_desplegar">{{ HTML::image('img/plantilla/flecha_abajo.png', '', array('class' => '','width'=>'13', 'height'=>'7')) }}</span></a>
                                                        @if (count($l->listaFormulario) > 1)
                                                            @foreach ($l->listaFormulario as $c)
                                                                <ul style="padding-left:15px;font-size: 12px">
                                                                     @if (isset($l->listaFormulario))
                                                                         @if (count($l->listaFormulario) > 1)
                                                                             @foreach ($l->listaFormulario as $c)
                                                                                 <li>
                                                                                     <?= HTML::link($c->descripcion, $c->nombre, array()) ?>
                                                                                 </li> 
                                                                            @endforeach                                                                        
                                                                         @endif
                                                                     @endif
                                                                 </ul>
                                                            @endforeach
                                                            @else
                                                                <ul style="padding-left:15px;font-size: 12px">
                                                                    <li>
                                                                        <?= HTML::link($l->listaFormulario->descripcion, $l->listaFormulario->nombre, array()) ?>
                                                                    </li> 
                                                                </ul>
                                                        @endif
                                                    </li>
                                                 @endif   
                                                 
                                            @endif
                                        @endforeach                                                
                                    @else
                                        @if (isset($m->listaFormulario->descripcion))
                                            <li>
                                                <?= HTML::link($m->listaFormulario->descripcion, $m->listaFormulario->nombre, array()) ?>
                                            </li>                                                        
                                        @endif
                                    @endif
                                @endif
                                
                                @if (isset($m->listaMenuOpcion))
                                    @if (count($m->listaMenuOpcion) > 1)
                                    
                                    @foreach ($m->listaMenuOpcion as $c)
                                    <li><a href="#" class="">{{$c->nombre}}<span class="ico_desplegar">{{ HTML::image('img/plantilla/flecha_abajo.png', '', array('class' => '','width'=>'13', 'height'=>'7')) }}</span></a>
                                            @if (isset($c->listaFormulario))
                                                <ul style="padding-left:15px;font-size: 12px">
                                                @if (count($c->listaFormulario) > 1)
                                                    @foreach ($c->listaFormulario as $i)
                                                    <li>
                                                        <?= HTML::link($i->descripcion, $i->nombre, array()) ?>
                                                    </li> 
                                                    @endforeach   
                                                 @else
                                                       <li>
                                                           <?= HTML::link($c->listaFormulario->descripcion, $c->listaFormulario->nombre, array()) ?>
                                                       </li>                                                        
                                                 @endif
                                                 </ul>
                                            @endif
                                    </li>
                                    @endforeach
                                      
                                    @else
                                        @if (isset($m->listaMenuOpcion->listaFormulario->descripcion))
                                            <li>
                                                <?= HTML::link($m->listaMenuOpcion->listaFormulario->descripcion, $m->listaMenuOpcion->listaFormulario->nombre, array()) ?>
                                            </li>                                                        
                                        @endif
                                    @endif
                                @endif
                                
                                
                            </ul>
                        </li>
                    @else
                        <li><span><?= HTML::link($m->descripcion, $m->nombre, array()) ?></span></li>
                    @endif 

                @endforeach           
            @else
                <li><span><?= HTML::link('usuario/exit', 'Salir', array()) ?></span></li>
            @endif
        </ul>
    </nav>    
@endif