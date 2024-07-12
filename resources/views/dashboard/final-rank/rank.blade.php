@extends('layouts.main2')

@section('content')
  <div class="table-responsive col-lg-12">
    <div class="d-lg-flex justify-content-between gap-2">
      <h1 class="h2 mb-0 text-gray-800">Peringkat</h1>
      <a href="/dashboard/final-ranking" class="btn btn-secondary mb-3">
        <span data-feather="arrow-left"></span>
        Kembali ke Peringkat
      </a>
    </div>

      <div class="d-sm-flex align-items-center justify-content-between align-items-center my-4">
        <h1 class="h3 mb-0 text-gray-800">Peringkat UMKM</h1>
      </div>

      <table class="table table-bordered text-dark">
        <thead>
          <tr>
            <th scope="col" class="text-center">Alternatif</th>
            <th scope="col" class="text-center">Peringkat Hasil</th>
            <th scope="col" class="text-center">Peringkat</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($ranks as $rank)
            <tr>
              <td class="text-center">
                {{ $rank['tourism_name'] }}
              </td>
              <td class="text-center">
                {{ $rank['rank_result'] }}
              </td>
              <td class="text-center fw-bold">
                {{ $loop->iteration }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection