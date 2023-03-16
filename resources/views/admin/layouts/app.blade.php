<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="{{ mix('/css/admin/vendor.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/admin/app.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css" rel="stylesheet">

    {{-- You can put page wise internal css style in styles section --}}
    @stack('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body dir="rtl" class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        {{-- Header --}}
        <header class="main-header">

            {{--  Logo  --}}
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <span class="logo-mini">{{ config('app.name') }}</span>
                <span class="logo-lg">{{ config('app.name') }}</span>
            </a>

            {{--  Header Navbar  --}}
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        {{--  User Account Menu  --}}
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('images/admin-avatar.png') }}" class="user-image" alt="Admin avatar">

                                <span class="hidden-xs">{{ Auth::guard('admin')->user()->name }}</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="{{ asset('images/admin-avatar.png') }}" class="img-circle" alt="Admin avatar">

                                    <p>{{ Auth::guard('admin')->user()->name }}</p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('admin.profile') }}" class="btn btn-default btn-flat">
                                            Profile
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            {{--  Sidebar  --}}
            <section class="sidebar">

                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('images/admin-avatar.png') }}" class="img-circle" alt="Admin avatar">
                    </div>

                    <div class="pull-left info">
                        <p>{{ Auth::guard('admin')->user()->name }}</p>
                    </div>
                </div>

                {{--  Sidebar Menu  --}}
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">القائمة</li>

                    <li {{ $page == 'dashboard' ? ' class=active' : '' }}>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-building"></i>
                            <span>لوحة التحكم</span>
                        </a>
                    </li>

                    <li  class="treeview {{(($page == 'patients') || ($page =='employees') || ($page =='swipes')|| ($page =='shots'))  ? 'menu-open' : '' }}" style="height: auto;">
                        <a href="#">
                            <i class="fa  fa-users"></i> 
                            <span>إدارة المستخدمين</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" style="display: {{(($page == 'patients') || ($page =='employees') || ($page =='swipes') || ($page =='shots')) ? 'block' : 'none' }}">
                            <li  style="display: {{(Auth::id() == 1 ) ? 'block' : 'none' }}" {{ $page == 'employees' ? ' class=active' : '' }}>   
                                <a href="{{ route('admin.employees.index') }}">
                                    <i class="fa fa-users "></i>
                                    <span>  الموظفين</span>
                                </a>
                            </li>                        
                            <li {{ $page == 'patients' ? ' class=active' : '' }}>
                                 <a href="{{ route('admin.patients.index') }}">
                                    <i class="fa fa-heart-o"></i>
                                    <span>  الحالات </span>
                                </a>
                            </li>
                            <li {{ $page == 'swipes' ? ' class=active' : '' }}>
                                 <a href="{{ route('admin.swipes.index') }}">
                                    <i class="fa fa-heart-o"></i>
                                    <span> نتائج المسحات </span>
                                </a>
                            </li>
                            <li {{ $page == 'shots' ? ' class = active' : '' }}>
                                <a href="{{ route('admin.shots.index') }}">
                                   <i class="fa fa-heart-o"></i>
                                   <span> التطعيمات  </span>
                               </a>
                           </li>
                           <li {{ $page == 'vaccines' ? ' class = active' : '' }}>
                            <a href="{{ route('admin.vaccines.index') }}">
                               <i class="fa fa-needle"></i>
                               <span> اللقاحات </span>
                           </a>
                       </li>
                        </ul>
                    </li>


                    <li  class="treeview {{(($page == 'centers') || ($page =='posts')) ? 'menu-open' : '' }}" style="height: auto;">
                        <a href="#">
                            <i class="fa  fa-cogs"></i> 
                            <span>الخدمات العامة</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" style="display: {{(($page == 'centers') || ($page =='posts')) ? 'block' : 'none' }}">
                            <li {{ $page == 'posts' ? ' class=active' : '' }}>   
                                <a href="{{ route('admin.posts.index') }}">
                                    <i class="fa fa-sticky-note-o "></i>
                                    <span>  المنشورات</span>
                                </a>
                            </li>                        
                            <li {{ $page == 'centers' ? ' class=active' : '' }}>
                                 <a href="{{ route('admin.centers.index') }}">
                                    <i class="fa fa-hospital-o"></i>
                                    <span>  مركز التطعيم</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>


        <div class="content-wrapper">
            {{--  Page header  --}}
            <section class="content-header">
                <h1>
                    @yield('title')
                </h1>
            </section>

            {{--  Page Content  --}}
            <section class="content container-fluid">
                @if ($errors->all())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                @yield('content')
            </section>
        </div>

       
    </div>

    <script src="{{ mix('/js/admin/vendor.js') }}"></script>
    <script src="{{ mix('/js/admin/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>

    @if (session('message'))
        <script>
            showNotice("{{ session('type') }}", "{{ session('message') }}");
        </script>
    @endif
    <script type="text/javascript">
