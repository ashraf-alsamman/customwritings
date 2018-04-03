



 var imagehere;
 var AcademicLevelGlobal;
 var DeadlineGlobal;
$('input:radio[name=pokemon]').filter('[id=high_school]').prop('checked', true);
getComboA(high_school);

$('input:radio[name=deadline]').filter('[id=3]').prop('checked', true);
$('input:radio[id=get_copy_of_sources]').filter('[id=3]').prop('checked')

function getComboA(data){

 // $("#selectTypeOfPaperCon").html(' ');
//$("#selectTypeOfPaperCon").load();
    $("#selectTypeOfPaperCon").html('<label for="selectTypeOfPaper"></label><select id="selectTypeOfPaper" name="selectTypeOfPaper" onchange="TypeOfPaper(this)"  class="demo-animals" placeholder="Select Type Of Paper..."></select>');
    selectTypeOfPaperDataLoad();
    
    $("#DisciplineCon").html('<label for="Discipline"></label><select id="Discipline"  name="Discipline" onchange="GetDiscipline(this)"  class="demo-animals" placeholder="Select Type Of Discipline..."></select>');
    DisciplineDataLoad();

  AcademicLevelGlobal = data.id;
  console.log(AcademicLevelGlobal);
 $("#w_academic_level").html(data.value);
 var olddeadline = $('[name=deadline]:checked').attr('id');

 $("#output").html('');
 switch (data) {
  case high_school:
  var alldata = JSON.stringify(AcademicLevelPrices[0]);
      break;
  case undergrad_1_2:
  var alldata = JSON.stringify(AcademicLevelPrices[1]);
      break;
  case undergrad_3_4:
  var alldata = JSON.stringify(AcademicLevelPrices[2]);
      break;
  case masters:
  var alldata = JSON.stringify(AcademicLevelPrices[3]);
  break;
  case doctoral:
  var alldata = JSON.stringify(AcademicLevelPrices[4]);


}

// var alldata = JSON.stringify(AcademicLevelPrices[4]);

 
 



  var JSONItems = [];
 
   JSONItems = JSON.parse(alldata);
  console.log(JSONItems);
 
   jQuery.each(JSONItems, function(i, val) {
if ( i != 'id'){
  var idstrict = i.substring(0, 2);
  idstrict =idstrict.replace(/\s/g, '')
    $("#output").append(
      ' <input   name="deadline"   required'+
      'class="pokemon"  type="radio"'+
     
      'id='+
      '"'+
      idstrict+
      '"'+
      ' '+
      'onchange="getPriceByDeadline('+
      val+
      ','+
      idstrict+
      ')"'+

 
      
      
      'value='+
      val+
      '>'+

      '<label '+
      'for='+
      idstrict+
      
      '>'+

      i+
      ' '+
 
      '</label>' 



      
);


}

   
 
  
  

    
  });
  if (typeof olddeadline !== 'undefined') {
    olddeadline =3;
}
  $('input:radio[name=deadline]').filter('[id='+olddeadline+']').prop('checked', true);

}

function getPriceByDeadline (PagePrice,idstrict)
{
 /*
 var pages_numbers = $('[id=pages_numbers]').val()
 var TotalPagesPric
 TotalPagesPrice =  PagePrice * pages_numbers;
 $("#w_pages_price").html(TotalPagesPrice);
 $("#w_one_pages_price").html(PagePrice);
*/
DeadlineGlobal =idstrict;
console.log(DeadlineGlobal);
 UpdateAllPrices();

}
 
// start TypeOfPaper
function TypeOfPaper(data)
{
      if (data.value == 'CustomOther')
      {
          var promptData = prompt("Please enter your paper type", "other");
          if (promptData != null) 
          {
            $("[data-value=CustomOther]").html(
            '<div class="item" data-value='+
            promptData+
            '>'+
            promptData+
            '</div>'
            );
          }
      }

      
     // console.log(isMastersChecked+'ya nannnns');


if (
  (data.value == 'Dissertation_Dissertation_chapter') ||
  (data.value == 'Thesis_Thesis_chapter') 
)
{
 
        if ($('input:radio[id=undergrad_3_4]').prop('checked') == false)
        {
          var txt;
          if (confirm("Press a button!")) 
          {
                var $radios = $('input:radio[name=pokemon]');
                  $radios.filter('[id=undergrad_3_4]').prop('checked', true);
                  getComboA(masters);
          }
          else 
          {
              txt = "You pressed Cancel!";
          }
          console.log(txt);
        }
}

}

