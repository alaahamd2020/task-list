<?php

use App\Http\Requests\TaskRequest;
use App\Models\task as ModelsTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/tasks', function (TaskRequest $request) {
    $task = ModelsTask::updateOrCreate(
        ['title' => $request->title],
$request->validated()
    );
    return redirect()->route('tasks.show', $task)->with('success','Task created successfully');
})->name('tasks.store');

Route::put('/tasks/{task}/update', function (ModelsTask $task, TaskRequest $request) {
    $task->update( $request->validated());
    return redirect()->route('tasks.show',['task'=> $task->id])->with('success','Task updated successfully');
})->name('tasks.update');

Route::delete('/tasks/{task}/delete', function (ModelsTask $task) {
    $task->delete();
    return redirect()->route('tasks.show', $task->id - 1)->with('success', 'Task deleted successfully');
})->name('tasks.delete');

Route::get('/', function () {
    return view('index',[
        'tasks' => ModelsTask::latest()->paginate(20),
        'alltasks'=>ModelsTask::latest()->get(),
    ]);
})->name('tasks.index');

Route::view('tasks/create','create')->name('tasks.create');


Route::get('/tasks/{task}', function (ModelsTask $task) {
        return view('show',[
            'task'=>$task,
        ]);
})->name('tasks.show');

Route::get('/tasks/{task}/edit', function (ModelsTask $task) {
        return view('edit',[
            'task' => $task
        ]);
})->name('tasks.edit');


Route::put('/tasks/{task}/complete', function (ModelsTask $task) {
    $task->complete();
    return redirect()->back()->with('success','Task status updated successfuly');
})->name('tasks.complete');


Route::fallback(function () {
    return redirect('/');
});
