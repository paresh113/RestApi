<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Product;
use Validator;

class productController extends Controller
{
    function getData($id=NULL){
        return $id?Product::find($id):Product::all();
       // return ["result"=>"from getdata"];

    }
    function postData(Request $req){
        $prod = new Product;
        $prod->title = $req->title;
        $prod->details = $req->details;
        $result = $prod->save();
        if($result){
            return ["result"=>"from postdata"];
        }
        else {
            return ["result"=>"data has not been posted successfully"];
        }

        // $Product = new Product;
        // $Product->title = $req->title;
        // $Product->details = $req->details;
        // $result = $Product->save();
        // if($result){
        //     return ["result"=>"from postdata"];
        // }
        // else {
        //     return ["result"=>"data has not been posted successfully"];
        // }
    

    }


    // ####   update data function start here #####

    function update(Request $req){
        $prod = Product::find($req->id);
        $prod->title = $req->title;
        $prod->details = $req->details;
        $res = $prod->save();
        if($res){
             return ["result"=>"from update"];
        }
        else{
            return ["result"=>"data has not been updated successfully"];
        }

    }
    function delete($id){
        $prod = Product::find($id);
        $res = $prod->delete();
        if($res){
            return ["result"=>"from delete"];
        }
        else{
            return ["result"=>"data has not been deleted successfully"];
        }

    }
    function search($name){
       return Product::where("title","like","%".$name."%")->get();
        // if($prod != NULL){
        // return Product::where("title","like","%".$name."%")->get();
        // }
        // else{
        //     return ["result"=>"No data matching"];
        // }

    }
    function testData(Request $req){
        $rules = array(
            "title"=>"required",
            "details"=>"required|min:10"
        );
        $validator = Validator:: make($req->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }
        else{
            $prod = new Product;
            $prod->title = $req->title;
            $prod->details = $req->details;
            $res = $prod->save();
            if($res){
                return ["result" => "success"];
            }
            else{
                return ["result"=> "not success"];
            }

        }
     //   return ["result"=>"data has not been deleted successfully test"];

    }
}
