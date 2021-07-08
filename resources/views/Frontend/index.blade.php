@extends('frontend.master.master')
@section('title','Trang Chủ')
@section('content')
		<!-- main -->


		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm Nổi bật</span></h2>
						<p>Đây là những sản phẩm được ưa chuộng nhất năm 2019</p>
					</div>
				</div>
				<div class="row">
					@foreach($prd_featured as $key => $value)
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/{{ $value['img'] }});">
								<div class="cart">
									<p>
										<span class="addtocart"><a href="../cart/add?id_product={{ $value->id }}"><i
													class="icon-shopping-cart"></i></a></span>
										<span><a href="{{ route('FrontendDetail',['slug_prd'=>$value['slug']]) }}"><i class="icon-eye"></i></a></span>


									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="{{ route('FrontendDetail',['slug_prd'=>$value['slug']]) }}">{{ $value['name'] }}</a></h3>
								<p class="price"><span>{{ number_format($value['price'] ,0,'','.') }}đ</span></p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm mới</span></h2>
						<p>Đây là những sản phẩm mới của năm năm 2019</p>
					</div>
				</div>

				<div class="row">
					@foreach($prd_new as $key => $value)
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/{{ $value['img'] }});">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="../cart/add?id_product={{ $value->id }}"><i
													class="icon-shopping-cart"></i></a></span>
										<span><a href="{{ route('FrontendDetail',['slug_prd'=>$value['slug']]) }}"><i class="icon-eye"></i></a></span>


									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="{{ route('FrontendDetail',['slug_prd'=>$value['slug']]) }}">{{ $value['name'] }}</a></h3>
								<p class="price"><span>{{ number_format($value['price'] ,0,'','.') }} đ</span></p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- end main -->
@endsection