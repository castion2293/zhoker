<!-- Footer large and medium screen-->

  <footer class="w3-center w3-green w3-padding-48 w3-hide-small">

    <div class="w3-content w3-container">
      <div class="w3-row">
        <div class="w3-col l4 m4">
          <p class="w3-large w3-center">{{ $lang->desktop()['footer']['company'] }}</p>
          <p class="w3-medium footlink">
            <a href="{{ route('about.get') }}" class="w3-text-white w3-hover-opacity" >{{ $lang->desktop()['footer']['about'] }}</a><br>
            <a href="{{ route('press.get') }}" class="w3-text-white w3-hover-opacity" >{{ $lang->desktop()['footer']['press'] }}</a><br>
            <a href="{{ route('career.get') }}" class="w3-text-white w3-hover-opacity" >{{ $lang->desktop()['footer']['blog'] }}</a><br>
            <!--a href="#" class="w3-text-white w3-hover-opacity" >Help</a><br-->
            <a href="{{ route('contact.get') }}" class="w3-text-white w3-hover-opacity" >{{ $lang->desktop()['footer']['contact_us'] }}</a>
          </p>
        </div>
        <div class="w3-col l4 m4">
          <p class="w3-large">{{ $lang->desktop()['footer']['cus_chef'] }}</p>
          <p class="w3-medium footlink">
            <a href="#" class="w3-text-white w3-hover-opacity" >{{ $lang->desktop()['footer']['policy'] }}</a><br>
            <a href="#" class="w3-text-white w3-hover-opacity" >{{ $lang->desktop()['footer']['career'] }}</a><br>
            <a href="{{ route('help.get') }}" class="w3-text-white w3-hover-opacity" >{{ $lang->desktop()['footer']['help'] }}</a><br>
          </p>
        </div>
        <div class="w3-col l3 l3 w3-right">
          <!--select class="w3-select w3-border w3-text-black w3-large w3-white" id="lang-selector">
            <option class="w3-text-black w3-white w3-large" value="en">English</option>
            <option class="w3-text-black w3-white w3-large" value="zh_tw">繁體中文</option>
          </select-->
          <!--for refresh the new page, not shown-->
          <!--a id="language-page-link" href="" style="display:none;">language page</a-->

          <div id="app">
            <lang-select default_value="{{ $lang->desktop()['language'] }}"></lang-select>
          </div>
        </div>
        <div class="w3-col l12 m12 w3-center w3-padding-16 w3-border-top" style="margin-top:40px;">
          <p class="w3-large">{{ $lang->desktop()['footer']['follow'] }}</p>
          <ul class="iconlist">
            <li class=" w3-xlarge"><a href="#" class="w3-btn-floating w3-green w3-text-white zk-shrink-hover"><i class="fa fa-facebook w3-hover-opacity"></i></a></li>
            <li class=" w3-xlarge"><a href="#" class="w3-btn-floating w3-green w3-text-white zk-shrink-hover"><i class="fa fa-google-plus w3-hover-opacity"></i></a></li>
            <li class=" w3-xlarge"><a href="#" class="w3-btn-floating w3-green w3-text-white zk-shrink-hover"><i class="fa fa-twitter w3-hover-opacity"></i></a></li>
            <li class=" w3-xlarge"><a href="#" class="w3-btn-floating w3-green w3-text-white zk-shrink-hover"><i class="fa fa-youtube-play w3-hover-opacity"></i></a></li>
            <li class=" w3-xlarge"><a href="#" class="w3-btn-floating w3-green w3-text-white zk-shrink-hover"><i class="fa fa-instagram w3-hover-opacity"></i></a></li>
            <li class=" w3-xlarge"><a href="#" class="w3-btn-floating w3-green w3-text-white zk-shrink-hover"><i class="fa fa-linkedin w3-hover-opacity"></i></a></li>
            <li class=" w3-xlarge"><a href="#" class="w3-btn-floating w3-green w3-text-white zk-shrink-hover"><i class="fa fa-pinterest w3-hover-opacity"></i></a></li>
          </ul>
          <p>Powered by
            <title=" Nick_Zhang" target="_blank " class="w3-hover-opacity ">© Zhoker, Inc.</a>
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