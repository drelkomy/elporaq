@extends('admin.layouts')

@section('content')
    <h1>إحصائيات الموقع</h1>

    <!-- شريط البحث -->
    <div class="mb-3">
        <form action="{{ route('statistics.index') }}" method="GET">
            <input type="text" name="search" class="form-control" placeholder="بحث عن إحصائية..." value="{{ request()->get('search') }}">
        </form>
    </div>

    <!-- زر لفتح نافذة منبثقة لإضافة إحصائية جديدة -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addStatisticModal">
        إضافة إحصائية جديدة
    </button>

    <!-- نافذة منبثقة لإضافة إحصائية جديدة -->
    <div class="modal fade" id="addStatisticModal" tabindex="-1" role="dialog" aria-labelledby="addStatisticModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStatisticModalLabel">إضافة إحصائية جديدة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('statistics.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="statistic_name">اسم الإحصائية</label>
                            <input type="text" id="statistic_name" name="statistic_name" class="form-control" value="{{ old('statistic_name') }}">
                            @error('statistic_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="count">العدد</label>
                            <input type="number" id="count" name="count" class="form-control" value="{{ old('count') }}">
                            @error('count')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- عرض الإحصائيات -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>اسم الإحصائية</th>
                <th>العدد</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($statistics as $statistic)
                <tr>
                    <td>{{ $statistic->statistic_name }}</td>
                    <td>{{ $statistic->count }}</td>
                    <td>
                        <div class="d-flex">
                            <!-- زر تعديل -->
                            <button type="button" class="btn btn-warning mx-1" data-toggle="modal" data-target="#editStatisticModal{{ $statistic->id }}">
                                تعديل
                            </button>

                            <!-- زر حذف -->
                            <form action="{{ route('statistics.destroy', $statistic->id) }}" method="POST" class="mx-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                        </div>
                        
                        <!-- نافذة منبثقة لتعديل إحصائية -->
                        <div class="modal fade" id="editStatisticModal{{ $statistic->id }}" tabindex="-1" role="dialog" aria-labelledby="editStatisticModalLabel{{ $statistic->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editStatisticModalLabel{{ $statistic->id }}">تعديل إحصائية</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('statistics.update', $statistic->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="statistic_name">اسم الإحصائية</label>
                                                <input type="text" id="statistic_name" name="statistic_name" class="form-control" value="{{ old('statistic_name', $statistic->statistic_name) }}">
                                                @error('statistic_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="count">العدد</label>
                                                <input type="number" id="count" name="count" class="form-control" value="{{ old('count', $statistic->count) }}">
                                                @error('count')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-primary">تحديث</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- إضافة JQuery و Bootstrap JS لتفعيل النوافذ المنبثقة -->
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    @endpush
@endsection
