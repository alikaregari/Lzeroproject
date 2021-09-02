@foreach($comment as $childcomment)
    <div style="padding: 20px;background-color: #f1f2f6;margin: 10px;border-radius: 10px;" class="media d-sm-flex d-block">
        <img style="padding: 5px;border-radius: 100% !important;" class="img-fluid shadow rounded ml-sm-3 mb-3 mb-sm-0" alt="image" src="/assets/images/thumbnail/01.jpg">
        <div class="media-body">
            <h6>{{$childcomment->user->name}} <span class="pr-1" style="font-size: 0.9em;color: #95a5a6">{{jdate($childcomment->created_at)->ago()}}</span></h6>
            <p>{{$childcomment->comment}}</p>
        </div>
    </div>
@endforeach
