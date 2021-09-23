<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Bill;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::all();
       return view ('admin.bill.index',compact('bills'));
       // return view ('admin.bill.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents =Agent::all();
        $patients = Patient::all();
        $services = Service::all();
        return view ('admin.bill.bill_create', compact(['agents', 'patients', 'services']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->all();
        $lastid=Bill::create($data)->id;


        if(count($request->service_name) > 0)
        {
            foreach($request->service_name as $invoice=>$v){
                $data2=array(
                    'bills_id'=>$lastid,
                    'services'=>$request->service_name[$invoice],
                    'descriptions'=>$request->description[$invoice],
                    'rates'=>$request->rate[$invoice],
                    'discounts'=>$request->discount[$invoice],
                    'amount'=>$request->amount[$invoice],

                );
                Invoice::insert($data2);
            }
        }
        return redirect()->back()->with('success','data insert successfully');
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill, $id)
    {
       // $invoices=Invoice::where('bills_id','=',$id)->get();
       // return view('admin.bill.invoice',compact('invoices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }

    public function invoice($id)
    {
        $invoices=Invoice::where('bills_id','=',$id)->get();
        return view('admin.bill.invoice',compact('invoices'));
    }
}
