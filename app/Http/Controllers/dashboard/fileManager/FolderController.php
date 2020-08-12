<?php

namespace App\Http\Controllers\dashboard\fileManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Folder as Model;

class FolderController extends Controller
{
    protected $model;
    
    //construct
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    //store a folder
    public function store(Request $request)
    {
        if (!$this->checkName($request->get('name'), $request->get('folder_id'))) return response()->json(['status'=> 'error',
                                                                    'message' => 'The name has already been taken.']);
        
        if($request->get('name')) {
            print_r($request->parent);
            $model = new Model();
            $model->name = $request->name;
//            $model->parent = $request->parent;
            $model->save();

            return response()->json(['status' => 'success',
                                        'message' => 'Product created successfully.',
                                        'folder'=> $model,
                                        'delete_route' => route('folder.delete', $model->id),
                                        'update_route' => route('folder.update', $model->id)]);
        }
    }
    
    //update a folder
    public function update(Request $request, int $id)
    {
        $oldModel = Model::find($id);
        
        if (!$this->checkName($request->get('name'), $request->get('folder_id'), $oldModel->name)) return response()->json(['status'=> 'error', 
                                                                    'message' => 'The name has already been taken.']);
                                                                    
        if($request->get('name')) {
            $oldModel->update($request->all());
            $model = Model::find($id);
            return response()->json(['status' => 'success',
                                        'message' => 'Product updated successfully.',
                                        'folder'=> $model,
                                        'delete_route' => route('folder.delete', $model->id),
                                        'update_route' => route('folder.update', $model->id)]);
        }
    }
    
    //delete a folder
    public function delete(int $id)
    {
        $model = Model::find($id);
        $model->delete();
        
        return response()->json(['status' => 'success',
                                        'message' => 'Product deleted successfully.']);
    }
    
    
    //check folder name if unique
    public function checkName(string $newName, $folder_id, string $oldName = null)
    {
        $newName = strtolower($newName);
        $oldName = strtolower($oldName);

        if ($newName === $oldName) return true;

        $folder = Model::where('name', $newName)->where('folder_id', $folder_id)->first();
        if (empty($folder)) return true;

        return false;
    }
    
    public function getAllHtml(Request $request)
    {
        $id = $request->get('id');
        $folder = Model::find($id);
        
        return view('dashboard.fileManager.modules.FileManagerShowFolder', compact('folder'));
    }
}
