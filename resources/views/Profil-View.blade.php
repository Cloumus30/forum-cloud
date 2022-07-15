@extends('Layout.main')

@section('title')
    Profil | Forum-Cloud
@endsection

@section('linkHeader')
    <style>
        .gambar-profile-hover{
            opacity: 50%;
            cursor: pointer;
            z-index: 1030;
        }
        #word-upload{
            position: absolute;
            top: 50%;
            right: 50%;
            cursor: pointer;
        }
        .hidden{
            visibility: hidden;
        }
    </style>
@endsection

@section('body')
<h1>Profil</h1>
<div class="row my-5 justify-content-center">
    <div class="col-lg-5 col-sm-12 position-relative d-flex justify-content-center align-items-center">
       
        <div class="gambar-container">
            @if (isset($user->gambarUser->url))
            <img src="{{$user->gambarUser->url}}" alt="foto" style="width: 80%" class="align-self-center" id="gambar-profile" onmouseover="gambarHover(this)" onmouseout="gambarNotHover(this)" onclick="openDialog()">
            @else
            <img src="{{asset('/image/default_profile.png')}}" alt="foto" style="width: 80%" class="align-self-center" id="gambar-profile" onmouseover="gambarHover(this)" onmouseout="gambarNotHover(this)" onclick="openDialog()">    
            @endif
        </div>
        
       
        
    </div>

    <div class="col-lg-7 col-sm-12">
        <!-- TABLE START -->
        <table class="table">
            <tr>
                <td class="text-nowrap">Nama </td>
                 <td>{{$user->nama}}</td>
            </tr>
            
             <tr>
                 <td class="text-nowrap">Email </td>
                 <td>{{$user->email}}</td>
             </tr>

             <tr>
                 <td class="text-nowrap">Jumlah Pertanyaan: </td>
                 <td>{{$user->jumlah_pertanyaan}}</td>
             </tr>
             <tr>
                 <td class="text-nowrap">Jumlah Jawaban: </td>
                 <td>
                     {{$user->jumlah_jawaban}}
                 </td>
             </tr>
        </table>
        <!-- TABLE END -->
        
        <div class="d-grid gap-2 col-6 mx-auto">
            <a href="#" class="btn btn-success"><i class="bi bi-pencil-square"></i> Edit</a>
        </div>
        
    </div>
    
 </div>
@endsection