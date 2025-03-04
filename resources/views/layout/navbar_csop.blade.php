<aside class="main-sidebar">
	<section class="sidebar position-relative">	
		<div class="multinav">
		<div class="multinav-scroll" style="height: 100%;">	
			<ul class="sidebar-menu" data-widget="tree">	
                <li class="header">Menu Checksheet</li>
                @if(auth()->user()->position_id == 6 || auth()->user()->section_id == 3)
                    <li class="{{ $page == 'checksheet-op-data' ? 'active' : '' }}">
                        <a href="{{route('checksheet-op-data')}}">
                            <i class="icon-Clipboard-check"><span class="path1"></span><span class="path2"></span></i>
                            <span>Data Checksheet</span>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->position_id == 4 || auth()->user()->section_id == 2)
                    <li class="{{ $page == 'checksheet-op-approve' ? 'active' : '' }}">
                        <a href="{{route('checksheet-op-approve')}}">
                            <i class="icon-Double-check"><span class="path1"></span><span class="path2"></span></i>
                            <span>Approval Checksheet</span>
                        </a>
                    </li>
                @endif
			</ul>
		</div>
	  </div>
	</section>
</aside>
