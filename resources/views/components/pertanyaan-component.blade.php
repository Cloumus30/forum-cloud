<!-- QUESTION CARD START -->
@foreach ($pertanyaan as $pertan)
<div class="row shadow p-3 mb-3 bg-body rounded">
    
        
        <div class="title-question mb-2 d-flex justify-content-between">
            <a href="{{url('/pertanyaan/'.$pertan['id'])}}" class="text-decoration-none">
                {{$pertan['judul']}}
                <span class="text-secondary" style="font-size: smaller">{{$pertan->waktu}}</span>
            </a>
            <div>{{$pertan['jumlahJawaban']}} jawaban</div>
        </div>
        <div class="body-question ql-snow">
            <div class="ql-editor" style="white-space: pre-wrap">
                {{$pertan['overview']}}
            </div>
        </div>
        <div class="footer-card row justify-content-between">
            <div class="col-auto">
                <a href="#" class="badge bg-secondary text-decoration-none">{{$pertan->kategori->nama}}</a>
            </div>
            <div class="col-auto">
                By <a href="" class="text-decoration-none">{{$pertan->user->nama}} </a> 
                <span class="attribute-author">
                   <strong>{{$pertan->user->jumlahPertanyaanUser}}</strong> Pertanyaan
                </span>  
                <span class="attribute-author">{{$pertan->user->jumlahJawabanUser}} Jawaban</span> 
            </div>
        </div>
    
</div>
<!-- QUESTION CARD END -->    
@endforeach
