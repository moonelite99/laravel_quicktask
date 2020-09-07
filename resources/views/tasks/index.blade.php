@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            @if (session('fail_status'))
                <div class="alert alert-danger">
                    {{ session('fail_status') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('msg.new_task') }}
                </div>
                <div class="panel-body">
                    <!-- New Task Form -->
                    <form method="POST" class="form-horizontal" action="{{ route('tasks.store') }}">
                        @csrf
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
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>{{ trans('msg.add_task') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Current Tasks -->
            @isset($tasks)
                @if (count($tasks) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ trans('msg.current_tasks') }}
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped task-table">
                                @if (session('msg'))
                                    <div class="alert alert-success">
                                        {{ session('msg') }}
                                    </div>
                                @endif
                                <thead>
                                    <th>{{ trans('msg.task') }}</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td class="table-text">
                                                <div>{{ $task->name }}</div>
                                            </td>
                                            <td>
                                                <a href="{{ route('tasks.edit', $task->id) }}"
                                                    class="btn btn-primary pull-left">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> {{ trans('msg.edit') }}
                                                </a>
                                                <form method="post" action="{{ route('tasks.destroy', $task->id) }}"
                                                    class="pull-left">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div>
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"
                                                                aria-hidden="true"></i> {{ trans('msg.delete') }}</button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info pull-right">
                                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                                    {{ trans('msg.comment') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            @endisset
        </div>
    </div>
@endsection
