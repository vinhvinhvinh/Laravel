<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    //
    public function invoice()
    {
        $invoice = Invoice::all();
        $invoiceCount = Invoice::all()->count();

        return view('admin.invoices.index', compact('invoice', 'invoiceCount'));
    }

    public function delete($id)
    {
        $invoice = Invoice::find($id)->delete();
        return back();
    }

    public function create()
    {

        $datetime = Date('Ymdhms');
        $countAllInv = Invoice::all()->count() + 1;
        $chuoiID = $countAllInv;
        if ($countAllInv > 99)
            $chuoiID = $countAllInv;

        if ($countAllInv > 9)
            $chuoiID = '0' . $countAllInv;
        else
            $chuoiID = '00' . $countAllInv;

        $originalId = $chuoiID;
        $finalId = 'INVOICE' . $datetime . $originalId;
        return view('admin.invoices.create', compact('finalId'));
    }

    public function addInvoice(Request $request)
    {
        // dd($request);
        $invoice = new Invoice();
        $invoice->id = $request->id;
        $invoice->matk = $request->matk;
        $invoice->ngaylaphd = $request->ngaylaphd;
        $invoice->nvlap = $request->nvlap;
        $invoice->tongtien = $request->tongtien;
        $invoice->save();
        return redirect()->route('admin.invoices.index');
    }

    public function edit($id)
    {
        $invoice = Invoice::find($id);
        return view('admin.invoices.edit', compact('invoice'));
    }

    function update(Request $request)
    {
        $invoice = Invoice::find($request->id);

        Invoice::where('id', $request->id)->update(
            [
                'id' => $request->id,
                'matk' => $request->matk,
                'ngaylaphd' => $request->ngaylaphd,
                'nvlap' => $request->nvlap,
                'tongtien' => $request->tongtien,
            ]
        );

        return redirect()->route('admin.invoices.index');
    }
}
