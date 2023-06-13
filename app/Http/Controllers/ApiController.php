<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use Validator;

class ApiController extends Controller
{
    //
    public function updateData(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'age' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);
        if($validator->fails())
        {
                 $result = array();
                $result['success'] = 0;
                $result['message'] = "Please pass all the required inputs!";
                return json_encode($result);
            
        }
            try
            {
                $data = Students::find($request->id);
                $data->name = $request->name;
                $data->age  = $request->age;
                $data->dob = $request->dob;
                $data->email = $request->email;
                $data->mobile = $request->mobile;
                $data->update();
                $result = array();
                $result['success'] = 1;
                $result['message'] = "Updated Successfully";
                return json_encode($result);
            }
            catch(\Exception $e)
            {
                //echo $e->getMessage();
                //echo "Updation Failed!, Please recheck your inputs";
                $result = array();
                $result['success'] = 0;
                $result['message'] = "Something went wrong!";
                return json_encode($result);
            }
        
        




        // $data = Students::find($request->id);
        // // $data->name = "Logeshwaran";
        // // $data->age  = "35";
        // // $data->dob = "13 Jan 1995";
        // // $data->email = "logesh@gmail.com";
        // // $data->mobile = "8903111312";
        
        // $data->name = $request->name;
        // $data->age  = $request->age;
        // $data->dob = $request->dob;
        // $data->email = $request->email;
        // $data->mobile = $request->mobile;
        // $data->save();
        // echo "Updated Successfully";
        //echo json_encode($data);
    }

    public function deletedata(Request $request)
    {
        $result = array();
        try{
            $data = Students::find($request->id);
            $data->delete();
            $result['success'] = 1;
            $result['message'] = "Deleted!";
            return json_encode($result);
        }
        catch(\Exception $e)
        {
            $result['success'] = 0;
            $result['message'] = "Unable to delete!";
            return json_encode($result);
        }
    }
}
