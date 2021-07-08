@extends('frontend.master.master')
@section('title','Cửa hàng')
@section('content')
		<!-- main -->
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-push-3">
						<div class="row row-pb-lg">
							@foreach($product as $key => $value)
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/{{ $value['img'] }});">

										<div class="cart">
											<p>
												<span class="addtocart"><a href="../cart/add?id_product={{ $value->id}}"><i
															class="icon-shopping-cart"></i></a></span>
															{{--  gọi route chạy đến chi tiết sp. slug-prd(route) = $value['slug']  --}}
												<span><a href="{{ route('FrontendDetail',['slug_prd'=>$value['slug']]) }}"><i class="icon-eye"></i></a></span>


											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="{{ route('FrontendDetail',['slug_prd'=>$value['slug']]) }}">{{ $value['name'] }}</a></h3>
										<p class="price"><span>{{ number_format($value['price'],0,',','.') }} đ</span></p>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">
							<div class="col-md-12">
								<ul class="pagination">
									{{ $product->links() }}
								</ul>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-md-pull-9">
						<div class="sidebar">
							<div class="side">
								<h2>Danh mục</h2>
@foreach ($categorys as $row) <?php //nhận dl ?>
	@if($row->parent == 0) <?php //nếu parent == 0 thì hiển thị name(danh mục cha) rồi chạy tiếp ?>
	<div class="fancy-collapse-panel">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#menu{{ $row->id }}" <?php //tạo vòng lặp id cha = 0 để hieen thị ?>
							aria-expanded="true" aria-controls="collapseOne">{{$row->name}} <?php //hiên thị danh mục cha ?>
						</a>
					</h4>
				</div>
				<div id="menu{{ $row->id }}" class="panel-collapse collapse" role="tabpanel"
					aria-labelledby="headingOne">
					<div class="panel-body">
						<ul>

@foreach ($categorys as $item) <?php //nhận dl ?>
	@if($row->id == $item-> parent) <?php //nếu id = parent thì echo name(danh mục con có parent = id(cha)) và gọi route('FrontendPrdCate') ?>
	<li><a href="{{ route('FrontendPrdCate',['slug_cate'=>$item['slug']]) }}">{{ $item->name }}</a></li> <?php //hiển thị tên danh mục con, có parent = id cha. hthi sp có slug_cate = slug on category ?>
	@endif
@endforeach							
						</ul>
					</div>
				</div>
			</div>
		


		</div>
	</div>
	@endif
@endforeach
								

							</div>
							<div class="side">
								<h2>Khoảng giá</h2>
								<form action="{{ route('FrontendFilter') }}" method="get" class="colorlib-form-2">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="guests">Từ:</label>
												<div class="form-field">
													<i class="icon icon-arrow-down3"></i>
													<select name="start" id="people" class="form-control">
														<option value="100000">100.000 VNĐ</option>
														<option value="200000">200.000 VNĐ</option>
														<option value="300000">300.000 VNĐ</option>
														<option value="400000">500.000 VNĐ</option>
														<option value="1000000">1.000.000 VNĐ</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label for="guests">Đến:</label>
												<div class="form-field">
													<i class="icon icon-arrow-down3"></i>
													<select name="end" id="people" class="form-control">
														<option value="2000000">2.000.000 VNĐ</option>
														<option value="4000000">4.000.000 VNĐ</option>
														<option value="6000000">6.000.000 VNĐ</option>
														<option value="8000000">8.000.000 VNĐ</option>
														<option value="10000000">10.000.000 VNĐ</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<button type="submit" style="width: 100%;border: none;height: 40px;">Tìm
										kiếm</button>
								</form>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- end main -->
@endsection
	