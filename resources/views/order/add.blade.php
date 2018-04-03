@extends('layouts.app')
@section('content')
  

 
















		<style type="text/css">
 
ul {
    list-style: none;
}
li {
    display: inline-block;
    margin-right: 15px;
}
input[type="radio"] {
    visibility:hidden;
}
label {
    cursor: pointer;
}
input:checked + label {
    background:#bcc7d8;
 
}
 

 [type='checkbox'] + label, [type='radio'] + label {
    display: inline-block;
    vertical-align: baseline;
     margin-left: 0;  
      margin-right: 0;  
    margin-bottom: 0;
}

.selectize-input {
    border: 1px solid #d0d0d0;
    padding: 0px 0px;
    display: inline-block;
    width: 100%;
    overflow: hidden;
    position: relative;
    z-index: 1;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.1);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.1);
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}

.callout {
    position: relative;
    margin: 0 0 1rem 0;
    padding: 0;
    border: 0;
    border-radius: 0;
    background-color: white;
    color: #0a0a0a;
}







		.demo-animals .scientific {
			font-weight: normal;
			opacity: 0.3;
			margin: 0 0 0 2px;
		}
		.demo-animals .scientific::before {
			content: '(';
		}
		.demo-animals .scientific::after {
			content: ')';
		}


input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}


#outer
{
    width:100%;
    text-align: center;
}
.inner
{
    display: inline-block;
}
.inner.input
{
    margin: 0;
}



		</style>


		 
		 <script>
 var JSONItems = '[';
 </script>
 
 
 <script>
JSONItems  += '{"id":"high_school","8 hours":"25","24 hours":"22","48 hours":"19","3 days":"16","5 days":"15","7 days":"12","14 days":"10"}';JSONItems  += ',';
JSONItems  += '{"id":"undergrad_1_2","8 hours":"31","24 hours":"25","48 hours":"22","3 days":"18","5 days":"17","7 days":"14","14 days":"13"}';JSONItems  += ',';
JSONItems  += '{"id":"undergrad_3_4","8 hours":"37","24 hours":"28","48 hours":"25","3 days":"21","5 days":"19","7 days":"17","14 days":"16","30 days":"14"}';JSONItems  += ',';
JSONItems  += '{"id":"masters","8 hours":"45","24 hours":"37","48 hours":"32","3 days":"30","5 days":"26","7 days":"24","14 days":"22","30 days":"20"}';JSONItems  += ',';
JSONItems  += '{"id":"doctoral","24 hours":"48","48 hours":"42","3 days":"35","5 days":"33","7 days":"29","14 days":"27","30 days":"25"}';JSONItems  += ',';

  
 </script>
 

 <script>
 JSONItems = JSONItems.replace(/,\s*$/, "");JSONItems  += ']'; 
 var AcademicLevelPrices =[]; AcademicLevelPrices = JSON.parse(JSONItems);
 console.log(AcademicLevelPrices);
 </script>	



   <div class="grid-container">
    <div class="grid-x grid-padding-x">
<div class="large-8 medium-8 cell">
<form action="AddNewOrder" enctype="multipart/form-data" method="post" >
  
   
<input type="hidden" name="_token" value="{{ csrf_token() }}">



<div id="hiddinForm"></div>
   <br>
 <div class="grid-x grid-padding-x grid-container">
    <div class="cell medium-3 large-3"  style="text-align: right;">admin email</div>
	<div class="cell medium-7 large-7"   ><input type="text" style="background:#d7ecfa" value="ashraf.alsamman@gmail.com"  name="email" ></div>
	
 </div>

<div class="grid-x grid-padding-x grid-container">
 <div class="cell medium-3 large-3" style="text-align: right;">Academic level</div>
<input type="radio" name = "pokemon" value="High School" id="high_school" 
class="pokemon" onchange="getComboA(high_school)" >
<label for="high_school">High School</label>
	
<input type="radio" name = "pokemon" value="Undergrad yrs 1 2 " id="undergrad_1_2" 
class="pokemon" onchange="getComboA(undergrad_1_2)" >
<label for="undergrad_1_2">Undergrad yrs 1 2 </label>



