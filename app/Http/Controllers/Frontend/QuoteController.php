<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Client;
use App\Models\EmailConfiguration;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Support\Facades\File;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;
use PDF;


class QuoteController extends Controller
{
    //

    public $viewPath;
    public function __construct()
    {
        $this->viewPath = 'frontend';
    }


    public function index(){

        $clientExistantQoutes = Client::with('quotes')->whereHas('quotes')
                                       ->where('user_id', Auth::user()->id)->get();

        $nonClientQoutes = Quote::where('client_id',0)->get();
        if (\request()->type == 'quote') {

            $clientExistantQoutes = Client::with('quotes')->whereHas('quotes', function ($q) {
                                     $q->where('status','unpaid')->where('is_send',0);
                                 })
                                   ->where('user_id', Auth::user()->id)
                                   ->orderBy('id','desc')->get();
            $nonClientQoutes = Quote::where('client_id',0)->where('status','unpaid')->where('is_send',0)->get();
        }

        $data['clientExistantQoutes'] = $clientExistantQoutes;
        $data['nonClientQoutes'] = $nonClientQoutes;
        $type = '';
        return view($this->viewPath.'/quotes/list', compact('data','type'));
    }

    public function clientQuotesCreate(){

        $id = Auth::user()->id;
        $user = User::find($id);
        $type = 'bill';
        return view($this->viewPath.'/quotes/add_quote',compact('user',$type));
    }


    public function getSingleQuote($clientId, $id){

        $type = 'quote';
        if ( \Request::get('q') != null) {
            $type = \Request::get('q');
        }
        $clientId = Hashids::decode($clientId);

        $client = Client::with(['quotes' => function ($q) use ($clientId, $id ){
            $q->where('client_id', $clientId);
            $q->where('address_id', $id);
        }])->where('id', $clientId)->first();
        $workAddressArr = json_decode($client->work_address, true);

        $singleAddressArr = [];
        if ($id == 0) {
            $singleAddressArr['id'] = 0;
            $singleAddressArr['street'] = $client->street;
            $singleAddressArr['street_number'] = $client->street_number;
            $singleAddressArr['postal_code'] = $client->postal_code;
            $singleAddressArr['municipality'] = $client->municipality;
            $singleAddressArr['document_number'] = $client->document_number;
        }else {
            foreach ($workAddressArr as $data) {
                if($data['id'] == $id) {
                    $singleAddressArr =  $data;
                }
            }
        }
        //return $client;

        return view($this->viewPath.'/quotes/calculation_quote',compact('client','singleAddressArr','type','id'));
    }

    public function generatePdf(Request $request)
    {
        $userId = Auth::user()->id;
        $result = $this->createPdfTemplate($userId, $request);
        return $result;
    }



    public function createPdfTemplate($userId, $request){

        $user = User::find($userId);
        $client = $request->client;
        $quotes = $request->quotes;
        $qtDataArr['client'] = $client;
        $qtDataArr['quotes'] = $quotes;
        $qtDataArr['total'] = $request->total;
        $qtDataArr['tva_val'] = $request->tva_val;
        $qtDataArr['amount'] = $request->amount;
        $qtDataArr['user'] = $user;
        $qtDataArr['quote_number'] = $request->quote_number;
        dd($qtDataArr);
        if ($request->is_non_client) {
            $pdf = PDF::loadView($this->viewPath.'/quotes/pref_draft_bill_template_pdf', $qtDataArr);
            $pdfName = 'Facture_'.$request->concerned.'_'.$client['street'].time().'.pdf';
            $filename = public_path('uploads/quotes/'.$pdfName);
            $pdf->save($filename);
            return [
                'status'=> true,
                'pdf_url'=>  $pdfName
            ];
        }else {

            $pdf = PDF::loadView($this->viewPath.'/quotes/quotes_template_pdf', $qtDataArr);
            $pdfName = 'Devis_'.$request->concerned.'_'.$client['street'].time().'.pdf';
            $filename = public_path('uploads/quotes/'.$pdfName);
            $pdf->save($filename);
            return [
                'status'=> true,
                'pdf_url'=>  $pdfName
            ];
        }


    }

