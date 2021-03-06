@extends('desktop.layout.master')

@section('title', '| Chef index')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://d4kfrsvmp3cgg.cloudfront.net/2018051602.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    @inject('ProductPresenter', 'App\Presenters\ProductPresenter')
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-padding-12">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['chef_index']['title'] }}<h1>
        </div>
        @foreach ($meals as $meal)
            <div class="w3-row w3-white w3-border w3-border-green w3-round-large w3-margin-top w3-padding-medium">
                <div class="w3-col l4 m4 w3-padding-12">
                    <img src="{{ asset($meal->cover_img) }}" alt="meal photo" style="width:100%;">
                </div>
                <div class="w3-col l8 m8" style="padding-left:2em;">
                    <div class="w3-row">
                        <div class="w3-col l10 m10">
                            <span class="w3-text-grey w3-xlarge" style="font-family:cursive;"><b>{{ $meal->name }}</b></span>
                        </div>
                        <div class="w3-col l2 m2" style="padding-top:5px;">
                            @if ($meal->people_eva > 0)
                                @for ($i = 0; $i < $ProductPresenter->getEvaluateScore($meal->evaluation, $meal->people_eva); $i++)
                                    <span class="w3-text-orange w3-large"><i class="fa fa-star"></i></span>
                                @endfor
                            @else
                                <span class="w3-text-orange w3-large">{{ $lang->desktop()['chef_index']['new_meal'] }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="w3-col l12 m12">
                        <b class="w3-text-green w3-left w3-large">${{ $meal->price }}TWD</b>
                    </div>
                    <div class="w3-border-grey w3-border-bottom">
                        <p class="w3-text-grey" style="font-family:cursive;">{!! substr(strip_tags($meal->description), 0, 150) !!}{{ strlen(strip_tags($meal->description)) > 150 ? '...' : "" }}</p>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col l6 m6">
                            @foreach ($meal->methods as $method)
                                <p class="w3-tag w3-teal w3-tiny">{{ $method->method }}</p>
                            @endforeach
                        </div>
                        <div class="w3-col l2 m2 w3-padding-small w3-right">
                            {!! Html::linkRoute('chef.datetimepeople.get', $lang->desktop()['chef_index']['date_time'], [$meal->id], ['class' => 'btn w3-white w3-text-blue w3-border w3-border-blue btn-block zk-shrink-hover']) !!}
                        </div>
                        <div class="w3-col l2 m2 w3-padding-small w3-right">
                            {!! Html::linkRoute('chef.edit', $lang->desktop()['chef_index']['edit'], [$meal->id], ['class' => 'btn w3-white w3-text-red w3-border w3-border-red btn-block zk-shrink-hover']) !!}
                        </div>
                        <div class="w3-col l2 m2 w3-padding-small w3-right">
                            {!! Html::linkRoute('chef.show', $lang->desktop()['chef_index']['view'], [$meal->id], ['class' => 'btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover']) !!}
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