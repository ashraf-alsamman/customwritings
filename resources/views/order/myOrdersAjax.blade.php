 


 
<div class="container">
@foreach ($data as $myorder)
<div class="row" id="order{{$myorder->id}}">

<div  style="padding-left: 0px;" class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><img src ={{URL::asset("/uploads/avatars/$myorder->profilePic")}}  width="60" ></div>
    <div  style="padding-left: 22px;" class="col-xs-10 col-sm-10 col-md-10 col-lg-10">    
    <p style="font-size:18px">{{$myorder->name}}&nbsp     
    @foreach (App\User::find($myorder->chef_id)->tags as $tag)
    {{ $tag->title }}   &nbsp
    @endforeach</p>
</div>

<div >Request date {{ \Carbon\Carbon::parse($myorder->created_at)->format('d/m/Y')}}</div>
<div >Order date{{ \Carbon\Carbon::parse($myorder->order_time)->format('d/m/Y')}}</div>
    <div>
@if ($myorder->order_status == 0)
<button type="button" class="col-xs-2  btn btn-danger ch_order" id="{{$myorder->id}}">Cansel</button>
@elseif ($myorder->order_status == 2)
    <div  class="alert alert-warning">Canseled</div>
@elseif ($myorder->order_status == 1)
    <div class="alert alert-info">aproved and on the way</div>
@elseif ($myorder->order_status == 3)
    <div class="alert alert-success">done</div>
@endif

   
    </div>
</div>
<br><br><br>
 @endforeach
 </div>



 <script>
 $.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

$('.ch_order').on('click',function(e){
if(!confirm('Do you want to delete this item?')){e.preventDefault();   }               
else{
   var data_id = event.target.id; 
 // ajax start
  $.ajax(
        {
            url: 'CancelMyOrder',
            type: "get",
            data: { data_id: data_id },
           // datatype: "html",
            beforeSend: function()
            {
                $('.ajax-loading').show();
            }
        })
        .done(function(data)
        {
            if(data.length == 0){
            console.log(data.length);
               
                //notify user if nothing to load
                $('.ajax-loading').html("No more records!");
                return;
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
     

 



} // end else
});



</script>

 