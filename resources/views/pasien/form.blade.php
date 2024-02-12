<div class="row">
    <div class="form-group col-md-12">
      <label>Nama Pasien</label>
      <input type="text" name="nama_pasien" class="form-control" placeholder="Nama pasien" value="{{ @$data->nama_pasien }}">
    </div>

    <div class="form-group col-md-12">
      <label>Tanggal Lahir</label>
      <input type="number" name="no_telp" class="form-control" placeholder="Tanggal Lahir" value="{{ @$data->tgl_lahir }}">
    </div>

    <div class="form-group col-md-12">
      <label>Gender</label>
      <select class="form-control" name="jenis" id="select2-jenis">
        <option value="lk">Laki-laki</option>
        <option value="pr">Perempuan</option>
      </select>
    </div>

    <div class="form-group col-md-6">
      <label>Berat badan</label>
      <input type="text" name="berat" class="form-control" placeholder="Berat" value="{{ @$user->berat }}">
    </div>

    <div class="form-group col-md-6">
      <label>Tinggi Badan</label>
      <input type="email" name="tinggi" class="form-control" placeholder="Tinggi" value="{{ @$user->tinggi }}">
    </div>

    <div class="form-group col-md-12">
        <label>Penyakit Khusus</label>
        <textarea name="penyakit" id=""  class="form-control">{{ @$data->penyakit }}</textarea>
        {{-- <input type="number" name="name" class="form-control" placeholder="Nomor Telepon" value="{{ @$data->name }}"> --}}
      </div>

  </div>

  <script>

  </script>
