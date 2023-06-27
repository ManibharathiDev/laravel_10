<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\User;
use App\Models\post;
use App\Models\comment;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{

    public function userregistration(Request $request)
    {
        try{
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            $result = array();
            $result['success'] = 1;
            $result['data'] = $user;
            return json_encode($result);
        }
        catch(\Exception $e)
        {
            $result = array();
            $result['success'] = 0;
            $result['data'] = $e;
            return json_encode($result);
        }
    }

    public function userlogin(Request $request)
    {
       if(Auth::attempt(["email"=>$request->email,"password"=>$request->password]))
       {
            $user = Auth::user();
            return json_encode($user);
       }
       else
            {
                $result = array();
                $result['success'] = 0;
                $result['data'] = "Invalid Credentials";
                return json_encode($result);
            
            }
    }


    public function registration(Request $request)
    {
       
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        echo "Registration Successfull";
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            $user = Auth::user();
            return json_encode($user);
            //echo "Login Success";
        }
        else
        {
            echo "Invalid Login";
        }
    }

    public function readdata()
    {
        echo "Welcome My read";
    }

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

    /**
     * Add New user
     */
    public function addNewUser(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        echo "User Saved";
    }

    /**
     * Add New Post
     */
    public function addNewPost(Request $request)
    {
        $user = User::find($request->id);

        $post = new Post;
        //$post->user_id = $request->id;
        $post->title = $request->title;
        $post->description = $request->description;

        $user->post()->save($post);
        echo "Post Saved";

    }

    /**
     * Add new Comment
     */
    public function addNewComment(Request $request)
    {
        $post = post::find($request->id);

        //return json_encode($post);
        $data = new comment;
        $data->user_id = $request->user_id;
        $data->comments = $request->comments;
        $post->comment()->save($data);
        echo "New Comments Saved";
    }

    /**
     * Retrive All Post
     */
    public function getAllPostByUser($id)
    {
        $data = User::find($id);
        $post = $data->posts;
        return json_encode($post);
    }

    /**
     * Retrive comments by Post
     */
    public function getAllCommentsByPost($id)
    {
        $data = post::find($id);
        $comments = $data->comments;
        return json_encode($comments);
    }

    public function testAdmin(){
        echo "I am from the test admin middleware";
    }

    public function getUser(){
        echo "I am get User";
    }

    public function testUser(){
        echo "I am from the test user middleware";
    }

    public function getUsers(){
        echo "I am get Users";
    }

    public function vote(Request $request)
    {
        $result['success'] = 1;
             $result['reason'] = "Your vote has been successfully registered";
            return json_encode($result);
        // $result = array();
        // if($request->age < 18)
        // {
        //     $result['success'] = 0;
        //     $result['reason'] = "You are not qualified";
        //     return json_encode($result);
        // }
        // else
        // {
        //     $result['success'] = 1;
        //     $result['reason'] = "Your vote has been successfully registered";
        //     return json_encode($result);
        // }
    }

    
}
