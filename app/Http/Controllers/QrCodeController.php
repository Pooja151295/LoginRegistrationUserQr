<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class QrCodeController extends Controller
{
    public function index(Request $request)
    {
      $validatedData = $request->validate([
        'firstname' => 'required',
        'lastname' => 'required'
      ]);
      $data = $request->all();
      
      if(isset($data) && !empty($data)){
        $post = User::find($data['id']);
        if($request->hasFile('image')) {
          $file = $request->file('image');
  
          //you also need to keep file extension as well
          $name = $file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
  
          //using the array instead of object
          $image['filePath'] = $name;
          $file->move(public_path().'/img/', $name);
          $post->img= $name;
        } 
        $post->firstname  = $data['firstname'];
        $post->lastname   = $data['lastname'];
        $post->save();
        // return response()->json(['success'=>'Successfully']);
      }
    }
    public function show(){
      if(request()->ajax()) {
        return datatables()->of(User::select('*'))
        ->addColumn('action', 'company-action')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }
      return view('auth.users');
	  }
}