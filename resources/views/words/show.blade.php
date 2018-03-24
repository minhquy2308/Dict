@extends('layouts.app')

@section('title', 'Xem từ')

@section('content')

	<div class="row">
		<div class="col-md-8">
	
	<h1>{{ $word->word }}</h1>
	<h5>{{ $word->shortDesc}}</h5>
	<p>{{ $word->fullDesc}}</p>
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
					{!! Html::linkRoute('words.edit', 'Sửa', array($word->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(array('route' => ['words.destroy', $word->id], 'method' => 'delete')) !!}
					
					{!! Form::submit('Xóa', ['class' => 'btn btn-danger btn-block']) !!}
					{!! Form::close() !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('words.index', '<< Xem tất cả các từ', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection