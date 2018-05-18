@extends('mobile.layout.master')

@section('title', '| Chef image')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3.amazonaws.com/zhoker-pics/2018051603.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">

        <div class="w3-padding-12 w3-margin-top" id="title">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['chef_image']['title'] }}<h1>
        </div>

        
        <div class="">
            <div id="upload-modal-trigger" class="btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><i class="fa fa-cloud-upload"></i> {{ $lang->desktop()['chef_image']['image_upload'] }}</div>
        </div>
        
        <div class="w3-border w3-border-grey w3-round-large w3-padding-24 w3-margin-top">
            <div id="img-checkbox">
                {!! Form::open(['route' => ['image.delete', $chef->id], 'method' => 'DELETE']) !!}
                    <div id="paginate">
                        @foreach ($images->chunk(8) as $imagesChunk)
                            <ul>
                                @foreach ($imagesChunk as $image)
                                    <li>
                                        <input type="checkbox" name="image[]" id="cb{{ $image->id }}" value="{{ $image->id }}"/>
                                        <label for="cb{{ $image->id }}"><img src="{{ asset($image->image_path) }}" /></label>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                    </div>
                    <!--for submit delete image, not shown-->
                    <button type="submit" id="delete-img" class="" style="display:none;">delete</button>
                {!! Form::close() !!}
            </div>
            <div id="more-images" class="w3-center">
                @if (count($images) > 0)
                    <button class="btn w3-large w3-white w3-border w3-border-green w3-text-green zk-shrink-hover" style="width:60%">{{ $lang->desktop()['chef_image']['more'] }}...</button>
                @endif
            </div>
        </div>

        <div class="w3-margin-top">
            <div id="trash-trigger" class="btn w3-large w3-white w3-text-red w3-border w3-border-red btn-block zk-shrink-hover"><i class="fa fa-trash"></i> {{ $lang->desktop()['chef_image']['image_remove'] }}</div>
        </div>

    </div>

    <!--Sign In Modal -->
    <div class="modal fade" id="upload-modal" role="dialog">
        <div class="modal-dialog" style="width:100%;">

        <!-- Modal content-->
        <div class="modal-content">
            <div>
                <span class="glyphicon glyphicon-remove pull-right w3-large" data-dismiss="modal" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
            </div>
            <div>
                <h1 class="text-center w3-padding-8 w3-text-green" style="padding-left: 1em;">{{ $lang->desktop()['chef_image']['modal_title'] }}</h1>
            </div>
            <div class="modal-body w3-center" style="padding:10px 10px;">
                <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['chef_image']['modal_photos'] }}</label>
                <div class="dropzone" id="my-dropzone">
                    <div class="fallback">
                        <input name="img" type="file" multiple  required="" />
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <div class="w3-center">
                    <a href="{{ url('image/finish/' . $chef->id) }}" class="btn w3-large w3-green zk-shrink-hover" id="finish-upload" style="width:80%;display:none;">{{ $lang->desktop()['chef_image']['modal_finish'] }}</a>
                </div>
                <div class="w3-center w3-margin-top">
                    <button class="btn w3-large w3-white w3-text-green w3-border w3-border-green zk-shrink-hover" id="upload-img" style="width:80%;">{{ $lang->desktop()['chef_image']['modal_upload'] }}</button>
                    <!--for uplaod image use, not shown in previous-->
                    <button class="btn w3-large w3-white w3-text-white w3-border w3-border-white" style="width:20%;display:none;" id="hide-btn" disabled>{{ $lang->desktop()['chef_image']['modal_upload'] }}</button>
                    <div class="" id="loader" style="left:43%;margin-top:-3em;display:none;"></div>
                </div>
            </div>
        </div>

        </div>
    </div>
@endsection

@section('scripts')
    
    
    <script>
        $(function () {
            // open upload modal
            $("#upload-modal-trigger").click(function() {
                $("#upload-modal").modal();
            });

            // trigger delte button
            $("#trash-trigger").click(function() {
                swal({
                    title: "{{ $lang->desktop()['flash']['are_you_sure'] }}",
                    text: "{{ $lang->desktop()['flash']['image_remove_warn'] }}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ $lang->desktop()['flash']['delete_confirm_btn'] }}",
                    cancelButtonText: "{{ $lang->desktop()['flash']['cancel_btn'] }}",
                    closeOnConfirm: false
                },
                function(){
                    $("#delete-img").click();
                });
            })
        });
    </script>

    <!--dropzone-->
    <script>
        Dropzone.options.myDropzone= {
            url: '{{ route('image.upload', ['chef_id' => $chef->id]) }}',
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 10,
            maxFiles: 10,
            maxFilesize: 10,
            method: 'POST',
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            init: function() {
                dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                document.getElementById("upload-img").addEventListener("click", function(e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    dzClosure.processQueue();
                });

                //send all the form data along with the files:
                this.on("sendingmultiple", function(data, xhr, formData) {
                    $("#upload-img").hide();
                    $("#hide-btn").show();
                    $("#loader").show();
                });
            },
            success: function(file, response){
                $("#hide-btn").hide();
                $("#loader").hide();
                $("#finish-upload").show();
            }
        }
    </script>

    <!--JQuery Pagination-->
    <script>
        jQuery('#paginate').mbPagination({
            showFirstLast: true,
            perPage: 1,
        });
    </script>
@endsection