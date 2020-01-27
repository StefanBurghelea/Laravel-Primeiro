<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\Company;
use Illuminate\Support\Facades\Mail;

class CustomersController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){

        $customers=Customer::all();
        $companies = Company::all();

        return view('customers.index', compact('customers'));
    }

    public function create(){

        $companies = Company::all(); 
        $customer = new Customer();

        return view('customers.create',compact('companies','customer'));
    }

    public function store(){

        $customer = Customer::create($this->validadeRequest());
        
        Mail::to($customer->email)->send(new WelcomeNewUserMail());

        //register to newsletter

        dump('Register to newsletter');

        //Slak notfication to admin

        dump('Slack message here');

        //return redirect('customers');
    }


    public function show(Customer $customer){
        
        return view('customers.show',compact('customer'));

    }

    public function edit(Customer $customer){

        $companies = Company::all(); 

        return view('customers.edit',compact('customer','companies'));
    }

    public function update(Customer $customer){

        $customer->update($this->validadeRequest());

        return redirect('customers/'.$customer->id);
    }

    public function destroy(Customer $customer){

        $customer->delete();

        return redirect('/customers');
    }

    private function validadeRequest(){

        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);
    }
}
