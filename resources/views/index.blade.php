@extends('layouts.app')
@section('title', 'Trang chủ')
@section('style')
body {
    font-family: Arial;
}

* {
    box-sizing: border-box;
}

form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
}

form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}

form.example button:hover {
    background: #0b7dda;
}

form.example::after {
    content: "";
    clear: both;
    display: table;
}
@endsection
@section('content')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
<form class="example" action="/action_page.php">
  <input type="text" placeholder="Tìm kiếm từ.." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
	</div>
</div>
    
@endsection