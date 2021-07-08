@extends('Backend.master.master')
@section('title','Danh Mục SP')
@section('content')

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="../admin"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh sách sản phẩm</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách sản phẩm</h1>
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
									</svg  class="pull-right">{{ session('thongbao') }}</a>
								</div>
								@endif
								<a href="{{ route('AddProduct') }}" class="btn btn-primary">Thêm sản phẩm</a>
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Thông tin sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th>Tình trạng</th>
											<th>Danh mục</th>
											<th width='18%'>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
									@foreach($product as $key => $value)
										<tr>
											<td>{{ $product->firstitem()+$key }}</td> 
											<td>
												<div class="row">
													<div class="col-md-3"><img src="img/{{ $value['img'] }}" alt="Áo đẹp" width="100px" class="thumbnail"></div>
													<div class="col-md-9">
														<p><strong>Mã sản phẩm :{{ $value['code'] }}</strong></p>
														<p>Tên sản phẩm : {{ $value['name'] }}</p>
														
														
													</div>
												</div>
											</td>
											<td>{{ number_format($value['price'],0,'.',',') }} VND</td>
											<td>
												@if($value['state'] == 1)
												<button class="btn btn-success" role="button">Còn hàng</button>
												@else
												<button class="btn btn-danger" role="button">Hết hàng</button>
												@endif
											</td>
											<td> {{ $value->category->name }} </td>
											<td>
												<a href="{{ route('EditProduct',['prd_id'=>$value['id']]) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a onclick="return DeleteProduct('{{ $value['code'] }}')" href="{{ route('DeleteProduct',['prd_id'=>$value['id']]) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div align='right'>
								{{ $product->links() }}
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
			function DeleteProduct(name){
				return confirm('bạn muốn xóa sp có mã sp là '+name+' ?');
			}
		</script>
		@endsection