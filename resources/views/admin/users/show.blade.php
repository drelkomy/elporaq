@extends('admin.layouts')

@section('title', 'عرض تفاصيل المستخدم')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="font-family: 'Cairo';">تفاصيل المستخدم: {{ $user->name }}</h3>
                    <div class="float-right">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-right"></i> العودة للقائمة
                        </a>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> تعديل
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            @if($user->profile_image)
                                <img src="{{ asset('images/' . $user->profile_image) }}" 
                                     alt="{{ $user->name }}" class="img-fluid rounded-circle mb-3" style="max-width: 200px;">
                            @else
                                <img src="{{ asset('admin/dist/img/user-default.png') }}" 
                                     alt="{{ $user->name }}" class="img-fluid rounded-circle mb-3" style="max-width: 200px;">
                            @endif
                        </div>
                        <div class="col-md-9">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 200px;">الاسم</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>البريد الإلكتروني</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>تاريخ التسجيل</th>
                                        <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <th>آخر تحديث</th>
                                        <td>{{ $user->updated_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <th>حالة البريد الإلكتروني</th>
                                        <td>
                                            @if($user->email_verified_at)
                                                <span class="badge badge-success">تم التحقق</span>
                                                <small class="text-muted">({{ $user->email_verified_at->format('Y-m-d H:i:s') }})</small>
                                            @else
                                                <span class="badge badge-warning">لم يتم التحقق</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
@endsection
