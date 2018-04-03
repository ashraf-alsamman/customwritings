<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Allorder;
use App\Media;
use App\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Mail;

use Validator;
use App\AjaxImage;


use PayPal\Exception\PayPalConnectionException;
// paypal start
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
// paypal end

class OrderController extends Controller
{


    private $apiContext;
    private $secret;
    private $clientId;
    public function __construct()
    {
        
        $this->clientId = 'AR02RP3HoBSdt21o6weE9zoFENeLfx1TGvIwicrQqXOucM8BF2BWBs7Yy8E88dEECKkq2S0iUCxVSO5X';
        $this->secret = 'ELG48ns-L0VgIWypNY6Y9RiDnQ_8lDlfYOMOGRRTqHqY0DSjY_NLBdVaMvKuf2MKU9uTHI1jMMwPM-m-';
    
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->clientId,$this->secret));
        
        $this->apiContext->setConfig( array( 'mode' => 'sandbox','http.ConnectionTimeOut' => 20000,'http.Retry'=>10 ) );
                                                         


}
 
  public function PayWithPayPal()
    {

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item = new Item();
        $item->setName('Ground Coffee 40 oz')
            ->setCurrency('USD')
            ->setQuantity(1)
         //   ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice("22.00");

            $itemList = new ItemList();
            $itemList->setItems($item);

            $amount = new Amount();
            $amount->setCurrency('USD')
               ->setTotal("22.00");
            //    ->setDetails($details);


            $transaction = new Transaction();
                $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription("Payment description");
            //    ->setInvoiceNumber(uniqid());
  
 



                    $redirectUrls = new RedirectUrls();
                    $redirectUrls->setReturnUrl("http://127.0.0.1:8000/getdone")
                        ->setCancelUrl("http://127.0.0.1:8000/getcalneled");
        

                $payment = new Payment();
                $payment->setIntent("sale")
                    ->setPayer($payer)
                    ->setRedirectUrls($redirectUrls)
                    ->setTransactions(array($transaction));
 


                    $request = clone $payment;

                 
                        $payment->create($this->apiContext);
       








                    $approvalUrl = $payment->getApprovalLink();
                    //NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            
                 //    ResultPrinter::printResult("Created Payment Order Using PayPal. Please visit the URL to Approve.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);
            
                    return $payment;   


    }

    public function getdone()
    {
        return 'done';
    }

        public function getcalneled()
    {
        return 'cancel';
    }

    /////////////
    public function ShowAdd()
    {
        $this->PayWithPayPal();
      //    $data = 'Field::all()';
      //  $data = ['{"id":1,"field_name":"high_school","field_price":16,"field_category":"academic_level","field_value":"High School","field_price_rel":"'{\"id\":\"high_school\",\"8 hours\":\"25\",\"24 hours\":\"22\",\"48 hours\":\"19\",\"3 days\":\"16\",\"5 days\":\"15\",\"7 days\":\"12\",\"14 days\":\"10\"}'"},{"id":2,"field_name":"undergrad_1_2","field_price":18,"field_category":"academic_level","field_value":"Undergrad yrs 1 2 ","field_price_rel":"'{\"id\":\"undergrad_1_2\",\"8 hours\":\"31\",\"24 hours\":\"25\",\"48 hours\":\"22\",\"3 days\":\"18\",\"5 days\":\"17\",\"7 days\":\"14\",\"14 days\":\"13\"}'"},{"id":3,"field_name":"undergrad_3_4","field_price":21,"field_category":"academic_level","field_value":"Undergrad yrs 3 4","field_price_rel":"'{\"id\":\"undergrad_3_4\",\"8 hours\":\"37\",\"24 hours\":\"28\",\"48 hours\":\"25\",\"3 days\":\"21\",\"5 days\":\"19\",\"7 days\":\"17\",\"14 days\":\"16\",\"30 days\":\"14\"}'"},{"id":4,"field_name":"masters","field_price":30,"field_category":"academic_level","field_value":"Master's","field_price_rel":"'{\"id\":\"masters\",\"8 hours\":\"45\",\"24 hours\":\"37\",\"48 hours\":\"32\",\"3 days\":\"30\",\"5 days\":\"26\",\"7 days\":\"24\",\"14 days\":\"22\",\"30 days\":\"20\"}'"},{"id":5,"field_name":"doctoral","field_price":35,"field_category":"academic_level","field_value":"Doctoral","field_price_rel":"'{\"id\":\"doctoral\",\"24 hours\":\"48\",\"48 hours\":\"42\",\"3 days\":\"35\",\"5 days\":\"33\",\"7 days\":\"29\",\"14 days\":\"27\",\"30 days\":\"25\"}'"}'];
       // $posts = DB::table('fields')->get(); // it will get the entire table
    //  printf($data);
      //  return response()->json($data);
   //    return View('order.add', ['data' => $data]);
    }


 
    public function AddNewOrder(Request $request){
        
        // upload start
        
        if ($request->hasFile('myFile')) 
        {
                
            $image = Input::file('myFile');
            $media_type = $image->getMimeType(); 
            $pieces = explode("/",$media_type);
            /*
            $myid=  Auth::user();
            if ($request->ajax()) 
            {
                $New = new Media;
                $New->user_id =  $myid->id;
                $New->post_id =   $request->input('post_id');
                $New->media_type = $pieces[0]; 
                $New->data_link = $image->hashName();
                $New->save();
            }
*/
          //  if ($pieces[0]=='image'){ Storage::put('public/image',  $image);  }
        //    if ($pieces[0]=='video'){ Storage::put('public/video',  $image);  }
 
                $image->move(public_path('/uploads'), $image->hashName()); 
                $FileHashName = $image->hashName();
        }
        // uloade end      
        
        
        
        
        
        
        
        
        
        $foo  = $request->email;
     
        $order = array(
         "Academic level"=>$request->pokemon,
         "Type of paper"=>$request->selectTypeOfPaper,
         "Topic"=>$request->Topic,
         "Discipline"=>$request->Discipline,
         "Paper Instructions"=>$request->PaperInstructions,
         "Paper Format"=>$request->paper_format,
         "deadline time"=>$request->paper_format,
         "Pages time"=>$request->pages_numbers,
         "Toatal Pages Price"=>$request->TotalPagesPricxxx,
         "Spaced"=>$request->spaced,
         "Sources"=>$request->sources,
         "Charts"=>$request->charts,
         "Charts Total Price"=>$request->ChartsTotalPrice,
         "Writer Category"=>$request->WriterCategory,
         "Writer Category Price"=>$request->WriterCategoryPrice,
         "Get Writer Samples"=>$request->get_writer_samples,
         "Get Copy Of Sources"=>$request->GetCopyOfSources,
         "ProgressiveDelivery"=>$request->progressive_delivery,
         "ProgressiveDeliveryPrice"=>$request->ProgressiveDeliveryPrice,
         "PowerPoint"=>$request->power_point_count,
         "OnePowerPointSlidePrice"=>$request->one_power_point_price,
         "TotalPowerPointPrice"=>$request->w_total_power_point_price,
         "TotalPrice"=>$request->TotalPrice,
  
        );
        
     //   $order = implode("<hr>",$order);

 

        $str = json_encode($order);

        Mail::send(['text'=>'mail'],[
            "Academiclevel"=>$request->pokemon,
            "Typeofpaper"=>$request->selectTypeOfPaper,
            "Topic"=>$request->Topic,
            "Discipline"=>$request->Discipline,
            "PaperInstructions"=>$request->PaperInstructions,
            "PaperFormat"=>$request->paper_format,
            "deadlinetime"=>$request->paper_format,
            "Pagestime"=>$request->pages_numbers,
            "ToatalPagesPrice"=>$request->TotalPagesPricxxx,
            "Spaced"=>$request->spaced,
            "Sources"=>$request->sources,
            "Charts"=>$request->charts,
            "ChartsTotalPrice"=>$request->ChartsTotalPrice,
            "WriterCategory"=>$request->WriterCategory,
            "WriterCategory Price"=>$request->WriterCategoryPrice,
            "GetWriterSamples"=>$request->get_writer_samples,
            "GetCopyOfSources"=>$request->GetCopyOfSources,
            "ProgressiveDelivery"=>$request->progressive_delivery,
            "ProgressiveDeliveryPrice"=>$request->ProgressiveDeliveryPrice,
            "PowerPoint"=>$request->power_point_count,
            "OnePowerPointSlidePrice"=>$request->one_power_point_price,
            "TotalPowerPointPrice"=>$request->w_total_power_point_price,
            "TotalPrice"=>$request->TotalPrice,
        
        
        
        ],function ($message) use ($foo){
            
            $message->to($foo,'just for test')->subject('tile') ;
            $message->from('laraveltest2018@gmail.com','just for test');       
            });

 

        return $str;
        
        ;

 
     }


}
