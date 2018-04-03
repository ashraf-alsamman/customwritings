@extends('layouts.app')
@section('content')

<div id="results"></div>
<div class="container" id ="add_meal">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add meal</div>
                <div class="panel-body">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>                                

    {!! Form::open([   'id' => 'addnewpost']) !!}                                                                              
                     
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value=""  autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-4 control-label">Content</label>

                            <div class="col-md-6">
 

<textarea   id="content" class="form-control" name="content" value=""  >
</textarea>


                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Next
                                </button>
                            </div>
                        </div>
                


                 {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var token = $('input[name=_token]');

$('#addnewpost').submit(function(event){
    event.preventDefault();

    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }


 
 // ajax start
  $.ajax(
        {

            headers: {
                'X-CSRF-TOKEN': token.val()
            },
            url: 'addPost',
            type: "post",
            data:$('#addnewpost').serialize(),
           // datatype: "html",
           //   dataType="json",

            beforeSend: function()
            {
             //   $('.ajax-loading').show();
            }
        })
        .done(function(data)
        {
            if(data.length == 0){
                //notify user if nothing to load
                $('.ajax-loading').html("No more records!");
                return console.log('no data');
            }
        //    $('.ajax-loading').hide(); //hide loading animation once data is received
          //  $("#results").append(data); //append data into #results element          
             console.log(data);

             if(data.length > 0)
             {
               $("#add_meal").html(data); //append data into #results element   
             }
             if($.isEmptyObject(data.error)){
              // alert(data.success);
            }else{
                printErrorMsg(data.error);
            }

                

        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });





// ajax end
});























</script>











@endsection