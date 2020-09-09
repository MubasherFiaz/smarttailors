  <div class="col-12 col-sm-12" style="background-color: white; "  id="s_tailors">
                <div class="row mgt70px">
            @foreach($shops as $s)
                    <div class="column" style="margin-top: 100px">

                        <div class="imgee">

                            <a href="{{url('tailor/'.$s->name)}}" class="notify-badge">Level {{$s->rating}}</a>
                            <a href="{{url('tailor/'.$s->name)}}">
                                <img src="{{asset('public/images/'.$s->img)}}">
                            </a>

                        </div>
                        <div class="loc">
                            <a href="{{url('tailor/'.$s->name)}}">
                                <h5>{{$s->city}}</h5>
                            </a>
                        </div>
                        <div class="detai">
                            <h3>{{$s->name}}<br><span>Tailor</span>
                                <p>{{$s->address}}</p>
                            </h3>
                            <ul>
                                <li><a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i> </a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>

                    </div>
            @endforeach
                  

                    <div style="clear: both;"></div>

                </div>

            </div>