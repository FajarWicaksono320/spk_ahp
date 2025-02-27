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
    <h1 class="h2">Alternatif</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAlternativeModal">
      <span data-feather="plus"></span>
      Tambah Alternatif
    </button>
  </div>
  <div class="table-responsive">
    <table id="datatablesSimple" class="table table-bordered">
      <thead class="text-dark">
          <tr>
            <th class="text-center align-middle" rowspan="2">No</th>
            <th class="text-center align-middle" rowspan="2">Nama Alternatif</th>
            <th class="text-center" colspan="{{ $criterias->count() }}">Kriteria</th>
            <th class="text-center align-middle" rowspan="2">Aksi</th>
          </tr>
          <tr>
            @if ($criterias->count())
              @foreach ($criterias as $criteria)
                <th class="text-center">{{ $criteria->name }}</th>
              @endforeach
            @else
              <th class="text-center text-dark">Tidak ada Data</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @if ($alternatives->count())
            @foreach ($alternatives as $alternative)
              <tr>
                <th scope="row" class="text-center text-dark">
                  {{ $loop->iteration }}
                </th>
                <td class="text-center text-dark">
                  {{ $alternative->name }}
                </td>
                @foreach ($criterias as $key => $value)
                  @if (isset($alternative->alternatives[$key]))
                    <td class="text-center text-dark">
                      {{ floatval($alternative->alternatives[$key]->alternative_value) }}
                    </td>
                  @else
                    <td class="text-center">
                      Kosong
                    </td>
                  @endif
                @endforeach

                <td class="text-center">
                  <a href="/dashboard/alternatives/{{ $alternative->id }}/edit" class="badge bg-success text-decoration-none text-white">
                    Edit
                  </a>

                  <form action="/dashboard/alternatives/{{ $alternative->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf

                    <span class="badge bg-danger btnDelete" data-object="Alternative" style="cursor: pointer;">
                      Delete
                    </span>
                  </form>
                </td>
              </tr>
            @endforeach
          @else
          <tr>
            <td colspan="{{ 3 + $criterias->count() }}" class="text-center text-danger">
              Tidak ada Data
            </td>
          </tr>
          @endif
        </tbody>
    </table>
  </div>

  <!-- Add Alternative -->
  <div class="modal fade" id="addAlternativeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addAlternativeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addAlternativeModalLabel">Tambah Alternatif</h5>
          <button style="background-color: transparent" type="button" class="btn-close-muted" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/dashboard/alternatives" method="post">
          <div class="modal-body">
            <span class="mb-2">Peraturan :</span>
            <ul class="list-group mb-2">
              <li class="list-group-item bg-success text-white">
                Angka Minimal Adalah 0
              </li>
              <li class="list-group-item bg-success text-white">
                Angka Maksimal Adalah 10
              </li>
            </ul>

              @csrf
              <div class="my-2">
                <label for="tourism_object_id" class="form-label">Data UMKM</label>
                <select class="form-select @error('tourism_object_id') 'is-invalid' : ''  @enderror" id="tourism_object_id" name="tourism_object_id" required>
                  @if ($tourism_objects->count())
                    <option disabled selected>--Pilih--</option>
                    @foreach ($tourism_objects as $tourism)
                      <option value="{{ $tourism->id }}">
                        {{ $tourism->name }}
                      </option>
                    @endforeach
                  @else
                    <option disabled value="" selected>--Tidak ada Data--</option>
                  @endif
                </select>

                @error('tourism_object_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              @if ($criterias->count())
                @foreach ($criterias as $key => $criteria)
                  <input type="hidden" name="criteria_id[]" value="{{ $criteria->id }}">

                  <div class="my-2">
                    <label for="{{ str_replace(' ','', $criteria->name) }}" class="form-label">
                      Nilai dari {{ $criteria->name }}
                    </label>
                    <input type="text" id="{{ str_replace(' ','', $criteria->name) }}" class="form-control @error('alternative_value') 'is-invalid' : '' @enderror" name="alternative_value[]" placeholder="Enter the value" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57)|| event.charCode == 46)" maxlength="5" autocomplete="off" required>

                    @error('alternative_value')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                @endforeach
              @endif

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="{{ $criterias->count() ? "submit" : "button" }}" class="btn btn-primary">Tambah Alternatif</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
