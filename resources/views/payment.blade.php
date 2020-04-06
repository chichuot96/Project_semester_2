@extends('header')
@section('container')
    <div class="container">
        <div class="table-responsive">
            <form id="createOrder" action="{{asset('payment/'.$id.'/'.$time)}}" method="POST"  enctype="multipart/form-data" class="form" >
                @csrf
                <div class="form-group">
                    <label>Mua Vé</label>
                </div>

                <div class="form-group">
                    <label>Số tiền :{{$price}}VND</label>
                    <input class='form-control' id="amount" name="amount" placeholder="So tien" value="{{$price}}" type="hidden">
                    <input type="hidden" name="id" value="{{$id}}">
                </div>
                <div class="form-group">
                    <label>Nội dung thanh toán</label>
                    <textarea class="form-control" id="orderDescription" name="orderDescription" placeholder="Nội dung thanh toán"></textarea>
                </div>
                <div class="form-group">
                    <label>Ngân hàng</label>
                    <select class="form-control" id="bankCode" name="bankCode">
                        <option value="">Không chọn</option>
                        <option value="VNPAYQR">Ngân hàng VNPAYQR</option>
                        <option value="NCB">Ngân hàng NCB</option>
                        <option value="SCB">Ngân hàng SCB</option>
                        <option value="SACOMBANK">Ngân hàng SACOMBANK</option>
                        <option value="EXIMBANK">Ngân hàng EXIMBANK</option>
                        <option value="MSBANK">Ngân hàng MSBANK</option>
                        <option value="NAMABANK">Ngân hàng NAMABANK</option>
                        <option value="VISA">Ngân hàng VISA</option>
                        <option value="VNMART">Ngân hàng VNMART</option>
                        <option value="VIETINBANK">Ngân hàng VIETINBANK</option>
                        <option value="VIETCOMBANK">Ngân hàng VIETCOMBANK</option>
                        <option value="HDBANK">Ngân hàng HDBANK</option>
                        <option value="DONGABANK">Ngân hàng Dong A</option>
                        <option value="TPBANK">Ngân hàng Tp Bank</option>
                        <option value="OJB">Ngân hàng OceanBank</option>
                        <option value="BIDV">Ngân hàng BIDV</option>
                        <option value="TECHCOMBANK">Ngân hàng Techcombank</option>
                        <option value="VPBANK">Ngân hàng VPBank</option>
                        <option value="AGRIBANK">Ngân hàng AGRIBANK</option>
                        <option value="MBBANK">Ngân hàng MBBank</option>
                        <option value="ACB">Ngân hàng ACB</option>
                        <option value="OCB">Ngân hàng OCB</option>
                        <option value="SHB">Ngân hàng SHB</option>
                        <option value="IVB">Ngân hàng IVB</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ngôn ngữ</label>
                    <select class="form-control" id="language" name="language">
                        <option value="vn">Tiếng Việt</option>
                        <option value="en">English</option>
                    </select>
                </div>
                <button class="btn btn-default" id="btnPopup"   type="submit">Thanh toán</button>
            </form>
        </div>
    </div>
@endsection
@push('head')
    <script src='https://pay.vnpay.vn/lib/vnpay/vnpay.js'></script>
    <script type='text/javascript'>
        $("#btnPopup").click(function () {
            var postData = $("#createOrder").serialize();
            var submitUrl = $("#createOrder").attr("action");
            $.ajax({
                type: "POST",
                url: submitUrl,
                data: postData,
                dataType: 'JSON',
                success: function (x) {
                    if (x.code === '00') {
                        if(window.vnpay)
                        {
                            vnpay.open({width: 768, height: 600, url: x.data});
                        }
                        else
                        {
                            location.href=x.data;
                        }
                        return false;
                    } else {
                        alert(x.Message);
                    }
                }
            });
            return false;
        });
    </script>
    @endpush
