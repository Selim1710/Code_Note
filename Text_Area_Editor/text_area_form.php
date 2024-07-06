@extends('layout.main')

@section('content')
    
    <div class="mt-4 mx-4">
        <!--begin::Form-->
        <form action="#">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="description">Desciption:</label>
                            <div class="col-10">
                                <textarea rows="3" cols="3" name="description" class="form-control ck_editor" id="description" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- edittor js -->
    <style>
        .cke_notifications_area {
            display: none;
        }
    </style>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    @include('js/ckeditor-adapters-jquery')
    @include('js/stand-alone-button-js')
    @include('js/stand-alone-button-multiple-js')

    <script>
        var route_prefix = "";
        $('#lfm').filemanager('image', {
            prefix: route_prefix
        });

        // $(".select2").select2();

        var options = {
            filebrowserImageBrowseUrl: '/filemanager?type=Images',
            filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token={{ csrf_token() }}',
            filebrowserBrowseUrl: '/filemanager?type=Files',
            filebrowserUploadUrl: '/filemanager/upload?type=Files&_token={{ csrf_token() }}'
        };
        $('textarea.ck_editor').ckeditor(options);
    </script>
    
@endsection
