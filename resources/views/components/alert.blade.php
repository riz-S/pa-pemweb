<div class="alert alert-{{$type}}">
    <div class="alert-title">{{$title}}</div>
    {{$msg}}
    @if($type!='danger')
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    @endif
</div>