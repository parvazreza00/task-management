@extends('layouts.main_master')

@section('content')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Create Your Task</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Task Create</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
<form action="{{ route('tasks.update', $task->id) }}" method="post" >
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <h5>Task Title</h5>
                <div class="controls">
                    <input type="text" name="task_title" class="form-control"
                        value="{{ $task->task_title }}" placeholder="Task Title">
                        @error('task_title')
    <span class="text-danger">{{ $message }}</span>
@enderror
                </div>

            </div>
            <div class="form-group">
                <h5>Task Description</h5>
                <div class="controls">
                    <textarea name="task_des" id="textarea" class="form-control" >{{ $task->task_des }}</textarea>
                    @error('task_des')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group">
                <h5>Select Task Status</h5>
                <div class="controls">
                    <select name="status" class="form-control">
                        <option value="" disabled>Select Task Status</option>
                        <option value="In Progress" {{ $task->status== 'In Progress' ? 'selected' : ''}}>In Progress</option>
                        <option value="Pending" {{ $task->status== 'Pending' ? 'selected' : ''}}>Pending</option>
                        <option value="Completed" {{ $task->status== 'Completed' ? 'selected' : ''}}>Completed</option>
                    </select>
                    @error('status')
    <span class="text-danger">{{ $message }}</span>
@enderror
                </div>
            </div>
            <div class="form-group">
                <h5>Enter Date </h5>
                <div class="controls">
                    <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}">
                </div>
                @error('due_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>


        </div>
    </div>



    <div class="text-xs-right">
        <button type="submit" class="btn btn-rounded btn-info">Update</button>
    </div>
</form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
