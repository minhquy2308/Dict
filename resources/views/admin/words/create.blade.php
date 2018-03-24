@extends('layouts.app')

@section('title', 'Thêm từ mới')

@section('content')
<div class="col-md-8 col-md-offset-2">
<h1>Tạo từ mới</h1>
<hr>
{!! Form::open(['route' => 'words.store']) !!}
{{ Form::label('word', 'Từ gốc:')}}
{{ Form::text('word',null,array('class' => 'form-control', 'required' => ''))}}
{{ Form::label('shortDesc',"Miêu tả ngắn:")}}
{{ Form::text('shortDesc', null, array('class' => 'form-control', 'required' => ''))}}
{{ Form::label('fullDesc',"Miêu tả đầy đủ:")}}
{{ Form::textarea('fullDesc', null, array('class' => 'form-control', 'required' => ''))}}
{{ Form::label('dict_id', 'Loại từ điển:')}}
{{Form::select('dict_id', ['1' => 'Việt-Lào', '2' => 'Lào-Việt'])}}

{{ Form::submit('Thêm từ', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin:5px'))}}
{!! Form::close() !!}
</div>
@endsection