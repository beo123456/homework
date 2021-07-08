@extends('Backend.master.master')
@section('title','Các Đơn Hàng Đang Chờ Xử Lý')
@section('content')

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="../admin"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Đơn hàng</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách đơn đặt hàng đã xử lý</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="../admin/order" class="btn btn-warning"><span class="glyphicon glyphicon-gift"></span>Đơn Chưa xử lý</a>
								<table class="table table-bordered" style="margin-top:20px;">				
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th>Tên khách hàng</th>
                                            <th>Email</th>
                                            <th>Sđt</th>
                                            <th>Địa chỉ</th>
                                            <th>Thời gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($order as $key => $value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $value['full'] }}</td>
                                            <td>{{ $value['email'] }}</td>
                                            <td>{{ $value['phone'] }}</td>
                                            <td>{{ $value['address'] }}</td>
                                            <td>{{ Carbon\carbon::parse($value['updated_at'])->format('d-m-Y') }}</td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                </table>
							</div>
						</div>
						<div class="clearfix"></div>
					<div>
						{{ $order->links() }}
					</div>
					
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->


	</div>
	<!--end main-->
@endsection