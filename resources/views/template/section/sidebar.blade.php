<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="index.html">
            <img src="images/logo.png" class="img-fluid" alt="">
            <span>Website</span>
        </a>
        <div class="iq-menu-bt-sidebar">
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="ri-more-fill"></i></div>
                    <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Dashboard</span></li>

                <li class="">
                    <a href="{{ url('dashboard') }}" class="iq-waves-effect"><i class="ri-home-8-fill"></i><span>
                            Dashboard</span></a>
                </li>

                {{-- theme --}}

                <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Theme </span></li>
                <li>
                    <a href="#mailbox" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                            class="ri-mail-open-fill"></i><span>Theme</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="mailbox" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="{{ url('header') }}"><i class="ri-inbox-fill"></i>Header</a></li>
                        <li><a href="{{ url('content') }}"><i class="ri-edit-2-fill"></i>Content</a></li>
                        <li><a href="{{ url('footer') }}"><i class="ri-edit-2-fill"></i>Footer</a></li>
                    </ul>
                </li>

                {{-- media --}}

                <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Media</span></li>
                <li>
                    <a href="#mailbox1" class="iq-waves-effect collapsed" data-toggle="collapse"
                        aria-expanded="false"><i class="ri-mail-open-fill"></i><span>Media</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="mailbox1" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="{{ route('media-gambar.index') }}"><i class="ri-inbox-fill"></i>Gambar</a></li>
                        <li><a href="{{ route('media-video.index') }}"><i class="ri-edit-2-fill"></i>Video</a></li>
                        <li><a href="{{ route('media-dokumen.index') }}"><i class="ri-edit-2-fill"></i>Dokumen</a></li>
                    </ul>
                </li>

                {{-- post --}}

                <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Post</span></li>
                <li>
                    <a href="#mailbox2" class="iq-waves-effect collapsed" data-toggle="collapse"
                        aria-expanded="false"><i class="fa fa-pencil-square-o"></i><span>Post</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="mailbox2" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="{{ url('berita') }}"><i class="fa fa-newspaper-o"></i>Berita</a></li>
                        <li><a href="{{ url('informasi') }}"><i class="fa fa-bullhorn"></i>Informasi</a></li>
                        <li><a href="{{ url('publikasi') }}"><i class="ri-edit-2-fill"></i>Publikasi</a></li>
                        <li><a href="{{ url('artikel') }}"><i class="fa fa-pencil-square-o"></i>Artikel</a></li>
                    </ul>
                </li>


                {{-- anggota --}}

                <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Anggota</span></li>
                <li>
                    <a href="#mailbox3" class="iq-waves-effect collapsed" data-toggle="collapse"
                        aria-expanded="false"><i class="ri-group-fill"></i><span>Anggota</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="mailbox3" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="{{ url('struktural') }}"><i class="ri-user-3-fill"></i>Struktural</a></li>
                        <li><a href="{{ url('asn') }}"><i class="ri-user-3-fill"></i>Asn</a></li>
                        <li><a href="{{ url('pptk') }}"><i class="ri-user-3-fill"></i>Pptk</a></li>
                        <li><a href="{{ url('honorer') }}"><i class="ri-user-3-fill"></i>Honorer/Kontrak</a></li>
                    </ul>
                </li>

                {{-- master --}}
                <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Key Generate </span></li>
                <li>
                    <a href="#mailbox90" class="iq-waves-effect collapsed" data-toggle="collapse"
                        aria-expanded="false"><i class="ri-mail-open-fill"></i><span>Generate</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="mailbox90" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="{{ url('generate') }}"><i class="ri-inbox-fill"></i>Key</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
