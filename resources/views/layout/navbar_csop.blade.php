<aside class="main-sidebar">
	<section class="sidebar position-relative">	
		<div class="multinav">
		<div class="multinav-scroll" style="height: 100%;">	
			<ul class="sidebar-menu" data-widget="tree">	
                <li class="header">Menu LKH</li>
                <li class="{{ $page == 'checksheet-op-form' ? 'active' : '' }}">
                    <a href="{{route('checksheet-op-form')}}">
                        <i class="fa fa-file-excel-o"><span class="path1"></span><span class="path2"></span></i>
                        <span>Input Checksheet</span>
                    </a>
                </li>
                <li class="{{ $page == 'checksheet-op-data' ? 'active' : '' }}">
                    <a href="{{route('checksheet-op-data')}}">
                        <i class="ti-printer"><span class="path1"></span><span class="path2"></span></i>
                        <span>Data Checksheet</span>
                    </a>
                </li>
			</ul>
		</div>
	  </div>
	</section>
</aside>