// end TypeOfPaper










// start GetDiscipline
function GetDiscipline(data)
{
      if (data.value == 'CustomOther')
      {
          var promptData = prompt("Please enter your paper type", "other");
          if (promptData != null) 
          {
            $("[data-value=CustomOther]").html(
            '<div class="item" data-value='+
            promptData+
            '>'+
            promptData+
            '</div>'
            );
          }
      }

      
     // console.log(isMastersChecked+'ya nannnns');


if (
  (data.value == 'Business_Studies') ||
  (data.value == 'Art_Fine_arts_Performing_arts') ||
  (data.value == 'Film_Theater_studies') ||
  (data.value == 'Linguistics') ||
  (data.value == 'Philosophy') ||
  (data.value == 'Poetry') ||
  (data.value == 'Religious_studies') ||
  (data.value == 'Anthropology') ||
  (data.value == 'Cultural and Ethnic Studies') ||
  (data.value == 'Economics') ||
  (data.value == 'Ethics') ||
  (data.value == 'Political science') ||
  (data.value == 'Psychology') ||
  (data.value == 'Social Work and Human Services') ||
  (data.value == 'Sociology') ||
  (data.value == 'Tourism') ||
  (data.value == 'Urban Studies') ||
  (data.value == 'Lab') ||
  (data.value == 'Accounting') ||
  (data.value == 'Business Studies') ||
  (data.value == 'Finance') ||
  (data.value == 'business_and_administrative_studies') ||
  (data.value == 'International Relations') ||
  (data.value == 'Logistics') ||
  (data.value == 'business_and_administrative_studies') ||
  (data.value == 'Marketing') ||
  (data.value == 'Public Relations (PR)') ||
  (data.value == 'Astronomy (and other Space Sciences)') ||
  (data.value == 'Biology (and other Life Sciences)') ||
  (data.value == 'Ecology') ||
  (data.value == 'Zoology') ||
  (data.value == 'Computer science') ||
  (data.value == 'Statistics') ||
  (data.value == 'Agriculture') ||
  (data.value == 'Application Letters') ||
  (data.value == 'Architecture, Building and Planning') ||
  (data.value == 'Aviation') ||
  (data.value == 'Civil Engineering') ||
  (data.value == 'Communications') ||
  (data.value == 'Criminal Justice') ||
  (data.value == 'Criminal law') ||
  (data.value == 'Education') ||
  (data.value == 'Engineering') ||
  (data.value == 'Environmental studies and Forestry') ||
  (data.value == 'Family and consumer science') ||
  (data.value == 'Health Care') ||
  (data.value == 'International Trade') ||
  (data.value == 'IT, Web') ||
  (data.value == 'Leadership Studies') ||
  (data.value == 'Medical Sciences (Anatomy, Physiology, Pharmacology etc.)') ||
  (data.value == 'Medicine') ||
  (data.value == 'Nursing') ||
  (data.value == 'Public Administration') ||
  (data.value == 'Technology') ||
  (data.value == 'Management')  
   
)
{
 
        if ($('input:radio[id=undergrad_3_4]').prop('checked') == false)
        {
          var txt;
          if (confirm("Press a button!")) 
          {
                var $radios = $('input:radio[name=pokemon]');
                  $radios.filter('[id=undergrad_3_4]').prop('checked', true);
                  getComboA(masters);
          }
          else 
          {
              txt = "You pressed Cancel!";
          }
          console.log(txt);
        }
}

}

// end GetDiscipline











