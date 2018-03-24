@extends('layouts.app')

@section('title', 'Sửa từ')

@section('content')

<div class="row">
	<div class="col-md-8">
		{!! Form::model($word, ['route' => ['words.update', $word->id], 'method' => 'PATCH']) !!}
		{{ Form::label('word', 'Từ gốc:')}}
		{{ Form::text('word',null,array('class' => 'form-control', 'required' => ''))}}
		{{ Form::label('shortDesc',"Miêu tả ngắn:")}}
		{{ Form::text('shortDesc', null, array('class' => 'form-control', 'required' => ''))}}
		{{ Form::label('fullDesc',"Miêu tả đầy đủ:")}}
		{{ Form::textarea('fullDesc', null, array('class' => 'form-control', 'required' => ''))}}
		{{ Form::label('dict_id', 'Loại từ điển:')}}
		{{Form::select('dict_id', ['1' => 'Việt-Lào', '2' => 'Lào-Việt'])}}
		{{ Form::submit('Lưu', array('class' => 'btn btn-success btn-block'))}}
		{!! Form::close() !!}
	</div>

	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<label>Đã tạo: </label>
				<p>{{ date('G:i, d/m/Y',strtotime($word->created_at))}}</p>
			</dl>

			<dl class="dl-horizontal">
				<label>Lần chỉnh sửa cuối: </label>
				<p>{{date('G:i, d/m/Y',strtotime($word->updated_at))}}</p>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('words.show', 'Hủy', array($word->id), array('class' => 'btn btn-danger btn-block')) !!}
				</div>

			</div>
		</div>
		
	</div>
	
</div>
@endsection