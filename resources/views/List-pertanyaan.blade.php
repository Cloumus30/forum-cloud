@extends('Layout.main')

@section('title')
    List-Pertanyaan | Forum-Cloud
@endsection

@section('body')
<div class="d-flex justify-content-between">
    <h1>List Pertanyaan</h1>
    <a href="#" class="btn btn-success" style="height: 60%;"><i class="bi bi-plus-square me-2"></i>Tanya</a>
</div>
  
<!-- CONTAINER QUESTION START -->
<div class="container">
    <div class="row px-3">
       <x-pertanyaanComponent :pertanyaan="$pertanyaanControl"/>
    </div>
    
</div>
<!-- CONTAINER QUESTION END -->


@endsection