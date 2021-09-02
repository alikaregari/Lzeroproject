@foreach($comments as $comment)
    <article class="{{! $loop->first ? 'mt-4' : 'mt-2'}}" style="padding: 10px;border-radius: 10px;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
        <div class="media d-sm-flex d-block">
            <img style="padding: 5px;border-radius: 100% !important;" class="img-fluid shadow rounded ml-sm-3 mb-3 mb-sm-0" alt="image" src="/assets/images/thumbnail/01.jpg">
            <div class="media-body">
                <h6>{{$comment->user->name}}  <span class="pr-1" style="font-size: 0.9em;color: #95a5a6">{{jdate($comment->created_at)->ago()}}</span></h6>
                <p>{{$comment->comment}}</p>
            </div>
            @auth()
                <span style="background: #f1f2f6;border: 0px;color: #bdc3c7;" class="btn btn-secondary p-1 rounded">پاسخ</span>
            @endauth
        </div>
        @include('layouts.rescomment',['comment'=>$comment->child])
    </article>
@endforeach
