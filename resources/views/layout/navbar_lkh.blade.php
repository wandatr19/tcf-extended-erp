<aside class="main-sidebar">
	<section class="sidebar position-relative">	
		<div class="multinav">
		<div class="multinav-scroll" style="height: 100%;">	
			<ul class="sidebar-menu" data-widget="tree">	
                <li class="header">Menu LKH</li>
                <li class="{{ $page == 'lkh-input' ? 'active' : '' }}">
                    <a href="{{route('lkh-input')}}">
                        <i class="icon-Stamp"><span class="path1"></span><span class="path2"></span></i>
                        <span>Input LKH Stamping</span>
                    </a>
                </li>
                <li class="{{ $page == 'lkh-monitor' ? 'active' : '' }}">
                    <a href="{{route('lkh-monitor')}}">
                        <i class="icon-Laptop"><span class="path1"></span><span class="path2"></span></i>
                        <span>Monitoring</span>
                    </a>
                </li>
			</ul>
		</div>
	  </div>
	</section>
</aside>
