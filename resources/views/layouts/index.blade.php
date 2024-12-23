@extends('layouts.main_master')

@section('content')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-header d-flex align-items-center justify-content-between">
                        <div class="">
                            <h4 class="box-title align-items-start">
                                Hello! {{ Auth::user()->name }}   
                                                      
                            </h4>
                            <p class="">                           
                                Email: {{ Auth::user()->email }}
                            </p>
                        </div>
                        <div>
                            <a href="{{route('tasks.create')}}" class="btn btn-primary">Task Create</a>
                            <a href="{{ route('tasks.index') }}" class="btn btn-info">Task List</a>
                        </div>
                        
                    </div>
                    <div class="box-body">
                        <div class="row" style="vh-100">
                            <div class="col-md-12 text-center">
                                <h1>Welcome To The Task Management System</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>

  @endsection
