@extends('layouts.main2')

@section('content')
  <style>
    .badge:hover {
      color: #fff !important;
      text-decoration: none;
    }

    .bg-success:hover {
      background: #2f9164 !important;
    }

    .bg-danger:hover {
      background: #e84a59 !important;
    }
  </style>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Perbandingan Kriteria</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalChoose">
      <span data-feather="check-square"></span>
      Pilih Kriteria
    </button>
  </div>

  <div class="table-responsive col-lg-10">
    <table class="table table-striped text-dark">
      <thead>
        <tr>
          <th scope="col" class="text-center">No</th>
          <th scope="col" class="text-center">Dibuat oleh</th>
          <th scope="col" class="text-center">Dibuat pada</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @if ($comparisons->count())
          @foreach ($comparisons as $comparison)
            <tr>
              {{-- $loop->iteraion => nomor / urutan loop keberapa nya --}}
              <td class="text-center">{{ $loop->iteration }}</td>
              <td class="text-center">{{ $comparison->user->name }}</td>
              <td class="text-center">{{ $comparison->created_at->toFormattedDateString() }}</td>
              <td class="text-center">
                <a href="/dashboard/criteria-comparisons/{{ $comparison->id }}" class="badge bg-success text-decoration-none text-white">
                  Lihat Perbandingan Kriteria
                </a>
                <form action="/dashboard/criteria-comparisons/{{ $comparison->id }}" method="POST" class="d-inline text-white">
                  @method('delete')
                  @csrf

                  <span role="button" class="badge bg-danger btnDelete txt-white" data-object="Comparison Data">
                    Delete
                  </span>
                </form>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="4" class="text-danger text-center p-4">
              <h4>Belum ada Perbandingan Kriteria</h4>
            </td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>

  <!-- Modal Choose Criteria -->
  <div class="modal fade" id="modalChoose" tabindex="-1" aria-labelledby="modalChooseLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalChooseLabel">Pilih Kriteria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/dashboard/criteria-comparisons" method="POST">
          @csrf
          <div class="modal-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" class="text-center" colspan="2">Nama</th>
                  <th scope="col" class="text-center">Atribut</th>
                </tr>
              </thead>
              <tbody>
                @if ($criterias->count())
                  @foreach ($criterias as $criteria)
                    <tr>
                      <th scope="row" class="text-center">
                        <input type="checkbox" value="{{ $criteria->id }}" name="criteria_id[]">
                      </th>
                      <td class="text-center">{{ $criteria->name }}</td>
                      <td class="text-center">{{ Str::ucfirst(Str::lower($criteria->attribute)) }}</td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td class="text-center text-danger" colspan="4">Tidak ada Kriteria</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Lanjut</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
