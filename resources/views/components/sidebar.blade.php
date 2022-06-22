   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
           <div class="sidebar-brand-text mx-3">UTE Đà Nẵng</div>
       </a>

       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <!-- Nav Item - Dashboard -->
       @can('admin')
       <li class="nav-item active">
           <a class="nav-link" href="{{route('admin.home')}}">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Thống kê</span></a>
       </li>
       @endcan

       @can('sinhvien')
       <li class="nav-item active">
           <a class="nav-link" href="{{route('student.home')}}">
               
           <span style="font-size:25px">Trang chủ</span></a>
       </li>
       @endcan

       @can('giangvien')
       <li class="nav-item active">
           <a class="nav-link" href="{{route('teacher.home')}}">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span style="font-size:25px">Trang chủ</span></a>
       </li>
       @endcan

       <!-- Divider -->
       <hr class="sidebar-divider">

       @can('admin')
       <!-- Nav Item - Tables -->
       <li class="nav-item">
           <a class="nav-link" href="{{route('admin.may.index')}}">
               <i class="fas fa-fw fa-table"></i>
               <span>Quản lý máy</span></a>
       </li>

       <!-- Nav Item - Tables -->
       <li class="nav-item">
           <a class="nav-link" href="{{route('admin.phong.index')}}">
               <i class="fas fa-fw fa-table"></i>
               <span>Quản lý phòng</span></a>
       </li>
        <li class="nav-item">
           <a class="nav-link" href="{{route('admin.khoa.index')}}">
               <i class="fas fa-fw fa-table"></i>
               <span>Quản lý khoa</span></a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{route('admin.lop.index')}}">
               <i class="fas fa-fw fa-table"></i>
               <span>Quản lý lớp</span></a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{route('admin.monhoc.index')}}">
               <i class="fas fa-fw fa-table"></i>
               <span>Quản lý Môn học</span></a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{route('admin.nganh.index')}}">
               <i class="fas fa-fw fa-table"></i>
               <span>Quản lý Ngành</span></a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{route('admin.thoikhoabieu.index')}}">
               <i class="fas fa-fw fa-table"></i>
               <span>Quản lý Thời khóa biểu</span></a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="{{route('admin.phanhoi.index')}}">
               <i class="fas fa-fw fa-table"></i>
               <span>Xem Phản Hồi</span></a>
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="padding: 10px 1rem;">
               <i class="fas fa-fw fa-cog"></i>
               <span>Quản lý đăng ký</span>
           </a>
           <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <a class="collapse-item" href="{{route('admin.dangky.sinhvien.index')}}">Sinh viên</a>
                   <a class="collapse-item" href="{{route('admin.dangky.giangvien.index')}}">Giảng viên</a>
               </div>
           </div>
       </li>
       @endcan

       @can('sinhvien')
       <li class="nav-item">
           <a class="nav-link" href="{{route('student.information')}}">
               <i class="fas fa-fw fa-table"></i>
               <span style="font-size:17px ;">Cập nhật thông tin</span>
            </a>
       </li>

       <li class="nav-item">
           <a class="nav-link" href="{{route('student.computer-register.index')}}">
               <i class="fas fa-fw fa-table"></i>
               <span style="font-size:17px ;">Đăng ký máy</span>
           </a>
       </li>

       <li class="nav-item">
           <a class="nav-link" href="{{route('student.computer-register.register-history')}}">
               <i class="fas fa-fw fa-table"></i>
               <span style="font-size:17px ;">Xem kết quả đăng ký</span>
           </a>
       </li>
       @endcan

       @can('giangvien')
       <li class="nav-item">
           <a class="nav-link" href="{{route('teacher.information')}}">
               <i class="fas fa-fw fa-table"></i>
               <span style="font-size:17px ;">Cập nhật thông tin</span>
            </a>
       </li>

       <li class="nav-item">
           <a class="nav-link" href="{{route('teacher.computer-register.index')}}">
               <i class="fas fa-fw fa-table"></i>
               <span style="font-size:17px ;">Đăng ký máy</span>
           </a>
       </li>

       <li class="nav-item">
           <a class="nav-link" href="{{route('teacher.computer-register.register-history')}}">
               <i class="fas fa-fw fa-table"></i>
               <span style="font-size:17px ;">Xem kết quả đăng ký</span>
           </a>
       </li>
       @endcan
       <!-- Divi
       der -->
       <hr class="sidebar-divider">
       <!-- Sidebar Toggler (Sidebar) -->
       <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>
   </ul>
   <!-- End of Sidebar -->