<?php

namespace App\Http\Controllers\dashboard\fileManager;

use App\Model\Product;
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
//        return response()->json([$request]);
        if($request->hasFile('file')) {
            //Get image name
            $imgFile = $request->file('file');
            $fileExtension = $imgFile->getClientOriginalExtension();
            $imgName = $request->file('file')->getClientOriginalName();
            $fileName =uniqid() . '_' . time() . '.' . $fileExtension;
            $imgFile->move("uploads/product_images/", $fileName);

            return response()->json([
                'status' => 'success',
                'message' => 'Product updated successfully.',
                'name' => $fileName,
             ]);

//
//
//             $clientFileName = $request->file('image')->getClientOriginalName();
//
//             $fileName = pathinfo($clientFileName, PATHINFO_FILENAME);
//
//             $fileExtension = $request->file('image')->getClientOriginalExtension();
//             $fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;
//
////             $file = request()->file('image');
////             $file->store('myfiles', ['disk' => 'my_files']);
//
//             $request->file = $fileNameToStore;
//
//
//            // //Store image
//             $path = $request->file('image')->move(public_path("upload/Systems/SystemThree/Products/", $fileNameToStore.".". $fileExtension));
//
//             return response()->json([
//                'status' => 'success',
//                'message' => 'Product updated successfully.',
//                'name' => $request->get('image'),
//             ]);
//
//             $product = new Product();


            // return response()->json(['status' => 'success',
            //                             'message' => 'Product updated successfully.',
            //                             'folder'=> $model,
            //                             'delete_route' => route('folder.delete', $model->id),
            //                             'update_route' => route('folder.update', $model->id)]);
        }
    }
}
