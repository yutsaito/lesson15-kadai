@extends('layouts.app')

@section('content')
<!--
    @if (count($errors) > 0)
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li class="ml-4">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
-->
    <h1>id: {{ $task->id }} のタスク編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
        <!-- 第1引数：ﾓﾃﾞﾙｵﾌﾞｼﾞｪｸﾄ、第2引数：オプションでパラメーターを配列で-->
        <!-- 'route' => 'tasks.store' で、 'route' => ﾙｰﾃｨﾝｸﾞ名 として form タグの action 属性の設定を行う -->
        <!-- この POST メソッドのフォームを受け取って処理するのは、tasksController の update アクション -->
                <div class="form-group">
                    {!! Form::label('content', 'タスク:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'ステータス:') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>

        
                {!! Form::submit('更新', ['class' => 'btn btn-light']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>

@endsection