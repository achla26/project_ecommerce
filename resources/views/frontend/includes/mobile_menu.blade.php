<div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
    <div class="ec-menu-title">
        <span class="menu_title">My Menu</span>
        <button class="ec-close">×</button>
    </div>
    <div class="ec-menu-inner">
        <div class="ec-menu-content">
            <ul>
                <li><a href="{{ route('index')}}">Home</a></li>
                
                <li><a href="javascript:void(0)">Categories</a>
                    <ul class="sub-menu">
                        @foreach ($sections as $section)
                        <li>
                            <a href="javascript:void(0)">{{ $section['name']}}</a>
                            @if (isset($section->categories) && !empty($section->categories))
                                <ul class="sub-menu">
                                    @foreach ($section->categories as $category)
                                    <li><a href="shop-left-sidebar-col-3.html">{{ $category->name ?? ''}}</a>
                                        @if (isset($category->subcategories) && !empty($category->subcategories))
                                            <ul class="sub-menu">
                                                @foreach ($category->subcategories as $sub_category)
                                                <li><a href="shop-left-sidebar-col-3.html">{{ $sub_category->name ?? ''}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <div class="header-res-lan-curr">
            <div class="header-top-lan-curr">
                <!-- Language Start -->
                {{-- <div class="header-top-lan dropdown">
                    <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Language <i
                            class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                    <ul class="dropdown-menu">
                        <li class="active"><a class="dropdown-item" href="#">English</a></li>
                        <li><a class="dropdown-item" href="#">Italiano</a></li>
                    </ul>
                </div> --}}
                <!-- Language End -->
                <!-- Currency Start -->
                <div class="header-top-curr dropdown">
                    <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i
                            class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                    <ul class="dropdown-menu">
                        <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                        <li><a class="dropdown-item" href="#">EUR €</a></li>
                    </ul>
                </div>
                <!-- Currency End -->
            </div>
            <!-- Social Start -->
            <div class="header-res-social">
                <div class="header-top-social">
                    <ul class="mb-0">
                        @if ($content['facebook'])
                            <li class="list-inline-item"><a class="hdr-facebook" href="{{ $content['facebook'] }}"><i class="fa-brands fa-facebook"></i></a></li>  
                        @endif
                        @if ($content['instagram'])
                            <li class="list-inline-item"><a class="hdr-instagram" href="{{ $content['instagram'] }}"><i class="fa-brands fa-instagram"></i></a></li>    
                        @endif
                        @if ($content['linkedin'])
                            <li class="list-inline-item"><a class="hdr-linkedin" href="{{ $content['linkedin'] }}"><i class="fa-brands fa-linkedin"></i></a></li>    
                        @endif
                        @if ($content['twitter'])
                            <li class="list-inline-item"><a class="hdr-twitter" href="{{ $content['twitter'] }}"><i class="fa-brands fa-twitter"></i></a></li>    
                        @endif
                        @if ($content['whatsapp'])
                            <li class="list-inline-item"><a class="hdr-whatsapp" href="{{ $content['whatsapp'] }}"><i class="fa-brands fa-whatsapp"></i></a></li>    
                        @endif
                    </ul>
                </div>
            </div>
            <!-- Social End -->
        </div>
    </div>
</div>