@foreach ($jawaban as $jawab)
<div class="row shadow p-3 mb-3 rounded {{($userId==$jawab->user_id) ? "bg-select" : "bg-body"}}">
    @if ($userId == $jawab->user_id)
        <div class="text-end">
            <button onclick="showModalUpdate(this)" type="button" class="btn btn-success text-end" data-bs-toggle="modal" data-bs-target="#modal-update-jawaban" data-idx="{{$loop->index}}">Edit</button>
        </div>    
    @endif
    
    <div class="body-question ql-snow">
        <div class="ql-editor" style="white-space: pre-wrap">
          {!!$jawab->body!!}
        </div>
    </div>
    <div class="footer-card row justify-content-end">
        <div class="col-auto">
            By <a href="" class="text-decoration-none">{{$jawab->user->nama}} </a> 
            <span class="attribute-author">
              <strong>{{$jawab->user->jumlah_pertanyaan}}</strong> Pertanyaan
            </span>  
            <span class="attribute-author">{{$jawab->user->jumlah_jawaban}} Jawaban</span> 
        </div>
    </div>
</div>    
@endforeach

 <!-- MODAL Update KATEGORI START -->
 <div class="modal fade" id="modal-update-jawaban" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jawaban</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                 {{-- FORM JAWABAN START --}}
          
          <form action="{{url('/jawaban')}}" method="POST" id="form-update-jawaban">
            @method('PUT')
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf" />
            <!-- Create toolbar container -->
            <div id="toolbar-update">
                <!-- Add Bold Button-->
                <button class="ql-bold"></button>
                <!-- Add Italic Button -->
                <button class="ql-italic"></button>
                <!-- Add font size dropdown -->
                <select class="ql-size">
                    <option value="small"></option>
                    <!-- Note a missing, thus falsy value, is used to reset to default -->
                    <option selected></option>
                    <option value="large"></option>
                    <option value="huge"></option>
                </select>
                <!-- add hyperlink button -->
                <button class="ms-3 ql-link"></button>
                <!-- Add blockquote button -->
                <button class="ql-blockquote"></button>
                <!-- add code-block button -->
                <button class="ql-code-block"></button>
                <!-- Add a bold button -->
                <button class="ql-image"></button>

                <!-- add list -->
                <button class="ql-list ms-3" value="ordered"></button>
                <button class="ql-list" value="bullet"></button>
                <!-- add align text -->
                <select name="" id="" class="ql-align">
                    <option selected></option>
                    <option value="center"></option>
                    <option value="right"></option>
                    <option value="justify"></option>
                </select>
                </div>
                <div class="jawab-editor" id="update-jawab-editor"></div>
                {{-- hidden input --}}
                <textarea name="body" id="body-update-jawaban" cols="30" rows="10" hidden>
                    
                </textarea>
                <input type="text" name="quill_delta" hidden id="quill-delta-update" value="">
                <input type="text" name="images" hidden id="images-update">

                {{-- <button type="button" onclick="submitFormUpdate()" class="btn btn-success mt-3">Submit</button> --}}
            </form> 
            {{-- FORM JAWABAN END --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-update-kategori" onclick="submitFormUpdate()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL TAMBAH KATEGORI END -->

