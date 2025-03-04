<aside class="main-sidebar">
	<section class="sidebar position-relative">	
		<div class="multinav">
		<div class="multinav-scroll" style="height: 100%;">	
			<ul class="sidebar-menu" data-widget="tree">	
                <li class="header">Menu Master User</li>
                <li class="{{ $page == 'master-user-index' ? 'active' : '' }}">
                    <a href="{{route('master-user-index')}}">
                        <i class="icon-Adress-book1"><span class="path1"></span><span class="path2"></span></i>
                        <span>Data User</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i span class="icon-Layout-grid"><span class="path1"></span><span
                                class="path2"></span></i>
                        <span>Master Data</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu {{ $page == 'master-user-organization' || $page == 'master-user-division' || $page == 'master-user-department' || $page == 'master-user-section' ? 'active' : '' }}">
                        <li class="{{ $page == 'master-user-organization' ? 'active' : '' }}"><a
                                href="{{ route('master-user-organization') }}"><i class="icon-Commit"><span
                                        class="path1"></span><span class="path2"></span></i>Organisasi</a>
                        </li>
                        <li class="{{ $page == 'master-user-division' ? 'active' : '' }}"><a
                                href="{{ route('master-user-division') }}"><i class="icon-Commit"><span
                                        class="path1"></span><span class="path2"></span></i>Divisi</a></li>
                        <li class="{{ $page == 'master-user-department' ? 'active' : '' }}"><a
                                href="{{ route('master-user-department') }}"><i class="icon-Commit"><span
                                        class="path1"></span><span class="path2"></span></i>Departemen</a>
                        </li>
                        <li class="{{ $page == 'master-user-section' ? 'active' : '' }}"><a
                                href="{{ route('master-user-section') }}"><i class="icon-Commit"><span
                                        class="path1"></span><span class="path2"></span></i>Seksi</a>
                        </li>
                        <li class="{{ $page == 'master-user-position' ? 'active' : '' }}"><a
                                href="{{ route('master-user-position') }}"><i class="icon-Commit"><span
                                        class="path1"></span><span class="path2"></span></i>Posisi</a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="{{ $page == 'master-user-organization' ? 'active' : '' }}">
                    <a href="#">
                        <i class="icon-Unlock"><span class="path1"></span><span class="path2"></span></i>
                        <span>Role Permission</span>
                    </a>
                </li> --}}


			</ul>
		</div>
	  </div>
	</section>
</aside>
