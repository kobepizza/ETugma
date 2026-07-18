<?php

namespace App\Http\Controllers;

use App\Models\ApiInvoiceRequest;
use Illuminate\Http\Request;
use App\Services\XenditService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\Invoice;
use Xendit\Invoice\InvoiceApi;

class PaymentController extends Controller
{
    protected $xendit;
    public function __construct()
    {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
    }

    public function createInvoice(Request $request)
    {
       
        $params = new CreateInvoiceRequest([
            'external_id' => (string) Str::uuid(),
            'payer_email' => $request->payer_email,
            'description' => $request->description,
            'amount' => $request->amount,
            'currency' => $request->currency,
            'payment_type' => $request->payment_type,
            'payment_method_types' => $request->payment_method_types,
            'redirect_url' => $request->redirect_url,
            'callback_url' => $request->callback_url,

        ]);

        $apiInstance = new InvoiceApi();
        $generateInvoice = $apiInstance->createInvoice($params);

        $apiInvoice = new ApiInvoiceRequest();
        $apiInvoice -> external_id =$params['external_id'];
        $apiInvoice -> invoice_url= $generateInvoice['invoice_url'];
        $apiInvoice -> save();

        return response()->json(['data' =>$generateInvoice['invoice_url']]);
    }

    public function webhook(Request $request){
        Log::info('Xendit Webhook Received', $request->all());

        // Example: Handle invoice paid event
        if ($request->event === 'invoice.paid') {
            $invoiceId = $request->data['id'];
            // Update invoice status in your database
        }

        // Always respond with a 200 status code to acknowledge receipt
        return response()->json(['status' => 'success'], 200);
    }
}