function selectTypeOfPaperDataLoad () {
  $('#selectTypeOfPaper').selectize({
    options: [
      {class: 'most_popular', value: "Essay (any type)", name: "Essay (any type)" },
      {class: 'most_popular', value: "Research paper", name: "Research paper" },
      {class: 'most_popular', value: "Coursework", name: "Coursework" },
      {class: 'most_popular', value: "Case study", name: "Case study" },
      {class: 'most_popular', value: "Creative writing", name: "Creative writing" },
  
  
      {class: 'other', value: 'Admission essay', name: 'Admission essay'},
      {class: 'other', value: 'Analysis', name: 'Analysis'},
      {class: 'other', value: 'Annotated bibliography', name: 'Annotated bibliography'},
      {class: 'other', value: 'Argumentative essays', name: 'Argumentative essays'},
      {class: 'other', value: 'Article review', name: 'Article review'},
      {class: 'other', value: 'Book/movie review', name: 'Book/movie review'},
      {class: 'other', value: 'Business plan', name: 'Business plan'},
      {class: 'other', value: 'Capstone project', name: 'Capstone project'},
      {class: 'other', value: 'Critical thinking', name: 'Critical thinking'},
      {class: 'other', value: 'Discussion Essay', name: 'Discussion Essay'},
     
      // change acadimic grade to undergrade 3 4
      {class: 'other', value: 'Dissertation_Dissertation_chapter', name: 'Dissertation_Dissertation_chapter'},
    //  {class: 'other', value: 'Dissertation/Dissertation chapter', name: 'Dissertation/Dissertation chapter'},
  
  
      {class: 'other', value: 'Lab Report', name: 'Lab Report'},
      {class: 'other', value: 'Literature Analysis/Review', name: 'Literature Analysis/Review'},
      {class: 'other', value: 'Memo/Letter', name: 'Memo/Letter'},
      {class: 'other', value: 'Outline', name: 'Outline'},
      {class: 'other', value: 'Personal reflection', name: 'Personal reflection'},
      {class: 'other', value: 'Presentation / PPT', name: 'Presentation / PPT'},
      {class: 'other', value: 'Question-Answer', name: 'Question-Answer'},
      {class: 'other', value: 'Reflection paper / Reflection essay', name: 'Reflection paper / Reflection essay'},
      {class: 'other', value: 'Report (any type) / Brief report', name: 'Report (any type) / Brief report'},
      {class: 'other', value: 'Research proposal', name: 'Research proposal'},
      {class: 'other', value: 'Response essay', name: 'Response essay'},
      {class: 'other', value: 'Response Essay/Personal Reflection', name: 'Response Essay/Personal Reflection'},
      {class: 'other', value: 'Speech', name: 'Speech'},
      {class: 'other', value: 'Summary', name: 'Summary'},
      {class: 'other', value: 'Term paper', name: 'Term paper'},
     
       // change acadimic grade to undergrade 3 4
      {class: 'other', value: 'Thesis_Thesis_chapter', name: 'Thesis/Thesis chapter'},
  
  
      {class: 'CustomOther', value: 'CustomOther', name: 'CustomOther'}
    ],
    optgroups: [
      {value: 'most_popular', label: 'most popular', label_scientific: 'Mammalia'},
      {value: 'other', label: 'other', label_scientific: 'other'},
      {value: 'CustomOther', label: 'Custom Other', label_scientific: 'Custom Other'}
    ],
    optgroupField: 'class',
    labelField: 'name',
    searchField: ['name'],
    render: {
      optgroup_header: function(data, escape) {
        return '<div class="optgroup-header">' + escape(data.label) + ' <span class="scientific">' + escape(data.label_scientific) + '</span></div>';
      },
      option:function(data, escape) {
        var alldatafortest = ["Thesis_Thesis_chapter", "Dissertation_Dissertation_chapter"];
   if (AcademicLevelGlobal == 'high_school' || AcademicLevelGlobal == 'undergrad_1_2'){
      if ($.inArray(data.value, alldatafortest)!=-1)
     {
       imagehere = '<img src="https://cdn1.iconfinder.com/data/icons/iconbeast-lite/30/graduation-cap.png" alt="Mountain View" width="20"height="20">';
     }
     else{ imagehere = '';}
   }
  
     
  
  
        return '<div class="item" data-value="Article review">' + escape(data.value) + imagehere+'</div>';
      }
      
    }
  });
 
}
 // end  

