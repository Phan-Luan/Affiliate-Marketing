<table class="table table-striped table-bordered table-hover" id="admin-table">
    <thead>
        <tr>
            <th width="50px">STT</th>
            <th width="50px">ID</th>
            <th width="100px">Kích hoạt</th>
            <th width="150px">Tên</th>
            <th width="110px">Danh hiệu</th>
            <th width="150px">Số điện thoại</th>
            <th width="150px">Email</th>
            <th width="150px">TV giới thiệu</th>
            <th width="70px">Năm sinh</th>
            <th width="150px">Tổng thu nhập</th>
            <th width="150px">Điểm Smile</th>
            <th width="150px">Điểm tiêu dùng</th>
            <th width="150px">Thuế thu nhập cá nhân</th>
            <th width="150px">Doanh số nhóm</th>
            <th width="100px" colspan="2">Ngày đăng ký</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->id }}</td>
                <td>
                    {{ $user->type == 2 ? 'Đã kích hoạt' : 'Chưa kích hoạt' }}
                </td>
                <td>{{ $user->name }}</td>
                <td>
                    @php
                        $levels = [
                            1 => 'Thành viên',
                            2 => 'GĐKD *',
                            3 => 'GĐKD **',
                            4 => 'GĐKD ***',
                            5 => 'GĐKD ****',
                            6 => 'GĐKD *****',
                        ];
                    @endphp
                    {{ $levels[$user->level] ?? '' }}
                </td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->invite_user ? $user->invite($user->invite_user)->name : '' }}</td>
                <td>{{ $user->year_of_birth }}</td>
                <td>{{ number_format($user->money) }} VNĐ</td>
                <td>{{ number_format($user->point) }} điểm</td>
                <td>{{ number_format(($user->money / 100) * 24) }} điểm</td>
                <td>5%</td>
                <td>{{ number_format($user->total_revenue) }} VNĐ</td>
                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('H:i') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
