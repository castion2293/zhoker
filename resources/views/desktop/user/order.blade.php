@extends('desktop.layout.master')

@section('title', '| User Order')
    
@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1118201601.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        
        <div class="w3-padding-12">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['user_order']['title'] }}</h1>
        </div>

        <div class="w3-margin-top w3-padding-left" style="width:20%;position:absolute">
            <select id="type-select" class="w3-select w3-large w3-text-grey" style="cursor:pointer;">
                <option value="" disabled selected>{{ $lang->desktop()['user_order']['type_search'] }}</option>
                <option value="All" class="w3-large w3-text-grey">{{ $lang->desktop()['user_order']['type_all'] }}</option>
                <option value="Approve" class="w3-large w3-text-grey">{{ $lang->desktop()['user_order']['type_approved'] }}</option>
                <option value="Reject" class="w3-large w3-text-grey">{{ $lang->desktop()['user_order']['type_reject'] }}</option>
                <option value="Pending" class="w3-large w3-text-grey">{{ $lang->desktop()['user_order']['type_pending'] }}</option>
                <option value="Cancel" class="w3-large w3-text-grey">{{ $lang->desktop()['user_order']['type_cancel'] }}</option>
                <option value="Overdue" class="w3-large w3-text-grey">{{ $lang->desktop()['user_order']['type_overdue'] }}</option>
                <option value="Evaluation" class="w3-large w3-text-grey">{{ $lang->desktop()['user_order']['type_evaluation'] }}</option>
                <option value="Evaluated" class="w3-large w3-text-grey">{{ $lang->desktop()['user_order']['type_evaluated'] }}</option>
            </select>
            <!--for refresh the new page, not shown-->
            <a id="new-page-link" href="" style="display:none;">new page</a> 
        </div>

        @if ($userorders->isEmpty())
            <div class="w3-center" style="margin-top:8em;">
                <h1 style="font-family:cursive;">{{ $lang->desktop()['user_order']['no_order'] }}</h1>
            </div>
        @else
            <div class='tabs tabs_active'>
                    <ul class='horizontal w3-right'>
                        <li><a id="calendar-link" href="#tab-1" class="w3-small tab-link">{{ $lang->desktop()['user_order']['calendar'] }}</a></li>
                        <li><a href="#tab-2" class="w3-small tab-link">{{ $lang->desktop()['user_order']['list'] }}</a></li>
                    </ul>
                <div id='tab-1' class="w3-content w3-container">
                    <!--Chef Order Calendar View -->
                    @include('desktop.partials.UserOrderCalendar')
                </div>                
                <div id='tab-2' class="w3-content w3-container">
                    <!--Chef Order list View -->
                    @include('desktop.partials.UserOrderList')
                </div>
            </div>
        @endif 
    </div>
@endsection

@section('scripts')
    <!--type search select change-->
    <script>
        $("#type-select").change(function() {
            url = "{{ url('/order/user_order/' . Auth::user()->id . '/?userOrderType=') }}" + $("#type-select").val();
            $("#new-page-link").attr({"href": url});
            $("#new-page-link")[0].click();
        });
    </script>
@endsection