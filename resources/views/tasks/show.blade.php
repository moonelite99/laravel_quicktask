@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('msg.task') }}
                </div>
                <div class="panel-body">
                    {{ $task->name }}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('msg.comment') }}
                </div>
                <div class="panel-body">
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped task-table">
                        @if (session('msg'))
                            <div class="alert alert-success">
                                {{ session('msg') }}
                            </div>
                        @endif
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $comment->content }}</div>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('comments.destroy', $comment->id) }}"
                                            class="pull-right">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                                            <div>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </form>
                                        <button data-toggle="modal" data-target="#myModal{{ $comment->id }}"
                                            class="btn btn-primary pull-right">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                        <div class="modal fade" id="myModal{{ $comment->id }}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">{{ trans('msg.edit') }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" class="form-horizontal"
                                                            action="{{ route('comments.update', $comment->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                                                            <div class="form-group">
                                                                <div class="col-lg-12">
                                                                    <textarea class="form-control" id="content"
                                                                        name="content"
                                                                        placeholder="{{ trans('msg.comment') }}">{{ $comment->content }}
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-offset-5 col-sm-6">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        {{ trans('msg.submit') }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form method="POST" class="form-horizontal" action="{{ route('comments.store') }}">
                        @csrf
                        <input type="hidden" name="task_id" value="{{ $task->id }}">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <textarea class="form-control" id="content" name="content"
                                    placeholder="{{ trans('msg.comment') }}"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('msg.submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