selectTypeOfPaperDataLoad();
// start Discipline
function DisciplineDataLoad(){
  $('#Discipline').selectize({
  options: [
    {class: 'most_popular', value: "English 101", name: "English 101" },
    {class: 'most_popular', value: "Business_Studies", name: "Business Studies" },
    {class: 'most_popular', value: "Management", name: "Management" },
    {class: 'most_popular', value: "History", name: "History" },
    {class: 'most_popular', value: "Nursing", name: "Nursing" },


    {class: 'humanities', value: 'Art_Fine_arts_Performing_arts', name: 'Art (Fine arts, Performing arts)'},
    {class: 'humanities', value: 'Classic English Literature', name: 'Classic English Literature'},
    {class: 'humanities', value: 'Composition', name: 'Composition'},
    {class: 'humanities', value: 'English 101', name: 'English 101'},
    {class: 'humanities', value: 'Film_Theater_studies', name: 'Film & Theater studies'},
    {class: 'humanities', value: 'History', name: 'History'},
    {class: 'humanities', value: 'Linguistics', name: 'Linguistics'},
    {class: 'humanities', value: 'Literature', name: 'Literature'},
    {class: 'humanities', value: 'Music', name: 'Music'},
    {class: 'humanities', value: 'Philosophy', name: 'Philosophy'},
    {class: 'humanities', value: 'Poetry', name: 'Poetry'},  
    {class: 'humanities', value: 'Religious_studies', name: 'Religious studies'},
    {class: 'humanities', value: 'Shakespeare', name: 'Shakespeare'},
   
 
    {class: 'social_sciences', value: 'Anthropology', name: 'Anthropology'},
    {class: 'social_sciences', value: 'Cultural and Ethnic Studies', name: 'Cultural and Ethnic Studies'},
    {class: 'social_sciences', value: 'Economics', name: 'Economics'},
    {class: 'social_sciences', value: 'Ethics', name: 'Ethics'},
    {class: 'social_sciences', value: 'Political science', name: 'Political science'},
    {class: 'social_sciences', value: 'Psychology', name: 'Psychology'},
    {class: 'social_sciences', value: 'Social Work and Human Services', name: 'Social Work and Human Services'},
    {class: 'social_sciences', value: 'Sociology', name: 'Sociology'},
    {class: 'social_sciences', value: 'Tourism', name: 'Tourism'},
    {class: 'social_sciences', value: 'Urban Studies', name: 'Urban Studies'},
    {class: 'social_sciences', value: 'Lab', name: 'Women s & gender studies'},


    {class: 'business_and_administrative_studies', value: 'Accounting', name: 'Accounting'},
    {class: 'business_and_administrative_studies', value: 'Business Studies', name: 'Business Studies'},
    {class: 'business_and_administrative_studies', value: 'Finance', name: 'Finance'},
    {class: 'business_and_administrative_studies', value: 'Human Resources Management (HRM)', name: 'Human Resources Management (HRM)'},
    {class: 'business_and_administrative_studies', value: 'International Relations', name: 'International Relations'},
    {class: 'business_and_administrative_studies', value: 'Logistics', name: 'Logistics'},
    {class: 'business_and_administrative_studies', value: 'Management', name: 'Management'},
    {class: 'business_and_administrative_studies', value: 'Marketing', name: 'Marketing'},
    {class: 'business_and_administrative_studies', value: 'Public Relations (PR)', name: 'Public Relations (PR)'},
    
    {class: 'natural_sciences', value: 'Astronomy (and other Space Sciences)', name: 'Astronomy (and other Space Sciences)'},
    {class: 'natural_sciences', value: 'Biology (and other Life Sciences)', name: 'Biology (and other Life Sciences)'},
    {class: 'natural_sciences', value: 'Chemistry', name: 'Chemistry'},
    {class: 'natural_sciences', value: 'Ecology', name: 'Ecology'},
    {class: 'natural_sciences', value: 'Geography', name: 'Geography'},
    {class: 'natural_sciences', value: 'Geology (and other Earth Sciences)', name: 'Geology (and other Earth Sciences)'},
    {class: 'natural_sciences', value: 'Physics', name: 'Physics'},
    {class: 'natural_sciences', value: 'Zoology', name: 'Zoology'},

    {class: 'formal_sciences', value: 'Computer science', name: 'Computer science'},
    {class: 'formal_sciences', value: 'Mathematics', name: 'Mathematics'},
    {class: 'formal_sciences', value: 'Statistics', name: 'Statistics'},


    {class: 'professions_and_applied_sciences', value: 'Agriculture', name: 'Agriculture'},
    {class: 'professions_and_applied_sciences', value: 'Application Letters', name: 'Application Letters'},
    {class: 'professions_and_applied_sciences', value: 'Architecture, Building and Planning', name: 'Architecture, Building and Planning'},
    {class: 'professions_and_applied_sciences', value: 'Aviation', name: 'Aviation'},
    {class: 'professions_and_applied_sciences', value: 'Civil Engineering', name: 'Civil Engineering'},
    {class: 'professions_and_applied_sciences', value: 'Communications', name: 'Communications'},
    {class: 'professions_and_applied_sciences', value: 'Criminal Justice', name: 'Criminal Justice'},
    {class: 'professions_and_applied_sciences', value: 'Criminal law', name: 'Criminal law'},
    {class: 'professions_and_applied_sciences', value: 'Education', name: 'Education'},
    {class: 'professions_and_applied_sciences', value: 'Engineering', name: 'Engineering'},
    {class: 'professions_and_applied_sciences', value: 'Environmental studies and Forestry', name: 'Environmental studies and Forestry'},
    {class: 'professions_and_applied_sciences', value: 'Family and consumer science', name: 'Family and consumer science'},
    {class: 'professions_and_applied_sciences', value: 'Health Care', name: 'Health Care'},
    {class: 'professions_and_applied_sciences', value: 'International Trade', name: 'International Trade'},
    {class: 'professions_and_applied_sciences', value: 'IT, Web', name: 'IT, Web'},
    {class: 'professions_and_applied_sciences', value: 'Leadership Studies', name: 'Leadership Studies'},
    {class: 'professions_and_applied_sciences', value: 'Medical Sciences (Anatomy, Physiology, Pharmacology etc.)', name: 'Medical Sciences (Anatomy, Physiology, Pharmacology etc.)'},
    {class: 'professions_and_applied_sciences', value: 'Medicine', name: 'Medicine'},
    {class: 'professions_and_applied_sciences', value: 'Nursing', name: 'Nursing'},
    {class: 'professions_and_applied_sciences', value: 'Nutrition/Dietary', name: 'Nutrition/Dietary'},
    {class: 'professions_and_applied_sciences', value: 'Public Administration', name: 'Public Administration'},
    {class: 'professions_and_applied_sciences', value: 'Sports', name: 'Sports'},
    {class: 'professions_and_applied_sciences', value: 'Technology', name: 'Technology'},

    {class: 'CustomOther', value: 'CustomOther', name: 'Custom Other'},

  ],
  optgroups: [
    {value: 'most_popular', label: 'most popular', label_scientific: 'Mammalia'},
    {value: 'humanities', label: 'Humanities', label_scientific: 'Humanities'},
    {value: 'social_sciences', label: 'Social Sciences', label_scientific: 'Social Sciences'},
   
    {value: 'business_and_administrative_studies', label: 'Business And Administrative Studies', label_scientific: 'Business And Administrative Studies'},
    {value: 'natural_sciences', label: 'Natural Sciences', label_scientific: 'Natural Sciences'},
    {value: 'formal_sciences', label: 'Formal Sciences', label_scientific: 'Formal Sciences'},
    {value: 'professions_and_applied_sciences', label: 'Professions and Applied Sciences', label_scientific: 'Professions and Applied Sciences'},
    {value: 'CustomOther', label: 'Custom Other', label_scientific: 'CustomOther'}

  ],
  optgroupField: 'class',
  labelField: 'name',
  searchField: ['name'],
  render: {
    optgroup_header: function(data, escape) {
      return '<div class="optgroup-header">' + escape(data.label) + ' <span class="scientific">' + escape(data.label_scientific) + '</span></div>';
    },
    option:function(data, escape) {
      var alldatafortest = [
        "Business_Studies",
        "Art_Fine_arts_Performing_arts",
        "Film_Theater_studies",
        "Linguistics",
        "Philosophy",
        "Poetry",
        "Religious_studies",
        "Anthropology",
        "Cultural and Ethnic Studies",
        "Economics",
        "Ethics",
        "Political science",
        "Psychology",
        "Social Work and Human Services",
        "Sociology",
        "Tourism",
        "Urban Studies",
        "Lab",
        "Accounting",
        "Business Studies",
        "Finance",
        "business_and_administrative_studies",
        "International Relations",
        "Logistics",
        "business_and_administrative_studies",
        "Marketing",
        "Public Relations (PR)",
        "Astronomy (and other Space Sciences)",
         "Biology (and other Life Sciences)",
         "Ecology",
         "Zoology",
         "Computer science",
         "Statistics",
         "Agriculture",
         "Application Letters",
         "Architecture, Building and Planning",
         "Aviation",
         "Civil Engineering",
         "Communications",
         "Criminal Justice",
         "Criminal law",
         "Education",
         "Engineering",
         "Environmental studies and Forestry",
         "Family and consumer science",
         "Health Care",
         "IT, Web",
        "Leadership Studies",
        "Medical Sciences (Anatomy, Physiology, Pharmacology etc.)",
        "Medicine",
        "Nursing",
        "Public Administration",
        "Technology",
        "Management"
        ];
      

        if (AcademicLevelGlobal == 'high_school' || AcademicLevelGlobal == 'undergrad_1_2'){
          if ($.inArray(data.value, alldatafortest)!=-1)
         {
           imagehere = '<img src="https://cdn1.iconfinder.com/data/icons/iconbeast-lite/30/graduation-cap.png" alt="Mountain View" width="20"height="20">';
         }
         else{ imagehere = '';}
       }
   


      return '<div class="item" data-value="Article review">' + escape(data.value) + imagehere+'</div>';
    }
  }
});
}
DisciplineDataLoad();
// end Discipline





