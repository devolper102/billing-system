<?php

namespace App\Http\Controllers\Frontend;

use App\Models\EmailConfiguration;
use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Collection;

class BillingController extends Controller
{
    //
    public $viewPath;
    public function __construct()
    {
        $this->viewPath = 'frontend';
    }

    public function billsList(){

      $bills =   Quote::where('is_send',1)->orderBy('is_final_review_bill','asc')->get();
      $total_unpaid = Quote::where('status','unpaid')->where('is_send',1)->count();
      $total_paid = Quote::where('status','paid')->where('is_send',1)->count();
      $data['bills'] = $bills;
      $data['total_unpaid'] = $total_unpaid;
      $data['total_paid'] = $total_paid;
      return view($this->viewPath.'/bills/list', compact('data'));
    }

    public function updateBillStatus(Request $request){

       try{
           $quote = Quote::find($request->id);
           if ($request->status == 'unpaid'){
               $quote->status = 'paid';
               $quote->save();
               return ['status'=> true, 'message'=> 'Bill has been paid successfully'];
           }elseif ($request->status == 'paid') {
               $quote->is_final_review_bill = 1;
               $quote->save();
               return [];
           }
       }catch (\Exception $e){
           return ['status'=> false, 'message'=> 'Bill is not paid due to some problem'];
       }


    }

    public function searchBill(Request $request){


        $srchKeyword = $request->q;
        $billQuery =  Quote::where('is_send',1);
        $billData = $billQuery->where(function ($q) use ($srchKeyword) {
            $q->where('concern', 'like', '%' . $srchKeyword . '%');
            $q->orWhere('name', 'like', '%' . $srchKeyword . '%');
            $q->orWhere('concern_address', 'like', '%' . $srchKeyword . '%');
        });
        $data['bills'] = $billData->get();
        $billCollection = collect($billData->get());
        $unPaid = count($billCollection->where('status','unpaid')->all());
        $paid = count($billCollection->where('status','paid')->all());
        $total_unpaid =  $unPaid;
        $total_paid =   $paid;
        $data['total_unpaid'] = $total_unpaid;
        $data['total_paid'] = $total_paid;
        return [
            'status' => true,
            'view' => view($this->viewPath.'/bills/bill_listing', compact('data'))->render(),
        ];
    }


    public function emailAttachment(Request $request)
    {
        if ($request->has('quote_id')) {

            $emailTemplateType = $request->type;
            $qouteId = $request->query('quote_id');
            $qoute = Quote::find($qouteId);
            $lang = $qoute->language;
            $langTone = $qoute->language_tone;
            $tmp = EmailConfiguration::where('type', $emailTemplateType);
            $tmp->where(function ($q) use ($lang, $langTone) {
                $q->where('language', $lang);
                $q->where('language_tone', $langTone);
            });
            $data['qoute'] = $qoute;
            $data['user'] = Auth::user();
            $data['email_template'] = $tmp->first();
            return view($this->viewPath . '/email_attachment/attachment', compact('data'));
        }

    }

    public function sendEmailAttachment(Request $request){
        //dd($request->all());

        $data["email"]=   $request->to_email;
        $data["from_email"]= $request->from_email;
        $data["subject"]=   $request->subject;
        $data["email_body"]=   $request->email_body;
        $data["attachment_pdf"]=   $request->attachment;
        $data["client_name"]=   $request->client_name;
        //$data["attachment_pdf"]=   'http://www.orimi.com/pdf-test.pdf';
        $view  = $this->viewPath . '/email_templates/attachment_email_template';
        try{
           \Mail::send($view, $data, function($message)use($data) {
                $message->to($data["email"], $data["email"])
                    ->subject($data["subject"])
                    ->from(env('MAIL_FROM_ADDRESS'),$data["client_name"]);
                  //  ->attach($data['attachment_pdf']);
            });
            if ($request->template_type === 'bill') {
                $quote = Quote::find($request->quote_id);
                $quote->is_send = 1;
                $quote->status = 'unpaid';
                $quote->save();
            }

        }catch(\Exception $e){
            dd( $e->getMessage());
        }
    }
}
