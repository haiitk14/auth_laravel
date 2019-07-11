<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\Customer;

class CustomerController
{
	/**
     * @var string $pageName
     */
    protected $pageName;
    
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->pageName = 'Customers';
    }

	/**
     * Show index page
     *
     * @return View
     */
    public function index()
    {
        $pageName = $this->pageName;
        $customers = Customer::where('is_using', 1)->get();

        return view('admin.customer.index', compact('pageName', 'customers'));
    }

    public function create(Request $request) 
    {
        if ($request->ajax()) {
            $input = $request->all();
            $validator = Validator::make($input, [
                'full_name' => 'required',
                'code' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(compact(['errors']), 422);
            }

            $customer=new Customer();
            $customer->full_name = $request->get('full_name');
            $customer->code = $request->get('code');
            $customer->address = $request->get('address');
            $customer->phone = $request->get('phone');
            $response = $customer->save();
            
            $result = [];
            if ($response) {
                $message = "Success";
                $result = [
                    'message' => $message
                ];
            }

            return response()->json($result);

            $status = 'error';

            return response()->json(compact(['status']), 500);
        }    
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $validator = Validator::make($input, [
                'id' => 'required',
                'code' => 'required',
                'full_name' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(compact(['errors']), 422);
            }
            
            $id = $request->get('id');
            $item = Customer::find($id);
            if ($item) {
                $response = Customer::where('id', $id)->update([
                        'code'=> $request->get('code'),
                        'full_name' => $request->get('full_name'),
                        'phone'=> $request->get('phone'),
                        'address' => $request->get('address'),
                    ]);
                $result = [];
                if ($response) {
                    $message = "Success";
                    $result = [
                        'message' => $message
                    ];
                }

                return response()->json($result);
            }

            $status = 'error';

            return response()->json(compact(['status']), 500);
        }   
    }

    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->all();

            $validator = Validator::make($input, [
                'id' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(compact(['errors']), 422);
            }

            $id = $request->get('id');
            $item = Customer::find($id);
            if ($item) {
                $response = $item->delete();
                $result = [];
                if ($response) {
                    $message = "Success";
                    $result = [
                        'message' => $message
                    ];
                }

                return response()->json($result);
            }

            $status = 'error';

            return response()->json(compact(['status']), 500);
        }
    }
}