$(document).ready( function () {
   $('#table').DataTable( {
        "language": {
    "emptyTable": "ليست هناك بيانات متاحة في الجدول",
    "loadingRecords": "جارٍ التحميل...",
    "lengthMenu": "أظهر _MENU_ مدخلات",
    "zeroRecords": "لم يعثر على أية سجلات",
    "info": "عرض _START_ إلى _END_ من أصل _TOTAL_ ",
    "infoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
    "infoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
    "search": "ابحث:",
    "paginate": {
        "first": "الأول",
        "previous": "السابق",
        "next": "التالي",
        "last": "الأخير"
    },
    "aria": {
        "sortAscending": ": تفعيل لترتيب العمود تصاعدياً",
        "sortDescending": ": تفعيل لترتيب العمود تنازلياً"
    },
    "select": {
        "rows": {
            "_": "%d قيمة محددة",
            "1": "1 قيمة محددة"
        },
        "cells": {
            "1": "1 خلية محددة",
            "_": "%d خلايا محددة"
        },
        "columns": {
            "1": "1 عمود محدد",
            "_": "%d أعمدة محددة"
        }
    },
    "buttons": {
        "print": "طباعة",
        "copyKeys": "زر <i>ctrl<\/i> أو <i>⌘<\/i> + <i>C<\/i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
        "copySuccess": {
            "_": "%d قيمة نسخت",
            "1": "1 قيمة نسخت"
        },
        "pageLength": {
            "-1": "اظهار الكل",
            "_": "إظهار %d أسطر"
        },
        "collection": "مجموعة",
        "copy": "نسخ",
        "copyTitle": "نسخ إلى الحافظة",
        "csv": "CSV",
        "excel": "Excel",
        "pdf": "PDF",
        "colvis": "إظهار الأعمدة",
        "colvisRestore": "إستعادة العرض"
    },
    "autoFill": {
        "cancel": "إلغاء",
        "fill": "املأ جميع الحقول بـ <i>%d&lt;\\\/i&gt;<\/i>",
        "fillHorizontal": "تعبئة الحقول أفقيًا",
        "fillVertical": "تعبئة الحقول عموديا"
    },
    "searchBuilder": {
        "add": "اضافة شرط",
        "clearAll": "ازالة الكل",
        "condition": "الشرط",
        "data": "المعلومة",
        "logicAnd": "و",
        "logicOr": "أو",
        "title": [
            "منشئ البحث"
        ],
        "value": "القيمة",
        "conditions": {
            "date": {
                "after": "بعد",
                "before": "قبل",
                "between": "بين",
                "empty": "فارغ",
                "equals": "تساوي",
                "not": "ليس",
                "notBetween": "ليست بين",
                "notEmpty": "ليست فارغة"
            },
            "number": {
                "between": "بين",
                "empty": "فارغة",
                "equals": "تساوي",
                "gt": "أكبر من",
                "gte": "أكبر وتساوي",
                "lt": "أقل من",
                "lte": "أقل وتساوي",
                "not": "ليست",
                "notBetween": "ليست بين",
                "notEmpty": "ليست فارغة"
            },
            "string": {
                "contains": "يحتوي",
                "empty": "فاغ",
                "endsWith": "ينتهي ب",
                "equals": "يساوي",
                "not": "ليست",
                "notEmpty": "ليست فارغة",
                "startsWith": " تبدأ بـ "
            }
        },
        "button": {
            "0": "فلاتر البحث",
            "_": "فلاتر البحث (%d)"
        },
        "deleteTitle": "حذف فلاتر"
    },
    "searchPanes": {
        "clearMessage": "ازالة الكل",
        "collapse": {
            "0": "بحث",
            "_": "بحث (%d)"
        },
        "count": "عدد",
        "countFiltered": "عدد المفلتر",
        "loadMessage": "جارِ التحميل ...",
        "title": "الفلاتر النشطة"
    },
    "infoThousands": ",",
    "datetime": {
        "previous": "السابق",
        "next": "التالي",
        "hours": "الساعة",
        "minutes": "الدقيقة",
        "seconds": "الثانية",
        "unknown": "-",
        "amPm": [
            "صباحا",
            "مساءا"
        ],
        "weekdays": [
            "الأحد",
            "الإثنين",
            "الثلاثاء",
            "الأربعاء",
            "الخميس",
            "الجمعة",
            "السبت"
        ],
        "months": [
            "يناير",
            "فبراير",
            "مارس",
            "أبريل",
            "مايو",
            "يونيو",
            "يوليو",
            "أغسطس",
            "سبتمبر",
            "أكتوبر",
            "نوفمبر",
            "ديسمبر"
        ]
    },
    "editor": {
        "close": "إغلاق",
        "create": {
            "button": "إضافة",
            "title": "إضافة جديدة",
            "submit": "إرسال"
        },
        "edit": {
            "button": "تعديل",
            "title": "تعديل السجل",
            "submit": "تحديث"
        },
        "remove": {
            "button": "حذف",
            "title": "حذف",
            "submit": "حذف",
            "confirm": {
                "_": "هل أنت متأكد من رغبتك في حذف السجلات %d المحددة؟",
                "1": "هل أنت متأكد من رغبتك في حذف السجل؟"
            }
        },
        "error": {
            "system": "حدث خطأ ما"
        },
        "multi": {
            "title": "قيم متعدية",
            "restore": "تراجع"
        }
    },
    "processing": "جارٍ المعالجة..."
} 
    } );
} );
</script>
    {{-- You can put page wise javascript in scripts section --}}
    @stack('scripts')
</body>
</html>