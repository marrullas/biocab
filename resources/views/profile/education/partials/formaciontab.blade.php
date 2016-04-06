        @if($activartab)
        <div class="tab-pane active" id="timeline">
            @else
        <div class="tab-pane" id="timeline">
            @endif
            @foreach($educas as $educa)
                    <!-- Post -->
            <div class="post">
                <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="http://intuitglobal.intuit.com/delivery/cms/prod/sites/default/intuit.ca/images/intuit-ca-images/education-nav-icon.jpg" alt="user image">
                        <span class='username'>
                          <a href="#">{{ $educa->titulo }} - {{ $educa->institucion }}</a>
                          <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
                        </span>
                    <span class='description'>Terminado: {{$educa->fechaterminado}} - Ciudad: {{$educa->citiinstitucion->name}}</span>
                </div><!-- /.user-block -->
                <p>
                    {{ $educa->descripcion  }}
                </p>
                <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> {{$educa->tipoformacionnombre->nombre}}</a></li>
                    @if($educa->terminado == 1)
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Finalizado</a></li>
                    @endif
                    @if($educa->virtual == 1)
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Virtual</a></li>
                    @endif
                    @if($educa->distacia == 1)
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Distancia</a></li>
                    @endif
                    @if($educa->pedagogia == 1)
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Pedagogia</a></li>
                    @endif
                    @if($educa->ingles == 1)
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Ingles</a></li>
                    @endif
                    {{--<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>--}}
                    @if(!empty($educa->archivo))
                        <li class="pull-right"><a href="{{asset('/images/edu/'.$educa['archivo'])}}" target="_blank" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Archivo</a></li>
                    @endif
                </ul>
                <a href="{{ url('education/'.$educa->id.'/edit') }}" class='btn btn-danger pull-right btn-sm'>Editar</a>

            </div><!-- /.post -->
            @endforeach

            {{--						<!-- Post -->
                                    <div class="post">
                                        <div class='user-block'>
                                            <img class='img-circle img-bordered-sm' src='../../dist/img/user6-128x128.jpg' alt='user image'>
                                    <span class='username'>
                                      <a href="#">Adam Jones</a>
                                      <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
                                    </span>
                                            <span class='description'>Posted 5 photos - 5 days ago</span>
                                        </div><!-- /.user-block -->
                                        <div class='row margin-bottom'>
                                            <div class='col-sm-6'>
                                                <img class='img-responsive' src='../../dist/img/photo1.png' alt='Photo'>
                                            </div><!-- /.col -->
                                            <div class='col-sm-6'>
                                                <div class='row'>
                                                    <div class='col-sm-6'>
                                                        <img class='img-responsive' src='../../dist/img/photo2.png' alt='Photo'>
                                                        <br>
                                                        <img class='img-responsive' src='../../dist/img/photo3.jpg' alt='Photo'>
                                                    </div><!-- /.col -->
                                                    <div class='col-sm-6'>
                                                        <img class='img-responsive' src='../../dist/img/photo4.jpg' alt='Photo'>
                                                        <br>
                                                        <img class='img-responsive' src='../../dist/img/photo1.png' alt='Photo'>
                                                    </div><!-- /.col -->
                                                </div><!-- /.row -->
                                            </div><!-- /.col -->
                                        </div><!-- /.row -->

                                        <ul class="list-inline">
                                            <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                            <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                                            <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li>
                                        </ul>

                                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                                    </div><!-- /.post -->--}}
        </div><!-- /.tab-pane -->

