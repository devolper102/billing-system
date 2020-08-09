<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class ContactController extends Controller
{
    //
    public $viewPath;
    public function __construct()
    {
        $this->viewPath = 'frontend';
    }

    public function index(){
        return view($this->viewPath.'/contact/contact');
    }

    public function contactUs(Request $request)
    {
        //dd($request->all());
        try {
            $email_data = [];
            $email_to = 'raheelaslam1136@gmail.com';
            $email_subject = $request->subject;
            $email_body = $request->message;
            $this->sendEmail($email_to, $email_data, $email_body, $email_subject);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }



    public function checkPdf(){

        $pdf = PDF::loadView($this->viewPath.'/quotes/quotes_template_pdf', []);
        $pdfName = time().'.pdf';
        $filename = base_path('public/uploads/quotes/'.$pdfName);
        $pdf->save($filename);
        dump($filename);
        //dump(asset('uploads/quotes/'.$pdfName));
        //dump($filename);
       // return $inventory_pdf->download('inventory.pdf');

    }
}
