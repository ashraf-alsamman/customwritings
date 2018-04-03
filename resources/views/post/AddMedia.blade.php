@extends('layouts.app')
@section('content')




<div class="modal fade" id="progressDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p>Please wait while we update your topic. You will be redirected automatically!</p>

                <div class="progress progress-striped active">
                    <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        <span class="sr-only">/span>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->






	<title>Laravel 5 - Ajax Image Uploading Tutorial</title>
	<script src="http://malsup.github.com/jquery.form.js"></script>
    {{Form::open([ 'files' => true, 'id' => "uploadmedia"])}}
    <input id="title" type="text" class="form-control" name="title" id ="title">
    {{Form::file('image',['id' => 'image'])}}
    {{Form::submit('Save', ['class' => 'btn btn-success'])}}
    {{Form::close()}}


<script>

      var token = $('input[name=_token]');
      var post_id = {!! json_encode($data) !!};
      

      function updateProgress(evt) {
        console.log('updateProgress');
        if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                $('#progressDialog').modal('show');
                $('.progress-bar').css('width', 100*percentComplete+'%');
                $('.sr-only').html(percentComplete+'%');

                console.log(percentComplete);
        } else {
                // Unable to compute progress information since the total size is unknown
                console.log('unable to complete');
        }
    }



    $('#uploadmedia').submit(function(event){

        event.preventDefault();
 var image = $('#image')[0].files[0];
 var form = new FormData();
 form.append('image', image);
 form.append('post_id', post_id);
 $.ajax({
    headers: {
        'X-CSRF-TOKEN': token.val()
    },
     url: 'uploadmedia',
     data: form,
     cache: false,
     xhr: function() {  // custom xhr
        myXhr = $.ajaxSettings.xhr();
        if(myXhr.upload){ // check if upload property exists
            myXhr.upload.addEventListener('progress',updateProgress, false); // for handling the progress of the upload
        }
        return myXhr;
    },
     contentType: false,
     processData: false,
     type: 'POST',
     success:function(response) {
        // console(response);
         if (response != 'nofile'){
             window.location.href="meals/"+response
            }
     }
 });





    // ajax end
    });
    
    
    
    
    
    
    
    </script>



</body>
</html>







@endsection