<input type="radio" name = "pokemon" value="Undergrad yrs 3 4" id="undergrad_3_4" 
class="pokemon" onchange="getComboA(undergrad_3_4)" >
<label for="undergrad_3_4">Undergrad yrs 3 4</label>


<input type="radio" name = "pokemon" value="Master's" id="masters" 
class="pokemon" onchange="getComboA(masters)" >
<label for="masters">Master's</label>

<input type="radio" name = "pokemon" value="Doctoral" id="doctoral" 
class="pokemon" onchange="getComboA(doctoral)" >
<label for="doctoral">Doctoral</label>






</div>

 
 
<br>

 <div class="grid-x grid-padding-x grid-container">
 <div class="cell medium-3 large-3"  style="text-align: right;">Type of paper</div>
		
	<div class="medium-8 cell">
		<div class="control-group" id="selectTypeOfPaperCon">
						<label for="selectTypeOfPaper"></label>
		<select id="selectTypeOfPaper" name="selectTypeOfPaper" onchange="TypeOfPaper(this)"  class="demo-animals" 
			placeholder="Select Type Of Paper..."></select>
		</div>
	</div>

 
</div>


 

 <div class="grid-x grid-padding-x grid-container">
 <div class="cell medium-3 large-3"  style="text-align: right;">Discipline</div>
 
		
	<div class="medium-8 cell">
		<div class="control-group"  id="DisciplineCon">
						<label for="Discipline"></label>
		<select id="Discipline"  name="Discipline" onchange="GetDiscipline(this)"  class="demo-animals" 
			placeholder="Select Type Of Discipline..."></select>
		</div>
	</div>

 
</div>


 <div class="grid-x grid-padding-x grid-container">
 <div class="cell medium-3 large-3"  style="text-align: right;">Topic</div>
 
		
	<div class="medium-8 cell">
		<div class="control-group">
						<label for="selectTypeOfPaper"></label>
<input type="text" maxlength="100" value="Writer’s choice"  name="Topic" class="UIInput UIInput-default UIInput-default--type-text UIInput-default--size-m UIInput-default--color-default UIInput-default--oneline" tabindex="0">
		</div>
	</div>

 
</div>

 <div class="grid-x grid-padding-x grid-container">
 <div class="cell medium-3 large-3"  style="text-align: right;">Paper instructions</div>
	<div class="medium-8 cell">
		<div class="control-group">

			<textarea name="PaperInstructions"  class="PaperInstructionsControl_textarea UIInput UIInput-default UIInput-default--type-textarea UIInput-default--size-m UIInput-default--color-default UIInput-default--autosize UIInput-default--not-resizable" placeholder="May include: paper structure and/or outline, types and number of references to be used, grading scale or any other requirements." tabindex="0" style="overflow: hidden; word-wrap: break-word; height: 88.5px; z-index: auto; position: relative; line-height: 26.25px; font-size: 18.75px; transition: none; background: transparent !important;" data-gramm="true" data-txt_gramm_id="d3cfc52e-d46e-36e4-305d-7dc42baf1117" data-gramm_id="d3cfc52e-d46e-36e4-305d-7dc42baf1117" spellcheck="false" data-gramm_editor="true"></textarea>			
 		</div>
	</div>
</div>  


 <div class="grid-x grid-padding-x grid-container">
 <div class="cell medium-3 large-3"  style="text-align: right;">Additional materials</div>
	<div class="medium-8 cell">
		<div class="control-group">
		
<input name="myFile" type="file" disabled>
	</div></div>
</div>  





 <div class="grid-x grid-padding-x grid-container">
 <div class="cell medium-3 large-3"  style="text-align: right;">Paper format</div>

<input type="radio" name ="paper_format" value="MLA" id="mla" class="pokemon">
<label for="mla">MLA</label>

<input type="radio" name ="paper_format" value="MLA" id="apa" class="pokemon">
<label for="apa">APA</label> 
 
<input type="radio" name ="paper_format" value="Chicago / Turabian" id="chicago_turabian" class="pokemon">
<label for="chicago_turabian">Chicago / Turabian</label>
 
<input type="radio" name ="paper_format" value="Not applicable" id="not_applicable" class="pokemon">
<label for="not_applicable">Not applicable</label>
 
