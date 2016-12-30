@extends('desktop.layout.master')

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
    <div class="w3-content w3-container w3-padding-64">
        @if ($cheforders->isEmpty())
            <div class="w3-center">
                <h1 style="font-family:cursive;">Sorry! There is no one order your meal yet!</h1>
            </div>
        @else
            <div class="w3-padding-6">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">Meal Order<h1>
            </div>

            <div class="w3-content w3-container">
                <div class="w3-row w3-margin-top w3-padding-medium w3-border-grey w3-border-bottom">
                    <div class="w3-col l3 m3">
                        <label class="w3-text-grey" style="font-family:cursive;">MEAL</label>
                    </div>
                    <div class="w3-col l3 m3" style="padding-left:1em;">
                        <label class="w3-text-grey" style="font-family:cursive;">ITEM</label>
                    </div>
                    <div class="w3-col l1 m1" style="">
                        <label class="w3-text-grey" style="font-family:cursive;">TOTAL</label>
                    </div>
                    <div class="w3-col l4 m4" style="padding-left:2.5em;">
                        <label class="w3-text-grey" style="font-family:cursive;">CONTACT</label>
                    </div>
                    <div class="w3-col l1 m1" style="padding-left:1.5em;">
                        <label class="w3-text-grey" style="font-family:cursive;">ACTION</label>
                    </div>
                </div>

                @foreach ($cheforders as $cheforder)
                    @foreach($cheforder->carts()->get() as $cart)
                        <div class="w3-row w3-padding-24 w3-border-grey w3-border-bottom">
                            <div class="w3-col l3 m3 w3-padding-right w3-margin-top">
                                @foreach ($cart->meals->images as $image)
                                    @if ($loop->first)
                                        <img src="{{ asset($image->image_path) }}" alt="meal photo" style="width:100%">
                                    @endif
                                @endforeach
                            </div>
                            <div class="w3-col l3 m3 w3-padding-left">
                                <div class="">
                                    <span class="w3-text-grey w3-large"><b>{{ $cart->meals->name }}</b></span>
                                </div>
                                <div class="">
                                    <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}united_price" class="w3-text-green w3-large">{{ $cart->meals->price }}</span></span>
                                </div>
                                <div class="">
                                    <span class="w3-text-grey w3-large">{{ $cart->people_order }} people order</span>
                                </div>
                                <div class="">
                                    <span class="w3-text-grey w3-large">{{ $cart->date }} / {{ $cart->time }}</span>
                                </div>
                                <div class="">
                                    <p class="w3-tag w3-teal w3-tiny">{{ $cart->method }}</p>
                                </div>
                            </div>
                            <div class="w3-col l1 m1">
                                <div class="">
                                    <span class="w3-text-green w3-large">${{ $cart->price }}</span></span>
                                </div>
                            </div>
                            <div class="w3-col l4 m4">
                                <div style="padding-left:2em;">
                                    @foreach ($cart->userorders()->get() as $userorder)
                                        <div class="">
                                            <span class="w3-text-grey w3-large">{{ $userorder->contact_first_name }} {{ $userorder->contact_last_name }}</span>
                                        </div>
                                        <div class="">
                                            <span class="w3-text-grey w3-large">{{ $userorder->contact_phone_number }}</span>
                                        </div>
                                        <div class="">
                                            <span class="w3-text-grey w3-large">{{ $userorder->contact_email }}</span>
                                        </div>
                                        <div class="">
                                            <span class="w3-text-grey w3-large">{{ $userorder->contact_address }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="w3-col l1 m1">
                                @if ($cheforder->checked)
                                    <div class="">
                                        <span class="w3-text-grey w3-large">Approved</span>
                                    </div>
                                    <div class="w3-margin-top">
                                        @inject('ChefPresenter', 'App\Presenters\ChefPresenter')
                                        <span class="w3-text-grey w3-large">{{ $ChefPresenter->paidCheck($cheforder->paid) }}</span>
                                    </div>
                                @else
                                    <div class="">
                                        <a href="{!! route('order.accept', ['id' => encrypt($cheforder->id)]) !!}" class="w3-btn w3-deep-orange w3-btn-block zk-shrink-hover">Accept</a>
                                    </div>
                                    <div class="w3-padding-left" style="margin-top:6em;">
                                        <a href="{!! route('order.reject', ['id' => encrypt($cheforder->id)]) !!}" id="reject-confirm" class="w3-test-grey" style="display:none;">Reject</a>
                                        <a href="#" id="reject-warn" class="w3-test-grey">Reject</a>
                                    </div>
                                @endif
                                
                                
                            </div>
                        </div>
                    @endforeach
                @endforeach

                <div class="text-center">
                    {!! $cheforders->links(); !!}
                </div>
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