    public function save(Request $request){


            if (isset($request->quote_id)) {
                $qouteFound = Quote::where('id', $request->quote_id)->first();
            }else{
                $qouteFound = Quote::where('document_number', $request->document_number)->first();
            }
            if ($qouteFound){
                $quote = Quote::find($qouteFound->id);
                if ($quote) {

                    if (!is_null($quote->file)){
                        $filename = public_path('uploads/quotes/'.$quote->file);
                        File::delete($filename);
                    }
                }

            }else {
                $quote = new Quote();
            }

            $quote->name = $request->name;
            $quote->email = $request->email;
            $quote->address = $request->address;
            $quote->postal_code = $request->postal_code;
            $quote->total = $request->total;
            $quote->calculation_quote = json_encode($request->calculation_quote);
            $quote->concern = $request->concern;
            $quote->tax = $request->tax;
            $quote->tva_number = $request->tva_number;
            $quote->language = $request->language;
            $quote->language_tone = $request->language_tone;
            $quote->user_id = Auth::user()->id;
            $quote->client_id = $request->client_id;
            $quote->concern_address = $request->concern_address;
            $quote->document_number = $request->document_number;
            $quote->address_id = $request->address_id;
            $quote->total_amount = $request->total_amount;
            $quote->total_tva = $request->total_tva;

            // save pdf quotes
            $user = Auth::user();
            $client = $request->client;
            $qtDataArr['client'] = $client;
            $qtDataArr['quotes'] = $request->calculation_quote;
            $qtDataArr['total'] = $request->total;
            $qtDataArr['tva_val'] = $request->total_tva;
            $qtDataArr['amount'] = $request->total_amount;
            $qtDataArr['user'] = $user;
            $qtDataArr['quote_number'] = $quote->document_number;
            $concernText = str_replace(' ', '_', $request->concern);

            if ($request->type == 'bill'){

                $pdf = PDF::loadView($this->viewPath.'/quotes/pref_draft_bill_template_pdf', $qtDataArr);
                $pdfName = 'Facture_'.$concernText.'_'.$client['street'].time().'.pdf';
                $filename = public_path('uploads/quotes/'.$pdfName);
                $pdf->save($filename);
                $quote->file = $pdfName;

            }else if ($request->type == 'quote'){

                $pdf = PDF::loadView($this->viewPath.'/quotes/quotes_template_pdf', $qtDataArr);
                $pdfName = 'Devis_'.$concernText.'_'.$client['street'].time().'.pdf';
                $filename = public_path('uploads/quotes/'.$pdfName);
                $pdf->save($filename);
                $quote->file = $pdfName;

            }

            $quote->save();



            return [
              'status' => true,
              'data' => $quote,
              'message' => 'Quote has been save successfully'
            ];

    }


    public function viewPdf($filename){
        $pdf = PDF::loadView($this->viewPath.'/quotes/quotes_template_pdf_view', []);
        return  $pdf->stream();
    }


    public function getDraftEmail($id){

        $draftMessage = '';
        $client = Client::find($id);
        $draftEmail  = EmailConfiguration::where('language_tone', $client->language_tone)->where('language',$client->language)->first();
        if ($draftEmail) {
            $draftMessage = $draftEmail->message;
        }

        return [
            'message' => $draftMessage
        ];


    }

    public function preDraftBill($id){

        $quoteId = Hashids::decode($id)[0];
        $quote = Quote::with('client.user')->where('id',$quoteId)->first();
        $data['quote'] = $quote;
        return view($this->viewPath.'/quotes/pre_draft_bill',compact('data'));

    }

    public function preDraftBillNonClient($id){

        $quoteId = Hashids::decode($id)[0];
        $quote = Quote::where('id',$quoteId)->first();
        $user = Auth::user();
        return view($this->viewPath.'/quotes/pre_draft_bill_non_client',compact('user','quote'));

    }


    public function searchQuote(Request $request){

        $type = $request->type;
        $srchKeyword = $request->q;
        $nonClientQoutes = Quote::where('client_id',0)
            ->where('concern', 'like', '%' . $srchKeyword . '%')->get();
        $clientExistantQoutes = Client::whereHas('quotes')
            ->with(['quotes'=> function ($q) use ($srchKeyword){
              $q->where('name', 'like', '%' . $srchKeyword . '%');
              $q->orWhere('concern', 'like', '%' . $srchKeyword . '%');
        }])->where('user_id', Auth::user()->id)
            ->orderBy('id','desc')
            ->get();

        $data['clientExistantQoutes'] = $clientExistantQoutes;
        $data['nonClientQoutes'] = $nonClientQoutes;
        return [
            'status' => true,
            'view' => view($this->viewPath.'/quotes/quote_listing', compact('data','type'))->render(),
        ];
    }



    public function delete($id){

        $quote = Quote::find($id);
        if ($quote){
            Quote::where('id', $id)->delete();
        }
        return ['status' => true, 'message' => 'Quote has been deleted successfully'];

    }
}
