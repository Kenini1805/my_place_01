@extends('frontend.master')
@section('main')
<div class="block">
    <div class="panel-info">
        <div class="field panel-heading">
            <h2 class="text-center">{{ trans('messages.user-collection', ['name' => $user->name]) }}</h2>
        </div>
        @foreach ($collection as $value)
            <div>
                <h3>{{ $value->name}}</h3>
                <ul class="row padding0">
                    @foreach ($collectionItem as $item)
                        @if ($item->collection_id == $value->id)
                            <li class="col-md-6 list-none col-review-div">
                                <a href="{{ route('mywall', $item->review->user->id) }}">{{ $item->review->user->name }}</a>
                                {{ trans('messages.at') }}
                                <a href="{{ route('showplace', $item->review->place->id) }}"> {{ $item->review->place->name }}</a>
                                <br/>
                                <a href="{{ route('reviews.show', $item->review->id) }}">{{ $item->review->submary }}
                                    {{ HTML::image($item->review->image_review, null, ['class' => 'show-img']) }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <hr>
        @endforeach
    </div>
</div>
@stop
@section('script')
<script type="text/javascript">
    $(document).ready(function() { 
        var heights = $(".col-review-div").map(function() {
            return $(this).height();
        }).get(),
        maxHeight = Math.max.apply(null, heights);
        $(".col-review-div").height(maxHeight);
    });
</script>
@stop
