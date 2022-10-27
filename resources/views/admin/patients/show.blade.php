@extends('admin.layouts.app', ['page' => 'patients'])

@section('title', 'ملف الحالة')

@section('content')


<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-success">
      <div class="box-body box-profile">

        <h3 class="profile-username text-center">{{$patient->username}}</h3>

        <p class="text-muted text-center">{{$patient->status}}</p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>تاريخ الميلاد</b> <a class="pull-right">{{$patient->date_birth}}</a>
          </li>
          <li class="list-group-item">
            <b>فصيلة الدم</b> <a class="pull-right">{{$patient->blood}}</a>
          </li>
          <li class="list-group-item">
            <b>الجنس</b> <a class="pull-right">{{$patient->gender}}</a>
          </li>
        </ul>
       
        <a href=" {{ route('admin.swipes.create', ['passport' => $patient->passport]) }}" class="btn btn-success btn-block"><b>أضافة نتيجة مسحة</b></a>
        <a href=" {{ route('admin.shots.create', ['passport' => $patient->passport]) }}" class="btn btn-info btn-block"><b>أضافة تطعيمة</b></a>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">معلومات شخصية</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <strong><i class="fa fa-balance-scale margin-r-5"></i> الوزن</strong>
        <p class="text-muted">{{$patient->wieght}} Kg</p>
        <hr>
        <strong><i class="fa fa-mobile margin-r-5"></i> رقم الهاتف</strong>
        <p class="text-muted">{{$patient->phone}}</p>
        <hr>
        <strong><i class="fa fa-id-card margin-r-5"></i> رقم الجواز</strong>
        <p class="text-muted">{{$patient->passport}}</p>
        <hr>
        <strong><i class="fa fa-map-marker margin-r-5"></i> العنوان</strong>
        <p class="text-muted">{{$patient->address}}</p>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-6">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#timeline" data-toggle="tab">سجل المسحات</a></li>
        <li ><a href="#timeline2" data-toggle="tab"> سجل التطعيمات</a></li>
      </ul>
      <div class="tab-content">
        <!-- /.tab-pane -->
        <div class="active tab-pane" id="timeline">
          <!-- The timeline -->
          <ul class="timeline timeline-inverse">
            <!-- timeline time label -->
            <li class="time-label">
              <span class="bg-green">
               سجل المسحات
              </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            @forelse($patient->swipes as $k=> $swipe )
            <li>
              <i class="fa fa-heartbeat bg-purple"></i>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> {{$swipe->taken_at}}</span>
                <h3 class="timeline-header"><a href="#">{{$swipe->number}}</a>
                <a class="btn btn-success  btn-xs">{{$swipe->result}}</a>
              </div>
            </li>   
            @empty
            <li>
              <i class="fa fa-heartbeat bg-purple"></i>
              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">لا توجد نتائج</a>  
              </div>
            </li>   
            @endforelse     
        </ul>
      </div>
      <div class="tab-pane" id="timeline2">
        <!-- The timeline -->
        <ul class="timeline timeline-inverse">
          <!-- timeline time label -->
          <li class="time-label">
            <span class="bg-green">
             سجل التطعيمات
            </span>
          </li>
          <!-- /.timeline-label -->
          <!-- timeline item -->
          @forelse($patient->shots as $k=> $shot )
          <li>
            <i class="fa fa-heartbeat bg-purple"></i>
            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o"></i> {{$shot->taken_at}}</span>
              <h3 class="timeline-header"><a href="#">{{$shot->number}}</a>
              <a class="btn btn-success  btn-xs">{{$shot->type}}</a>
            </div>
          </li>   
          @empty
          <li>
            <i class="fa fa-heartbeat bg-purple"></i>
            <div class="timeline-item">
              <h3 class="timeline-header"><a href="#">لا توجد نتائج</a>  
            </div>
          </li>   
          @endforelse     
      </ul>
    </div>
      <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
  </div>
  <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
@endsection