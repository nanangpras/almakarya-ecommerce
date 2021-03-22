@extends('backend.layouts.member')
@section('content')
<div class="container-fluid">
				
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">Akun Saya</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.html">Member</a></li>
            <li><a href="#"><span>Layanan</span></a></li>
            <li class="active"><span>Akun Saya</span></li>
          </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->
    

				<!-- Row -->
				<div class="row">
					<div class="col-lg-3 col-xs-12">
						<div class="panel panel-default card-view  pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body  pa-0">
									<div class="profile-box">
										<div class="profile-cover-pic">
											
											{{-- <div class="fileupload btn btn-default">
												<span class="btn-text">edit</span>
												<input class="upload" type="file">
											</div> --}}
											<div class="profile-image-overlay" style="background-color:#77C0B4 "></div>
										</div>
										<div class="profile-info text-center">
											<div class="profile-img-wrap">
												<img class="inline-block mb-10" src="{{url('backend/img/member_avatar.png')}}" alt="user"/>
												{{-- <div class="fileupload btn btn-default">
													<span class="btn-text">edit</span>
													<input class="upload" type="file">
												</div> --}}
											</div>	
											<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-success">{{ Auth::user()->name}}</h5>
											<h6 class="block capitalize-font pb-20">{{ Auth::user()->email}}</h6>
										</div>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div  class="panel-body pb-0">
									<div  class="tab-struct custom-tab-1">
										<ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
											<li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span>Akun Saya</span></a></li>
											<li  role="presentation" class="next"><a aria-expanded="true"  data-toggle="tab" role="tab" id="follo_tab_8" href="#follo_8"><span>Alamat Saya<span class="inline-block"></span></span></a></li>
											{{-- <li role="presentation" class=""><a  data-toggle="tab" id="photos_tab_8" role="tab" href="#photos_8" aria-expanded="false"><span>photos</span></a></li>
											<li role="presentation" class=""><a  data-toggle="tab" id="earning_tab_8" role="tab" href="#earnings_8" aria-expanded="false"><span>earnings</span></a></li>
											<li role="presentation" class=""><a  data-toggle="tab" id="settings_tab_8" role="tab" href="#settings_8" aria-expanded="false"><span>settings</span></a></li> --}}
											{{-- <li class="dropdown" role="presentation">
												<a  data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop_7" href="#" aria-expanded="false"><span>More</span> <span class="caret"></span></a>
												<ul id="myTabDrop_7_contents"  class="dropdown-menu">
													<li class=""><a  data-toggle="tab" id="dropdown_13_tab" role="tab" href="#dropdown_13" aria-expanded="true">About</a></li>
													<li class=""><a  data-toggle="tab" id="dropdown_14_tab" role="tab" href="#dropdown_14" aria-expanded="false">Followings</a></li>
													<li class=""><a  data-toggle="tab" id="dropdown_15_tab" role="tab" href="#dropdown_15" aria-expanded="false">Likes</a></li>
													<li class=""><a  data-toggle="tab" id="dropdown_16_tab" role="tab" href="#dropdown_16" aria-expanded="false">Reviews</a></li>
												</ul>
											</li> --}}
										</ul>
										<div class="tab-content" id="myTabContent_8">
											<div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
												<div class="row">
													<div class="col-lg-12">
														<div class="">
															<div class="panel-wrapper collapse in">
																<div class="panel-body pa-0">
																	<div class="col-sm-12 col-xs-12">
																		<div class="form-wrap">
																			<form action="#">
																				<div class="form-body overflow-hide">
																					<div class="form-group">
																						<label class="control-label mb-10" for="exampleInputuname_01">Name</label>
																						<div class="input-group">
																							<div class="input-group-addon"><i class="icon-user"></i></div>
																							<input type="text" class="form-control" id="exampleInputuname_01" value="{{ Auth::user()->name}}">
																						</div>
																					</div>
																					<div class="form-group">
																						<label class="control-label mb-10" for="exampleInputEmail_01">Email address</label>
																						<div class="input-group">
																							<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
																							<input type="email" class="form-control" id="exampleInputEmail_01" value="{{ Auth::user()->email}}" readonly>
																						</div>
																					</div>
																					<div class="form-group">
																						<label class="control-label mb-10" for="exampleInputContact_01">Contact number</label>
																						<div class="input-group">
																							<div class="input-group-addon"><i class="icon-phone"></i></div>
																							<input type="email" class="form-control" id="exampleInputContact_01" value="{{ Auth::user()->phone}}">
																						</div>
																					</div>
																				</div>
																				<div class="form-actions mt-10">			
																					<button type="submit" class="btn btn-success mr-10 mb-30">Perbarui Akun</button>
																				</div>				
																			</form>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												
											</div>
											
											<div  id="follo_8" class="tab-pane fade" role="tabpanel">
												<div class="row">
													<div class="col-lg-12">
														<div class="followers-wrap">
															<ul class="followers-list-wrap">
																<li class="follow-list">
																	<div class="follo-body">
																		<div class="follo-data">
																			<img class="user-img img-circle"  src="{{url('backend/img/member_avatar.jpg')}}" alt="user"/>
																			<div class="user-data">
																				<span class="name block capitalize-font">Alamat Pengiriman Saya</span>
																				<span class="time block truncate txt-grey">{{ Auth::user()->address}}</span>
																			</div>
																			<button class="btn btn-success pull-right btn-xs fixed-btn">Edit</button>
																			<div class="clearfix"></div>
																		</div>
																		
																	</div>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
							
					</div>
				</div>
				<!-- /Row -->   
				
				

</div>
@endsection()