<input type="radio" name ="paper_format" value="MLA" id="other" class="pokemon" >
<label for="other">Other</label> 

	<div id="Paper_format_other_container">
 	</div>
</div>


<!--<div class="">Paper format</div>-->
<br>
 <div class="grid-x grid-padding-x grid-container">
 <div class="cell medium-3 large-3"  style="text-align: right;">Deadline</div>

					

 
 <div id="output" style="font-size:9px;float:left"> </div>
						
				

	
</div>

 
 
 
  



 

  
 <div class="grid-x grid-padding-x grid-container">
 <div class="cell medium-3 large-3"  style="text-align: right;">Pages</div>

					<div class="large-4 medium-4 small-4 cell">
						<div class="secondary callout">
								<div class="inner"><button onclick="HandleNum(-1,'pages_numbers');  " style="font-size:38px">-</button></div>
								<div class="inner"><input type="number"   style="width: 70px;margin:0"  style=" " name="pages_numbers" id= "pages_numbers" value="0"></div>
								<div class="inner"><button onclick="HandleNum(1,'pages_numbers');  " style="font-size:38px">+</button></div>
						</div>
					</div>



					<div class="large-5 medium-5 small-5 cell">
						<div class="secondary callout">
							<input type="radio" name ="spaced" value="single_spaced" id="single_spaced" class="pokemon" onchange="UpdateAllPrices()">
							<label for="single_spaced">Single spaced</label>

							<input type="radio" name ="spaced" value  checked="checked" ="double_spaced" id="double_spaced" class="pokemon"  onchange="UpdateAllPrices()">
							<label for="double_spaced">Double spaced</label> 
						</div>
					</div>
          </div>



 <div class="grid-x grid-padding-x grid-container">
 <div class="cell medium-3 large-3"  style="text-align: right;">Sources</div>
 
					<div class="large-4 medium-4 small-4 cell">
						<div class="secondary callout">
								<div class="inner"><button onclick="HandleOtherNum(-1,'sources');  " style="font-size:38px">-</button></div>
								<div class="inner"><input type="number"   style="width: 70px;margin:0"  style=" " id= "sources" name="sources" value="0"></div>
								<div class="inner"><button onclick="HandleOtherNum(1,'sources');  " style="font-size:38px">+</button></div>
						</div>
					</div>

</div>


 <div class="grid-x grid-padding-x grid-container">
 <div class="cell medium-3 large-3"  style="text-align: right;">Charts</div>
				 

					<div class="large-4 medium-4 small-4 cell">
						<div class="secondary callout">
								<div class="inner"><button onclick="HandleChartsNum(-1)" style="font-size:38px">-</button></div>
								<div class="inner"><input type="number"   style="width: 70px;margin:0"  style=" " id= "charts" name="charts" value="0"></div>
								<div class="inner"><button onclick="HandleChartsNum(1)" style="font-size:38px">+</button></div>
						</div>
					</div>

</div>

 

 <div class="grid-x grid-padding-x grid-container">
 <div class="cell medium-3 large-3"  style="text-align: right;">PowerPoint slides</div>
		
					<div class="large-4 medium-4 small-4 cell">
						<div class="secondary callout">
								<div class="inner"><button onclick="HandleOtherNum(-1,'power_point_slides');  " style="font-size:38px">-</button></div>
								<div class="inner"><input type="number"   style="width: 70px;margin:0"  style=" " id= "power_point_slides" value="0"></div>
								<div class="inner"><button onclick="HandleOtherNum(1,'power_point_slides');  " style="font-size:38px">+</button></div>
						</div>
					</div>

</div>


 <div class="grid-x grid-padding-x grid-container">
 <div class="cell medium-3 large-3"  style="text-align: right;">Writer category</div>
	
					<div class="large-8 medium-8 small-8 cell">
						<div class="secondary callout">
 
							<input type="radio" name ="WriterCategory" value="best_available" id="best_available" class="pokemon"  checked="checked" onchange="UpdateAllPrices()">
							<label for="best_available">Best available</label>

							<input type="radio" name ="WriterCategory" value="advanced" id="advanced" class="pokemon"  onchange="UpdateAllPrices()">
							<label for="advanced">Advanced</label> 

							<input type="radio" name ="WriterCategory" value="enl" id="enl" class="pokemon"  onchange="UpdateAllPrices()">
							<label for="enl">ENL</label> 
 
						</div>
					</div>