// start Paper_format_other
 function Paper_format_other(){

}

// end Paper_format_other


$('input:radio[name=paper_format]').change(function() {

  console.log();
  if(this.id=='other')
  {
    $("#Paper_format_other_container").html(
      ' <input   name="pokemon"   required'+
      'class="pokemon"  type="text"'+
      'id='+
      'Paper_format_other'+
      ' '+
      'value='+
      'other'+
      '>'+
      '<label '+
      'for='+
      'Paper_format_other'+
      '>'+
      ' '+
      'other'+
      '</label>' );
  }
else{
  $("#Paper_format_other_container").html('');
}



    

});


// start HandleNum
var newnum;
function HandleNum (n,id ){
event.preventDefault();
    var oldnum = $('[id='+id+']').val();
    if (oldnum == 0 && parseInt(n)== -1){

    }
    else
    {
    newnum =   parseInt(oldnum)+n;
    $('[id='+id+']').val(newnum); 
    var input = document.getElementById(id);
    input.setAttribute('value', input.value);
    }

    UpdateAllPrices();
}

// end HandleNum

// start  Num

function HandleOtherNum (n,id ){
event.preventDefault();
var newnum;
 var oldnum = $('[id='+id+']').val();
      if (oldnum == 0 && parseInt(n)== -1){
      }
      else
      {
      newnum =   parseInt(oldnum)+n;
      $('[id='+id+']').val(newnum); 
      var input = document.getElementById(id);
      input.setAttribute('value', input.value);
      }
      UpdateAllPrices();

}

