<template>
	<div class="nav-container primary-menu">
		<div class="mobile-topbar-header">
			<div>
				<img src="../../assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
			</div>
			<div>
				<h4 class="logo-text">Rukada</h4>
			</div>
			<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
			</div>
		</div>
		<nav class="navbar navbar-expand-xl w-100">
			<ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
				<li class="nav-item">
					<router-link to="/dai-ly/san-pham">
						<a class="nav-link" href="/dai-ly/san-pham">
							<div class="parent-icon"><i class="fa-solid fa-boxes-stacked"></i>
							</div>
							<div class="menu-title">Sản Phẩm</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/dai-ly/nhap-kho">
						<a class="nav-link" href="/dai-ly/nhap-kho">
							<div class="parent-icon"><i class="fa-solid fa-store"></i>
							</div>
							<div class="menu-title">Nhập Kho</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/dai-ly/don-hang">
						<a class="nav-link" href="/dai-ly/don-hang">
							<div class="parent-icon"><i class="fa-solid fa-box-archive"></i>
							</div>
							<div class="menu-title">Đơn Hàng</div>
						</a>
					</router-link>
				</li>
			</ul>
		</nav>
	</div>
</template>
<script>
import axios from 'axios';

export default {
	
}
</script>
<style></style>