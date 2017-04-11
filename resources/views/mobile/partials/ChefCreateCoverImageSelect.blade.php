<!--Image Modal -->
<div class="modal fade" id="cover-select-modal" role="dialog">
    <div class="modal-dialog" style="width:90%;">

    <!-- Modal content-->
    <div class="modal-content">
        <div>
            <span class="glyphicon glyphicon-remove pull-right w3-large" data-dismiss="modal" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
        </div>
        <div class="modal-header">
            <h1 class="text-center w3-padding-8 w3-text-green">{{ $lang->desktop()['chef_create']['create_cover_img'] }}</h1>
        </div>
        <div class="modal-body" style="padding:10px 10px;">
            <div id="cover-paginatepaginate">
                @foreach ($images->chunk(15) as $imagesChunk)
                    <div class="w3-row-padding">
                        @foreach ($imagesChunk as $image)
                            <div class="w3-col s12 zk-shrink-hover cover-ckb w3-margin-top" style="cursor:pointer;">
                                <img src="{{ asset($image->image_path) }}" id="cover-{{$image->id}}"  alt="image" style="width:100%;">
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    </div>
</div>

<script>
    $(function () {
        var list = [];

        // open upload modal
        $(".cover-select-modal-trigger").click(function() {
            $("#cover-select-modal").modal();
        });

        // checkbox event
        $(".cover-ckb").click(function(event) {
            id = "#".concat(event.target.id);
            let image_id = id.substring(7);

            //show cover image
            $("#cover-image-origin").hide();
            $(".cover-image-show").hide();
            $("#cover-image-show" + image_id).show();
            
            $("#cover-image-input").val(image_id);
            $("#cover-select-modal").modal('hide');
        });

        //link to image-from
        $('#cover-select-modal').on('hidden.bs.modal', function (e) {
            $('html, body').animate({
                scrollTop: $("#cover-form").offset().top
            }, 100);
        });
    });
</script>

<!--JQuery Pagination-->
<script>
    jQuery('#cover-paginate').mbPagination({
        showFirstLast: true,
        perPage: 1,
    });
</script>