@extends('header')
<style>
    img{
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
</style>
@section('container')
    <div class="colorlib-wrap">
        <div class="container">

            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-9">
                            {!! $tour->description !!}
                        </div>
                    </div>
                </div>
                <!-- sidebar -->
                <div class="col-md-3">
						<div class="sidebar-wrap">
							<div class="side search-wrap animate-box">
								<h3 class="sidebar-heading">Đặt phòng ngay</h3>
								<form method="post" class="colorlib-form">
				              	<div class="row">
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="date">ngày nhận phòng:</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
				                      <input type="text" id="date" class="form-control date" placeholder="Check-in date">
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="date">ngày trả phòng:</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
				                      <input type="text" id="date" class="form-control date" placeholder="Check-out date">
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="guests">Guest</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <select name="people" id="people" class="form-control">
				                        <option value="#">1</option>
				                        <option value="#">2</option>
				                        <option value="#">3</option>
				                        <option value="#">4</option>
				                        <option value="#">5+</option>
				                      </select>
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-12">
				                  <input type="submit" name="submit" id="submit" value="Find Hotel" class="btn btn-primary btn-block">
				                </div>
				              </div>
				           	 </form>
							</div>

						<!-- 	<div class="side animate-box">
								<div class="row">
									<div class="col-md-12">
										<h3 class="sidebar-heading">Price Range</h3>
										<form method="post" class="colorlib-form-2">
						              	<div class="row">
						                <div class="col-md-6">
						                  <div class="form-group">
						                    <label for="guests">Price from:</label>
						                    <div class="form-field">
						                      <i class="icon icon-arrow-down3"></i>
						                      <select name="people" id="people" class="form-control">
						                        <option value="#">1</option>
						                        <option value="#">200</option>
						                        <option value="#">300</option>
						                        <option value="#">400</option>
						                        <option value="#">1000</option>
						                      </select>
						                    </div>
						                  </div>
						                </div>
						                <div class="col-md-6">
						                  <div class="form-group">
						                    <label for="guests">Price to:</label>
						                    <div class="form-field">
						                      <i class="icon icon-arrow-down3"></i>
						                      <select name="people" id="people" class="form-control">
						                        <option value="#">2000</option>
						                        <option value="#">4000</option>
						                        <option value="#">6000</option>
						                        <option value="#">8000</option>
						                        <option value="#">10000</option>
						                      </select>
						                    </div>
						                  </div>
						                </div>
						              </div>
						            </form>
					            </div>
								</div>
							</div> -->
						<div class="side animate-box">
							<div class="row">
								<div class="col-md-12">
									<h3 class="sidebar-heading">Bản đồ</h3>
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0966890657296!2d105.7800937143782!3d21.02881689315342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455f9bdf0e1c7%3A0x26caee8e7662dd9b!2zRlBUIEFwdGVjaCBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1584698908745!5m2!1svi!2s"  height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
								</div>
							</div>
						</div>	
<!-- 							<div class="side animate-box">
								<div class="row">
									<div class="col-md-12">
										<h3 class="sidebar-heading">Review Rating</h3>
										<form method="post" class="colorlib-form-2">
										   <div class="form-check">
												<input type="checkbox" class="form-check-input" id="exampleCheck1">
												<label class="form-check-label" for="exampleCheck1">
													<p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
												</label>
										   </div>
										   <div class="form-check">
										      <input type="checkbox" class="form-check-input" id="exampleCheck1">
										      <label class="form-check-label" for="exampleCheck1">
										    	   <p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
										      </label>
										   </div>
										   <div class="form-check">
										      <input type="checkbox" class="form-check-input" id="exampleCheck1">
										      <label class="form-check-label" for="exampleCheck1">
										      	<p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
										     </label>
										   </div>
										   <div class="form-check">
										      <input type="checkbox" class="form-check-input" id="exampleCheck1">
										      <label class="form-check-label" for="exampleCheck1">
										      	<p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
										     </label>
										   </div>
										   <div class="form-check">
										      <input type="checkbox" class="form-check-input" id="exampleCheck1">
										      <label class="form-check-label" for="exampleCheck1">
										      	<p class="rate"><span><i class="icon-star-full"></i></span></p>
										     </label>
										   </div>
										</form>
									</div>
								</div>
							</div> -->
							<div class="side animate-box">
								<div class="row">
									<div class="col-md-12">
										<h3 class="sidebar-heading">Địa danh khác</h3>
										<ul>
											<li><a href="">Phú Quốc</a></li>
											<li><a href="">Hải Phòng</a></li>
											<li><a href="">Lạng Sơn</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="side animate-box">
								<div class="row">
									<div class="col-md-12">
										<h3 class="sidebar-heading">Tin tức</h3>
										<ul>
											<li><a href="">Blog 1</a></li>
											<li><a href="">Blog 2</a></li>
											<li><a href="">Blog 3</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="side animate-box">
								<div class="row">
									<div class="col-md-12">
										<h3 class="sidebar-heading">Khuyến mãi đặc biệt</h3>
										<img src="../images/00097-300x600.gif">
									</div>
								</div>
							</div>
						</div>
					</div>
                <!-- endsidebar -->
            </div>

            <a class="btn btn-info" href="{{route('booktour',['id'=>$tour->id])}}"> Book tour</a>
        </div>
    </div>

    @endsection
