       <!-- comment list END -->
       <ol class="comment-list">
           @foreach($comments as $comment)
               <li class="comment">
                   <div class="comment-body">
                       <div class="comment-author vcard"> <img class="avatar photo" src="{{ asset($comment->image) }}"
                               alt=""> <cite class="fn">{{ $comment->user->name }}</cite>
                           <span class="says">says:</span> </div>
                       <div class="comment-meta"> {{ $comment->created_at->diffForHumans() }}</div>
                       <p>{{ $comment->body }} </p>
                   </div>

                   <!-- list END -->
               </li>
           @endforeach
       </ol>
