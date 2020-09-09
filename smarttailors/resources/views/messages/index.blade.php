<div class="message-wrapper">
  
                <ul class="messages">
                    @foreach($messages as $message)
                    <li class="message clearfix">
                        {{--if message from id is equal to auth id then it is sent by logged in user --}}
                      <?php  $id=auth()->user()->id ?>

<div class="{{ ($message->from == $id) ? 'sent' : 'received'}}">
                            <p>{{$message->text}}</p>
                           
                            <p class="date">{{ date('d M y , h:i a',strtotime($message->created_at))}}</p>
                        </div>
                    </li>
                    @endforeach
                  
                </ul>
            </div>
            <div class="input-text">
                <input type="text" name="message" class="submit">
            </div>