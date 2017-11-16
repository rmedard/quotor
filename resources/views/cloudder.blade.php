@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        <img src="{{ Session::get('image') }}">
    @endif
    {!! Form::open(array('route' => 'upload-file', 'files' => TRUE)) !!}
    <div class="row">
        <div class="col-md-6">
            {!! Form::file('image_file', array('class' => 'form-control')) !!}
        </div>
        <div class="col-md-6">
            {!! Form::submit('Upload', array('class' => 'btn btn-success')) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection