 <!-- CARD START -->
 @foreach ($users as $user)
    <div class="card me-3 mb-3">
        <div class="card-body pb-0 pe-0" style="width: 18rem;">
            <div class="row">
                <div class="col-auto">
                    @if ($user->gambar_url)
                        <img src="{{$user->gambar_url}}" class="rounded-circle" width="75px" alt="">    
                    @else
                        <img src="./image/99173d0c-f63e-4419-afd5-273aa45e7d69.png" class="rounded-circle" width="75px" alt="">    
                    @endif
                    
                </div>
                <div class="col-6">
                    <a href="#">{{$user->nama}}</a>
                    <div class="row">
                        <p class="mb-0 text-secondary"> <strong class="text-dark">{{$user->jumlah_pertanyaan}}</strong> Pertanyaan</p>
                        <p class="mb-0 text-secondary"> <strong class="text-dark">{{$user->jumlah_jawaban}}</strong> Menjawab</p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
 @endforeach
 
<!-- CARD END -->