@extends('layouts.main_master')

@section('content')

<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Task List</h3>
                <div class="d-inline-block align-items-center">
                    <nav class="text-ri">
                        <ol class="breadcrumb">
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Task Create</a>
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
          <h4 class="box-title">Task List</h4>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            <!-- Filter and Sort Form -->
       <form action="{{ route('tasks.index') }}" method="GET" class="mb-4">
           <div class="row">
               <div class="col-md-4">
                   <label for="status">Filter by Status:</label>
                   <select name="status" id="status" class="form-control">
                       <option value="" disabled>Select Status</option>
                       <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                       <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                       <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                   </select>
               </div>

               <div class="col-md-4">
                   <label>&nbsp;</label>
                   <button type="submit" class="btn btn-primary btn-block">Filter By Due Date</button>
               </div>
           </div>
       </form>

         <div class="row">
            @if ($tasks->isNotEmpty())
           <table class="table table-striped table-bordered">
               <thead class="table-dark">
                   <tr>
                       <th>#</th>
                       <th>Title</th>
                       <th>Description</th>
                       <th>Status</th>
                       <th>Due Date</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($tasks as $key => $task )
                   <tr>
                       <td>{{ $key+1 }}</td>
                       <td>{{ $task->task_title }}</td>
                       <td style="width: 50%">{!! $task->task_des !!}</td>
                       <td>{{ $task->status }}</td>
                       <td>{{ $task->due_date }}</td>
                       <td>
                       <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                       <a href="{{ route('tasks.delete', $task->id) }}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                       </td>
                   </tr>
                   @endforeach

               </tbody>
           </table>
           @else
            <div>
                <p style="font-size:30px;text-align:center">No tasks found.</p>
            </div>
@endif

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
