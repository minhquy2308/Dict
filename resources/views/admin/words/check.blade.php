@extends('layouts.app')
@section('title', 'Tất cả các từ')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<h1>Tất cả các từ cần duyệt</h1>
		</div>		

		<div class="col-md-3">
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Từ gốc</th>
					<th>Miêu tả ngắn</th>
					<th>Miêu tả đầy đủ</th>
					<th>Thời gian tạo</th>
					<th>Thao tác</th>
				</thead>
				<tbody>
					@foreach($words_temp as $word)
						<tr>
							<th>{{ $word->id}}</th>
							<th>{{ $word->word}}</th>
							<td>{{ $word->shortDesc}}</td>
							<td>{{ substr($word->fullDesc,0,50)}}
								{{ strlen($word->fullDesc) > 50 ? "..." : ""}}</td>
							<td>{{ date('d/m/Y',strtotime($word->created_at))}}</td>
							{{-- <td><a href="{{route('words.show', $word->id)}}" class="btn btn-primary btn-sm">Xem</a><a href="{{route('words.edit', $word->id)}}" class="btn btn-primary btn-sm">Sửa</a></td> --}}
						</tr>
					@endforeach	
				</tbody>
			</table>
			
		</div>
		
	</div>
<div class="center-block btn">
				{{ $words-> links() }}
			</div>
@endsection