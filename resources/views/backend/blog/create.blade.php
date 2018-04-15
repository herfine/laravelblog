@extends('layouts.backend.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog <small>Add New Post</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Add New Post</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-body">
                {!! Form::model($posts,[
                  'method' => 'POST',
                  'route' => 'backend.blog.store',
                  'files'=> true,
                ])!!}

                @csrf

                <div class="form-group {{$errors->has('title')?'has-error':''}}">
                  {!! Form::label('title')!!}
                  {!! Form::text('title', null, ['class' => 'form-control']) !!}

                  @if($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title')}}</span>
                  @endif
                </div>

                <div class="form-group {{$errors->has('slug')?'has-error':''}}">
                  {!! Form::label('slug')!!}
                  {!! Form::text('slug', null, ['class' => 'form-control']) !!}

                  @if($errors->has('slug'))
                    <span class="help-block">{{ $errors->first('slug')}}</span>
                  @endif
                </div>

                <div class="form-group {{$errors->has('excerpt')?'has-error':''}}">
                  {!! Form::label('excerpt')!!}
                  {!! Form::textarea('excerpt', null, ['class' => 'form-control']) !!}

                  @if($errors->has('excerpt'))
                    <span class="help-block">{{ $errors->first('excerpt')}}</span>
                  @endif
                </div>

                <div class="form-group {{$errors->has('content')?'has-error':''}}">
                  {!! Form::label('content')!!}
                  {!! Form::textarea('content', null, ['class' => 'form-control']) !!}

                  @if($errors->has('content'))
                    <span class="help-block">{{ $errors->first('content')}}</span>
                  @endif
                </div>

                <button type="submit" class="btn btn-success bt-sm">Save</button>

                {!! Form::close() !!}

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
