<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="{{route('home')}}">
                    <i class="icon-dashboard"></i>
                    <span>صفحه اصلی</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span>مدیریت کاربران</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('user.index')}}">لیست کاربران</a></li>
                    <li><a class="" href="{{route('user.create')}}">افزودن کاربر جدید</a></li>
                    <li><a class="" href="{{route('role.index')}}">لیست سطوح دسترسی</a></li>
                    <li><a class="" href="{{route('role.create')}}">افزودن سطح دسترسی </a></li>
                    <li><a class="" href="{{route('permission.index')}}">لیست دسترسی ها</a></li>
                    <li><a class="" href="{{route('permission.create')}}">افزودن دسترسی جدید</a></li>
                </ul>
            </li>
            @if(auth()->user()->level=='admin')
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-book"></i>
                        <span>مدیریت محصولات</span>
                        <span class="arrow"></span>
                    </a>

                    <ul class="sub">
                        <li><a class="" href="{{route('category.index')}}">لیست دسته بندی ها</a></li>
                        <li><a class="" href="{{route('category.create')}}">افزودن دسته بندی جدید</a></li>
                        {{--@can('pro_list')--}}
                        <li><a class="" href="{{route('product.index')}}">لیست محصولات</a></li>
                        {{--@endcan--}}
                        {{--@can('pro_edit')--}}
                        <li><a class="" href="{{route('product.create')}}">افزودن محصول جدید</a></li>
                        {{--@endcan--}}
                        {{--@can('pro_delete')--}}
                        <li><a class="" href="{{route('product.create')}}">حذف محصول</a></li>
                        {{--@endcan--}}
                    </ul>

                </li>
            @endif
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span>مدیریت فیلتر ها</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub">
                    <li><a class="" href="{{route('filter.index')}}">لیست فیلتر ها</a></li>
                    <li><a class="" href="{{route('filter.create')}}">افزودن فیلتر جدید</a></li>
                </ul>

            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span>مدیریت اسلایدشو</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub">
                    <li><a class="" href="{{route('slider.index')}}">لیست اسلاید ها</a></li>
                    <li><a class="" href="{{route('slider.create')}}">افزودن اسلاید جدید</a></li>
                </ul>

            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->