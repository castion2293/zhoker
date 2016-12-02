@extends('desktop.layout.master')

@section('title', '| Map List Search')

@section('styles')

@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <!--img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1031201601.JPG" alt="profile" style="width:100%"-->
        <img src="{{ URL::to('img/1129201603.JPG') }}" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-padding-12 w3-margin-top">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Search Meal<h1>
         </div>
         
         {!! Form::open(['route' => 'maplist.detailed', 'data-parsley-validate' => '', null, 'method' => 'POST']) !!}
            <div class="w3-row w3-content w3-container">
               <div class="w3-col l4 m4">
                  <div class="">
                    <img src="{{ URL::to('https://s3-us-west-2.amazonaws.com/zhoker/images/1026201601.png') }}" alt="profile" style="width:100%">
                  </div>
                </div>
                <div class="w3-col l8 m8" style="padding-left:2em;">
                  <div>
                      <label class="w3-text-grey w3-large" style="font-family:cursive">City</label>
                      <input type="text" name="city" placeholder="City" value="{{ old('city') }}" required maxlength="255" class="w3-input w3-border w3-border-grey w3-large w3-text-grey">
                      <!--{{ Form::text('city', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'placeholder' => 'City', 'required' => '', 'maxlength' => '255']) }}-->
                  </div>
                  <div class="" style="margin-top:3em;">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">Date</label>
                      <div class="input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                          {{ Form::text('date', null, ['class' => 'w3-input w3-border w3-large w3-text-grey', 'id' => 'datepicker', 'required' => '', 'placeholder' => 'Date', 'style' => 'font-weight:bold;cursor:pointer;"']) }}
                      </div>
                  </div>
                  <div class="" style="margin-top:3em;">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">Price Range</label>
                      <div class="w3-row">
                        <div class="w3-col l4 m4">
                            {{ Form::text('minPrice', null, ['class' => 'w3-input w3-border w3-large w3-text-grey', 'placeholder' => 'MIN']) }}
                        </div>
                        <div class="w3-col l1 m1">
                            <label class="w3-large w3-text-grey w3-padding-small" style="font-weight:bold;font-family:cursive;">TWD<label>
                        </div>
                        <div class="w3-col l2 m2 w3-center">
                          <span class="w3-xxlarge w3-text-grey" style="font-weight:bold;font-family:cursive;line-height: 1.2em;">~</span>
                        </div>
                        <div class="w3-col l4 m4">
                          {{ Form::text('maxPrice', null, ['class' => 'w3-input w3-border w3-large w3-text-grey', 'placeholder' => 'MAX']) }}
                        </div>
                        <div class="w3-col l1 m1">
                            <label class="w3-large w3-text-grey w3-padding-small" style="font-weight:bold;font-family:cursive;">TWD<label>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
            <div class="w3-row w3-border-green w3-border-bottom w3-padding-12" style="margin-top:2em;">
                <div class="w3-col l4 m4" style="padding-left:0em;">
                  <div class="">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">Venue</label>
                      <select class="form-control w3-text-grey w3-large" name="shift" id="shift">
                        <option class="w3-text-grey w3-white w3-large">All</option>
                        <option class="w3-text-grey w3-white w3-large">Dinner</option>
                        <option class="w3-text-grey w3-white w3-large">Lunch</option>
                        <option class="w3-text-grey w3-white w3-large">Brunch</option>
                        <option class="w3-text-grey w3-white w3-large">Breakfast</option>
                        <option class="w3-text-grey w3-white w3-large">Tea Time</option>
                      </select>
                  </div>
                  <div class="">
                     <label class="w3-text-grey w3-large" style="font-family:cursive">People Left</label>
                     <select class="form-control w3-text-grey w3-large" name="people" id="people">
                        <option class="w3-text-grey w3-white w3-large">1 Person left</option>
                        <option class="w3-text-grey w3-white w3-large">2 People left</option>
                        <option class="w3-text-grey w3-white w3-large">3 People left</option>
                        <option class="w3-text-grey w3-white w3-large">4 People left</option>
                        <option class="w3-text-grey w3-white w3-large">5 People left</option>
                        <option class="w3-text-grey w3-white w3-large">6 People left</option>
                        <option class="w3-text-grey w3-white w3-large">7 People left</option>
                        <option class="w3-text-grey w3-white w3-large">8 People left</option>
                        <option class="w3-text-grey w3-white w3-large">9 People left</option>
                        <option class="w3-text-grey w3-white w3-large">10 People left</option>
                    </select>
                  </div>
                  <div class="">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">Method</label>
                      <select class="form-control w3-text-grey w3-large" name="method" id="method">
                        <option class="w3-text-grey w3-white w3-large">All</option>
                        <option class="w3-text-grey w3-white w3-large">In House</option>
                        <option class="w3-text-grey w3-white w3-large">To Go</option>
                        <option class="w3-text-grey w3-white w3-large">Delieve</option>
                      </select>
                  </div>
                  <div class="">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">Sorting</label>
                      <select class="form-control w3-text-grey w3-large" name="sort" id="sort">
                        <option class="w3-text-grey w3-white w3-large" value="1">Price Low->High</option>
                        <option class="w3-text-grey w3-white w3-large" value="2">Price High->Low</option>
                      </select>
                  </div>
                </div>
                <div class="w3-col l8 m8" style="padding-left:2em;">
                  <div class="">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">Type</label>
                      <div class="w3-row w3-padding-small w3-border w3-border-grey w3-round-large">
                        <div class="w3-col l3 m3">
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select1" value="1">
                              <label class="w3-validate">American</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select4" value="4">
                              <label class="w3-validate">Brazilian</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select7" value="7">
                              <label class="w3-validate">French</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select12" value="12">
                              <label class="w3-validate">Korean</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select13" value="13">
                              <label class="w3-validate">Mexican</label>
                            </p>
                        </div>
                        <div class="w3-col l3 m3">
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select2" value="2">
                              <label class="w3-validate">Asian</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select5" value="5">
                              <label class="w3-validate">Chinese</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select19" value="19">
                              <label class="w3-validate">Indian</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select8" value="8">
                              <label class="w3-validate">Hawaiian</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select11" value="11">
                              <label class="w3-validate">Japanese</label>
                            </p>
                        </div>
                        <div class="w3-col l3 m3">
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select3" value="3">
                              <label class="w3-validate">Barbecue</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select6" value="6">
                              <label class="w3-validate">European</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select9" value="9">
                              <label class="w3-validate">Italian</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select10" value="10">
                              <label class="w3-validate">Indonesian</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select17" value="17">
                              <label class="w3-validate">Thai</label>
                            </p>
                        </div>
                        <div class="w3-col l3 m3">
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select14" value="14">
                              <label class="w3-validate">Mediterr</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select16" value="16">
                              <label class="w3-validate">Seafood</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select18" value="18">
                              <label class="w3-validate">Vegatarian</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select15" value="15">
                              <label class="w3-validate">Middle East</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" id="select0" value="0">
                              <label class="w3-validate">All</label>
                            </p>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
            <div class="w3-row w3-margin-top">
                <div class="w3-rest"></div>
                <div class="w3-col l3 m3 w3-right">
                    {!! Form::submit('Search', ['class' => 'btn w3-green btn-block zk-shrink-hover']) !!}
                </div>
            </div>  
        {!! Form::close() !!}

    </div>
@endsection

@section('scripts')
<script>
    $(function () {

        // datepicker
        $(function () {
            $("#datepicker").datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });

        //Type check box
        $("#select0").change(function(){
            if( $("#select0").is(':checked') ) {
              $('.w3-check').prop('checked', true);
            } else {
              $('.w3-check').prop('checked', false);
            }
        });

        //set default value
        $("#shift").val("{{ old('shift') }}");
        $("#people").val("{{ old('people') }}");
        $("#method").val("{{ old('method') }}");
        $("#sort").val("{{ old('sort') }}");
        
        @if (old('type') != null) 
          @foreach (old('type') as $type)
            $('#select{{ $type }}').prop('checked', true);
          @endforeach
        @endif
    });
</script>
@endsection