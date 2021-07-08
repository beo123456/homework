 <!-- sidebar left-->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
		</form>
            <ul class="nav menu">
			<li><a href="{{ route('Admin') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Tổng quan</a></li>
			<li><a href="{{ route('BackendCategory') }}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper" /></svg> Danh Mục</a></li>
			<li><a href="{{ route('BackendProduct') }}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Sản phẩm</a></li>
			<li><a href="{{ route('BackendOrder') }}"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad" /></svg> Đơn hàng</a></li>
			<li role="presentation" class="divider"></li>
			@if(Auth::user()->level == 1)
			<li><a href="{{ route('BackendUser') }}"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Quản lý thành viên</a></li>
			@endif

		</ul>

	</div>
    <!--/. end sidebar left-->