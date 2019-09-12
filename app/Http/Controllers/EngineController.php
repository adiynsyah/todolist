<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Carbon\Carbon;
use App\Todo;

class EngineController extends Controller
{
    public function index() {
        return view('index');
    }

    public function getAll() {
        $getAll = Todo::all();
		return response()->json($getAll);
    }

    public function getOne(Request $request) {
        $name = $request->get('id');
        $getOne = Todo::find($id);

        return response()->json($getOne);
    }

    public function save(Request $request) {
        $name = $request->get('name');

        $object = array("name" => $name, "created_at" => Carbon::now());
        Todo::create($object);

        return response()->json(['success' => 'Save Successfully']);
    }

    public function update(Request $request) {
        $id   = $request->get('id');
        $name = $request->get('name');

        Todo::find($id)->update(['name' => $name]);
        return response()->json(['success' => 'Update Successfully']);
    }

    public function delete(Request $request) {
        $id   = $request->get('id');
        // $mode = $request->get('mode');
        // Todo::find($id)->delete();
        

        Todo::whereIn('id',json_decode($id))->delete();

        return response()->json(['success' => 'Delete Successfully']);
    }
}
