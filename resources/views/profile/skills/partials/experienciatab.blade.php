
        <div class="active tab-pane" id="activity">
            @foreach($skills as $skill)
                    <!-- Post -->
            <div class="post">
                <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="https://developers.google.com/android/work/images/afw-logo-64.png" alt="user image">
                        <span class='username'>
                          <a href="#">{{ $skill->empresa }} - {{ $skill->cargo }}</a>
                          <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
                        </span>
                    <span class='description'>Entre: {{$skill->fechaingreso}} y {{$skill->fechasalida}}</span>
                </div><!-- /.user-block -->
                <p>
                    {{ $skill->funciones  }}
                </p>
                <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> {{$skill->citiempresa->name}}</a></li>
                    @if($skill->publica == 1)
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Empresa publica</a></li>
                    @endif
                    @if($skill->docente == 1)
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Docencia</a></li>
                    @endif
                    {{--<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>--}}
                    @if(!empty($skill->archivo))
                        <li class="pull-right"><a href="{{asset('/images/exp/'.$skill['archivo'])}}" target="_blank" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Archivo</a></li>
                    @endif
                </ul>
                <a href="{{ url('skill/'.$skill->id.'/edit') }}" class='btn btn-danger pull-right btn-sm'>Editar</a>

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

