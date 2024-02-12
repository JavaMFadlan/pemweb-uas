<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Pasien</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Your form goes here -->
          <form action="{{ route('pasien.store') }}" method="POST" id="myForm">
            @csrf
            <div class="row justify-content-center">
              <div class="form-group col-md-12">
                <label>Nama Pasien</label>
                <input type="text" name="nama_pasien" class="form-control" placeholder="Nama pasien" value="">
              </div>

              <div class="form-group col-md-12">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl" class="form-control" placeholder="Tanggal Lahir" value="">
              </div>

              <div class="form-group col-md-12">
                <label>Gender</label>
                <select class="form-control" name="jenis" >
                  <option value="lk">Laki-laki</option>
                  <option value="pr">Perempuan</option>
                </select>
              </div>

              <div class="row justify-content-center">
                <div class="form-group col-md-6">
                  <label>Berat badan</label>
                  <input type="number" name="berat" class="form-control" placeholder="Berat" value="">
                </div>

                <div class="form-group col-md-6">
                  <label>Tinggi Badan</label>
                  <input type="number" name="tinggi" class="form-control" placeholder="Tinggi" value="">
                </div>
              </div>

              <div class="form-group col-md-12">
                <label>Penyakit Khusus</label>
                <textarea name="penyakit" class="form-control"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
