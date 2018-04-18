@extends('layout.wrapper')
    @section('breadcrumb')

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Data Bidang Perusahaan</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li class="active">
                      <strong>Data Bidang Perusahaan</strong>
                  </li>
              </ol>
          </div>
          <div class="col-lg-2">
          </div>
      </div>

    @endsection
    @section('content')
      @if($status = Session::get("status"))
      <div class="alert alert-success alert-dismissable">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          {{$status}}
      </div>
    	@endif
      <!--  FORM -->
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Input Data Bidang Perusahaan</h5>
        </div>
        <div class="ibox-content">
          <form class="form-horizontal m-t-md" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Bidang Perusahaan *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="bidangperusahaan" required>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label"></label>
              <div class="col-sm-10">
                  <input type="submit" value="Simpan" class="btn btn-primary btn-block">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--  END FORM -->

    <!--  Table -->
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
          <div class="ibox-title">
              <h5>Tabel Data Bidang Perusahaan</h5>
          </div>
          <div class="ibox-content">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                  <tr>
                    <th class="sorting_asc">No</th>
                    <th class="sorting">Bidang</th>
                    <!-- <th class="sorting">Opsi</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @foreach ($data as $r)
                  <tr>
                        <td>{{$no++}}</td>
                        <td>{{$r->bidangperusahaan}}</td>
                        <!-- <td>
                          <form action="{{ route('bidangperusahaan.destroy', $r->id_bidang) }}" method="POST" style="display:inline-block">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger">
                              <span>DELETE</span>
                            </button>
                          </form>
                          <a href="" class="btn btn-warning">Edit</a>
                      </td> -->
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
    <!--  End Table-->
    <script type="text/javascript">
      $(".btn-submit").click(function(e){
        e.preventDefault();
        var bidangperusahaan = $("input[name=bidangperusahaan]").val();
        $.ajax({
          type:'POST',
          url:'/store',
          data:{bidangperusahaan:bidangperusahaan},
          success:function(data){
            alert(data.success);
          }
        });
      });
    </script>
    @endsection
