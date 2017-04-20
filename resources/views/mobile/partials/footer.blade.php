<!-- Footer small screen-->
  <footer class="w3-center w3-green w3-padding-48">

    <div class="w3-content w3-container">
      <div class="w3-row">
        <div>
          <p class="w3-large w3-center">{{ $lang->desktop()['footer']['company'] }}</p>
          <p class="w3-medium footlink">
            <a href="{{ route('about.get') }}" class="w3-text-white w3-hover-opacity" >{{ $lang->desktop()['footer']['about'] }}</a><br>
            <a href="{{ route('press.get') }}" class="w3-text-white w3-hover-opacity" >{{ $lang->desktop()['footer']['press'] }}</a><br>
            <a href="{{ route('career.get') }}" class="w3-text-white w3-hover-opacity" >{{ $lang->desktop()['footer']['blog'] }}</a><br>
            <!--a href="#" class="w3-text-white w3-hover-opacity" >Help</a><br-->
            <a href="{{ route('contact.get') }}" class="w3-text-white w3-hover-opacity" >{{ $lang->desktop()['footer']['contact_us'] }}</a>
          </p>
        </div>
        <div class="w3-padding-64">
          <p class="w3-large">{{ $lang->desktop()['footer']['cus_chef'] }}</p>
          <p class="w3-medium footlink">
            <a href="#" class="w3-text-white w3-hover-opacity" >{{ $lang->desktop()['footer']['policy'] }}</a><br>
            <a href="#" class="w3-text-white w3-hover-opacity" >{{ $lang->desktop()['footer']['career'] }}</a><br>
            <a href="{{ route('help.get') }}" class="w3-text-white w3-hover-opacity" >{{ $lang->desktop()['footer']['help'] }}</a><br>
          </p>
        </div>
        <div>
          {{--<select class="w3-select w3-border w3-text-black w3-large w3-white" id="lang-selector">--}}
            {{--<option class="w3-text-black w3-white w3-large" value="en">English</option>--}}
            {{--<option class="w3-text-black w3-white w3-large" value="zh_tw">繁體中文</option>--}}
          {{--</select>--}}
          {{--<!--for refresh the new page, not shown-->--}}
          {{--<a id="language-page-link" href="" style="display:none;">language page</a>--}}

          <div id="app">
            <lang-select default_value="{{ $lang->desktop()['language'] }}"></lang-select>
          </div>
        </div>
        <div class="" style="margin-top:40px;">
          <p class="w3-large">{{ $lang->desktop()['footer']['follow'] }}</p>
          <ul class="iconlist">
            <li class=" w3-tiny"><a href="#" class="w3-btn-floating w3-green w3-text-white zk-shrink-hover" style="width:25px;height:25px;line-height:25px"><i class="fa fa-facebook w3-hover-opacity"></i></a></li>
            <li class=" w3-tiny"><a href="#" class="w3-btn-floating w3-green w3-text-white zk-shrink-hover" style="width:25px;height:25px;line-height:25px"><i class="fa fa-google-plus w3-hover-opacity"></i></a></li>
            <li class=" w3-tiny"><a href="#" class="w3-btn-floating w3-green w3-text-white zk-shrink-hover" style="width:25px;height:25px;line-height:25px"><i class="fa fa-twitter w3-hover-opacity"></i></a></li>
            <li class=" w3-tiny"><a href="#" class="w3-btn-floating w3-green w3-text-white zk-shrink-hover" style="width:25px;height:25px;line-height:25px"><i class="fa fa-youtube-play w3-hover-opacity"></i></a></li>
            <li class=" w3-tiny"><a href="#" class="w3-btn-floating w3-green w3-text-white zk-shrink-hover" style="width:25px;height:25px;line-height:25px"><i class="fa fa-instagram w3-hover-opacity"></i></a></li>
            <li class=" w3-tiny"><a href="#" class="w3-btn-floating w3-green w3-text-white zk-shrink-hover" style="width:25px;height:25px;line-height:25px"><i class="fa fa-linkedin w3-hover-opacity"></i></a></li>
          </ul>
          <p>Powered by
            <title="Nick_Zhang " target="_blank " class="w3-hover-opacity ">© Zhoker, Inc.</title>
          </p>
        </div>
      </div>
    </div>

  </footer>

  {{--<script>--}}
    {{--$(function () {--}}
        {{--$("#lang-selector").val("{{ $lang->desktop()['language'] }}");--}}

        {{--$("#lang-selector").change(function() {--}}
            {{--url = "{{ url('/language?lang=' ) }}" + $("#lang-selector").val();--}}

            {{--$("#language-page-link").attr({"href": url});--}}
            {{--$("#language-page-link")[0].click();--}}
        {{--});--}}
    {{--})--}}
  {{--</script>--}}