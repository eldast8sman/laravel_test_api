<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodoListController extends Controller
{
    public function index(){
        $lists = TodoList::all();
        return response($lists);
    }

    public function show(TodoList $todolist){
        return response($todolist);
    }

    public function store(Request $request){
        $request->validate(['name' => ['required']]);
        
        $list = TodoList::create($request->all());
        return response($list, 201);
    }

    public function destroy(TodoList $list){
        $list->delete();
        return response('', Response::HTTP_NO_CONTENT); 
    }

    public function update(Request $request, TodoList $list){
        $list->update($request->all());
        return $list;
    }
}
