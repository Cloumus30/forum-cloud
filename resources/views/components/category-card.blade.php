 <!-- Card Category Start -->
 @foreach ($kategori as $kateg)
 <div class="card ms-3 mb-3" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">
        <a href="#" class="text-decoration-none">{{$kateg->nama}}</a>
    </h5>
      <p class="card-text">{{$kateg->deskripsi}}</p>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <div class="value-question">
            {{$kateg->pertanyaan}} Pertanyaan
        </div>
        <div class="btn-edit">
            {{-- <a href="#" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i>  Edit</a> --}}
            <button class="btn btn-success w-auto ms-2" data-bs-toggle="modal" data-bs-target="#modal-update-kategori{{$kateg->id}}" id="btn-update"><i class="bi bi-pencil-square"></i> Edit</button>
        </div>
    </div>
</div>

 <!-- MODAL Update KATEGORI START -->
 <div class="modal fade" id="modal-update-kategori{{$kateg->id}}" tabindex="-1" aria-labelledby="updateKategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="form-update-kategori">
                    <div class="mb-3">
                        <label for="form-nama-kategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="form-nama-kategori" placeholder="cth:coding" name="kategori" value="{{$kateg->nama}}">
                    </div>
                    <div class="mb-3">
                        <label for="form-deksripsi-kategori" class="form-label">Deskripsi Kategori</label>
                        <textarea name="deskripsi_kategori" id="form-deksripsi-kategori" cols="30" rows="10" class="form-control">{{$kateg->deskripsi}}</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-update-kategori">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL TAMBAH KATEGORI END -->

 @endforeach


 
<!-- Card Category End -->