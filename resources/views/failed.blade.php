@extends('layouts.app')
@section('content')



<div class="callout warning">
<h5>Payment failed</h5>
<p>Try Again</p>
 
<a href="{{ url('order') }}">Make New Order</a>


</div>




@endsection