	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<div class="pull-right"><button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i></button></div>
			<h4 class="modal-title"></h4>
		  </div>
		  <div class="modal-body">
		  </div>
		  <div class="modal-footer">
		  </div>
		</div>
	  </div>
	</div>
	<div class="siteFooter">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<small><strong>CÔNG TY CỔ PHẦN CUNG CẤP</strong> - MST: 0314609089</small><br>
					<small>Trụ sở chính: 104 Hoàng Diệu 2, P. Linh Chiểu, Q. Thủ Đức, Tp. HCM</small><br>
					<small>Hotline: <a href="tel:0903706288">0903706288</a> - Email: <a href="mailto:contact@cungcap.net">contact@cungcap.net</a></small><br>
					<small>Cung Cấp. Net không chịu bất kỳ trách nhiệm nào từ các thông tin bởi người dùng đăng lên</small>
				</div>
				<div class="col-md-4">
					<ul class="listFooter">
						<li><a href="http://cungcap.net/vi/gioi-thieu"><i class="glyphicon glyphicon-info-sign"></i> Giới thiệu</a></li>
						<li><a href=""><i class="glyphicon glyphicon-envelope"></i> Liên hệ</a></li>
						<li><a href="http://cungcap.net/vi/dieu-khoan-su-dung"><i class="glyphicon glyphicon-chevron-right"></i> Điều khoản sử dụng</a></li>
						<li><a href="http://cungcap.net/vi/chinh-sach-bao-mat"><i class="glyphicon glyphicon-chevron-right"></i> Chính sách bảo mật</a></li>
						<li><a href="http://cungcap.net/vi/quy-che-hoat-dong"><i class="glyphicon glyphicon-chevron-right"></i> Quy chế hoạt động</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul class="listFooter">
						<li><a href="http://www.facebook.com/cungcap.net" rel="nofollow"><i class="fa fa-facebook-square"></i> Facebook</a></li>
						<li><a href="https://plus.google.com/u/0/113087254631418458221" rel="nofollow"><i class="fa fa-google-plus"></i> Google+</a></li>
						<li><a href="https://www.youtube.com/user/fuzifim" rel="nofollow"><i class="fa fa-youtube-play"></i> Youtube</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<a href="#" id="back-to-top" title="Back to top"><i class="glyphicon glyphicon-chevron-up"></i></a>
	<div class="footerFixel">
		<div class="footerFixelIcon">
			<div class="btn-group btn-group-sm" role="group" aria-label=>
			</div>
			@if(!empty($channel['nameFanpageFacebook']))
				<style>.btnMessage{padding-right:18px !important;}.btnMessage .badge{top:0px;background:#D9534F;right:0px;position:absolute;padding:2px 5px;color:#fff;}.fb-livechat, .fb-widget{display: none}.ctrlq.fb-close{position: fixed; right: 24px; cursor: pointer}.fb-widget{background: #fff; z-index: 1000; position: fixed; width: 360px; height: 435px; overflow: hidden; opacity: 0; bottom: 0; right: 24px; border-radius: 6px; -o-border-radius: 6px; -webkit-border-radius: 6px; box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)}.fb-credit{text-align: center; margin-top: 8px}.fb-credit a{transition: none; color: #bec2c9; font-family: Helvetica, Arial, sans-serif; font-size: 12px; text-decoration: none; border: 0; font-weight: 400}.ctrlq.fb-overlay{z-index: 0; position: fixed; height: 100vh; width: 100vw; -webkit-transition: opacity .4s, visibility .4s; transition: opacity .4s, visibility .4s; top: 0; left: 0; background: rgba(0, 0, 0, .05); display: none}.ctrlq.fb-close{z-index: 4; padding: 0 6px; background: #365899; font-weight: 700; font-size: 11px; color: #fff; margin: 8px; border-radius: 3px}.ctrlq.fb-close::after{content: "X"; font-family: sans-serif}.bubble-msg{width: 120px; left: -140px; top: 5px; position: relative; background: rgba(59, 89, 152, .8); color: #fff; padding: 5px 8px; border-radius: 8px; text-align: center; font-size: 13px;}</style><div class="fb-livechat"> <div class="ctrlq fb-overlay"></div><div class="fb-widget"> <div class="ctrlq fb-close"></div><div class="fb-page" data-href="https://www.facebook.com/{{$channel['nameFanpageFacebook']}}" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"> </div></div></div>
			@endif
		</div>
		<div class="row footerFixelCopyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
						<div class="channelDisplayTextFooter">{!!$channel['info']->channel_name!!} ©  {{date('Y')}}</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-4">
						<div class="pull-right pull-right-md pull-right-lg">
							<a href=""><i class="glyphicon glyphicon-ok"></i> Cung Cấp</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	Theme::asset()->container('footer')->add('custom', 'js/custom.js');
	?>