<?php

namespace App\Http\Controllers\dashboard\fileManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Folder as Model;

class ImageController extends Controller
{
    protected $model;
    
    //construct
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    // Store an image
    public function store(Request $request)
    {
        if($request->get('image')) {
            //Get image name
            // $clientFileName = $request->file('image')->getClientOriginalName();
            return response()->json(['status' => 'success',
                                        'message' => 'Product updated successfully.',
                                        'name' => $request->get('image')]);
                                        
            // $fileName = pathinfo($clientFileName, PATHINFO_FILENAME);
            // $fileExtension = request()->file('image')->getClientOriginalExtension();
            // $fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;
    
            // $product->image = $fileNameToStore;
    
            // //Store image
            // $path = request()->file('image')->move(public_path('images/product'), $fileNameToStore);
            
            // return response()->json(['status' => 'success',
            //                             'message' => 'Product updated successfully.',
            //                             'folder'=> $model,
            //                             'delete_route' => route('folder.delete', $model->id),
            //                             'update_route' => route('folder.update', $model->id)]);
        }
    }
}
