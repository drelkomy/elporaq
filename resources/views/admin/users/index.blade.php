@extends('admin.layouts')

@section('title', 'إدارة المستخدمين')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="font-family: 'Cairo';">إدارة المستخدمين</h3>
                    <div class="float-right">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> إضافة مستخدم جديد
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @php
                        $columns = ['#', 'الصورة', 'الاسم', 'البريد الإلكتروني', 'تاريخ الإنشاء', 'الإجراءات'];
                    @endphp
                    
                    <x-admin-table :columns="$columns">
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    @if($user->profile_image)
                                        <img src="{{ asset('images/' . $user->profile_image) }}" 
                                             alt="{{ $user->name }}" width="40" height="40" 
                                             class="user-image">
                                    @else
                                        <img src="{{ asset('images/default-user.png') }}" 
                                             alt="Default" width="40" height="40" 
                                             class="user-image">
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                <td class="action-buttons">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('هل أنت متأكد من حذف هذا المستخدم؟')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">لا يوجد مستخدمين لعرضهم</td>
                            </tr>
                        @endforelse
                    </x-admin-table>
                    
                    <div class="mt-3">
                        <x-admin-pagination :data="$users" />
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
