@extends('mobile.layout.master')

@section('title', '| Chef Order')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1114201604.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-32">
        @if ($cheforders->isEmpty())
            <div class="w3-center">
                <h1 style="font-family:cursive;">Sorry! There is no one order your meal yet!</h1>
            </div>
        @else
            <div class="w3-padding-6">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">Meal Order<h1>
            </div>

            @foreach ($cheforders as $cheforder)
                @foreach($cheforder->carts()->get() as $cart)
                    <div class="w3-row w3-border w3-border-green w3-round-large w3-padding-tiny w3-margin-top">
                        <div class="w3-col s8" style="margin-top:0.2em;">
                            <div class="">
                                <span class="w3-text-grey w3-large"><b>{{ $cart->meals->name }}</b></span>
                            </div>
                            <div class="">
                                <span class="w3-text-green w3-medium"><b>${{ $cart->meals->price }}TWD</b></span>
                            </div>
                            <div class="">
                                <span class="w3-text-grey w3-medium">{{ $cart->people_order }} people order</span>
                            </div>
                            <div class="">
                                <span class="w3-text-grey w3-medium">{{ $cart->date }} / {{ $cart->time }}</span>
                            </div>
                        </div>
                        <div class="w3-col s4" style="margin-top:0.2em;">
                            <div class="">
                                <p class="w3-tag w3-teal w3-tiny">{{ $cart->method }}</p>
                            </div>
                            <div class="" style="margin-top:1em;">
                                <label class="w3-text-grey w3-medium">Subtotal:</label>
                                <span class="w3-text-green w3-medium"><b>${{ $cart->price }}TWD</b></span>
                            </div>
                        </div>
                        <div class="w3-col s12">
                            @foreach ($cart->meals->images->take(1) as $image)
                                    <img src="{{ asset($image->image_path) }}" alt="meal photo" style="width:100%">
                            @endforeach
                        </div>
                        <div class="w3-col s12 w3-margin-top">
                            <div>
                                @foreach ($cart->userorders()->get() as $userorder)
                                    <div class="">
                                        <span class="w3-text-grey w3-medium">{{ $userorder->contact_first_name }} {{ $userorder->contact_last_name }}</span>
                                    </div>
                                    <div class="">
                                        <span class="w3-text-grey w3-medium">{{ $userorder->contact_phone_number }}</span>
                                    </div>
                                    <div class="">
                                        <span class="w3-text-grey w3-medium">{{ $userorder->contact_email }}</span>
                                    </div>
                                    <div class="">
                                        <span class="w3-text-grey w3-medium">{{ $userorder->contact_address }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        @if ($cheforder->checked)
                            <div class="w3-col s6 w3-center">
                                <span class="w3-text-grey w3-large">Approved</span>
                            </div>
                            <div class="w3-col s6 w3-center">
                                @inject('ChefPresenter', 'App\Presenters\ChefPresenter')
                                <span class="w3-text-grey w3-large">{{ $ChefPresenter->paidCheck($cheforder->paid) }}</span>
                            </div>
                        @else
                            <div class="w3-rest"></div>
                            <div class="w3-col s2 w3-right">
                                <a href="{!! route('order.reject', ['id' => encrypt($cheforder->id)]) !!}" id="reject-confirm" class="w3-test-grey" style="display:none;">Reject</a>
                                <a href="#" id="reject-warn" class="w3-test-grey">Reject</a>
                            </div>
                            <div class="w3-col s12 w3-padding-8">
                                <a href="{!! route('order.accept', ['id' => encrypt($cheforder->id)]) !!}" class="w3-btn w3-deep-orange w3-btn-block w3-round-medium zk-shrink-hover">Accept</a>
                            </div>
                        @endif
                            
                    </div>
                @endforeach
            @endforeach

            <div class="text-center">
                {!! $cheforders->links(); !!}
            </div>
        @endif 
    </div>
@endsection

@section('scripts')
    <!--delete meal-->
    <script>
        $(function () {
            $("#reject-warn").click(function () {
              swal({
                title: "Are you sure?",
                text: "You will not be able to accept the order again!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, reject it!",
                closeOnConfirm: false
              },
              function(){
                $("#reject-confirm")[0].click();
              });
            });
        });
    </script>
@endsection