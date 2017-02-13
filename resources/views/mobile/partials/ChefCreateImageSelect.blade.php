<!--Image Modal -->
<div class="modal fade" id="select-modal" role="dialog">
    <div class="modal-dialog" style="width:90%;">

    <!-- Modal content-->
    <div class="modal-content">
        <div>
            <span class="glyphicon glyphicon-remove pull-right w3-large" data-dismiss="modal" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
        </div>
        <div class="modal-header">
            <h1 class="text-center w3-padding-8 w3-text-green">Select Images</h1>
        </div>
        <div class="modal-body" style="padding:10px 10px;">
            <div id="img-checkbox">
                <ul>
                    @foreach ($images as $image)
                        <li id="image{{ $loop->iteration }}" style="display:none;">
                            <input type="checkbox" id="cb{{ $image->id }}" class="ckbox" value="{{ $image->id }}" />
                            <label for="cb{{ $image->id }}"><img src="{{ asset($image->image_path) }}" /></label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="more-images" class="w3-center">
                <button class="btn w3-large w3-white w3-border w3-border-green w3-text-green zk-shrink-hover" style="width:60%">More...</button>
            </div>
        </div>
        <div class="modal-footer">
            <div class="w3-center w3-margin-top">
                <a href="#image-form" class="btn w3-large w3-green w3-text-white w3-border w3-border-green zk-shrink-hover" id="select-img" style="width:100%;" data-dismiss="modal">Select</a>
            </div>
        </div>
    </div>

    </div>
</div>

<script>
    $(function () {
        var list = [];

        // open upload modal
        $("#select-modal-trigger").click(function() {
            $("#select-modal").modal();
        });

        // checkbox event
        $(".ckbox").change(function(event) {
            id = "#".concat(event.target.id)
            
            if( $(id).is(':checked') ) {
                list[event.target.value] = event.target.value;
            } else {
                delete list[event.target.value]; 
            }
            
        });

        // select image
        $("#select-img").click(function() {

            $(".ckb-display").hide();

            var value = "";

            list.forEach(function(element) {
                value += element.toString() + ",";

                id = "#dpy".concat(element);
                $(id).show();
            });
            
            $("#image-input").val(value);
        });

        //link to image-from
        $('#select-modal').on('hidden.bs.modal', function (e) {
            $('html, body').animate({
                scrollTop: $("#image-form").offset().top
            }, 100);
        });

        //tooltip
        $(".image-link").tooltip({
            title: "copied",
            trigger: "click",
            placement: "bottom",
        });

        $(".image-link").on('shown.bs.tooltip', function(){
            setTimeout(function () {
                $('.image-link').tooltip('hide');
            }, 2000);
        });

        //copy link
        $(".image-link").click(function(event) {
            id = "#".concat(event.target.id).concat("_catch");
            
            copyToClipboard(id);

            data_target = "[data-toggle='".concat(event.target.id).concat("']");
            $(data_target).tooltip('show');
        });

        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
        }
    });
</script>

<!--Images loading-->
<script>
    $(function () {
        let base = 15;
        let num_image = base;
        let count = 1;

        for (i = 1; i < 1 + base; i++) {
            $("#image" + i).show();
        }

        $("#more-images").click(function() {
            if (count >= {{ count($images) }} / num_image)
                $("#more-images").hide();

            for(i = 1 + num_image; i < 1 + base + num_image; i++) {
                $("#image" + i).show();
            }

            num_image += base;
            count++;
        });
    });
</script>