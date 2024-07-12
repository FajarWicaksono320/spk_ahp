@extends('layouts.main2')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">SELAMAT DATANG, {{ auth()->user()->name }}!</h1>
</div>
<div class="row">
  <div class="col-md-12 mb-4">
    <div class="card bg-white">
      <div class="card-body">
        <h5 class="card-title">Tentang Sistem Pendukung Keputusan (SPK) untuk Pemilihan Penerimaan Bantuan UMKM</h5>
<p class="card-text" style="text-align: justify; text-indent: 2em;">
    Sistem Pendukung Keputusan (SPK) adalah sebuah sistem informasi berbasis komputer yang mendukung pengambilan keputusan dalam sebuah organisasi atau perusahaan. SPK digunakan untuk membantu proses pengambilan keputusan yang kompleks dengan menganalisis data dan memberikan rekomendasi berdasarkan berbagai kriteria yang telah ditetapkan.
</p>
<p class="card-text" style="text-align: justify; text-indent: 2em;">
    Dalam konteks pemilihan penerimaan bantuan UMKM, SPK berperan penting untuk memastikan bahwa bantuan yang diberikan tepat sasaran dan sesuai dengan kebutuhan. Sistem ini menganalisis berbagai data pengajuan yang masuk, seperti profil usaha, kondisi keuangan, dan kelayakan penerima bantuan. Berdasarkan analisis tersebut, SPK memberikan rekomendasi mengenai pengajuan mana yang layak untuk disetujui atau ditolak. Dengan menggunakan SPK, proses seleksi penerimaan bantuan menjadi lebih transparan, objektif, dan efisien. Hal ini membantu mengurangi potensi kesalahan dan bias dalam pengambilan keputusan, sehingga bantuan dapat disalurkan kepada UMKM yang benar-benar membutuhkan dan memenuhi kriteria yang telah ditentukan.
</p>
<p class="card-text" style="text-align: justify; text-indent: 2em;">
    Website ini memberikan informasi penting terkait dengan jumlah pengajuan bantuan, bantuan yang disetujui, dan bantuan yang ditolak, sehingga Anda dapat memantau dan mengevaluasi efektivitas dari sistem pendukung keputusan yang telah diimplementasikan.
</p>

      </div>
    </div>
  </div>
</div>
@endsection