</div>




 <div class="grid-x grid-padding-x grid-container">
 <div class="cell medium-3 large-3"  style="text-align: right;">Additional services</div>
	


		<div class="large-4 medium-4 small-4 cell">
			<div class="  callout">
				<input type="checkbox" name="get_writer_samples"
				 value="get_writer_samples" id="get_writer_samples" onchange="UpdateAllPrices()">
				<label for="get_writer_samples">Get Writer Samples</label> 
			</div>
		

 
			<div class="  callout">
				<input type="checkbox" name="get_copy_of_sources" value="get_copy_of_sources" id="get_copy_of_sources"  onchange="UpdateAllPrices()">
				<label for="get_copy_of_sources">Get Copy of Sources</label> 
			</div>
 
 
 
			<div class="  callout" id="ProgressiveDeliveryCon">
				<input type="checkbox" disabled name="progressive_delivery" value="progressive_delivery" id="progressive_delivery"  onchange="UpdateAllPrices()">
				<label for="progressive_delivery">Progressive Delivery</label> 
			</div>
		</div>



</div>


 
 



</div><!--large-4 medium-4 cell -->


<div style="font-size:12px:padding:5px:background:#06859b"   class="large-4 medium-4 cell "> <div class="columns small-3" data-sticky-container> <div class="sticky primary callout" t data-sticky data-anchor="foo">
 <br>
 <div class="grid-x grid-padding-x grid-container">
	<div class="cell medium-5 large-5"  style="text-align: right;">Writer’s choice </div>
	<div id="w_academic_level"></div>
</div> 

 <div class="grid-x grid-padding-x grid-container">
	<div class="cell medium-5 large-5"  style="text-align: right;">pages </div>
	<span id="w_pages_count"> 0 </span>   × $<span id="w_one_pages_price" >0 </span>  
     Total $ <span id="w_pages_price"> 0 </span> 
</div> 

 <div class="grid-x grid-padding-x grid-container">
	<div class="cell medium-5 large-5"  style="text-align: right;">charts </div>
 <span id="w_charts_counts">0</span>
$<span id="w_one_charts_price">0</span>
 X<span id="w_total_charts_price">0</span> 
</div> 



<div class="grid-x grid-padding-x grid-container">
<div class="cell medium-5 large-5"  style="text-align: right;">Powerpoint</div>

<span id="w_power_point_count">0</span>
$<span id="w_one_power_point_price">0</span>
X<span id="w_total_power_point_price">0</span> 

</div> 

<div class="grid-x grid-padding-x grid-container">
<div class="cell medium-5 large-5"  style="text-align: right;">Get Writer Samples</div>
 
<span id="GetWriterSamples">0</span>

</div> 

 
<div class="grid-x grid-padding-x grid-container">
<div class="cell medium-5 large-5"  style="text-align: right;">Copy Of Sources</div>
 
<span id="GetCopyOfSources">0</span>

</div> 


<div class="grid-x grid-padding-x grid-container">
<div class="cell medium-5 large-5"  style="text-align: right;"> Writer Category</div>
  <span id="writer_category">0</span>
</div> 

  
<div class="grid-x grid-padding-x grid-container">
<div class="cell medium-5 large-5"  style="text-align: right;"> Delivery</div>
  <span id="Progressive_Delivery">0</span>
</div> 

 <div class="grid-x grid-padding-x grid-container">
<div class="cell medium-5 large-5"  style="text-align: right;">Total Price</div>
  <span id="GlobalTotalPrice">0</span>
</div> 

 
 

<br>
  <button id="submit" disabled type="submit" class="button expanded">Order and Pay with Paypal</button>

</form>
<!-- This sticky element would stick to the window for the height of the element #foo, with a 1em marginTop -->
 </div></div></div>
				
		


</div><!--grid-x grid-padding-x -->
</div><!--grid-container -->

 




@endsection


