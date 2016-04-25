<div class="row">

    <div class="col-lg-12">

        <div class="main-box clearfix">
            <div class="table-responsive">
                <table class="table user-list">
                    <thead>
                    <tr>
                        <th><span>Nombre</span></th>
                        <th><span>Registrado</span></th>
                        <th class="text-center"><span>Status</span></th>
                        <th><span>Email</span></th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userslist as $userl)
                    <tr>
                        <td>
                            <img src="{{ asset('/images/catalog/'.$userl->imagen) }}" alt="">
                            <a href="#" class="user-link">{{$userl->name}}</a>
                            <span class="user-subhead">{{$userl->tipouser->descripcion}}</span>
                        </td>
                        <td>
                            {{$userl->created_at}}
                        </td>
                        <td class="text-center">
                            @if($userl->activo = 1)
                            <span class="label label-success">Activo</span>
                            @else
                            <span class="label label-default">Inactivo</span>
                            @endif
                        </td>
                        <td>
                            <a href="#">{{$userl->email}}</a>
                        </td>
                        <td style="width: 20%;">
                            <a href="{{ URL::to('/consulta/verusuario', $userl) }}" class="table-link">
									<span class="fa-stack">
										<i class="fa fa-square fa-stack-2x"></i>
										<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
									</span>
                            </a>
                            <a href="#" class="table-link">
									<span class="fa-stack">
										<i class="fa fa-square fa-stack-2x"></i>
										<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
									</span>
                            </a>
                            <a href="#" class="table-link danger">
									<span class="fa-stack">
										<i class="fa fa-square fa-stack-2x"></i>
										<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
									</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            {{$userslist->appends(['nombre'=>$nombre,'tipoformacion'=>$tipoformacion])->render()}}
{{--            <ul class="pagination pull-right">
                <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
            </ul>--}}
        </div>
    </div>
</div>
<link href="{{ asset('/css/listusers.css') }}" rel="stylesheet" type="text/css" />