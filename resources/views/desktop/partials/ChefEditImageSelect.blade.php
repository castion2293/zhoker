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
                            <li>
                                <input type="checkbox" id="cb{{ $image->id }}" class="ckbox" value="{{ $image->id }}" />
                                <label for="cb{{ $image->id }}"><img src="{{ asset($image->image_path) }}" /></label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <div class="w3-center w3-margin-top">
                    <a href="#image-form" class="btn w3-large w3-white w3-text-green w3-border w3-border-green zk-shrink-hover" id="select-img" style="width:20%;" data-dismiss="modal">Select</a>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(function () {
        var list = [];

        //import default images into image input form
        var old_mealImage_value = '';

        @foreach($mealImages as $mealImage)
            $("#cb{{ $mealImage->id }}").prop('checked', true);
            $("#dpy{{ $mealImage->id }}").show();
            list[{{ $mealImage->id }}] = {{ $mealImage->id }};
            old_mealImage_value += "{{ $mealImage->id }}" + ",";
        @endforeach

        $("#image-input").val(old_mealImage_value);

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
                scrollTop: $("#method-form").offset().top
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