<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        $tasks=Task::all();
//        return view('tasks.index',['tasks'=>$tasks,]);
//    }

//    public function index()
//    {
//        $data = [];
//        if (\Auth::check()) {
//            $user = \Auth::user();
//            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            
//            $data = [
//                'user' => $user,
//                'tasks' => $tasks,
//            ];
//        }
//        
//        return view('welcome', $data);
//    }


    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            //$tasks=Task::all();
             $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);;
            
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }
        
        return view('welcome', $data);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::check()){                
            $task=new Task;
            //if($task->user_id==\Auth::id()){                
                return view('tasks.create',[
                    'task'=>$task,
                    ]);
            }else{
                       // return view('welcome');
                       return redirect('/');
            }
       // }
                    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /*
        $task = new Task;
        $task->content = $request->content;
        $task->save();
        */
               
            $request->user()->tasks()->create([
                'content' => $request->content,
            ]);

        
        return redirect('/');
       //return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(\Auth::check()){
        
            $task = Task::find($id);
            
            if($task->user_id==\Auth::id()){
    
                return view('tasks.show', [
                    'task' => $task,
                ]);
            }else{
                        return redirect('/');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(\Auth::check()){        
            $task = Task::find($id);
            if($task->user_id==\Auth::id()){    
                return view('tasks.edit', [
                    'task' => $task,
                ]);
            }else{
                        return redirect('/');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->content = $request->content;
        $task->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('/');
    }
    
//        public function __construct()
 //   {
//        $this->middleware('auth');
//    }
}
