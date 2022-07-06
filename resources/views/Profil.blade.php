@extends('Layout.main')

@section('title')
    Profil | Forum-Cloud
@endsection

@section('body')
<h1>Profil</h1>
<div class="row my-5 justify-content-center">
    <div class="col-lg-5 col-sm-12 align-self-center">
        <img src="./image/99173d0c-f63e-4419-afd5-273aa45e7d69.png" alt="foto" style="width: 80%" class="text-start">    
    </div>

    <div class="col-lg-7 col-sm-12">
        <!-- TABLE START -->
        <table class="table">
            <tr>
                <td class="text-nowrap">Nama </td>
                 <td>Cloudias Imani Pradana</td>
            </tr>
            
             <tr>
                 <td class="text-nowrap">Email </td>
                 <td>dana@mail.com</td>
             </tr>
             <tr>
                 <td class="text-nowrap">Tanggal Lahir </td>
                 <td>17-08-2000</td>
             </tr>
             <tr>
                 <td class="text-nowrap">Umur </td>
                 <td>12</td>
             </tr>
             <tr>
                 <td class="text-nowrap">Alamat: </td>
                 <td>Kuwik Kediri</td>
             </tr>
             <tr>
                 <td class="text-nowrap">Jumlah Pertanyaan: </td>
                 <td>200</td>
             </tr>
             <tr>
                 <td class="text-nowrap">Jumlah Jawaban: </td>
                 <td>
                     120
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