@extends('frontend.master.master')
@section('title','Giỏ hàng')
@section('content')
        <!-- main -->
        <div class="colorlib-shop">
            <div class="container">
                <div class="row row-pb-md">
                    <div class="col-md-10 col-md-offset-1">
                        @if(session('thongbao'))
                        <div class='btn btn-success'>{{ session('thongbao') }}</div>
                        @endif
                        <div class="process-wrap">
                            <div class="process text-center active">
                                <p><span>01</span></p>
                                <h3>Giỏ hàng</h3>
                            </div>
                            <div class="process text-center">
                                <p><span>02</span></p>
                                <h3>Thanh toán</h3>
                            </div>
                            <div class="process text-center">
                                <p><span>03</span></p>
                                <h3>Hoàn tất thanh toán</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-pb-md">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="product-name">
                            <div class="one-forth text-center">
                                <span>Chi tiết sản phẩm</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Giá</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Số lượng</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Tổng</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Xóa</span>
                            </div>
                        </div>
                        @foreach($cart as $value)
                        <div class="product-cart">
                            <div class="one-forth">
                                <div class="product-img">
                                    <img class="img-thumbnail cart-img"
                                        src="images/{{ $value->options->img }}">
                                </div>
                                <div class="detail-buy">
                                    <h4>Mã : {{ $value->id }}</h4>
                                    <h5>{{ $value->name }}</h5>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span class="price">{{ number_format($value->price,0,',','.') }} đ</span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">

                                    <?php ///// onchange: nếu dl trong input có sự thay đổi thì sẽ gọi function UpdateCart(rowId,quantity) line 156
                                    //// $value->rowId: Cart::total ///// this.value: value(giá trị ô input): số lượng sp 
                                    /// xnhan update quantity?>
                                    <input onchange="return update_cart('{{ $value->rowId }}',this.value)" type="number" id="quantity" name="quantity"
                                        class="form-control input-number text-center" value="{{ $value->qty }}">
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span class="price">{{ number_format($value->price*$value->qty,0,',','.') }} đ</span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">

                                    <?php /// xasc nhận xóa sp?>
                                    <a onclick="return DeleteCart('{{ $value->name }}')" href="{{ route('DeleteCart',['rowId'=>$value->rowId]) }}" class="closed"></a>
                                
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="total-wrap">
                            <div class="row">
                                <div class="col-md-8">

                                </div>
                                <div class="col-md-3 col-md-push-1 text-center">
                                    <div class="total">
                                        <div class="sub">
                                            <p><span>Tổng:</span> <span>{{ $total }}đ</span></p>
                                        </div>
                                        <div class="grand-total">
                                            <p><span><strong>Tổng cộng:</strong></span> <span>{{ $total }} đ</span></p>
                                            <a href="../checkout" class="btn btn-primary">Thanh toán <i
                                                    class="icon-arrow-right-circle"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main -->
 @endsection
 <?php
 //// Dùng ajax để update số lượng sp trong cart theo rowId mà Shopping cart tạo ra ?>
 @section('script')
     @parent
     <script>
     function update_cart(rowId,quantity)
     {
         //// $.get(): truy xuat vao ()-> ajax
         //// k thể truy xuất vào cart/update????
         $.get("../cart/update/"+rowId+"/"+quantity,
         function(data)
         {
             if(data=="success")
             {
                 return location.reload();
             }
             else
             {
                 return alert("Cập Nhập Thất Bại");
             }
         }
         );
     }

     
     function DeleteCart(name){
         return confirm('bạn muốn xóa SP '+name+' khỏi giỏ hàng?');
     }
     
     </script>
 @endsection
