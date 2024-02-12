@extends('layouts.app')

@section('content')

<section id="edit">
    <div class="card custom-card">
        <div class="card-body">
            <form action="{{ route('pasien.update', $id) }}" method="POST" id="myForm">
                @csrf
                @method('GET')
                <div class="row justify-content-center">
                    <div class="form-group col-md-8">
                        <label>Nama Pasien</label>
                        <input type="text" name="nama_pasien" class="form-control" placeholder="Nama pasien" value="{{@$pasien->nama}}">
                    </div>

                    <div class="form-group col-md-8">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl" class="form-control" placeholder="Tanggal Lahir" value="{{@$pasien->tgl_lahir}}">
                    </div>

                    <div class="form-group col-md-8">
                        <label>Gender</label>
                        <select class="form-control" name="jenis">
                            <option value="lk">Laki-laki</option>
                            <option value="pr">Perempuan</option>
                        </select>
                    </div>

                    <div class="row justify-content-center">
                        <div class="form-group col-md-4">
                            <label>Berat badan</label>
                            <input type="number" name="berat" class="form-control" placeholder="Berat" value="{{@$pasien->berat_badan}}">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Tinggi Badan</label>
                            <input type="number" name="tinggi" class="form-control" placeholder="Tinggi" value="{{@$pasien->tinggi_badan}}">
                        </div>
                    </div>

                    <div class="form-group col-md-8">
                        <label>Penyakit Khusus</label>
                        <textarea name="penyakit" class="form-control">{{@$pasien->penyakit_khusus}}</textarea>
                    </div>

                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-md-8">
                            <input name="" id="" class="btn btn-success" type="submit" value="save" style="float: right">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

  @endsection

  @section('script')
  <script>
    $(() => {
        $('#select2-jenis').select2({
            placeholder: 'Choose One',
        });
    })

  </script>
  @endsection
