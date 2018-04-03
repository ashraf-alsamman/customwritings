<style>

    .embed-container { 
        position: relative; 
        padding-bottom: 56.25%; 
        padding-top: 30px; 
        height: 0; 
        overflow: hidden; 
        max-width: 100%; 
        height: auto; 
    }   
    
    .embed-container iframe, .embed-container object, .embed-container embed { 
        position: absolute; 
        top: 0; 
        left: 0; 
        width: 100%; 
        height: 100%; 
    }


    .modal {
      width: 80%;
 
       background-color: transparent;
      }
  .picker__holder {
 
}






.ajax-loading{text-align: center;}
 </style>

@foreach ($posts as $post)
 
<div class="row postbox">
<div class="">
<div class="row">
<div  style="padding-left: 0px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
<img src ="{{URL::asset('/uploads/avatars')}}/{{$post->users_profilePic}}"  class="img-responsive"  >
</div>  

<div  style="" class="col-xs-8 col-sm-8 col-md-8 col-lg-8">    
<a href='{!! url('/chef/'); !!}/{{$post->posts_user_id}}'>{{$post->users_name}}</a>
<p style="">
     

 
            @foreach (App\User::find($post->posts_user_id)->tags as $tag)
            {{ $tag->title }}   &nbsp
            @endforeach      
 


 

                </p>
                <p style="font-size:23px"></p>
                <a href='{!! url('/meals/'); !!}/{{$post->posts_post_id}}'>{{$post->posts_title}}</a>
            </div>
</div>
 
<div class="embed-container"> <iframe width="560" height="315" src="{{URL::asset('/uploads/v/8590639.mp4')}}" frameborder="0" allowfullscreen=""> </iframe> </div> 


 

 <div class="row" style="margin-top:0px">
   
   <button type="button" class="modal-trigger col-xs-8  btn btn-warning ch_order"   data-toggle="modal" data-target="#myModal{{$post->posts_post_id}}"  id="ch_order"  data-post_id="5" data-chef_id ="164">Order</button>
   <button type="button" class="col-xs-3  col-xs-offset-1 btn btn-warning">Like</button>
 </div> <!-- order and like -->



</div>


</div>



<!-- Modal start -->
<div id="myModal{{$post->posts_post_id}}" class=" modal fade" role="dialog">
 

    <!-- Modal content-->
    <div class="modal-content">
              <div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Confirm Chef Order Day</h4>
          </div>
    <div class="row">
        <div  style="padding-left:20px;" class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><img src ={{URL::asset('/uploads/avatars/1463283738.jpeg')}}  width="100" ></div>

          <div class="modal-body col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <p> </p>
            <p>&nbsp
       <!--     @foreach (App\User::find($post->posts_user_id)->tags as $tag)  {{ $tag->title }}   &nbsp @endforeach</p>
          </div>
          <div class="modal-body col-xs-3 col-sm-3 col-md-3 col-lg-3">
   <input   type="text" class="datepicker" width="100" id="order_time{{$post->posts_post_id}}" />
          </div>
          
      </div>
      
<div class="modal-footer" style=" margin-top: 0px; ">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
   <button type="button" class="col-xs-8  btn btn-warning ConfirmOrder" id="confirm_order"  data-dismiss="modal"  data-post_id="{{$post->posts_post_id}}" data-chef_id ="{{$post->posts_user_id}}">Order</button>
</div>

  </div>
</div>
<!-- Modal end -->


@endforeach


<script>
 	$( 'input[type="date"]' ).datepicker({ dateFormat: 'YYYY-MM-DD'});

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

$(".ConfirmOrder").unbind("click").click(function(event){

// $('.ConfirmOrder').on('click',function(event){
  event.preventDefault();
 var post_id = event.target.dataset['post_id'];
 var chef_id = event.target.dataset['chef_id'];
 var order_time = document.getElementById('order_time'+post_id).value ;
// if (element != null) { str = element.value;}
   



// ajax start
  $.ajax(
        {
            url: 'ConfirmOrder',
            type: "get",
            data: {chef_id:chef_id,order_time:order_time,post_id:post_id},
           // datatype: "html",
            beforeSend: function()
            {
                $('.ajax-loading').show();
            }
        })
        .done(function(data)
        {
            if(data.length == 0){
                //notify user if nothing to load
                $('.ajax-loading').html("No more records!");
                return console.log('no data');
            }
            $('.ajax-loading').hide(); //hide loading animation once data is received
          //  $("#results").append(data); //append data into #results element          
             console.log(data);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });
// ajax end
});










 
 
 
$('.datepicker').pickadate({
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 15, // Creates a dropdown of 15 years to control year,
  today: 'Today',
  clear: 'Clear',
  close: 'Ok',
  format: 'yyyy-mm-dd',
  closeOnSelect: true // Close upon selecting a date,
});

 



</script>

