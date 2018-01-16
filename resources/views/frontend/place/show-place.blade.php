@extends('frontend.master')
@section('main')
<div class="block">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $infoPlace->name }}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12" align="center">
                    {{ HTML::image($infoPlace->ImagePlace, null, ['class' => 'width100']) }}
                </div>
                <div class=" col-md-12">
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td>{{ trans('messages.add') }}</td>
                                <td>{{ $infoPlace->add }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('messages.openhour') }}</td>
                                <td>{{ $infoPlace->open_hour }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('messages.closehour') }}</td>
                                <td>{{ $infoPlace->close_hour }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('messages.range') }}</td>
                                <td>{{ $infoPlace->range }} đ</td>
                            </tr>
                            <tr>
                                <td>{{ trans('messages.service') }}</td>
                                <td>
                                    <div class='rating-stars'>
                                        <ul class='stars'>
                                            <li class='star @if ($infoPlace->avg_service_rate/$infoPlace->total_rate >= 1 ) selected @endif' title='Poor' data-value='1'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_service_rate/$infoPlace->total_rate > 1.5 ) selected @endif' title='Fair' data-value='2'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_service_rate/$infoPlace->total_rate > 2.5 ) selected @endif' title='Good' data-value='3'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_service_rate/$infoPlace->total_rate > 3.5 ) selected @endif' title='Excellent' data-value='4'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_service_rate/$infoPlace->total_rate > 4.5 ) selected @endif' title='WOW!!!' data-value='5'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                        </ul>
                                        <span>{{ number_format($infoPlace->avg_service_rate/$infoPlace->total_rate, 2) }}/5 in {{ $infoPlace->total_rate }} rated </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ trans('messages.quality') }}</td>
                                <td>
                                    <div class='rating-stars'>
                                        <ul class='stars'>
                                            <li class='star @if ($infoPlace->avg_service_rate/$infoPlace->total_rate >= 1 ) selected @endif' title='Poor' data-value='1'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_quality_rate/$infoPlace->total_rate > 1.5 ) selected @endif' title='Fair' data-value='2'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_quality_rate/$infoPlace->total_rate > 2.5 ) selected @endif' title='Good' data-value='3'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_quality_rate/$infoPlace->total_rate > 3.5 ) selected @endif' title='Excellent' data-value='4'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_quality_rate/$infoPlace->total_rate > 4.5) selected @endif' title='WOW!!!' data-value='5'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                        </ul>
                                        <span>{{ number_format($infoPlace->avg_quality_rate/$infoPlace->total_rate, 2) }}/5 in {{ $infoPlace->total_rate }} rated </span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @foreach($reviews  as $review)
    <div class="block">
        <div class="row idea-title">
            {{ HTML::image($review->user->pathImage) }}
            <b>{{ trans('messages.user') }}</b>
            <a href="{{ route('mywall', $review->user_id) }}">{{ $review->user->name }}</a>
        </div>
        <div class="row idea-title">
            <b>{{ trans('messages.at') }}</b>
            <i class="fa fa-map-marker fa-lg"></i>
            <a href="#">{{ $review->place->name }}</a>
        </div>
        <div class="row idea-img">
            @foreach($review->image  as $item)
            {{ HTML::image(($item->PathReview)) }}
            @endforeach
            <p><b>{{ $review->submary }}</b></p>
            <p class="more">{!! $review->content !!}</p>
            <br />
            {{ Form::hidden('lesstext', trans('messages.pullout'), array('class' => 'lesstext')) }}
            {{ Form::hidden('moretext', trans('messages.seemore'), array('class' => 'moretext')) }}
            <div class="field">
                <label>{{ trans('messages.evaluate') }} </label>
                <section class='rating-widget'>
                    <table>
                        <tr>
                            <td>{{ trans('messages.service') }}</td>
                            <td>
                                <div class='rating-stars'>
                                    <ul class='stars'>
                                        <li class='star selected' title='Poor' data-value='1'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star @if ($review->quality_rate >= 2 ) selected @endif' title='Fair' data-value='2'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star @if ($review->quality_rate >= 3 ) selected @endif' title='Good' data-value='3'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star @if ($review->quality_rate >= 4 ) selected @endif' title='Excellent' data-value='4'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star @if ($review->quality_rate == 5 ) selected @endif' title='WOW!!!' data-value='5'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>{{ trans('messages.quality') }}</td>
                            <td>
                                <div class='rating-stars'>
                                    <ul class='stars'>
                                        <li class='star selected' title='Poor' data-value='1'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star @if ($review->quality_rate >= 2 ) selected @endif' title='Fair' data-value='2'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star @if ($review->quality_rate >= 3 ) selected @endif' title='Good' data-value='3'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star @if ($review->quality_rate >= 4 ) selected @endif' title='Excellent' data-value='4'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star @if ($review->quality_rate == 5 ) selected @endif' title='WOW!!!' data-value='5'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </table>
                </section>
            </div>
            @foreach ($rateReview as $rate)
            <div class="mini">
                <p>
                    @if(Auth::check())
                        @if($hasLike[$review->id] == config('checkbox.checktrue'))
                            <i class="fa fa-thumbs-up fa-lg icon" data-review-id="{{ $review->id }}" data-rate-id="{{ $rate->id }}"></i><span>{{ $countLike[$review->id] }}</span> {{ trans('messages.like') }}
                        @else
                            <i class="fa fa-thumbs-up fa-lg" data-review-id="{{ $review->id }}" data-rate-id="{{ $rate->id }}" data-user-id="{{ Auth::user()->id }}"></i><span>{{ $countLike[$review->id] }}</span> {{ trans('messages.like') }}
                        @endif
                    @else
                            <i class="fa fa-thumbs-up fa-lg"></i><span>{{ $countLike[$review->id] }}</span> {{ trans('messages.like') }}
                    @endif
                </p>
            </div>
            @endforeach
            <div class="mini">
                <p><i class="fa fa-comment fa-lg"></i> <span>{{ $countComment[$review->id] }}</span> {{ trans('messages.comment') }}</p>
            </div>
            <br/>
        </div>
        <div class="row idea-btn">
            @if(Auth::check())
            <div class="btn"><i class="fa fa-eye fa-lg"></i><a href="{{ route('reviews.show', $review->id) }}">{{ trans('messages.show') }}</a></div>
            @else
            <div class="btn"><i class="fa fa-eye fa-lg"></i><a href="{{ route('login', $review->id) }}">{{ trans('messages.loginmore') }}</a></div>
            @endif
        </div>
    </div>
    @endforeach
    <br>
</div>
@stop
