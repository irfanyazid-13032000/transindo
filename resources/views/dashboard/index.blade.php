@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="card mb-4">
        <h6 class="text-center mt-3">REKAPITULASI PEGAWAI BERDASARKAN JENIS KELAMIN</h6>
        <div class="chart-container mb-4" >
        <canvas id="jenis_kelamin"></canvas>
      </div>
    </div>

      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
      <script>
        $(document).ready(function() {
        $.ajax({
            url: "{{ route('users.jenis_kelamin') }}",
            type: "GET",
            dataType: "json",
            success: function(response) {
              var ctx = document.getElementById('jenis_kelamin').getContext('2d');

              var backgroundColors = [];

              for (var i = 0; i < response.labels.length; i++) {
                var dynamicColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
                backgroundColors.push(dynamicColor);
            }
        
        new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: response.labels,
            datasets: [{
              label: response.label,
              data: response.data,
              backgroundColor: backgroundColors,
                        hoverBackgroundColor: response.hoverBackgroundColor,
                        hoverBorderColor: response.hoverBorderColor,
            }],
            hoverOffset: 4
          },
          options: {
                responsive: true,
                maintainAspectRatio: false,
          }
        });
      },
      error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
});
      </script>
      <div class="card">
        <h6 class="text-center mt-3">REKAPITULASI PEGAWAI BERDASARKAN GRADE</h6>
        <div class="chart-container mb-4">
        <canvas id="jenjang_pendidikan"></canvas>
      </div>
    </div>

      <script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('users.jenjang_pendidikan') }}",
            type: "GET",
            dataType: "json",
            success: function(response) {
                var jenjangPendidikanChart = new Chart(document.getElementById('jenjang_pendidikan').getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: response.labels,
                        datasets: [{
                            data: response.data,
                            backgroundColor: response.backgroundColor,
                        }],
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        borderWidth: 1,
                        xpadding: 15,
                        ypadding: 15,
                    },
                });
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
</script>

       @endsection
