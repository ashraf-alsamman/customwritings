
<style>.ajax-loading{text-align: center;}</style>

@foreach ($data as $post)
 
<div class="row postbox">

<div class="">
 

 
<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <img src ={{URL::asset('/uploads/avatars/1463283738.jpeg')}}   class="img-responsive img-circle" >
    </div>            
    
    <div  style="padding-left: 22px;" class="col-xs-9 col-sm-9 col-md-9 col-lg-9">    
        <p style="font-size:16px">{{ App\User::find($post->id)->name }}</p>
        <p style="font-size:13px">
                @foreach (App\User::find($post->id)->tags as $tag)
                {{ $tag->title }}   &nbsp
                @endforeach</p>
        </p>        
    </div>

</div>




 <div class="row" style="margin-top:13px">
   
   <button type="button" class="modal-trigger col-xs-8  btn btn-warning ch_order"
   data-toggle="modal" data-target="#myModal{{$post->id}}"  id="ch_order"  data-post_id="5" data-chef_id ="164">Order</button>
 </div> <!-- order and like -->



</div>


</div>



<!-- Modal start -->
<div id="myModal{{$post->id}}" class=" modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
              <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Confirm Chef Order Day</h4>
          </div>
    <div class="row">
        <div  style="padding-left: :20px;" class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><img src ={{URL::asset('/uploads/avatars/1463283738.jpeg')}}  width="100" ></div>

          <div class="modal-body col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div >{{$post->name }}</div>
             <br>
            
           
<p>@foreach (App\User::find($post->id)->tags as $tag){{ $tag->title }}&nbsp @endforeach</p>
          </div>
          <div class="modal-body col-xs-3 col-sm-3 col-md-3 col-lg-3">
   <input type="date"  width="100" id="order_time{{$post->id}}" class="Date"/>
          </div>
          
      </div>
      <div class="modal-footer" style=" margin-top: 0px; ">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
   <button type="button" class="col-xs-8  btn btn-warning ConfirmOrder" id="confirm_order"  data-dismiss="modal"  data-post_id="{{$post->id}}" data-chef_id ="{{$post->id}}">Order</button>

      </div>
    </div>

  </div>
</div>
<!-- Modal end -->


@endforeach


<script>
	$( 'input[type="date"]' ).datepicker({ dateFormat: 'yy-m-dd'});

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});


$(".ConfirmOrder").unbind("click").click(function(event){

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










 
 
 
$('.Date').datepicker(
         { 
            format: 'dd-mm-yy',
            minDate: 0,
            beforeShow: function() {
            $(this).datepicker('option', 'maxDate', $('.Date').val());
          }
       });

 



</script>

