<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\Company;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewUserMail; 
use App\Events\NewCustomerRegisteredEvent; 
use Illuminate\Listeners\WelcomeNewCustomerListener;
use Illuminate\Listeners\RegisterCustomerNewsletter;
use Illuminate\Listeners\NotifyAdminSlack;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){

        $customers = Customer::with('company')->paginate(15); // em vem de ir 1-1 vai n-1 para ter melhor processamaneto

        return view('customers.index', compact('customers'));
    }

    public function create(){

        $companies = Company::all(); 
        $customer = new Customer();

        return view('customers.create',compact('companies','customer'));
    }

    public function store(){

        $customer = Customer::create($this->validadeRequest());

        $this->storeImage($customer);

        event(new NewCustomerRegisteredEvent($customer));

        return redirect('customers');
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

        $this->storeImage($customer);

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
            'image' => 'sometimes|file|image|max:5000',
        ]);

    }

    private function storeImage($customer){

        if (request()->has('image')) {
            $customer->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);

            $image = Image::make(public_path('storage/'.$customer->image))->fit(300,300);
            $image->save();
        }
    }
}
