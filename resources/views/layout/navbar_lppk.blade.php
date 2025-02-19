<aside class="main-sidebar">
	<section class="sidebar position-relative">	
		<div class="multinav">
		<div class="multinav-scroll" style="height: 100%;">	
			<ul class="sidebar-menu" data-widget="tree">	
                <li class="header">Menu LKH</li>
                <li class="{{ $page == 'lppk-input' ? 'active' : '' }}">
                    <a href="{{route('lppk-input')}}">
                        <i class="fa fa-file-excel-o"><span class="path1"></span><span class="path2"></span></i>
                        <span>Input LPPK</span>
                    </a>
                </li>
                <li class="{{ $page == 'lppk-monitor' ? 'active' : '' }}">
                    <a href="{{route('lppk-monitor')}}">
                        <i class="ti-printer"><span class="path1"></span><span class="path2"></span></i>
                        <span>Monitoring LPPK</span>
                    </a>
                </li>
                <li class="{{ $page == 'lppk-logbook' ? 'active' : '' }}">
                    <a href="{{route('lppk-logbook')}}">
                        <i class="ti-printer"><span class="path1"></span><span class="path2"></span></i>
                        <span>Logbook LPPK</span>
                    </a>
                </li>
			</ul>
		</div>
	  </div>
	</section>
</aside>
