@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('msg.edit_task') }}
                </div>
                <div class="panel-body">
                    <!-- New Task Form -->
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">{{ trans('msg.task') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}">
                            </div>
                        </div>
                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('msg.update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
