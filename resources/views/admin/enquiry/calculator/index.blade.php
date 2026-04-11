@extends('layouts.admin')
@push('style')
@endpush
@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        @if(Session('status'))
        <script>
          Swal.fire({
            icon: '<?= Session('status') ?>',
            title: '<?= Session('status') ?>',
            text: '<?= Session('message') ?>',
          })
        </script>
        @endif
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Calculator Enquiries</h3>
            <div class="row card-tools">
              <div class="col-md-9 input-group input-group-sm">
                <input type="text" name="search" id="search" class="form-control float-right" placeholder="Search by name" onkeyup="search_func(this.value);">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default" style="height: 31px;">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
              <div class="col-md-3">
                <a href="javascript:void(0);" onclick="export_func();" class="btn btn-success btn-sm float-right">
                    <i class="fas fa-file-excel"></i> Export
                </a>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive" id="tag_container">
            @include('admin.enquiry.calculator.dataTable')
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>
@endsection

@push('script')
<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '.pagination a', function(event) {
      event.preventDefault();
      $('li').removeClass('active');
      $(this).parent('li').addClass('active');
      var myurl = $(this).attr('href');
      getData(myurl);
    });
  });

  function getData(url) {
    var value = document.getElementById("search").value;
    $.ajax({
      url: url,
      type: 'GET',
      data: { 'search': value },
      success: function(data) {
        $('#tag_container').html(data);
      },
      error: function(err) {
        alert("No response from server");
      }
    });
  }

  function search_func(value) {
    $.ajax({
      type: "GET",
      url: "{{ route('calculator-enquiry.index') }}",
      data: { 'search': value },
      success: function(data) {
        $('#tag_container').html(data);
      },
      error: function(err) {
        alert("No response from server");
      }
    });
  }

  function export_func() {
    var value = document.getElementById("search").value;
    window.location.href = "{{ route('calculator-enquiry.export') }}?search=" + value;
  }
</script>
@endpush
