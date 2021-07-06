<div class="clear" id="comment-list">
    <div class="comments-area" id="comments">
        <h2 class="comments-title">Comments</h2>
        <div class="clearfix m-b20">
           @include('frontend.partials.comments', ['comments' => $post->comments, 'student_post_id' => $post->id])

                 <!-- Form -->
            <div class="comment-respond" id="respond">
                <form class="comment-form" method="POST" action="{{ route('comment.store') }}">
                   @csrf
                    <p class="comment-form-author">
                        <label for="author">Name <span class="required">*</span></label>
                        <input type="text" value="{{ Auth::user()->name }}" name="Author" placeholder="Author" id="author">
                    </p>
                    <input type="hidden" name="student_post_id" value="{{ $post->id }}" />
                    <p class="comment-form-comment">
                        <label for="comment">Comment</label>
                        <textarea rows="8" name="body" placeholder="Оставить комментарий" id="comment"></textarea>
                    </p>
                    <p class="form-submit">
                        <input type="submit" value="Оставьте комментарий" class="submit" id="submit" name="submit">
                    </p>
                </form>
            </div>
            <!-- Form -->
           </div>
    </div>
             </div>