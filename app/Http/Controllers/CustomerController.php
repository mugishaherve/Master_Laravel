<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create(){

        return view('customers.create');
        
    }

    public function store(Request $request){
        $validateData = $request->validate([

            'firstname'=> 'required|max:255',
            'lastname'=> 'required|max:255',
            'email'=> 'required|max:255',
            'address' => 'required',
            'password' => [
                'required',
                'string',
                'regex:/[a-z]/',    // At least one lowercase letter
                'regex:/[A-Z]/',    // At least one uppercase letter
                'regex:/[0-9]/',    // At least one digit
                'regex:/[@$!%*?&]/' // At least one special character
            ],
            
        ]);

        $customer = Customer::create([

            'firstname' => $validateData['firstname'],
            'lastname' => $validateData['lastname'],
            'email' => $validateData['email'],
            'address' => $validateData['address'],
            'password' => Hash::make($validateData['password'])
        ]);

        return redirect()->route('customers.index')->with('success', 'User created successfully!');
        
    }
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function edit($id){
        $customer = Customer::findorfail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id){
        $validateData = $request->validate([

            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required',
            'password' => [
                'required',
                'string',
                'regex:/[a-z]/',    // At least one lowercase letter
                'regex:/[A-Z]/',    // At least one uppercase letter
                'regex:/[0-9]/',    // At least one digit
                'regex:/[@$!%*?&]/' // At least one special character
            ],

        ]);
         $customer = Customer::findorfail($id);
        $customer->update([

            'firstname' => $validateData['firstname'],
            'lastname' => $validateData['lastname'],
            'email' => $validateData['email'],
            'address' => $validateData['address'],
            'password' => Hash::make($validateData['password'])
        ]);

        return redirect()->route('customers.index')->with('success', 'User updated successfully!');
        
        
        
    }

    public function destroy($id){

        $customer = Customer::findorfail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'User deleted successfully!');
        
    }
    
    
}