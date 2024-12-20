<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function create(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'task' => 'required|string|max:255',
            'deadline'=>'required|date'
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 400);
        }
        return response()->json(['message' => 'Task created successfully'], 201);
    }
}
