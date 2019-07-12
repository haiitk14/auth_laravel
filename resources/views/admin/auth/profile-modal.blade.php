<div id="form-modal-profile" class="modal fade bd-example-modal-default" tabindex="-1" role="dialog" aria-labelledby="myExtraDefaultModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			    <h5 class="modal-title" id="modalLabel"><span>{{ __('Cập nhật tài khoản') }}</span></h5>
			    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			      <span aria-hidden="true">&times;</span>
			    </button>
			</div>
			<form name="frmUserProfileModal" method="POST" action="{{ route('admin.auth.profile') }}" class="submit-form">
				{{ csrf_field() }}
				<input type="hidden" name="id">
			    <div class="modal-body">
					<div class="form-group">
					    <label>{{ __('Tên') }}</label>
				    	<input type="text" name="name" class="form-control">
					</div>

					<div class="form-group">
					    <label>{{ __('Đổi mật khẩu') }} <div><span class="text-muted help-block">{{ __('Nếu bạn muốn bạn muốn đổi mật khẩu đăng nhập thì nhập ở đây') }}</span></div></label>
				    	<input type="text" name="password" class="form-control">
					</div>
			    </div>
			    <div class="modal-footer">
			    	<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Đóng') }}</button>
			        <button type="submit" id="btn-save-profile" class="btn btn-primary">{{ __('Cập nhật') }}</button>
			    </div>
			 </form>
        </div>
    </div>
</div>