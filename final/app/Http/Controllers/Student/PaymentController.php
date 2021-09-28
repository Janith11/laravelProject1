<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\PaymentLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/** All Paypal Details class **/
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use Notification;

class PaymentController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }
    public function index(){
        $payment = PaymentLog::with('user')->with('student')->where('user_id',Auth::user()->id)->get();
        $lastpayment=PaymentLog::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
        $studentdetails=Student::where('user_id',Auth::user()->id)->get();
        return view('student.payment.viewpayments',compact('payment','studentdetails','lastpayment'));
    }

    public function payWithpaypal(Request $request)
    {
        $uid=$request->uid;
        $slrupee=$request->slvalue;
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status',[$uid,$slrupee])) /** Specify return URL **/
            // ->setCancelUrl(URL::to('status'));
            ->setCancelUrl(URL::to('status',[$uid,$slrupee]));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {

            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                \Session::put('error', 'Connection timeout');
                return Redirect::to('/student/payments');

            } else {

                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/student/payments');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        Session::put('error', 'Unknown error occurred');
        return Redirect::to('/student/payments');

    }

    public function getPaymentStatus($id,$lkr)
    {
        
        $request=request();//try get from method

        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        //if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        if (empty($request->PayerID) || empty($request->token)) {

            Session::put('error', 'Payment failed');
            return Redirect::to('/student/payments');

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        //$execution->setPayerId(Input::get('PayerID'));
        $execution->setPayerId($request->PayerID);

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            Session::put('success', 'Payment success');
            
            //Adding Payment log
            PaymentLog::create([
                'user_id' => $id,
                'type'=> 'debit',
                'description'=>'Student Payment',
                'amount'=> $lkr,
            ]);

            //updating Student Table
            $student =new Student;
            $student->where('user_id',$id)->increment('paid_amount',$lkr);

            //add update record for cart
            // $email='yangcheebeng@hotmail.com';
	        // Notification::route('mail', $email)->notify(new \App\Notifications\orderPaid($email));
            // return Redirect::to('/student/payments');  //back to product page
            // return view('studenentpaymentlogsview');
            return redirect('/student/payments')->with('succmsg', 'Payment is Successful !');

        }

        Session::put('error', 'Payment failed');
        return Redirect::to('/student/payments'); 

    }







}
