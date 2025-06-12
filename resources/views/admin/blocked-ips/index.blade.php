@extends('admin.layouts')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">إدارة عناوين IP المحظورة</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="card mb-4">
            <div class="card-header">
                <h5>حظر عنوان IP جديد</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.blocked-ips.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="ip_address">عنوان IP:</label>
                            <input type="text" name="ip_address" id="ip_address" class="form-control" required placeholder="مثال: 192.168.1.1">
                            @error('ip_address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="reason">سبب الحظر:</label>
                            <input type="text" name="reason" id="reason" class="form-control" placeholder="اختياري">
                        </div>
                        <div class="col-md-4">
                            <label for="blocked_until">تاريخ انتهاء الحظر (اختياري):</label>
                            <input type="date" name="blocked_until" id="blocked_until" class="form-control">
                            <small class="text-muted">اتركه فارغًا للحظر الدائم</small>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">حظر عنوان IP</button>
                </form>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h5>قائمة عناوين IP المحظورة</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان IP</th>
                                <th>سبب الحظر</th>
                                <th>تاريخ الحظر</th>
                                <th>تاريخ انتهاء الحظر</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($blockedIps as $ip)
                                <tr>
                                    <td>{{ $ip->id }}</td>
                                    <td>{{ $ip->ip_address }}</td>
                                    <td>{{ $ip->reason ?? 'غير محدد' }}</td>
                                    <td>{{ $ip->created_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        @if($ip->blocked_until)
                                            {{ $ip->blocked_until->format('Y-m-d') }}
                                            @if($ip->blocked_until->isPast())
                                                <span class="badge bg-success">انتهى</span>
                                            @endif
                                        @else
                                            <span class="badge bg-danger">حظر دائم</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.blocked-ips.destroy', $ip->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من رغبتك في فك الحظر؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">فك الحظر</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">لا توجد عناوين IP محظورة</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-4">
                    {{ $blockedIps->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection 