@extends('Backend.master.master')
@section('title','Quản Lý User')
@section('content')

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="../admin"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh sách thành viên</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								@if(session('thongbao'))
								<div class="alert bg-success" role="alert">
									<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
									</svg>{{ session('thongbao') }}<a class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
								</div>
								@endif

								<a href="{{ route('AddUser') }}" class="btn btn-primary">Thêm Thành viên</a>
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Email</th>
											<th>Full</th>
											<th>Address</th>
                                            <th>Phone</th>
                                            <th>Level</th>
											<th width='18%'>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach($user as $key => $value)

										<tr>
											<td>{{ $user->firstitem()+$key }}</td>
											<td>{{ $value['email'] }}</td>
											<td>{{ $value['full'] }}</td>
											<td>{{ $value['address'] }}</td>
                                            <td>{{ $value['phone'] }}</td>
                                            <td>@if($value['level'] == 1)
												Admin
												@else
												User
												@endif
											</td>
											<td>
												<a href="{{ route('EditUser',['id_user'=>$value['id']]) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a onclick="return Del_user('{{ $value['full'] }}')" href="{{ route('DelUser',['id_user'=>$value['id']]) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
                                        </tr>   
										@endforeach                           
									</tbody>
								</table>
								<div align='right'>
									{{--  phân trang  --}}
										{{ $user->links() }}
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->


			</div>
			<!--end main-->

	@endsection
	@section('script')
	@parent
	<script>
		function Del_user(name){
			return confirm('bạn muốn xóa user '+name+'?');
		}
	</script>
	@endsection