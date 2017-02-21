@extends('mobile.layout.master')

@section('title', '| Chef index')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1031201604.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    @inject('ProductPresenter', 'App\Presenters\ProductPresenter')
    <div class="w3-content w3-container w3-padding-32">
        <div class="">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Menu Lists<h1>
        </div>
        @foreach ($meals as $meal)
            <div class="w3-row w3-white w3-border w3-border-green w3-round-large w3-margin-top w3-padding-medium">
                <div class="w3-col s12 w3-padding-4">
                     <img src="{{ asset($meal->cover_img) }}" alt="meal photo" style="width:100%;">
                </div>
                <div class="w3-col s12">
                    <div class="w3-row">
                        <div class="w3-rest"></div>
                        <div class="w3-col s5 w3-right">
                            @if ($meal->people_eva > 0)
                                @for ($i = 0; $i < $ProductPresenter->getEvaluateScore($meal->evaluation, $meal->people_eva); $i++)
                                    <span class="w3-text-orange w3-large"><i class="fa fa-star"></i></span>
                                @endfor
                            @else
                                <span class="w3-text-orange w3-large">New Meal</span>
                            @endif
                        </div>
                    </div>
                    <div class="w3-col s12">
                            <span class="w3-text-grey w3-xlarge"><b>{{ $meal->name }}<b></span>
                        </div>
                    <div class="w3-col s12">
                        <b class="w3-text-green w3-left w3-large">${{ $meal->price }}TWD</b>
                    </div>
                    <div class="w3-border-grey w3-border-bottom">
                        <p class="w3-text-grey w3-medium" style="font-family:cursive;">{!! substr(strip_tags($meal->description), 0, 150) !!}{{ strlen(strip_tags($meal->description)) > 150 ? '...' : "" }}</p>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col s12">
                            @foreach ($meal->methods as $method)
                                <p class="w3-tag w3-teal w3-tiny">{{ $method->method }}</p>
                            @endforeach
                        </div>
                        <div class="w3-col s4 w3-padding-tiny">
                            {!! Html::linkRoute('chef.edit', 'Edit', [$meal->id], ['class' => 'btn w3-white w3-text-red w3-border w3-border-red w3-large btn-block zk-shrink-hover']) !!}
                        </div>
                        <div class="w3-col s4 w3-padding-tiny">
                            {!! Html::linkRoute('chef.datetimepeople.get', 'Date', [$meal->id], ['class' => 'btn w3-white w3-text-blue w3-border w3-border-blue w3-large btn-block zk-shrink-hover']) !!}
                        </div>
                        <div class="w3-col s4 w3-padding-tiny">
                            {!! Html::linkRoute('chef.show', 'View', [$meal->id], ['class' => 'btn w3-white w3-text-green w3-border w3-border-green w3-large btn-block zk-shrink-hover']) !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="text-center">
            {!! $meals->links(); !!}
        </div>
    </div>

@endsection

@section('scripts')

@endsection