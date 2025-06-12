{{-- components/admin-table.blade.php --}}
{{-- مكوّن قابل لإعادة الاستخدام للجداول في لوحة التحكم --}}

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                @foreach($columns as $column)
                    <th>{{ $column }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>

@if(isset($pagination))
    <div class="mt-4">
        {{ $pagination }}
    </div>
@endif
