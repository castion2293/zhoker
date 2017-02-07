@extends('desktop.layout.master')

@section('title', '| Chef image')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/0124201701.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">

        <div class="w3-padding-12 w3-margin-top" id="title">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Edit Image<h1>
        </div>

        <div class="w3-row">
            <div class="w3-col l3 m3">
                <div id="upload-modal-trigger" class="btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><i class="fa fa-cloud-upload"></i> Upload</div>
            </div>
            <div class="w3-col l3 m3 w3-right">
                <div id="trash-trigger" class="btn w3-large w3-white w3-text-red w3-border w3-border-red btn-block zk-shrink-hover"><i class="fa fa-trash"></i> Remove</div>
            </div>
        </div>

        <div class="w3-border w3-border-grey w3-round-large w3-padding-24 w3-margin-top">
            <div id="img-checkbox">
                {!! Form::open(['route' => ['image.delete', encrypt($chef->id)], 'method' => 'DELETE']) !!}
                    <ul>
                        @foreach ($images as $image)
                            <li>
                                <input type="checkbox" name="image[]" id="cb{{ $image->id }}" value="{{ $image->id }}" />
                                <label for="cb{{ $image->id }}"><img src="{{ asset($image->image_path) }}" /></label>
                            </li>
                        @endforeach
                    </ul>
                    <!--for submit delete image, not shown-->
                    <button type="submit" id="delete-img" class="" style="display:none;">delete</button>
                {!! Form::close() !!}
            </div>
            <div class="text-center">
                {!! $images->links(); !!}
            </div>
        </div>

    </div>

    <!--Image Modal -->
    <div class="modal fade" id="upload-modal" role="dialog">
        <div class="modal-dialog" style="width:80%;">

        <!-- Modal content-->
        <div class="modal-content">
            <div>
                <span class="glyphicon glyphicon-remove pull-right w3-large" data-dismiss="modal" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
            </div>
            <div>
                <h1 class="text-center w3-padding-8 w3-text-green">Upload Images</h1>
            </div>
            <div class="modal-body" style="padding:10px 50px;">
                <label class="w3-text-gery w3-large" style="font-family:cursive">Upload Photos(10 max)</label> 
                <div class="dropzone" id="my-dropzone">
                    <div class="fallback">
                        <input name="img" type="file" multiple  required="" />
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <div class="w3-center">
                    <a href="{{ url('image/index/' . encrypt($chef->id) . '/#title') }}" class="btn w3-large w3-green zk-shrink-hover" id="finish-upload" style="width:20%;display:none;">Finish</a>
                </div>
                <div class="w3-center w3-margin-top">
                    <button class="btn w3-large w3-white w3-text-green w3-border w3-border-green zk-shrink-hover" id="upload-img" style="width:20%;">Upload</button>
                    <button class="btn w3-large w3-white w3-text-white w3-border w3-border-white" style="width:20%;display:none;" id="hide-btn" disabled>Upload</button>
                    <div class="" id="loader" style="left:47%;margin-top:-3em;display:none;"></div>
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

            // trigger delete button
            $("#trash-trigger").click(function() {
                $("#delete-img").click();
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
            maxFilesize: 4,
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
                    $("#upload-img").hide();
                    $("#hide-btn").show();
                    $("#loader").show();
                });

                //send all the form data along with the files:
                this.on("sendingmultiple", function(data, xhr, formData) {
                
                });
            },
            success: function(file, response){
                $("#hide-btn").hide();
                $("#loader").hide();
                $("#finish-upload").show();
            },
            error : function(file, response){
                $("#loader").hide();
                $("#hide-btn").hide();
                $("#upload-img").show();
                swal({
                    title: "image uplaod error",
                    // text: "",
                    type: "error",
                    timer: 2000,
                });
            }
        }
    </script>
@endsection