// end  Num



// start  Num
var newnum;
function HandleChartsNum (n ){
    event.preventDefault();
    var oldnum = $('[id=charts]').val();
    if (oldnum == 0 && parseInt(n)== -1){
    }
    else
    {
    newnum =   parseInt(oldnum)+n;
    $('[id=charts]').val(newnum); 
    var input = document.getElementById('charts');
    input.setAttribute('value', input.value);
    }
    UpdateAllPrices();
}









// end  Num
function UpdateAllPrices(){
var onepageprice = 1;
var PPrice = $('[name=deadline]:checked').val();

if ($('input:radio[name=spaced]').filter('[id=single_spaced]').prop('checked')){onepageprice = 2;}

var pages_numbers = $('[id=pages_numbers]').val();
var TotalPagesPricxxx =  PPrice * pages_numbers * onepageprice;
$("#w_pages_price").html(TotalPagesPricxxx);
$("#w_pages_count").html(pages_numbers);
$("#w_one_pages_price").html(PPrice);

var w_charts_count = $('[id=charts]').val();
var w_one_charts_price = PPrice* 0.5;
var w_total_charts_price = w_charts_count*w_one_charts_price;
$("#w_charts_counts").html(w_charts_count);
$("#w_one_charts_price").html(w_one_charts_price);
$("#w_total_charts_price").html(w_total_charts_price);


var w_power_point_count = $('[id=power_point_slides]').val();
var w_one_power_point_price = PPrice* 0.5;
var w_total_power_point_price = w_power_point_count*w_one_power_point_price;
$("#w_power_point_count").html(w_power_point_count);
$("#w_one_power_point_price").html(w_one_power_point_price);
$("#w_total_power_point_price").html(w_total_power_point_price);
 
if(!$.isNumeric(TotalPagesPricxxx)) {TotalPagesPricxxx = 0;}
if(!$.isNumeric(w_total_charts_price)) {w_total_charts_price = 0;} 
if(!$.isNumeric(w_total_power_point_price)) {w_total_power_point_price = 0;}

var GlobalTotalPrice = TotalPagesPricxxx+w_total_charts_price+w_total_power_point_price;

 var GetCopyOfSources = 0;
// Get Copy of Sources start
 var PreGetCopyOfSources = TotalPagesPricxxx+w_total_charts_price+w_total_power_point_price;
if ($('input:checkbox[id=get_copy_of_sources]').prop('checked') ){
 
     GetCopyOfSources = 14.95;
    if(PreGetCopyOfSources > 149)
    {
      GetCopyOfSources = PreGetCopyOfSources*0.1;
    }
    $("#GetCopyOfSources").html(GetCopyOfSources);
  
   }
   else{
     $("#GetCopyOfSources").html('');
   }
  // Get Copy of Sources end



// Get Writer Samples start
var GetWriterSamples = 0;
if ($('input:checkbox[id=get_writer_samples]').prop('checked') ){
   GetWriterSamples = 5;
 $("#GetWriterSamples").html(GetWriterSamples);
}
else{
  $("#GetWriterSamples").html('');
}
// Get Writer Samples end

// Progressive Delivery start
var ProgressiveDelivery = 0;
if ($('input:checkbox[id=progressive_delivery]').prop('checked') ){
   ProgressiveDelivery = PreGetCopyOfSources *0.1;
 $("#Progressive_Delivery").html(ProgressiveDelivery);
}
else{
  $("#Progressive_Delivery").html('');
}
// Progressive Delivery end






 


var w_WriterCategory = 0 ;
if ($('[name=WriterCategory]:checked').val()=='best_available'){w_WriterCategory=0;}
if ($('[name=WriterCategory]:checked').val()=='advanced'){w_WriterCategory=GlobalTotalPrice*0.25;}
if ($('[name=WriterCategory]:checked').val()=='enl'){w_WriterCategory=GlobalTotalPrice*0.3;}

GlobalTotalPrice= GlobalTotalPrice+ProgressiveDelivery+GetWriterSamples+w_WriterCategory+GetCopyOfSources;



var w_one_power_point_price = PPrice* 0.5;
var w_total_power_point_price = w_power_point_count*w_one_power_point_price;
$("#w_power_point_count").html(w_power_point_count);
$("#w_one_power_point_price").html(w_one_power_point_price);
$("#w_total_power_point_price").html(w_total_power_point_price);

$("#writer_category").html(w_WriterCategory);

$("#GlobalTotalPrice").html(GlobalTotalPrice);

 if (DeadlineGlobal == 5||DeadlineGlobal == 7||DeadlineGlobal == 14||DeadlineGlobal == 30){
    if (GlobalTotalPrice>200){
      document.getElementById("progressive_delivery").disabled = false;
    }
 }
 else{
   document.getElementById("progressive_delivery").disabled = true;
 }
 
 if (GlobalTotalPrice>1){
  document.getElementById("submit").disabled = false;
}
 else{
  document.getElementById("submit").disabled = true;
}



$("#hiddinForm").html(
  '<input type="hidden" name="TotalPagesPricxxx"  value='+TotalPagesPricxxx+'>'+
 '<input type="hidden" name="ChartsTotalPrice"  value='+w_total_charts_price+'>'+
 '<input type="hidden" name="WriterCategoryPrice"  value='+w_WriterCategory+'>'+
 '<input type="hidden" name="GetCopyOfSources"  value='+GetCopyOfSources+'>'+
  '<input type="hidden" name="ProgressiveDelivery"  value='+GetCopyOfSources+'>'+
  '<input type="hidden" name="ProgressiveDeliveryPrice"  value='+ProgressiveDelivery+'>'+

 

 
  '<input type="hidden" name="TotalPrice"  value='+GlobalTotalPrice+'>'+
 
  '<input type="hidden" name="power_point_count"  value='+w_power_point_count+'>'+
  '<input type="hidden" name="one_power_point_price"  value='+w_one_power_point_price+'>'+
  '<input type="hidden" name="w_total_power_point_price"  value='+w_total_power_point_price+'>'+

  '<input type="hidden" name="w_WriterCategory"  value='+w_WriterCategory+'>'+

  '<input type="hidden" name="ProgressiveDelivery"  value='+ProgressiveDelivery+'>'+
 
  '<input type="hidden" name="GetWriterSamples"  value='+GetWriterSamples+'>'

);


   


}




