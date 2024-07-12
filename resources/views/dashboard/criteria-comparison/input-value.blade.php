@extends('layouts.main2')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Masukan Nilai Perbandingan</h1>
  </div>
  <div class="table-responsive col-lg-12">
    <div class="d-lg-flex justify-content-end">
      <a href="/dashboard/criteria-comparisons" class="btn btn-secondary mb-3">
        <span data-feather="arrow-left"></span>
        Kembali
      </a>
      <br><br><br>
      @if ($isDoneCounting)
      <a href="/dashboard/criteria-comparisons/result/{{ $criteria_analysis->id }}" class="btn btn-secondary mb-3">
        <span data-feather="clipboard"></span>
        Lihat Hasil Perbandingan
      </a>
    @endif
  </div>

    <div class="card">
      <div class="card-header bg-white">
        <div class="card-body bg-white">
      </div>
          @if (count($details))
          <form action="/dashboard/criteria-comparisons/{{ $details[0]->criteria_analysis_id }}" method="POST">
              @method('put')
              @csrf
  
              <input type="hidden" name="id" value="{{ $details[0]->criteria_analysis_id }}">
  
              <!-- Add a container for the scrollable table -->
              <div style="overflow-y: auto; max-height: 220px;">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th class="text-center text-dark">Kriteria Pertama</th>
                              <th class="text-center text-dark">Nilai Perbandingan</th>
                              <th class="text-center text-dark">Kriteria Kedua</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($details as $detail)
                          <tr>
                              <input type="hidden" name="criteria_analysis_detail_id[]" value="{{ $detail->id }}">
  
                              <td class="text-center text-dark">
                                  {{ $detail->firstCriteria->name }}
                              </td>
                              <td class="text-center">
                                  <select class="form-select" name="comparison_values[]" required>
                                      <option value="" disabled selected>--Pilih Nilai--</option>
                                      <option value="1" {{ $detail->comparison_value == 1 ? 'selected' : '' }}>1 - Sama Pentingnya</option>
                                      <option value="2" {{ $detail->comparison_value == 2 ? 'selected' : '' }}>2 - Mendekati Sedikit Lebih Penting</option>
                                      <option value="3" {{ $detail->comparison_value == 3 ? 'selected' : '' }}>3 - Sedikit Lebih Penting</option>
                                      <option value="4" {{ $detail->comparison_value == 4 ? 'selected' : '' }}>4 - Mendekati Lebih Penting</option>
                                      <option value="5" {{ $detail->comparison_value == 5 ? 'selected' : '' }}>5 - Lebih Penting</option>
                                      <option value="6" {{ $detail->comparison_value == 6 ? 'selected' : '' }}>6 - Mendekati Sangat Penting</option>
                                      <option value="7" {{ $detail->comparison_value == 7 ? 'selected' : '' }}>7 - Sangat Penting</option>
                                      <option value="8" {{ $detail->comparison_value == 8 ? 'selected' : '' }}>8 - Mendekati Mutlak Sangat Penting</option>
                                      <option value="9" {{ $detail->comparison_value == 9 ? 'selected' : '' }}>9 - Mutlak Sangat Penting</option>
                                  </select>
                              </td>
                              <td class="text-center text-dark">
                                  {{ $detail->secondCriteria->name }}
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
  
              @can('update', $criteria_analysis)
              <div class="text-center mt-3">
                  <button type="submit" class="btn btn-secondary">Simpan</button>
              </div>
              @endcan
          </form>
          @endif
      </div>
  </div>
@endsection
