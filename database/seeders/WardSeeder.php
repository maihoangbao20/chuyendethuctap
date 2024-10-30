<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ward;
use App\Models\District;

class WardSeeder extends Seeder
{
    public function run()
    {
        $wards = [
            // An Giang
            'Huyện An Phú' => [
                'Thị trấn An Phú', 'Xã Khánh An', 'Xã Khánh Bình', 'Xã Phú Hữu', 'Xã Phú Vĩnh', 'Xã Tân An', 'Xã Tân Châu', 'Xã Tân Hiệp', 'Xã Tân Phú', 'Xã Tân Qui', 'Xã Tân Thạnh', 'Xã Vĩnh Lộc'
            ],
            'Huyện Châu Phú' => [
                'Thị trấn Châu Phú', 'Xã Bình Long', 'Xã Bình Mỹ', 'Xã Hòa Bình', 'Xã Long Giang', 'Xã Long Hòa', 'Xã Long Thạnh', 'Xã Phú An', 'Xã Phú Hiệp', 'Xã Phú Mỹ', 'Xã Tân An', 'Xã Tân Châu'
            ],
            'Huyện Châu Thành' => [
                'Thị trấn Châu Thành', 'Xã An Hòa', 'Xã An Phú', 'Xã Bình Hòa', 'Xã Bình Mỹ', 'Xã Châu Phú', 'Xã Châu Thành', 'Xã Định Thành', 'Xã Long Bình', 'Xã Long Hòa', 'Xã Tân Châu', 'Xã Tân Hiệp'
            ],
            'Huyện Châu Thành A' => [
                'Thị trấn Châu Thành A', 'Xã Bình Phú', 'Xã Bình Thạnh', 'Xã Cần Đăng', 'Xã Cần Thạnh', 'Xã Long Phú', 'Xã Tân Phú', 'Xã Thạnh Hưng', 'Xã Thạnh Phú', 'Xã Tân Hiệp', 'Xã Tân Quy'
            ],
            'Huyện Chợ Mới' => [
                'Thị trấn Chợ Mới', 'Xã An Bình', 'Xã An Cư', 'Xã An Hòa', 'Xã An Phú', 'Xã Bình Thạnh', 'Xã Đoan Hùng', 'Xã Hòa Bình', 'Xã Long Bình', 'Xã Long Hòa', 'Xã Tân An', 'Xã Tân Thành'
            ],
            'Huyện Phú Tân' => [
                'Thị trấn Phú Tân', 'Xã An Bình', 'Xã An Cư', 'Xã An Hòa', 'Xã An Phú', 'Xã Bình Hòa', 'Xã Cái Dầu', 'Xã Long An', 'Xã Long Điền', 'Xã Tân An', 'Xã Tân Hòa', 'Xã Tân Thành'
            ],
            'Huyện Tân Châu' => [
                'Thị trấn Tân Châu', 'Xã Bình Phú', 'Xã Bình Thạnh', 'Xã Châu Phú', 'Xã Châu Thành', 'Xã Định Thành', 'Xã Long Bình', 'Xã Long Hòa', 'Xã Tân An', 'Xã Tân Châu', 'Xã Tân Hiệp'
            ],
            'Huyện Tân Hiệp' => [
                'Thị trấn Tân Hiệp', 'Xã An Bình', 'Xã An Hòa', 'Xã Bình Hòa', 'Xã Bình Thạnh', 'Xã Châu Phú', 'Xã Củ Chi', 'Xã Hòa Bình', 'Xã Long Bình', 'Xã Long Hòa', 'Xã Tân An', 'Xã Tân Châu'
            ],
            'Huyện Tân Phú' => [
                'Thị trấn Tân Phú', 'Xã Bình Hòa', 'Xã Bình Thạnh', 'Xã Châu Phú', 'Xã Long Bình', 'Xã Long Hòa', 'Xã Tân An', 'Xã Tân Châu', 'Xã Tân Hiệp', 'Xã Tân Quy', 'Xã Tân Thành'
            ],
            'Huyện Tân Qui' => [
                'Thị trấn Tân Qui', 'Xã An Bình', 'Xã An Cư', 'Xã Bình Hòa', 'Xã Bình Thạnh', 'Xã Châu Phú', 'Xã Cái Dầu', 'Xã Long Bình', 'Xã Long Hòa', 'Xã Tân An', 'Xã Tân Châu', 'Xã Tân Thành'
            ],
            'Thành phố Long Xuyên' => [
                'Phường Mỹ Bình', 'Phường Mỹ Long', 'Phường Mỹ Quý', 'Phường Mỹ Xuyên', 'Phường Núi Sam', 'Phường Đông Xuyên', 'Phường Bình Khánh', 'Phường Hưng Thạnh', 'Phường Vĩnh Nhuận', 'Phường Vĩnh Phước'
            ],
            'Thành phố Châu Đốc' => [
                'Phường Châu Phú A', 'Phường Châu Phú B', 'Phường Châu Đốc', 'Phường Núi Sam', 'Phường Vĩnh Bửu', 'Phường Vĩnh Ngươn', 'Phường Vĩnh Thạnh', 'Phường Vĩnh Tế'
            ],
            // Bà Rịa - Vũng Tàu
            'Huyện Châu Đức' => [
                'Thị trấn Ngãi Giao', 'Xã Bình Ba', 'Xã Bình Trung', 'Xã Cù Bị', 'Xã Đá Bạc', 'Xã Đôn Thuận', 'Xã Kim Long', 'Xã Ninh Sơn', 'Xã Quảng Thành', 'Xã Quảng Trung', 'Xã Suối Nghệ'
            ],
            'Huyện Côn Đảo' => [
                'Xã An Hải', 'Xã An Hòa', 'Xã An Phú', 'Xã Bãi Nhát', 'Xã Côn Sơn', 'Xã Long Hải', 'Xã Tân Sơn'
            ],
            'Huyện Đất Đỏ' => [
                'Thị trấn Đất Đỏ', 'Xã Bình Châu', 'Xã Bình Giã', 'Xã Bình Trung', 'Xã Đá Bạc', 'Xã Long Mỹ', 'Xã Long Tân', 'Xã Long Hải', 'Xã Phước Hội', 'Xã Phước Long', 'Xã Phước Tân'
            ],
            'Huyện Long Điền' => [
                'Thị trấn Long Điền', 'Xã An Nhơn', 'Xã An Tây', 'Xã Đức Linh', 'Xã Long Hải', 'Xã Long Phước', 'Xã Long Sơn', 'Xã Tam Thắng', 'Xã Tam Hiệp'
            ],
            'Huyện Tân Thành' => [
                'Thị trấn Phú Mỹ', 'Xã Châu Pha', 'Xã Hắc Dịch', 'Xã Long Hương', 'Xã Long Sơn', 'Xã Mỹ Xuân', 'Xã Tân Phước', 'Xã Tân Thành', 'Xã Tân Xuân', 'Xã Thắng Hải', 'Xã Vũng Tàu'
            ],
            'Thành phố Bà Rịa' => [
                'Phường Bà Rịa', 'Phường Long Hương', 'Phường Long Toàn', 'Phường Long Tân', 'Phường Phước Hưng', 'Phường Phước Long', 'Phường Phước Trung', 'Phường Tân Hưng', 'Phường Tân Thành'
            ],
            'Thành phố Vũng Tàu' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5', 'Phường 6', 'Phường 7', 'Phường 8', 'Phường 9', 'Phường 10'
            ],
            // Bình Dương
            'Huyện Bàu Bàng' => [
                'Xã An Điền', 'Xã An Sơn', 'Xã Cây Trường', 'Xã Lai Hưng', 'Xã Lai Uyên', 'Xã Long Nguyên', 'Xã Tân Hưng', 'Xã Tân Thành', 'Xã Tân Thạnh', 'Xã Tân Uyên'
            ],
            'Huyện Bắc Tân Uyên' => [
                'Xã Bàu Bàng', 'Xã Bắc Tân Uyên', 'Xã Cây Trường', 'Xã Hiệp Thành', 'Xã Long Nguyên', 'Xã Long Thành', 'Xã Tân Hiệp', 'Xã Tân Thành'
            ],
            'Huyện Dầu Tiếng' => [
                'Xã An Lập', 'Xã An Tây', 'Xã Bạch Đằng', 'Xã Cây Trường', 'Xã Dầu Tiếng', 'Xã Hiệp Thành', 'Xã Long Hòa', 'Xã Long Điền', 'Xã Tân Hiệp', 'Xã Tân Thành', 'Xã Tân Uyên'
            ],
            'Huyện Phú Giáo' => [
                'Xã An Linh', 'Xã An Phước', 'Xã Cây Trường', 'Xã Phú An', 'Xã Phú Giáo', 'Xã Phú Hòa', 'Xã Phú Trung', 'Xã Tân Bình', 'Xã Tân Hưng', 'Xã Tân Thành'
            ],
            'Huyện Tân Uyên' => [
                'Xã Bàu Bàng', 'Xã Cây Trường', 'Xã Hiệp Thành', 'Xã Long Hòa', 'Xã Long Nguyên', 'Xã Long Thành', 'Xã Phú An', 'Xã Phú Hòa', 'Xã Tân Hiệp', 'Xã Tân Thành'
            ],
            'Thành phố Dĩ An' => [
                'Phường An Bình', 'Phường An Thuận', 'Phường Bình Thắng', 'Phường Bình An', 'Phường Bình Chiểu', 'Phường Bình Dương', 'Phường Bình Hòa', 'Phường Đông Hòa', 'Phường Tân Đông Hiệp'
            ],
            'Thành phố Thủ Dầu Một' => [
                'Phường Hiệp Thành', 'Phường Phú Cường', 'Phường Phú Hòa', 'Phường Phú Lợi', 'Phường Phú Mỹ', 'Phường Phú Thọ', 'Phường Tân An', 'Phường Tân Bình', 'Phường Tân Đông Hiệp', 'Phường Tân Hiệp'
            ],
            'Thành phố Thuận An' => [
                'Phường An Phú', 'Phường An Thạnh', 'Phường Bình Hòa', 'Phường Bình Nhâm', 'Phường Bình Thắng', 'Phường Lái Thiêu', 'Phường Thạnh Phước', 'Phường Thuận Giao'
            ],
            // Bình Phước
            'Huyện Bù Đăng' => [
                'Xã An Phú', 'Xã Bù Đăng', 'Xã Bù Gia Mập', 'Xã Bù Đốp', 'Xã Bù Gia Mập', 'Xã Bình Sơn', 'Xã Chơn Thành', 'Xã Đồng Nai', 'Xã Đồng Phú', 'Xã Đồng Xoài', 'Xã Hớn Quản', 'Xã Phú Riềng'
            ],
            'Huyện Bù Gia Mập' => [
                'Xã Bù Gia Mập', 'Xã Bù Đăng', 'Xã Bù Đốp', 'Xã Bình Phước', 'Xã Đắk Ơ', 'Xã Hớn Quản', 'Xã Phú Riềng'
            ],
            'Huyện Bù Đốp' => [
                'Xã Bù Đốp', 'Xã Bình Phước', 'Xã Đắk Ơ', 'Xã Đắk Ru', 'Xã Đắk Ơ', 'Xã Hớn Quản', 'Xã Phú Riềng'
            ],
            'Huyện Chơn Thành' => [
                'Xã An Lập', 'Xã An Tây', 'Xã Bù Đăng', 'Xã Bình Phước', 'Xã Hớn Quản', 'Xã Phú Riềng'
            ],
            'Huyện Đồng Phú' => [
                'Xã An Bình', 'Xã An Phú', 'Xã Đồng Phú', 'Xã Đồng Xoài', 'Xã Tân Phú', 'Xã Tân Tiến', 'Xã Tân Hòa'
            ],
            'Huyện Đồng Xoài' => [
                'Xã An Bình', 'Xã An Phú', 'Xã Đồng Phú', 'Xã Đồng Xoài', 'Xã Tân Hòa', 'Xã Tân Tiến', 'Xã Tân Phú'
            ],
            'Huyện Hớn Quản' => [
                'Xã An Lập', 'Xã Bình Phước', 'Xã Đồng Phú', 'Xã Hớn Quản', 'Xã Phú Riềng'
            ],
            'Huyện Phú Riềng' => [
                'Xã An Lập', 'Xã Bình Phước', 'Xã Đồng Phú', 'Xã Phú Riềng'
            ],
            'Thành phố Đồng Xoài' => [
                'Phường Tân Bình', 'Phường Tân Xuân', 'Phường Tân Thành', 'Phường Tân Hòa', 'Phường Tân An', 'Phường Tân Tiến', 'Phường Tân Phú'
            ],
            // Bình Thuận
            'Huyện Bắc Bình' => [
                'Xã Bình An', 'Xã Bình Cang', 'Xã Bình Thạnh', 'Xã Bình Tân', 'Xã Đức Linh', 'Xã Hàm Thạnh', 'Xã Hàm Tân', 'Xã Tánh Linh', 'Xã Tuy Phong'
            ],
            'Huyện Đức Linh' => [
                'Xã Đức Linh', 'Xã Phú Lạc', 'Xã Tân Hà', 'Xã Tân Hòa', 'Xã Tân Thành', 'Xã Tân Xuân', 'Xã Tánh Linh'
            ],
            'Huyện Hàm Thuận Bắc' => [
                'Xã Hàm Thuận Bắc', 'Xã Hàm Liêm', 'Xã Hàm Tân', 'Xã Tân Hà', 'Xã Tân Hòa', 'Xã Tân Thành'
            ],
            'Huyện Hàm Thuận Nam' => [
                'Xã Hàm Thuận Nam', 'Xã Hàm Tiến', 'Xã Hàm Tân', 'Xã Tân Hòa', 'Xã Tân Thành', 'Xã Tân Xuân'
            ],
            'Huyện Hàm Tân' => [
                'Xã Hàm Tân', 'Xã Hàm Thuận Bắc', 'Xã Hàm Thuận Nam', 'Xã Tân Hòa', 'Xã Tân Thành', 'Xã Tân Xuân'
            ],
            'Huyện Tánh Linh' => [
                'Xã Tánh Linh', 'Xã Tân Hòa', 'Xã Tân Thành', 'Xã Tân Xuân'
            ],
            'Huyện Tuy Phong' => [
                'Xã Bình Thạnh', 'Xã Bình Tân', 'Xã Tân Hải', 'Xã Tân Phúc', 'Xã Tân Xuân', 'Xã Tuy Phong'
            ],
            'Thành phố Phan Thiết' => [
                'Phường Bình Hưng', 'Phường Bình Thạnh', 'Phường Đức Thắng', 'Phường Hàm Tiến', 'Phường Hàm Thuận', 'Phường Phú Hài', 'Phường Phú Thủy', 'Phường Tân An', 'Phường Tân Thiện', 'Phường Tân Xuân'
            ],
            // Bắc Giang
            'Huyện Bắc Giang' => [
                'Xã Bắc Giang', 'Xã Bắc Sơn', 'Xã Hiệp Hòa', 'Xã Lạng Giang', 'Xã Lục Nam', 'Xã Lục Ngạn', 'Xã Sơn Động', 'Xã Tân Yên', 'Xã Việt Yên'
            ],
            'Huyện Bắc Sơn' => [
                'Xã Bắc Sơn', 'Xã Hiệp Hòa', 'Xã Lạng Giang', 'Xã Lục Nam', 'Xã Lục Ngạn', 'Xã Sơn Động', 'Xã Tân Yên', 'Xã Việt Yên'
            ],
            'Huyện Hiệp Hòa' => [
                'Xã Bắc Giang', 'Xã Hiệp Hòa', 'Xã Lạng Giang', 'Xã Lục Nam', 'Xã Lục Ngạn', 'Xã Sơn Động', 'Xã Tân Yên', 'Xã Việt Yên'
            ],
            'Huyện Lạng Giang' => [
                'Xã Bắc Giang', 'Xã Hiệp Hòa', 'Xã Lạng Giang', 'Xã Lục Nam', 'Xã Lục Ngạn', 'Xã Sơn Động', 'Xã Tân Yên', 'Xã Việt Yên'
            ],
            'Huyện Lục Nam' => [
                'Xã Bắc Giang', 'Xã Hiệp Hòa', 'Xã Lạng Giang', 'Xã Lục Nam', 'Xã Lục Ngạn', 'Xã Sơn Động', 'Xã Tân Yên', 'Xã Việt Yên'
            ],
            'Huyện Lục Ngạn' => [
                'Xã Bắc Giang', 'Xã Hiệp Hòa', 'Xã Lạng Giang', 'Xã Lục Nam', 'Xã Lục Ngạn', 'Xã Sơn Động', 'Xã Tân Yên', 'Xã Việt Yên'
            ],
            'Huyện Sơn Động' => [
                'Xã Bắc Giang', 'Xã Hiệp Hòa', 'Xã Lạng Giang', 'Xã Lục Nam', 'Xã Lục Ngạn', 'Xã Sơn Động', 'Xã Tân Yên', 'Xã Việt Yên'
            ],
            'Huyện Tân Yên' => [
                'Xã Bắc Giang', 'Xã Hiệp Hòa', 'Xã Lạng Giang', 'Xã Lục Nam', 'Xã Lục Ngạn', 'Xã Sơn Động', 'Xã Tân Yên', 'Xã Việt Yên'
            ],
            'Huyện Việt Yên' => [
                'Xã Bắc Giang', 'Xã Hiệp Hòa', 'Xã Lạng Giang', 'Xã Lục Nam', 'Xã Lục Ngạn', 'Xã Sơn Động', 'Xã Tân Yên', 'Xã Việt Yên'
            ],
            'Thành phố Bắc Giang' => [
                'Phường Bắc Giang', 'Phường Hiệp Hòa', 'Phường Lạng Giang', 'Phường Lục Nam', 'Phường Lục Ngạn', 'Phường Sơn Động', 'Phường Tân Yên', 'Phường Việt Yên'
            ],
            // Bắc Kạn
            'Huyện Ba Bể' => [
                'Xã Bành Trạch', 'Xã Cao Trĩ', 'Xã Cẩm Giàng', 'Xã Chu Hương', 'Xã Đôn Phong', 'Xã Hạ Lang', 'Xã Khuổi Lấu', 'Xã Nam Mẫu', 'Xã Nà Phặc', 'Xã Nà Mạ', 'Xã Yên Định'
            ],
            'Huyện Bạch Thông' => [
                'Xã Bạch Thông', 'Xã Cao Sơn', 'Xã Cẩm Giàng', 'Xã Lục Bình', 'Xã Lục Nam', 'Xã Phương Viên', 'Xã Quang Thuận', 'Xã Tam Đình', 'Xã Tân Lập', 'Xã Tân Quang'
            ],
            'Huyện Chợ Đồn' => [
                'Xã Bình Trung', 'Xã Cẩm Giàng', 'Xã Dương Quang', 'Xã Khuổi Chanh', 'Xã Khuổi Sán', 'Xã Quảng Bạch', 'Xã Quảng Khê', 'Xã Quảng Nham', 'Xã Quảng Sơn', 'Xã Quảng Tân'
            ],
            'Huyện Chợ Mới' => [
                'Xã Bản Nùng', 'Xã Bình Trung', 'Xã Cao Kỳ', 'Xã Cẩm Giàng', 'Xã Đôn Phong', 'Xã Hưng Phúc', 'Xã Minh Tiến', 'Xã Quang Phú', 'Xã Quang Sơn', 'Xã Tam Đình'
            ],
            'Huyện Na Rì' => [
                'Xã Bản Tùng', 'Xã Cẩm Giàng', 'Xã Đôn Phong', 'Xã Hưng Đạo', 'Xã Khuổi Chanh', 'Xã Khuổi Sán', 'Xã Quảng Bạch', 'Xã Quảng Khê', 'Xã Quảng Nham', 'Xã Tân Lập'
            ],
            'Huyện Ngân Sơn' => [
                'Xã Cẩm Giàng', 'Xã Đôn Phong', 'Xã Hưng Phúc', 'Xã Khuổi Chanh', 'Xã Khuổi Sán', 'Xã Quảng Bạch', 'Xã Quảng Khê', 'Xã Quảng Nham', 'Xã Tân Lập', 'Xã Tân Quang'
            ],
            'Huyện Pác Nặm' => [
                'Xã Bản Nùng', 'Xã Cẩm Giàng', 'Xã Dương Quang', 'Xã Hưng Phúc', 'Xã Khuổi Lấu', 'Xã Minh Tiến', 'Xã Quang Phú', 'Xã Quang Sơn', 'Xã Tam Đình', 'Xã Tân Định'
            ],
            'Thành phố Bắc Kạn' => [
                'Phường Bắc Kạn', 'Phường Hòa Bình', 'Phường Xuân Cẩm', 'Phường Dương Quang', 'Phường Phú Lâm', 'Phường Phúc Sơn', 'Phường Quang Trung', 'Phường Tân Thành'
            ],
            // Bắc Ninh
            'Huyện Gia Bình' => [
                'Xã Cẩm Xá', 'Xã Đại Bái', 'Xã Giang Sơn', 'Xã Lãng Ngâm', 'Xã Long Châu', 'Xã Nhân Thắng', 'Xã Quế Phú', 'Xã Thái Bảo', 'Xã Thổ Hà', 'Xã Trung Nghĩa'
            ],
            'Huyện Lương Tài' => [
                'Xã An Thịnh', 'Xã Bình Định', 'Xã Cẩm Xá', 'Xã Đào Viên', 'Xã Đông Cứu', 'Xã Lâm Thao', 'Xã Liên Chung', 'Xã Ninh Xá', 'Xã Tân Hưng', 'Xã Thọ Xương'
            ],
            'Huyện Quế Võ' => [
                'Xã Cách Bi', 'Xã Đại Xuân', 'Xã Đức Long', 'Xã Hiệp Hòa', 'Xã Hương Mai', 'Xã Kim Đào', 'Xã Minh Tân', 'Xã Phú Lâm', 'Xã Quế Võ', 'Xã Tân Chi'
            ],
            'Huyện Thuận Thành' => [
                'Xã An Bình', 'Xã Bích Động', 'Xã Đại Đồng', 'Xã Đình Tổ', 'Xã Hương Vinh', 'Xã Minh Tân', 'Xã Ngọc Châu', 'Xã Phú Lâm', 'Xã Thuận Thành', 'Xã Tân Hưng'
            ],
            'Huyện Tiên Du' => [
                'Xã Cảnh Hưng', 'Xã Cảnh Hưng', 'Xã Đình Bảng', 'Xã Hiên Vân', 'Xã Minh Đạo', 'Xã Phù Chẩn', 'Xã Phú Lâm', 'Xã Tân Hưng', 'Xã Tân Mỹ', 'Xã Tân Yên'
            ],
            'Huyện Yên Phong' => [
                'Xã An Bình', 'Xã Cảnh Hưng', 'Xã Đình Bảng', 'Xã Đông Cứu', 'Xã Hiệp Hòa', 'Xã Kim Đào', 'Xã Liên Chung', 'Xã Ninh Xá', 'Xã Phú Lâm', 'Xã Tân Chi'
            ],
            'Huyện Yên Thế' => [
                'Xã An Dương', 'Xã Canh Nậu', 'Xã Cầu Gồ', 'Xã Đồng Kỳ', 'Xã Đồng Tâm', 'Xã Hương Vỹ', 'Xã Lãng Sơn', 'Xã Liên Chung', 'Xã Liên Sơn', 'Xã Mão Điền'
            ],
            'Thành phố Bắc Ninh' => [
                'Phường Đại Phúc', 'Phường Đông Ngàn', 'Phường Khắc Niệm', 'Phường Kinh Bắc', 'Phường Nam Sơn', 'Phường Ninh Xá', 'Phường Phong Khê', 'Phường Quang Trung', 'Phường Tân Hưng', 'Phường Vũ Ninh'
            ],
            // Bạc Liêu
            'Huyện Đông Hải' => [
                'Xã An Phúc', 'Xã An Trạch', 'Xã An Trạch A', 'Xã Bạc Liêu', 'Xã Vĩnh Mỹ', 'Xã Vĩnh Phú', 'Xã Vĩnh Thịnh', 'Xã Vĩnh Tuy', 'Xã Vĩnh Tường'
            ],
            'Huyện Hồng Dân' => [
                'Xã Bình Minh', 'Xã Ninh Quới', 'Xã Ninh Quới A', 'Xã Ninh Quới B', 'Xã Phong Tân', 'Xã Tân Phong', 'Xã Tân Hưng', 'Xã Tân Hưng A', 'Xã Tân Hưng B'
            ],
            'Huyện Phước Long' => [
                'Xã Phước Long', 'Xã Phước Long A', 'Xã Phước Long B', 'Xã Phước Thiện', 'Xã Phước Tuy', 'Xã Tân Hưng', 'Xã Tân Phong', 'Xã Tân Tiến', 'Xã Tân Tiến A'
            ],
            'Huyện Vĩnh Lợi' => [
                'Xã Hưng Phú', 'Xã Hưng Thành', 'Xã Hưng Yên', 'Xã Lộc Ninh', 'Xã Phước Yên', 'Xã Tân Đức', 'Xã Tân Hưng', 'Xã Tân Phong', 'Xã Tân Tiến'
            ],
            'Huyện Vĩnh Phú' => [
                'Xã An Phú', 'Xã An Trạch', 'Xã An Trạch A', 'Xã Bình Minh', 'Xã Phong Tân', 'Xã Tân Phong', 'Xã Tân Tiến', 'Xã Tân Hưng', 'Xã Tân Hưng A'
            ],
            'Thành phố Bạc Liêu' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5', 'Phường 6', 'Phường 7', 'Phường 8', 'Phường 9', 'Phường 10'
            ],
            // Bến Tre
            'Huyện Bình Đại' => [
                'Xã An Hóa', 'Xã Bình Thới', 'Xã Châu Thành', 'Xã Đại Hòa', 'Xã Đại Phước', 'Xã Hòa Nghĩa', 'Xã Hòa Tịnh', 'Xã Long Định', 'Xã Long Thới', 'Xã Tam Hiệp'
            ],
            'Huyện Ba Tri' => [
                'Xã An Ngãi', 'Xã An Thạnh', 'Xã Bảo Thạnh', 'Xã Bình Chánh', 'Xã Bình Mỹ', 'Xã Bình Thạnh', 'Xã Châu Thành', 'Xã Hưng Phong', 'Xã Long Phú', 'Xã Tân Thủy'
            ],
            'Huyện Châu Thành' => [
                'Xã An Hóa', 'Xã An Nhơn', 'Xã Bình Phú', 'Xã Châu Thành', 'Xã Hòa Lợi', 'Xã Hòa Nghĩa', 'Xã Hòa Tịnh', 'Xã Long Định', 'Xã Long Thới', 'Xã Tam Hiệp'
            ],
            'Huyện Chợ Lách' => [
                'Xã An Nhơn', 'Xã Châu Thành', 'Xã Hòa Nghĩa', 'Xã Hòa Tịnh', 'Xã Long Định', 'Xã Long Thới', 'Xã Tam Hiệp', 'Xã Tân Bình', 'Xã Tân Phú', 'Xã Vĩnh Thanh'
            ],
            'Huyện Mỏ Cày Bắc' => [
                'Xã An Hóa', 'Xã Bình Định', 'Xã Bình Tân', 'Xã Cẩm Xuyên', 'Xã Hưng Phú', 'Xã Long An', 'Xã Long Điền', 'Xã Tân Thanh', 'Xã Thạnh Phú', 'Xã Tân Hưng'
            ],
            'Huyện Mỏ Cày Nam' => [
                'Xã An Phú', 'Xã Bình Thành', 'Xã Bình Thới', 'Xã Hưng Phú', 'Xã Long An', 'Xã Long Điền', 'Xã Tân Hưng', 'Xã Tân Phú', 'Xã Thạnh Phú', 'Xã Thạnh Phú Đông'
            ],
            'Huyện Thạnh Phú' => [
                'Xã An Bình', 'Xã An Nhơn', 'Xã Bình Phú', 'Xã Châu Thành', 'Xã Hòa Lợi', 'Xã Hòa Nghĩa', 'Xã Hòa Tịnh', 'Xã Long Định', 'Xã Long Thới', 'Xã Tam Hiệp'
            ],
            'Thành phố Bến Tre' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5', 'Phường 6', 'Phường 7', 'Phường 8', 'Phường 9', 'Phường 10'
            ],
            // Bình Định
            'Huyện An Lão' => [
                'Xã An Hòa', 'Xã An Tân', 'Xã An Vinh', 'Xã Cát Minh', 'Xã Cát Nhơn', 'Xã Cát Sơn', 'Xã Cát Tường', 'Xã Cát Thành', 'Xã Cát Tiến', 'Xã Cát Trinh'
            ],
            'Huyện An Nhơn' => [
                'Xã An Dũng', 'Xã An Tân', 'Xã An Trung', 'Xã Bình Định', 'Xã Cát Minh', 'Xã Cát Nhơn', 'Xã Cát Sơn', 'Xã Cát Tường', 'Xã Cát Thành', 'Xã Cát Tiến'
            ],
            'Huyện Hoài Ân' => [
                'Xã An Hòa', 'Xã An Tân', 'Xã An Vinh', 'Xã Cát Minh', 'Xã Cát Nhơn', 'Xã Cát Sơn', 'Xã Cát Tường', 'Xã Cát Thành', 'Xã Cát Tiến', 'Xã Cát Trinh'
            ],
            'Huyện Hoài Nhơn' => [
                'Xã An Dũng', 'Xã An Hòa', 'Xã An Tân', 'Xã An Vinh', 'Xã Bình Định', 'Xã Cát Minh', 'Xã Cát Nhơn', 'Xã Cát Sơn', 'Xã Cát Tường', 'Xã Cát Thành'
            ],
            'Huyện Phù Cát' => [
                'Xã An Hòa', 'Xã An Tân', 'Xã An Vinh', 'Xã Cát Minh', 'Xã Cát Nhơn', 'Xã Cát Sơn', 'Xã Cát Tường', 'Xã Cát Thành', 'Xã Cát Tiến', 'Xã Cát Trinh'
            ],
            'Huyện Phù Mỹ' => [
                'Xã An Dũng', 'Xã An Hòa', 'Xã An Tân', 'Xã An Vinh', 'Xã Cát Minh', 'Xã Cát Nhơn', 'Xã Cát Sơn', 'Xã Cát Tường', 'Xã Cát Thành', 'Xã Cát Tiến'
            ],
            'Huyện Tuy Phước' => [
                'Xã An Tân', 'Xã Bình Định', 'Xã Cát Minh', 'Xã Cát Nhơn', 'Xã Cát Sơn', 'Xã Cát Tường', 'Xã Cát Thành', 'Xã Cát Tiến', 'Xã Cát Trinh', 'Xã Tuy Hòa'
            ],
            'Huyện Vân Canh' => [
                'Xã An Hòa', 'Xã An Tân', 'Xã An Vinh', 'Xã Cát Minh', 'Xã Cát Nhơn', 'Xã Cát Sơn', 'Xã Cát Tường', 'Xã Cát Thành', 'Xã Cát Tiến', 'Xã Cát Trinh'
            ],
            'Thành phố Quy Nhơn' => [
                'Phường Ghềnh Ráng', 'Phường Hải Cảng', 'Phường Hoài Hải', 'Phường Hoài Nhơn', 'Phường Hoài Sơn', 'Phường Hoài Xuân', 'Phường Trung Lương', 'Phường Trần Quang Diệu', 'Phường Trần Phú', 'Phường Xuân Diệu'
            ],
            // Cà Mau
            'Huyện Cái Nước' => [
                'Xã An Hòa', 'Xã An Xuyên', 'Xã Cái Nước', 'Xã Cái Tàu', 'Xã Cái Tàu Hạ', 'Xã Hòa Thành', 'Xã Hưng Mỹ', 'Xã Khánh An', 'Xã Khánh Hưng', 'Xã Tân Dân'
            ],
            'Huyện Đầm Dơi' => [
                'Xã Cái Đôi', 'Xã Cái Đôi A', 'Xã Cái Đôi B', 'Xã Cái Nước', 'Xã Cái Tàu', 'Xã Đầm Dơi', 'Xã Tân Hưng', 'Xã Tân Thới', 'Xã Tân Thành', 'Xã Tân Tiến'
            ],
            'Huyện Năm Căn' => [
                'Xã Cái Đôi', 'Xã Cái Đôi A', 'Xã Cái Đôi B', 'Xã Cái Nước', 'Xã Cái Tàu', 'Xã Đầm Dơi', 'Xã Tân Hưng', 'Xã Tân Thới', 'Xã Tân Thành', 'Xã Tân Tiến'
            ],
            'Huyện Ngọc Hiển' => [
                'Xã Cái Đôi', 'Xã Cái Đôi A', 'Xã Cái Đôi B', 'Xã Cái Nước', 'Xã Cái Tàu', 'Xã Đầm Dơi', 'Xã Tân Hưng', 'Xã Tân Thới', 'Xã Tân Thành', 'Xã Tân Tiến'
            ],
            'Huyện Phú Tân' => [
                'Xã An Thạnh', 'Xã An Xuyên', 'Xã Cái Đôi', 'Xã Cái Đôi A', 'Xã Cái Đôi B', 'Xã Cái Nước', 'Xã Cái Tàu', 'Xã Đầm Dơi', 'Xã Tân Hưng', 'Xã Tân Thới'
            ],
            'Huyện Thới Bình' => [
                'Xã An Hòa', 'Xã An Xuyên', 'Xã Cái Đôi', 'Xã Cái Đôi A', 'Xã Cái Đôi B', 'Xã Cái Nước', 'Xã Cái Tàu', 'Xã Đầm Dơi', 'Xã Tân Hưng', 'Xã Tân Thới'
            ],
            'Huyện U Minh' => [
                'Xã An Hòa', 'Xã An Xuyên', 'Xã Cái Đôi', 'Xã Cái Đôi A', 'Xã Cái Đôi B', 'Xã Cái Nước', 'Xã Cái Tàu', 'Xã Đầm Dơi', 'Xã Tân Hưng', 'Xã Tân Thới'
            ],
            'Thành phố Cà Mau' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5', 'Phường 6', 'Phường 7', 'Phường 8', 'Phường 9', 'Phường 10'
            ],
            // Cao Bằng
            'Huyện Bảo Lâm' => [
                'Xã Bảo Lâm', 'Xã Bảo Hòa', 'Xã Bảo Linh', 'Xã Bảo Vinh', 'Xã Đàm Thủy', 'Xã Hòa An', 'Xã Hòa Bình', 'Xã Lâm Thủy', 'Xã Lâm Phú', 'Xã Phúc Sen'
            ],
            'Huyện Bảo Lạc' => [
                'Xã Bảo Lạc', 'Xã Bảo Toàn', 'Xã Cô Ba', 'Xã Hưng Đạo', 'Xã Khánh Xuân', 'Xã Khuổi Luông', 'Xã Lý Bôn', 'Xã Pác Miầu', 'Xã Phan Thanh', 'Xã Thượng Hà'
            ],
            'Huyện Hạ Lang' => [
                'Xã Cô Ba', 'Xã Hạ Lang', 'Xã Hồng Việt', 'Xã Khánh Xuân', 'Xã Lý Bôn', 'Xã Minh Khai', 'Xã Nà Chì', 'Xã Phú Lương', 'Xã Quảng Hòa', 'Xã Thị Trấn Hạ Lang'
            ],
            'Huyện Nguyên Bình' => [
                'Xã Cao Chương', 'Xã Hưng Đạo', 'Xã Minh Long', 'Xã Minh Thanh', 'Xã Nguyên Bình', 'Xã Phan Thanh', 'Xã Quang Trung', 'Xã Tam Kim', 'Xã Thái Hòa', 'Xã Thượng Sơn'
            ],
            'Huyện Phục Hòa' => [
                'Xã Bạch Đằng', 'Xã Cao Chương', 'Xã Hồng Đức', 'Xã Ngọc Côn', 'Xã Phúc Sen', 'Xã Quang Vinh', 'Xã Tam Kim', 'Xã Thượng Hòa', 'Xã Thượng Sơn', 'Xã Vũ Loan'
            ],
            'Huyện Quảng Uyên' => [
                'Xã Bình Lục', 'Xã Cô Ba', 'Xã Hoàng Nông', 'Xã Khánh Xuân', 'Xã Nà Chì', 'Xã Quảng Hòa', 'Xã Thượng Đình', 'Xã Thượng Sơn', 'Xã Trung Thịnh', 'Xã Xuân Lạc'
            ],
            'Huyện Thông Nông' => [
                'Xã Đàm Thủy', 'Xã Hồng Đức', 'Xã Hưng Đạo', 'Xã Khuổi Luông', 'Xã Minh Khai', 'Xã Ngọc Côn', 'Xã Quảng Hòa', 'Xã Quảng Sơn', 'Xã Tam Kim', 'Xã Thái Hòa'
            ],
            'Huyện Trà Lĩnh' => [
                'Xã Bình Lục', 'Xã Cô Ba', 'Xã Hồng Đức', 'Xã Khánh Xuân', 'Xã Minh Long', 'Xã Minh Thanh', 'Xã Ngọc Côn', 'Xã Quang Vinh', 'Xã Thái Hòa', 'Xã Xuân Lạc'
            ],
            'Huyện Trùng Khánh' => [
                'Xã Cao Chương', 'Xã Cô Ba', 'Xã Hồng Đức', 'Xã Khánh Xuân', 'Xã Minh Long', 'Xã Ngọc Côn', 'Xã Phúc Sen', 'Xã Quảng Hòa', 'Xã Thượng Sơn', 'Xã Xuân Lạc'
            ],
            'Thành phố Cao Bằng' => [
                'Phường Hợp Giang', 'Phường Ngọc Xuân', 'Phường Sông Bằng', 'Phường Tân Giang', 'Phường Tân Phong', 'Phường Vĩnh Phúc'
            ],
            // Cần Thơ
            'Huyện Cờ Đỏ' => [
                'Xã Đông Hiệp', 'Xã Đông Thắng', 'Xã Hưng Phú', 'Xã Thạnh Phú', 'Xã Thạnh Quới', 'Xã Trung An', 'Xã Trung Thạnh', 'Xã Tân Thạnh', 'Xã Thạnh An', 'Xã Thạnh Xuân'
            ],
            'Huyện Phong Điền' => [
                'Xã Bình Phước', 'Xã Phong Điền', 'Xã Tân Thới', 'Xã Thạnh Phú', 'Xã Thạnh Quới', 'Xã Thới Hưng', 'Xã Thới Lai', 'Xã Tân An', 'Xã Tân Thạnh', 'Xã Thạnh Tiến'
            ],
            'Huyện Thới Lai' => [
                'Xã Đông Thắng', 'Xã Thới Hưng', 'Xã Thới Lai', 'Xã Tân Thạnh', 'Xã Thạnh Phú', 'Xã Thạnh Tiến', 'Xã Thạnh Xuân', 'Xã Thạnh An', 'Xã Tân An', 'Xã Tân Thới'
            ],
            'Huyện Vĩnh Thạnh' => [
                'Xã Bình Thủy', 'Xã Bình Tân', 'Xã Vĩnh Thạnh', 'Xã Vĩnh Hòa', 'Xã Vĩnh Long', 'Xã Vĩnh Lộc', 'Xã Vĩnh Trinh', 'Xã Vĩnh Xuân', 'Xã Vĩnh Xuân', 'Xã Vĩnh Tường'
            ],
            'Quận Bình Thủy' => [
                'Phường An Bình', 'Phường Bình Thủy', 'Phường Bùi Hữu Nghĩa', 'Phường Long Hòa', 'Phường Long Tuyền', 'Phường Thới An', 'Phường Thới Hòa', 'Phường Thới Long'
            ],
            'Quận Cái Răng' => [
                'Phường Cái Răng', 'Phường Hưng Phú', 'Phường Lê Bình', 'Phường Thạnh Hòa', 'Phường Thạnh Quới', 'Phường Thạnh Tiến', 'Phường Thạnh Phú', 'Phường Tân An', 'Phường Tân Hưng'
            ],
            'Quận Ninh Kiều' => [
                'Phường An Khánh', 'Phường An Lạc', 'Phường An Nghiệp', 'Phường An Phú', 'Phường Cái Khế', 'Phường Cái Răng', 'Phường Cái Khế', 'Phường Tân An', 'Phường Tân Hưng'
            ],
            'Quận Ô Môn' => [
                'Phường Châu Văn Liêm', 'Phường Long Hòa', 'Phường Long Tuyền', 'Phường Thới An', 'Phường Thới Hưng', 'Phường Thới Lai', 'Phường Thạnh Phú', 'Phường Thạnh Quới'
            ],
            'Quận Thốt Nốt' => [
                'Phường Trung An', 'Phường Thạnh Hòa', 'Phường Thạnh Quới', 'Phường Thạnh Tiến', 'Phường Thới Lai', 'Phường Thới An', 'Phường Thới Hưng'
            ],
            'Thành phố Cần Thơ' => [
                'Phường An Khánh', 'Phường An Lạc', 'Phường An Nghiệp', 'Phường An Phú', 'Phường Cái Khế', 'Phường Cái Răng', 'Phường Hưng Phú', 'Phường Long Hòa', 'Phường Long Tuyền', 'Phường Thới An'
            ],
            // Đắk Lắk
            'Huyện Buôn Đôn' => [
                'Xã Buôn Đôn', 'Xã Buôn Hồ', 'Xã Cư Êbur', 'Xã Cư M’gar', 'Xã Ea H’leo', 'Xã Ea Kar', 'Xã Ea Súp', 'Xã Krông Ana', 'Xã Krông Búk', 'Xã Krông Nô'
            ],
            'Huyện Buôn Hồ' => [
                'Xã Buôn Hồ', 'Xã Cư Êbur', 'Xã Cư M’gar', 'Xã Ea H’leo', 'Xã Ea Kar', 'Xã Ea Súp', 'Xã Krông Búk', 'Xã Krông Ana', 'Xã Krông Nô', 'Xã M’Đrắk'
            ],
            'Huyện Cư Kuin' => [
                'Xã Cư Kuin', 'Xã Ea Ktur', 'Xã Ea Kna', 'Xã Ea Kít', 'Xã Ea H’leo', 'Xã Ea Kar', 'Xã Ea Súp', 'Xã Krông Búk', 'Xã Krông Ana', 'Xã Krông Nô'
            ],
            'Huyện Cư M’gar' => [
                'Xã Cư M’gar', 'Xã Ea H’leo', 'Xã Ea Kar', 'Xã Ea Súp', 'Xã Krông Ana', 'Xã Krông Búk', 'Xã Krông Nô', 'Xã M’Đrắk', 'Xã Buôn Đôn', 'Xã Buôn Hồ'
            ],
            'Huyện Ea H’leo' => [
                'Xã Ea H’leo', 'Xã Ea Kar', 'Xã Ea Súp', 'Xã Krông Búk', 'Xã Krông Ana', 'Xã Krông Nô', 'Xã M’Đrắk', 'Xã Buôn Đôn', 'Xã Buôn Hồ', 'Xã Cư Êbur'
            ],
            'Huyện Ea Kar' => [
                'Xã Ea Kar', 'Xã Ea H’leo', 'Xã Ea Súp', 'Xã Krông Ana', 'Xã Krông Búk', 'Xã Krông Nô', 'Xã M’Đrắk', 'Xã Buôn Đôn', 'Xã Buôn Hồ', 'Xã Cư Êbur'
            ],
            'Huyện Ea Súp' => [
                'Xã Ea Súp', 'Xã Krông Ana', 'Xã Krông Búk', 'Xã Krông Nô', 'Xã M’Đrắk', 'Xã Buôn Đôn', 'Xã Buôn Hồ', 'Xã Cư Êbur', 'Xã Ea H’leo', 'Xã Ea Kar'
            ],
            'Huyện Krông Búk' => [
                'Xã Krông Búk', 'Xã Krông Ana', 'Xã Krông Nô', 'Xã M’Đrắk', 'Xã Buôn Đôn', 'Xã Buôn Hồ', 'Xã Cư Êbur', 'Xã Ea H’leo', 'Xã Ea Kar', 'Xã Ea Súp'
            ],
            'Huyện Krông Ana' => [
                'Xã Krông Ana', 'Xã Krông Nô', 'Xã M’Đrắk', 'Xã Buôn Đôn', 'Xã Buôn Hồ', 'Xã Cư Êbur', 'Xã Ea H’leo', 'Xã Ea Kar', 'Xã Ea Súp', 'Xã Krông Búk'
            ],
            'Huyện Krông Bông' => [
                'Xã Krông Bông', 'Xã Krông Nô', 'Xã M’Đrắk', 'Xã Buôn Đôn', 'Xã Buôn Hồ', 'Xã Cư Êbur', 'Xã Ea H’leo', 'Xã Ea Kar', 'Xã Ea Súp', 'Xã Krông Búk'
            ],
            'Huyện Krông Nô' => [
                'Xã Krông Nô', 'Xã M’Đrắk', 'Xã Buôn Đôn', 'Xã Buôn Hồ', 'Xã Cư Êbur', 'Xã Ea H’leo', 'Xã Ea Kar', 'Xã Ea Súp', 'Xã Krông Búk', 'Xã Krông Ana'
            ],
            'Huyện M’Đrắk' => [
                'Xã M’Đrắk', 'Xã Buôn Đôn', 'Xã Buôn Hồ', 'Xã Cư Êbur', 'Xã Ea H’leo', 'Xã Ea Kar', 'Xã Ea Súp', 'Xã Krông Búk', 'Xã Krông Ana', 'Xã Krông Nô'
            ],
            'Huyện Tuy Đức' => [
                'Xã Đắk Búk So', 'Xã Đắk R’tíh', 'Xã Đắk P’lao', 'Xã Đắk R’lao', 'Xã Đắk D’rông', 'Xã Đắk Sôr', 'Xã Đắk Tô', 'Xã Đắk Môn', 'Xã Đắk R’lao', 'Xã Đắk Búk So'
            ],
            'Thành phố Buôn Ma Thuột' => [
                'Phường Tân An', 'Phường Tân Lợi', 'Phường Tân Hòa', 'Phường Tân Tiến', 'Phường Thắng Lợi', 'Phường Thống Nhất', 'Phường Thành Nhất', 'Phường Thành Công', 'Phường Ea Tam', 'Phường Ea Tu'
            ],
            // Đắk Nông
            'Huyện Cư Jút' => [
                'Xã Cư Jút', 'Xã Cư Knia', 'Xã Cư Kuin', 'Xã Cư Pui', 'Xã Đắk Ru', 'Xã Đắk Sôr', 'Xã Đức Xuyên', 'Xã Quảng Khê', 'Xã Quảng Phú', 'Xã Trúc Sơn'
            ],
            'Huyện Cư Kuin' => [
                'Xã Cư Kuin', 'Xã Ea Ktur', 'Xã Ea Kna', 'Xã Ea Kít', 'Xã Ea H’leo', 'Xã Ea Kar', 'Xã Ea Súp', 'Xã Krông Búk', 'Xã Krông Ana', 'Xã Krông Nô'
            ],
            'Huyện Đắk Glong' => [
                'Xã Đắk Glong', 'Xã Đắk Môn', 'Xã Đắk N’Drung', 'Xã Đắk R’tíh', 'Xã Đắk Ru', 'Xã Đức Xuyên', 'Xã Quảng Khê', 'Xã Quảng Phú', 'Xã Quảng Tân', 'Xã Quảng Trực'
            ],
            'Huyện Đắk Mil' => [
                'Xã Đắk Mil', 'Xã Đắk Búk So', 'Xã Đắk D’rông', 'Xã Đắk Glong', 'Xã Đắk Ru', 'Xã Đức Xuyên', 'Xã Quảng Khê', 'Xã Quảng Phú', 'Xã Quảng Tân', 'Xã Trúc Sơn'
            ],
            'Huyện Đắk R’lấp' => [
                'Xã Đắk R’lấp', 'Xã Đắk Búk So', 'Xã Đắk D’rông', 'Xã Đắk Glong', 'Xã Đắk Mil', 'Xã Đắk Ru', 'Xã Đức Xuyên', 'Xã Quảng Khê', 'Xã Quảng Phú', 'Xã Trúc Sơn'
            ],
            'Huyện Đắk Song' => [
                'Xã Đắk Song', 'Xã Đắk Kút', 'Xã Đắk N’Drung', 'Xã Đắk R’tíh', 'Xã Đắk Ru', 'Xã Đức Xuyên', 'Xã Quảng Khê', 'Xã Quảng Phú', 'Xã Quảng Tân', 'Xã Trúc Sơn'
            ],
            'Huyện Krông Nô' => [
                'Xã Krông Nô', 'Xã Đắk R’tíh', 'Xã Đắk Song', 'Xã Đắk Glong', 'Xã Đắk Mil', 'Xã Đắk Ru', 'Xã Đức Xuyên', 'Xã Quảng Khê', 'Xã Quảng Phú', 'Xã Quảng Tân'
            ],
            'Huyện Tuy Đức' => [
                'Xã Đắk Búk So', 'Xã Đắk Môn', 'Xã Đắk P’lao', 'Xã Đắk R’lao', 'Xã Đắk D’rông', 'Xã Đắk Sôr', 'Xã Đắk Tô', 'Xã Đắk Môn', 'Xã Đắk Búk So'
            ],
            'Thành phố Gia Nghĩa' => [
                'Phường Nghĩa Đức', 'Phường Nghĩa Tân', 'Phường Nghĩa Trung', 'Phường Nghĩa Thành', 'Phường Nghĩa Phú', 'Phường Nghĩa Hưng', 'Phường Nghĩa Bình', 'Phường Nghĩa Lộc', 'Phường Nghĩa Xuân', 'Phường Nghĩa An'
            ],
            // Đà Nẵng
            'Quận Cẩm Lệ' => [
                'Phường Hòa An', 'Phường Hòa Phát', 'Phường Hòa Thọ Đông', 'Phường Hòa Thọ Tây', 'Phường Hòa Xuân', 'Phường Khuê Trung', 'Phường Khuê Mỹ'
            ],
            'Quận Hải Châu' => [
                'Phường Bình Thuận', 'Phường Hòa Thuận Đông', 'Phường Hòa Thuận Tây', 'Phường Hòa Hải', 'Phường Hòa Phát', 'Phường Thanh Bình', 'Phường Thanh Khê'
            ],
            'Quận Liên Chiểu' => [
                'Phường Hòa Hiệp Bắc', 'Phường Hòa Hiệp Nam', 'Phường Hòa Khánh Bắc', 'Phường Hòa Khánh Nam', 'Phường Hòa Minh', 'Phường Xuân Hà'
            ],
            'Quận Ngũ Hành Sơn' => [
                'Phường An Hải Bắc', 'Phường An Hải Đông', 'Phường An Hải Nam', 'Phường An Hải Tây', 'Phường Khuê Mỹ', 'Phường Mỹ An'
            ],
            'Quận Sơn Trà' => [
                'Phường An Hải Bắc', 'Phường An Hải Đông', 'Phường An Hải Nam', 'Phường An Hải Tây', 'Phường Nại Hiên Đông', 'Phường Mân Thái'
            ],
            'Quận Thanh Khê' => [
                'Phường Chính Gián', 'Phường Hòa Khê', 'Phường Hòa Minh', 'Phường Hòa Xuân', 'Phường Thanh Khê Đông', 'Phường Thanh Khê Tây'
            ],
            'Huyện Hoà Vang' => [
                'Xã Hoà Phú', 'Xã Hoà Khương', 'Xã Hoà Ninh', 'Xã Hoà Tiến', 'Xã Hoà Phước', 'Xã Hoà Sơn', 'Xã Hoà Bắc'
            ],
            // Đà Lạt
            'Huyện Đơn Dương' => [
                'Xã Đơn Dương', 'Xã Đạ Đờn', 'Xã Đạ Tông', 'Xã Đạ M’Rông', 'Xã Đạ Oai', 'Xã Đạ Tẻh', 'Xã Đạ Long', 'Xã Đạ M’Rông', 'Xã Đạ M’Rông'
            ],
            'Huyện Đức Trọng' => [
                'Xã Hiệp Thạnh', 'Xã Đà Loan', 'Xã N’Thôn Hạ', 'Xã N’Thôn Thượng', 'Xã Tân Thành', 'Xã Tân Hội', 'Xã Đà Loan', 'Xã Hiệp Thạnh', 'Xã Tân Thành'
            ],
            'Huyện Lạc Dương' => [
                'Xã Đa Nhim', 'Xã Đạ Ròn', 'Xã Lát', 'Xã Lộc Bắc', 'Xã Lộc Châu', 'Xã Lộc Thắng', 'Xã Lộc Tân', 'Xã Lộc Vân'
            ],
            'Huyện Lâm Hà' => [
                'Xã Đạ Đờn', 'Xã Đạ Tông', 'Xã Đạ M’Rông', 'Xã Đạ Oai', 'Xã Đạ Tẻh', 'Xã Đạ Long', 'Xã Đạ M’Rông', 'Xã Đạ M’Rông'
            ],
            'Huyện Ninh Sơn' => [
                'Xã Ninh Sơn', 'Xã Ninh Gia', 'Xã Ninh Phú', 'Xã Ninh Xuân', 'Xã Ninh Thạnh', 'Xã Ninh Quang', 'Xã Ninh Tiến', 'Xã Ninh Thạnh'
            ],
            'Thành phố Đà Lạt' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5', 'Phường 6', 'Phường 7', 'Phường 8', 'Phường 9', 'Phường 10'
            ],
            //Điện Biên
            'Huyện Điện Biên' => [
                'Thị trấn Điện Biên', 'Xã Mường Pồn', 'Xã Na Tông', 'Xã Núa Ngam', 'Xã Phu Luông', 'Xã Sam Mứn', 'Xã Thanh Chăn', 'Xã Thanh Hưng', 'Xã Thanh Luông', 'Xã Thanh Nưa', 'Xã Thanh Xương'
            ],
            'Huyện Điện Biên Đông' => [
                'Thị trấn Điện Biên Đông', 'Xã Háng Lìa', 'Xã Luân Giói', 'Xã Mường Luân', 'Xã Phì Nhừ', 'Xã Pú Hồng', 'Xã Pú Nhi', 'Xã Tìa Dình', 'Xã Xa Dung'
            ],
            'Huyện Mường Chà' => [
                'Thị trấn Mường Chà', 'Xã Huổi Lèng', 'Xã Hừa Ngài', 'Xã Ma Thì Hồ', 'Xã Mường Mươn', 'Xã Mường Tùng', 'Xã Na Sang', 'Xã Nậm Khăn', 'Xã Nậm Nèn', 'Xã Sá Tổng', 'Xã Xá Tổng'
            ],
            'Huyện Mường Nhé' => [
                'Thị trấn Mường Nhé', 'Xã Chung Chải', 'Xã Huổi Lếch', 'Xã Leng Su Sìn', 'Xã Mường Toong', 'Xã Nậm Kè', 'Xã Pá Mỳ', 'Xã Quảng Lâm', 'Xã Sín Thầu'
            ],
            'Huyện Mường Lay' => [
                'Thị trấn Mường Lay', 'Xã Lay Nưa'
            ],
            'Huyện Tủa Chùa' => [
                'Thị trấn Tủa Chùa', 'Xã Huổi Só', 'Xã Mường Báng', 'Xã Mường Đun', 'Xã Mường Tùng', 'Xã Sính Phình', 'Xã Tả Phìn', 'Xã Tả Sìn Thàng', 'Xã Trung Thu', 'Xã Xá Nhè'
            ],
            'Huyện Tuần Giáo' => [
                'Thị trấn Tuần Giáo', 'Xã Chiềng Sinh', 'Xã Mùn Chung', 'Xã Mường Khong', 'Xã Mường Mùn', 'Xã Nà Sáy', 'Xã Nà Tòng', 'Xã Phình Sáng', 'Xã Pú Nhung', 'Xã Quài Cang', 'Xã Quài Nưa', 'Xã Quài Tở', 'Xã Ta Ma'
            ],
            'Thành phố Điện Biên Phủ' => [
                'Phường Him Lam', 'Phường Mường Thanh', 'Phường Nam Thanh', 'Phường Noong Bua', 'Phường Tân Thanh', 'Xã Nà Tấu', 'Xã Nà Nhạn', 'Xã Pá Khoang', 'Xã Tà Lèng', 'Xã Thanh Minh'
            ],
            // Đồng Nai
            'Huyện Cẩm Mỹ' => [
                'Thị trấn Cẩm Mỹ', 'Xã Long Giao', 'Xã Nhân Nghĩa', 'Xã Sông Nhạn', 'Xã Sông Ray', 'Xã Thừa Đức', 'Xã Xuân Bảo', 'Xã Xuân Định', 'Xã Xuân Đông', 'Xã Xuân Mỹ', 'Xã Xuân Quế', 'Xã Xuân Tây'
            ],
            'Huyện Định Quán' => [
                'Thị trấn Định Quán', 'Xã Gia Canh', 'Xã La Ngà', 'Xã Ngọc Định', 'Xã Phú Cường', 'Xã Phú Hoà', 'Xã Phú Lợi', 'Xã Phú Ngọc', 'Xã Phú Tân', 'Xã Phú Túc', 'Xã Suối Nho', 'Xã Thanh Sơn'
            ],
            'Huyện Long Thành' => [
                'Thị trấn Long Thành', 'Xã An Phước', 'Xã Bàu Cạn', 'Xã Bình An', 'Xã Bình Sơn', 'Xã Cẩm Đường', 'Xã Long An', 'Xã Long Đức', 'Xã Long Phước', 'Xã Lộc An', 'Xã Phước Bình', 'Xã Phước Thái', 'Xã Tam An'
            ],
            'Huyện Nhơn Trạch' => [
                'Thị trấn Nhơn Trạch', 'Xã Đại Phước', 'Xã Hiệp Phước', 'Xã Long Tân', 'Xã Phú Đông', 'Xã Phú Hội', 'Xã Phước An', 'Xã Phước Khánh', 'Xã Phước Thiền', 'Xã Vĩnh Thanh'
            ],
            'Huyện Tân Phú' => [
                'Thị trấn Tân Phú', 'Xã Đắc Lua', 'Xã Nam Cát Tiên', 'Xã Phú An', 'Xã Phú Bình', 'Xã Phú Điền', 'Xã Phú Lâm', 'Xã Phú Lộc', 'Xã Phú Sơn', 'Xã Phú Thịnh', 'Xã Phú Trung', 'Xã Tà Lài', 'Xã Thanh Sơn', 'Xã Trà Cổ'
            ],
            'Huyện Trảng Bom' => [
                'Thị trấn Trảng Bom', 'Xã An Viễn', 'Xã Bắc Sơn', 'Xã Bàu Hàm 1', 'Xã Bình Minh', 'Xã Cây Gáo', 'Xã Đồi 61', 'Xã Đông Hòa', 'Xã Giang Điền', 'Xã Hố Nai 3', 'Xã Hưng Thịnh', 'Xã Quảng Tiến', 'Xã Sông Thao', 'Xã Sông Trầu', 'Xã Tây Hòa', 'Xã Thanh Bình'
            ],
            'Huyện Vĩnh Cửu' => [
                'Thị trấn Vĩnh An', 'Xã Bình Lợi', 'Xã Bình Hòa', 'Xã Bình Long', 'Xã Hiếu Liêm', 'Xã Mã Đà', 'Xã Phú Lý', 'Xã Tân An', 'Xã Tân Bình', 'Xã Tân Phú', 'Xã Thạnh Phú', 'Xã Thiện Tân', 'Xã Trị An'
            ],
            'Thành phố Biên Hòa' => [
                'Phường An Bình', 'Phường An Hoà', 'Phường Bình Đa', 'Phường Bình Thắng', 'Phường Bình Minh', 'Phường Bình Thành', 'Phường Bình An', 'Phường Hố Nai', 'Phường Hoà Bình', 'Phường Hưng Đạo', 'Phường Long Bình', 'Phường Long Bình Tân', 'Phường Quang Vinh', 'Phường Tam Hiệp', 'Phường Tam Hòa', 'Phường Tam Phước', 'Phường Tân Biên', 'Phường Tân Bình', 'Phường Tân Hoà', 'Phường Tân Mai', 'Phường Tân Phong', 'Phường Tân Phú', 'Phường Tân Tiến', 'Phường Thống Nhất', 'Phường Trung Dũng'
            ],
            'Thành phố Long Khánh' => [
                'Phường Bàu Trâm', 'Phường Bàu Sen', 'Phường Bình Lộc', 'Phường Long Bình', 'Phường Long Hưng', 'Phường Phú Bình', 'Phường Phú Tân', 'Phường Suối Tre', 'Phường Thanh Bình', 'Xã Bảo Quang', 'Xã Bình An', 'Xã Bình Lộc', 'Xã Hàng Gòn', 'Xã Hưng Lộc', 'Xã Suối Tre', 'Xã Xuân Đường', 'Xã Xuân Lộc', 'Xã Xuân Tân', 'Xã Xuân Bình', 'Xã Xuân Hòa', 'Xã Xuân Mỹ'
            ],
            // Đồng Tháp
            'Huyện Cao Lãnh' => [
                'Thị trấn Cao Lãnh', 'Xã An Bình', 'Xã An Hiệp', 'Xã An Khánh', 'Xã Bình Thạnh', 'Xã Mỹ Hội', 'Xã Mỹ Lợi', 'Xã Mỹ Long', 'Xã Mỹ Phú', 'Xã Mỹ Thọ', 'Xã Nhị Mỹ', 'Xã Phong Mỹ', 'Xã Phong Thạnh', 'Xã Phương Trà', 'Xã Tân Hòa', 'Xã Tân Hội', 'Xã Tân Long', 'Xã Tân Nghĩa'
            ],
            'Huyện Châu Thành' => [
                'Thị trấn Châu Thành', 'Xã An Bình', 'Xã An Hiệp', 'Xã An Khánh', 'Xã Bình An', 'Xã Bình Thành', 'Xã Hòa Bình', 'Xã Hòa Thành', 'Xã Mỹ An Hưng', 'Xã Mỹ Hòa', 'Xã Phú Hưng', 'Xã Tân An', 'Xã Tân Bình', 'Xã Tân Hòa', 'Xã Tân Hội', 'Xã Tân Lập', 'Xã Tân Mỹ', 'Xã Tân Nghĩa', 'Xã Tân Thạnh', 'Xã Tân Thạnh Trung'
            ],
            'Huyện Hồng Ngự' => [
                'Thị trấn Hồng Ngự', 'Xã An Bình', 'Xã An Hiệp', 'Xã An Khánh', 'Xã Bình An', 'Xã Bình Thạnh', 'Xã Mỹ An', 'Xã Mỹ Hội', 'Xã Mỹ Lợi', 'Xã Mỹ Long', 'Xã Mỹ Phú', 'Xã Mỹ Thọ', 'Xã Nhị Mỹ', 'Xã Phong Mỹ', 'Xã Phong Thạnh', 'Xã Phương Trà', 'Xã Tân Hòa', 'Xã Tân Hội', 'Xã Tân Long', 'Xã Tân Nghĩa'
            ],
            'Huyện Lai Vung' => [
                'Thị trấn Lai Vung', 'Xã An Hiệp', 'Xã Định Hòa', 'Xã Hòa Long', 'Xã Hòa Thạnh', 'Xã Hòa Thành', 'Xã Hòa Trung', 'Xã Lai Vung', 'Xã Long Hậu', 'Xã Long Thắng', 'Xã Phong Mỹ', 'Xã Tân Dương', 'Xã Tân Hòa', 'Xã Tân Hội', 'Xã Tân Hưng', 'Xã Tân Kiều', 'Xã Tân Lập'
            ],
            'Huyện Lấp Vò' => [
                'Thị trấn Lấp Vò', 'Xã Bình An', 'Xã Bình Thạnh', 'Xã Định An', 'Xã Định Hòa', 'Xã Hội An Đông', 'Xã Hội An Tây', 'Xã Long Hưng', 'Xã Long Mỹ', 'Xã Mỹ An', 'Xã Mỹ Lâm', 'Xã Mỹ Thọ', 'Xã Nhị Mỹ', 'Xã Phong Hòa', 'Xã Tân Dương', 'Xã Tân Hòa', 'Xã Tân Khánh Đông', 'Xã Tân Mỹ', 'Xã Tân Nghĩa'
            ],
            'Huyện Tam Nông' => [
                'Thị trấn Tam Nông', 'Xã An Long', 'Xã An Phong', 'Xã Bình Thành', 'Xã Hòa Bình', 'Xã Hòa An', 'Xã Hòa Thạnh', 'Xã Hòa Tân', 'Xã Hòa Trung', 'Xã Phú Đức', 'Xã Phú Thành A', 'Xã Phú Thành B', 'Xã Tân Bình', 'Xã Tân Hòa', 'Xã Tân Hội', 'Xã Tân Long', 'Xã Tân Mỹ'
            ],
            'Huyện Tân Hồng' => [
                'Thị trấn Tân Hồng', 'Xã An Long', 'Xã An Phong', 'Xã Bình Thành', 'Xã Hòa Bình', 'Xã Hòa An', 'Xã Hòa Thạnh', 'Xã Hòa Tân', 'Xã Hòa Trung', 'Xã Phú Đức', 'Xã Phú Thành A', 'Xã Phú Thành B', 'Xã Tân Bình', 'Xã Tân Hòa', 'Xã Tân Hội', 'Xã Tân Long', 'Xã Tân Mỹ'
            ],
            'Huyện Thanh Bình' => [
                'Thị trấn Thanh Bình', 'Xã An Bình', 'Xã An Hiệp', 'Xã An Khánh', 'Xã Bình An', 'Xã Bình Thạnh', 'Xã Mỹ An', 'Xã Mỹ Hội', 'Xã Mỹ Lợi', 'Xã Mỹ Long', 'Xã Mỹ Phú', 'Xã Mỹ Thọ', 'Xã Nhị Mỹ', 'Xã Phong Mỹ', 'Xã Phong Thạnh', 'Xã Phương Trà', 'Xã Tân Hòa', 'Xã Tân Hội', 'Xã Tân Long', 'Xã Tân Nghĩa'
            ],
            'Huyện Tháp Mười' => [
                'Thị trấn Tháp Mười', 'Xã An Bình', 'Xã An Hiệp', 'Xã An Khánh', 'Xã Bình An', 'Xã Bình Thạnh', 'Xã Mỹ An', 'Xã Mỹ Hội', 'Xã Mỹ Lợi', 'Xã Mỹ Long', 'Xã Mỹ Phú', 'Xã Mỹ Thọ', 'Xã Nhị Mỹ', 'Xã Phong Mỹ', 'Xã Phong Thạnh', 'Xã Phương Trà', 'Xã Tân Hòa', 'Xã Tân Hội', 'Xã Tân Long', 'Xã Tân Nghĩa'
            ],
            'Thành phố Cao Lãnh' => [
                'Phường An Bình', 'Phường An Hòa', 'Phường Hòa Thuận', 'Phường Hòa An', 'Phường Hoà Thành', 'Phường Mỹ Phú', 'Phường Mỹ Thọ', 'Phường Tân Bình', 'Phường Tân Hội', 'Phường Tân Phú', 'Phường Tân Thạnh', 'Phường Tân Thành', 'Xã Mỹ Tân', 'Xã Mỹ Ngãi', 'Xã Mỹ Trà', 'Xã Mỹ Long'
            ],
            'Thành phố Sa Đéc' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường Tân Quy Đông', 'Phường Tân Quy Tây', 'Xã An Bình', 'Xã Tân Bình', 'Xã Tân Dương', 'Xã Tân Hòa', 'Xã Tân Hội', 'Xã Tân Khánh Đông', 'Xã Tân Mỹ'
            ],
            // Gia Lai
            'Huyện Chư Păh' => [
                'Thị trấn Phú Hòa', 'Xã Hà Tây', 'Xã Hòa Phú', 'Xã Ia Khươl', 'Xã Ia Ly', 'Xã Ia Mơ Nông', 'Xã Ia Nhin', 'Xã Ia Phí', 'Xã Ia Pia', 'Xã Ia Ka', 'Xã Ia Kreng', 'Xã Ia Tô', 'Xã Nghĩa Hòa', 'Xã Nghĩa Hưng'
            ],
            'Huyện Chư Prông' => [
                'Thị trấn Chư Prông', 'Xã Bàu Cạn', 'Xã Ia Bang', 'Xã Ia Băng', 'Xã Ia Bồi', 'Xã Ia Drang', 'Xã Ia Ga', 'Xã Ia Kly', 'Xã Ia Lâu', 'Xã Ia Me', 'Xã Ia Mơ', 'Xã Ia O', 'Xã Ia Púch', 'Xã Ia Pếch', 'Xã Ia Piơr', 'Xã Ia Phìn', 'Xã Ia Rờ', 'Xã Ia Tôr', 'Xã Thăng Hưng'
            ],
            'Huyện Chư Pưh' => [
                'Thị trấn Nhơn Hoà', 'Xã Chư Don', 'Xã Ia Dreng', 'Xã Ia Hla', 'Xã Ia Hrú', 'Xã Ia Le', 'Xã Ia Blứ', 'Xã Ia Rong'
            ],
            'Huyện Chư Sê' => [
                'Thị trấn Chư Sê', 'Xã Ayun', 'Xã Bar Maih', 'Xã Bờ Ngoong', 'Xã Chư Pơng', 'Xã Chư Pưh', 'Xã Dun', 'Xã Ia Blang', 'Xã Ia Glai', 'Xã Ia Hlốp', 'Xã Ia Ko', 'Xã Ia Le', 'Xã Ia Pal', 'Xã Ia Tiêm', 'Xã Kông Htok'
            ],
            'Huyện Đăk Đoa' => [
                'Thị trấn Đăk Đoa', 'Xã A Dơk', 'Xã Đăk Krong', 'Xã Đăk Sơ Mei', 'Xã Đăk Smar', 'Xã Đăk Trôi', 'Xã Glar', 'Xã Hà Đông', 'Xã Hải Yang', 'Xã Hneng', 'Xã Ia Băng', 'Xã Ia Boòng', 'Xã Ia Pết', 'Xã Kon Gang', 'Xã K\'Dang', 'Xã Nam Yang', 'Xã Tân Bình', 'Xã Tân Lập', 'Xã Trang', 'Xã Tú An'
            ],
            'Huyện Đăk Pơ' => [
                'Thị trấn Đăk Pơ', 'Xã An Thành', 'Xã Cư An', 'Xã Đăk Tơ Pang', 'Xã Hà Tam', 'Xã Phú An', 'Xã Tân An', 'Xã Tân Phú', 'Xã Ya Hội'
            ],
            'Huyện Đức Cơ' => [
                'Thị trấn Chư Ty', 'Xã Ia Dom', 'Xã Ia Dơk', 'Xã Ia Kriêng', 'Xã Ia Kla', 'Xã Ia Lang', 'Xã Ia Pnôn', 'Xã Ia Din'
            ],
            'Huyện Ia Grai' => [
                'Thị trấn Ia Kha', 'Xã Ia Bă', 'Xã Ia Chía', 'Xã Ia Dêr', 'Xã Ia Đêr', 'Xã Ia Grăng', 'Xã Ia Hrú', 'Xã Ia Kênh', 'Xã Ia Khươl', 'Xã Ia Kreng', 'Xã Ia Pết', 'Xã Ia Sao', 'Xã Ia Tô'
            ],
            'Huyện Ia Pa' => [
                'Thị trấn Ia Pa', 'Xã Chư Răng', 'Xã Ia Broái', 'Xã Ia Hla', 'Xã Ia Mrơn', 'Xã Ia Pếch', 'Xã Ia Roong', 'Xã Ia Tiêm', 'Xã Ia Tul', 'Xã Ia Kreng', 'Xã Ia O', 'Xã Ia Tô', 'Xã Ia Yeng'
            ],
            'Huyện Kbang' => [
                'Thị trấn Kbang', 'Xã Đăk Hlơ', 'Xã Đông', 'Xã Đăk Roong', 'Xã Đăk Smar', 'Xã Hà Đăk', 'Xã Hà Đông', 'Xã Hoàng Dụng', 'Xã Hoàng Sơn', 'Xã Ia Ba', 'Xã Ia Bă', 'Xã Ia Blang', 'Xã Ia Glai', 'Xã Ia Hrú', 'Xã Ia Khươl', 'Xã Ia Kreng', 'Xã Ia Mơ', 'Xã Ia O', 'Xã Ia Piơr', 'Xã Ia Tô', 'Xã Ia Trôi'
            ],
            'Huyện Kông Chro' => [
                'Thị trấn Kông Chro', 'Xã An Trung', 'Xã Chư Krey', 'Xã Chư Kơm', 'Xã Chư Ruông', 'Xã Chư Roong', 'Xã Chư Pơng', 'Xã Đăk Sơ Mei', 'Xã Đăk Tơ Pang', 'Xã Đăk Smar', 'Xã Đăk Trôi', 'Xã Glar', 'Xã Hneng', 'Xã Ia Băng', 'Xã Ia Boòng', 'Xã Ia Pết', 'Xã Kon Gang', 'Xã K\'Dang', 'Xã Kông Pla', 'Xã Kông Chro', 'Xã Tân Bình', 'Xã Tân Lập', 'Xã Trang', 'Xã Tú An'
            ],
            'Huyện Krông Pa' => [
                'Thị trấn Phú Túc', 'Xã Chư Gu', 'Xã Chư Răng', 'Xã Ia Bă', 'Xã Ia Broái', 'Xã Ia Chía', 'Xã Ia Đơk', 'Xã Ia Hla', 'Xã Ia Kreng', 'Xã Ia Le', 'Xã Ia Lang', 'Xã Ia Lâu', 'Xã Ia Ly', 'Xã Ia Mrơn', 'Xã Ia Mơ', 'Xã Ia O', 'Xã Ia Pết', 'Xã Ia Piơr', 'Xã Ia Rờ', 'Xã Ia Roong', 'Xã Ia Tô', 'Xã Ia Tul'
            ],
            'Huyện Mang Yang' => [
                'Thị trấn Kon Dong', 'Xã Ayun', 'Xã Đak Jơ Ta', 'Xã Đak Pling', 'Xã Đak Sơ Mei', 'Xã Đak Trôi', 'Xã Đê Ar', 'Xã Đê Rơng', 'Xã Glar', 'Xã Hneng', 'Xã K’Dang', 'Xã Kon Gang', 'Xã Kon Thụp', 'Xã Lơ Pang', 'Xã Tơ Tung', 'Xã Trang', 'Xã Tú An'
            ],
            'Thành phố Pleiku' => [
                'Phường Diên Hồng', 'Phường Hội Phú', 'Phường Hội Thương', 'Phường Ia Kreng', 'Phường Ia Mơ', 'Phường Ia O', 'Phường Phù Đổng', 'Phường Tây Sơn', 'Phường Thắng Lợi', 'Phường Thống Nhất', 'Phường Trà Bá', 'Phường Trường Chinh', 'Phường Yên Đỗ', 'Phường Yên Thế', 'Xã An Phú', 'Xã Biển Hồ', 'Xã Chư Á', 'Xã Chư Hdrông', 'Xã Diên Phú', 'Xã Gào', 'Xã Hòa Phú', 'Xã Ia Kênh', 'Xã Ia Kly', 'Xã Ia Nhin', 'Xã Ia Tiêm', 'Xã Kon Gang', 'Xã Tân Bình', 'Xã Tân Lập', 'Xã Thăng Hưng'
            ],
            'Thị xã An Khê' => [
                'Phường An Bình', 'Phường An Phú', 'Phường An Tân', 'Phường An Tây', 'Phường An Thành', 'Phường An Trạch', 'Xã An Thạch', 'Xã Bình An', 'Xã Bình Thành', 'Xã Hòa Bình', 'Xã Hòa Phú', 'Xã Ia Kreng', 'Xã Kon Gang', 'Xã Tân Bình', 'Xã Tân Lập', 'Xã Tú An', 'Xã Tây Bình', 'Xã Tây Thành'
            ],
            'Thị xã Ayun Pa' => [
                'Phường Cheo Reo', 'Phường Đak Pơ', 'Phường Đak Trôi', 'Phường Glar', 'Phường Hneng', 'Phường Ia Grai', 'Phường Ia Hla', 'Phường Ia Kênh', 'Phường Ia O', 'Phường Ia Pết', 'Phường Ia Tô', 'Phường Kon Gang', 'Phường Kông Chro', 'Phường Trang', 'Phường Tú An'
            ],
            //Hà Giang
            'Huyện Bắc Mê' => [
                'Thị trấn Yên Phú', 'Xã Đường Hồng', 'Xã Hương Sơn', 'Xã Khuôn Lùng', 'Xã Minh Sơn', 'Xã Phú Linh', 'Xã Quyết Tiến', 'Xã Thanh Vân', 'Xã Yên Định'
            ],
            'Huyện Bắc Quang' => [
                'Thị trấn Vĩnh Tuy', 'Xã Bình Vị', 'Xã Đồng Tâm', 'Xã Đông Hà', 'Xã Hòa Thắng', 'Xã Hùng An', 'Xã Quang Minh', 'Xã Tân Thành', 'Xã Tiên Kiều', 'Xã Vô Điếm', 'Xã Yên Bình'
            ],
            'Huyện Đồng Văn' => [
                'Thị trấn Đồng Văn', 'Xã Lũng Cú', 'Xã Lũng Phìn', 'Xã Mèo Vạc', 'Xã Mậu Duệ', 'Xã Phú Linh', 'Xã Quyết Tiến', 'Xã Sủng Là', 'Xã Thài Phìn Tủng', 'Xã Vần Đồn'
            ],
            'Huyện Hoàng Su Phì' => [
                'Thị trấn Vinh Quang', 'Xã Bản Phùng', 'Xã Bản Luốc', 'Xã Hoàng Su Phì', 'Xã Nàng Đôn', 'Xã Thông Nguyên', 'Xã Vĩnh Hòa', 'Xã Yên Phú'
            ],
            'Huyện Mèo Vạc' => [
                'Thị trấn Mèo Vạc', 'Xã Cán Chu Phìn', 'Xã Hầu Thào', 'Xã Khum', 'Xã Lũng Cú', 'Xã Mèo Vạc', 'Xã Niêm Tòng', 'Xã Sủng Là', 'Xã Xà Phìn'
            ],
            'Huyện Quản Bạ' => [
                'Thị trấn Tam Sơn', 'Xã Cán Tỷ', 'Xã Đoàn Kết', 'Xã Đông Hà', 'Xã Hương Sơn', 'Xã Quyết Tiến', 'Xã Tân Bắc', 'Xã Tân Quang', 'Xã Vô Điếm'
            ],
            'Huyện Quang Bình' => [
                'Thị trấn Quyết Tiến', 'Xã Hòa Bình', 'Xã Kim Thượng', 'Xã Lê Lợi', 'Xã Quang Tiến', 'Xã Thái Bình', 'Xã Thái Hòa', 'Xã Yên Bình'
            ],
            'Huyện Xín Mần' => [
                'Thị trấn Cốc Pàng', 'Xã Cốc Mỳ', 'Xã Hòa Mạc', 'Xã Hòa Lạc', 'Xã Hòa Phú', 'Xã Khuôn Lùng', 'Xã Pả Vi', 'Xã Thái Hòa', 'Xã Xín Mần'
            ],
            'Huyện Vị Xuyên' => [
                'Thị trấn Vị Xuyên', 'Xã Đạo Đức', 'Xã Hương Sơn', 'Xã Minh Sơn', 'Xã Phú Linh', 'Xã Quyết Tiến', 'Xã Thanh Vân', 'Xã Vô Điếm', 'Xã Xín Mần'
            ],
            'Thành phố Hà Giang' => [
                'Phường Nguyễn Trãi', 'Phường Quang Trung', 'Phường Trường Chinh', 'Phường Trung Lương', 'Phường Yên Định', 'Xã Đạo Đức', 'Xã Hoàng Su Phì', 'Xã Phú Linh', 'Xã Quyết Tiến', 'Xã Thanh Vân'
            ],
            //Hà Nam
            'Huyện Bình Lục' => [
                'Xã An Nội', 'Xã An Lão', 'Xã An Tiến', 'Xã Bồ Đề', 'Xã Bình Nghĩa', 'Xã Chân Lý', 'Xã Đồn Xá', 'Xã Hưng Công', 'Xã Hưng Lý', 'Xã Tân Hưng', 'Xã Tân Hòa', 'Xã Trung Lương'
            ],
            'Huyện Duy Tiên' => [
                'Thị trấn Duy Tiên', 'Xã Châu Sơn', 'Xã Đạo Lý', 'Xã Hoà Mạc', 'Xã Mộc Nam', 'Xã Nguyên Lý', 'Xã Tiên Hải', 'Xã Tiên Hiệp', 'Xã Tiên Lãng', 'Xã Tiên Phong', 'Xã Tiên Tân'
            ],
            'Huyện Kim Bảng' => [
                'Thị trấn Quế', 'Xã Ba Sao', 'Xã Cẩm Vũ', 'Xã Đại Cương', 'Xã Đoàn Đào', 'Xã Hòa Bình', 'Xã Hòa Phú', 'Xã Kim Bảng', 'Xã Ngọc Sơn', 'Xã Tân Sơn', 'Xã Thị trấn Kim Bảng'
            ],
            'Huyện Lý Nhân' => [
                'Thị trấn Lý Nhân', 'Xã Chân Lý', 'Xã Đinh Xá', 'Xã Đô Lương', 'Xã Đồng Hóa', 'Xã Đức Lý', 'Xã Lý Nhân', 'Xã Nhân Đạo', 'Xã Phú Phúc', 'Xã Sơn Phú', 'Xã Văn Lý', 'Xã Yên Bắc'
            ],
            'Huyện Thanh Liêm' => [
                'Thị trấn Thanh Liêm', 'Xã Châu Sơn', 'Xã Đinh Xá', 'Xã Đức Lý', 'Xã Hưng Công', 'Xã Kim Bảng', 'Xã Liêm Cần', 'Xã Liêm Phong', 'Xã Thanh Hà', 'Xã Thanh Hương', 'Xã Thanh Lương', 'Xã Thanh Sơn'
            ],
            'Thành phố Phủ Lý' => [
                'Phường Bạch Hạc', 'Phường Hoàng Diệu', 'Phường Minh Khai', 'Phường Phủ Lý', 'Phường Trần Phú', 'Xã Châu Sơn', 'Xã Liêm Cần', 'Xã Liêm Phong', 'Xã Nhân Đạo', 'Xã Thanh Hà', 'Xã Thanh Lương'
            ],
            //Hà Nội
            'Quận Ba Đình' => [
                'Phường Cống Vị', 'Phường Đội Cấn', 'Phường Giảng Võ', 'Phường Kim Mã', 'Phường Liễu Giai', 'Phường Ngọc Hà', 'Phường Ngọc Khánh', 'Phường Quán Thánh', 'Phường Thành Công', 'Phường Vĩnh Phúc'
            ],
            'Quận Bắc Từ Liêm' => [
                'Phường Cổ Nhuế 1', 'Phường Cổ Nhuế 2', 'Phường Đông Ngạc', 'Phường Minh Khai', 'Phường Phú Diễn', 'Phường Phú Đô', 'Phường Tây Mỗ', 'Phường Thụy Phương', 'Phường Trung Văn', 'Phường Xuân Tảo'
            ],
            'Quận Cầu Giấy' => [
                'Phường Dịch Vọng', 'Phường Dịch Vọng Hậu', 'Phường Mai Dịch', 'Phường Nghĩa Đô', 'Phường Nghĩa Tân', 'Phường Quan Hoa', 'Phường Trung Hòa', 'Phường Trung Yên'
            ],
            'Quận Đống Đa' => [
                'Phường Cát Linh', 'Phường Khâm Thiên', 'Phường Khương Trung', 'Phường Kim Liên', 'Phường Láng Hạ', 'Phường Láng Thượng', 'Phường Nam Đồng', 'Phường Ô Chợ Dừa', 'Phường Phương Liên', 'Phường Thổ Quan'
            ],
            'Quận Hà Đông' => [
                'Phường Biên Giang', 'Phường Dương Nội', 'Phường Hà Cầu', 'Phường Kiến Hưng', 'Phường La Khê', 'Phường Mộ Lao', 'Phường Nguyễn Trãi', 'Phường Phú La', 'Phường Phú Lương', 'Phường Quang Trung'
            ],
            'Quận Hai Bà Trưng' => [
                'Phường Bạch Đằng', 'Phường Bách Khoa', 'Phường Đồng Tâm', 'Phường Hai Bà Trưng', 'Phường Minh Khai', 'Phường Ngọc Hà', 'Phường Quỳnh Mai', 'Phường Thanh Lương', 'Phường Thanh Nhàn'
            ],
            'Quận Hoàn Kiếm' => [
                'Phường Cửa Đông', 'Phường Cửa Nam', 'Phường Hàng Bạc', 'Phường Hàng Buồm', 'Phường Hàng Gai', 'Phường Hàng Đào', 'Phường Hàng Đường', 'Phường Hàng Mã', 'Phường Hàng Trống', 'Phường Lý Thái Tổ'
            ],
            'Quận Hoàng Mai' => [
                'Phường Đại Kim', 'Phường Giáp Bát', 'Phường Hoàng Liệt', 'Phường Hoàng Văn Thụ', 'Phường Lĩnh Nam', 'Phường Mai Động', 'Phường Tân Mai', 'Phường Thanh Xuân Bắc', 'Phường Thanh Xuân Nam'
            ],
            'Quận Long Biên' => [
                'Phường Bồ Đề', 'Phường Cự Khối', 'Phường Gia Thụy', 'Phường Long Biên', 'Phường Ngọc Thụy', 'Phường Phúc Đồng', 'Phường Thạch Bàn', 'Phường Thạch Cầu', 'Phường Văn Miếu'
            ],
            'Quận Nam Từ Liêm' => [
                'Phường Cầu Diễn', 'Phường Đại Mỗ', 'Phường Mễ Trì', 'Phường Mỹ Đình 1', 'Phường Mỹ Đình 2', 'Phường Phú Đô', 'Phường Phú Mỹ', 'Phường Phú Diễn', 'Phường Tây Mỗ'
            ],
            'Quận Tây Hồ' => [
                'Phường Bưởi', 'Phường Nhật Tân', 'Phường Quảng An', 'Phường Quảng Khánh', 'Phường Thụy Khuê', 'Phường Xuân La'
            ],
            'Quận Thanh Xuân' => [
                'Phường Hạ Đình', 'Phường Kim Giang', 'Phường Khương Đình', 'Phường Khương Mai', 'Phường Khương Trung', 'Phường Thanh Xuân Bắc', 'Phường Thanh Xuân Nam', 'Phường Trung Văn'
            ],
            'Huyện Ba Vì' => [
                'Xã Ba Trại', 'Xã Ba Vì', 'Xã Bình Phú', 'Xã Cam Thượng', 'Xã Cẩm Lĩnh', 'Xã Đông Quang', 'Xã Đồng Thái', 'Xã Phú Sơn', 'Xã Phú Cường', 'Xã Thuần Mỹ'
            ],
            'Huyện Đông Anh' => [
                'Thị trấn Đông Anh', 'Xã Cổ Loa', 'Xã Đông Hội', 'Xã Đông Hưng', 'Xã Dục Tú', 'Xã Mai Lâm', 'Xã Nam Hồng', 'Xã Nguyên Khê', 'Xã Võng La', 'Xã Xuân Canh'
            ],
            'Huyện Gia Lâm' => [
                'Xã Cổ Bi', 'Xã Dương Xá', 'Xã Gia Thụy', 'Xã Kim Lan', 'Xã Lệ Chi', 'Xã Phú Thị', 'Xã Trung Mầu', 'Xã Văn Đức', 'Xã Yên Thường'
            ],
            'Huyện Hoài Đức' => [
                'Thị trấn Trạm Trôi', 'Xã An Khánh', 'Xã An Khánh', 'Xã Dương Liễu', 'Xã Kim Chung', 'Xã La Phù', 'Xã Liên Hồng', 'Xã Sơn Đồng', 'Xã Tân Lập', 'Xã Vân Canh'
            ],
            'Huyện Mê Linh' => [
                'Xã Đại Thịnh', 'Xã Hoàng Kim', 'Xã Mê Linh', 'Xã Minh Phú', 'Xã Minh Trí', 'Xã Quang Minh', 'Xã Tiến Thắng', 'Xã Tiền Phong'
            ],
            'Huyện Mỹ Đức' => [
                'Xã An Phú', 'Xã Bình Đà', 'Xã Cấp Dẫn', 'Xã Đốc Tín', 'Xã Hương Sơn', 'Xã Hợp Tiến', 'Xã Mỹ Lương', 'Xã Phú Nam', 'Xã Tế Tiêu'
            ],
            'Huyện Sóc Sơn' => [
                'Xã Bắc Sơn', 'Xã Cổ Loa', 'Xã Đa Tốn', 'Xã Đông Hội', 'Xã Đông Ngạc', 'Xã Hiền Ninh', 'Xã Minh Trí', 'Xã Nam Sơn', 'Xã Phù Linh', 'Xã Tân Minh'
            ],
            'Huyện Thanh Trì' => [
                'Xã Đại Áng', 'Xã Duyên Hà', 'Xã Ngũ Hiệp', 'Xã Tam Hiệp', 'Xã Tân Triều', 'Xã Thanh Liệt', 'Xã Thanh Trì', 'Xã Vĩnh Hưng'
            ],
            'Huyện Thanh Oai' => [
                'Xã Cự Khê', 'Xã Đại Hưng', 'Xã Kim An', 'Xã Kim Bài', 'Xã Mỹ Hưng', 'Xã Phú Cát', 'Xã Thanh Thùy', 'Xã Thanh Xuân'
            ],
            'Huyện Thanh Thuỷ' => [
                'Xã Cổ Nhuế', 'Xã Hiệp Thuận', 'Xã Liên Mạc', 'Xã Minh Khai', 'Xã Ngọc Thụy', 'Xã Phú Đô', 'Xã Phúc Diễn', 'Xã Xuân Đỉnh'
            ],
            'Huyện Thường Tín' => [
                'Xã Bình Đà', 'Xã Bích Hòa', 'Xã Duyên Thái', 'Xã Hồng Vân', 'Xã Hữu Hòa', 'Xã Nguyễn Trãi', 'Xã Thượng Mỗ', 'Xã Thư Kỳ', 'Xã Thường Tín', 'Xã Văn Bình'
            ],
            'Huyện Từ Liêm' => [
                'Xã Cổ Nhuế', 'Xã Đông Ngạc', 'Xã Minh Khai', 'Xã Phú Đô', 'Xã Phú Diễn', 'Xã Tây Mỗ', 'Xã Trung Văn'
            ],
            //Hà Tĩnh
            'Huyện Cẩm Xuyên' => [
                'Thị trấn Cẩm Xuyên', 'Xã Cẩm An', 'Xã Cẩm Dương', 'Xã Cẩm Hưng', 'Xã Cẩm Lĩnh', 'Xã Cẩm Minh', 'Xã Cẩm Nhượng', 'Xã Cẩm Quang', 'Xã Cẩm Thành', 'Xã Cẩm Thịnh'
            ],
            'Huyện Đức Thọ' => [
                'Xã An Dũng', 'Xã Đức Lạc', 'Xã Đức Long', 'Xã Đức Thọ', 'Xã Phú Lạc', 'Xã Tân Dân', 'Xã Tân Lâm', 'Xã Tân Mỹ', 'Xã Thạch Mỹ', 'Xã Thạch Trung'
            ],
            'Huyện Hương Khê' => [
                'Thị trấn Hương Khê', 'Xã Hương Bình', 'Xã Hương Đô', 'Xã Hương Liên', 'Xã Hương Lâm', 'Xã Hương Sơn', 'Xã Hương Trung', 'Xã Hương Vinh', 'Xã Phú Gia'
            ],
            'Huyện Hương Sơn' => [
                'Thị trấn Phố Châu', 'Xã Đan Hoài', 'Xã Gia Phố', 'Xã Hòa Hải', 'Xã Hương Giang', 'Xã Hương Liên', 'Xã Hương Sơn', 'Xã Hương Trung', 'Xã Sơn Hà', 'Xã Sơn Phú'
            ],
            'Huyện Kỳ Anh' => [
                'Thị trấn Kỳ Anh', 'Xã Kỳ Châu', 'Xã Kỳ Đồng', 'Xã Kỳ Hợp', 'Xã Kỳ Khang', 'Xã Kỳ Ninh', 'Xã Kỳ Tân', 'Xã Kỳ Tây', 'Xã Kỳ Xuân', 'Xã Kỳ Yên'
            ],
            'Huyện Lộc Hà' => [
                'Thị trấn Lộc Hà', 'Xã Bình An', 'Xã Bình Minh', 'Xã Ích Hạ', 'Xã Lộc Hà', 'Xã Phù Lưu', 'Xã Thanh Lộc', 'Xã Thạch Bàn', 'Xã Thạch Hưng', 'Xã Thạch Mỹ'
            ],
            'Huyện Nghi Xuân' => [
                'Thị trấn Nghi Xuân', 'Xã Cổ Đạm', 'Xã Đan Hưng', 'Xã Hưng Lộc', 'Xã Hưng Trí', 'Xã Hưng Xuân', 'Xã Hương Bình', 'Xã Xuân Hải', 'Xã Xuân Hội'
            ],
            'Huyện Thạch Hà' => [
                'Xã Bắc Sơn', 'Xã Đức Lạc', 'Xã Đức Long', 'Xã Hòa Sơn', 'Xã Thạch Bình', 'Xã Thạch Đài', 'Xã Thạch Đồng', 'Xã Thạch Lưu', 'Xã Thạch Xuân'
            ],
            'Huyện Vũ Quang' => [
                'Thị trấn Vũ Quang', 'Xã Đức Lạc', 'Xã Đức Liên', 'Xã Đức Lập', 'Xã Hương Sơn', 'Xã Hương Thủy', 'Xã Hương Vinh', 'Xã Quảng Vinh'
            ],
            'Thành phố Hà Tĩnh' => [
                'Phường Bắc Hà', 'Phường Nam Hà', 'Phường Đại Nài', 'Phường Nguyễn Du', 'Phường Tân Giang', 'Phường Thạch Quý', 'Xã Thạch Đài', 'Xã Thạch Hưng', 'Xã Thạch Trung', 'Xã Thạch Vĩnh'
            ],
            //Hải Dương
            'Huyện Cẩm Giàng' => [
                'Xã Cẩm Chế', 'Xã Cẩm Đông', 'Xã Cẩm Hưng', 'Xã Cẩm Khê', 'Xã Cẩm Minh', 'Xã Cẩm Phúc', 'Xã Cẩm Quang', 'Xã Cẩm Sơn', 'Xã Cẩm Thượng'
            ],
            'Huyện Gia Lộc' => [
                'Xã An Lạc', 'Xã Gia Hòa', 'Xã Gia Khánh', 'Xã Gia Lâm', 'Xã Gia Minh', 'Xã Gia Phúc', 'Xã Gia Tiến', 'Xã Gia Văn', 'Xã Gia Yên'
            ],
            'Huyện Kim Thành' => [
                'Xã Cẩm Hưng', 'Xã Cẩm Giang', 'Xã Cẩm Thành', 'Xã Kim Anh', 'Xã Kim Liên', 'Xã Kim Sơn', 'Xã Kim Tân', 'Xã Kim Thượng', 'Xã Kim Tiến'
            ],
            'Huyện Kinh Môn' => [
                'Xã An Sinh', 'Xã Bình Dân', 'Xã Bình Giang', 'Xã Bình Phú', 'Xã Bích Động', 'Xã Cẩm Hưng', 'Xã Cẩm Sơn', 'Xã Hiệp Sơn', 'Xã Kinh Môn'
            ],
            'Huyện Nam Sách' => [
                'Xã An Sơn', 'Xã Cẩm Giang', 'Xã Nam Hồng', 'Xã Nam Hưng', 'Xã Nam Tiến', 'Xã Nam Trung', 'Xã Nam Thành', 'Xã Nam Thịnh', 'Xã Nam Thương'
            ],
            'Huyện Ninh Giang' => [
                'Xã An Cơ', 'Xã An Hòa', 'Xã An Sơn', 'Xã Đông Hải', 'Xã Đông Kinh', 'Xã Ninh Hải', 'Xã Ninh Hòa', 'Xã Ninh Thành', 'Xã Ninh Thịnh'
            ],
            'Huyện Thanh Hà' => [
                'Xã An Phượng', 'Xã Bình Lục', 'Xã Bình Sơn', 'Xã Đoàn Thượng', 'Xã Đông Dư', 'Xã Đông Đô', 'Xã Đông Hưng', 'Xã Đông Minh', 'Xã Đông Phú'
            ],
            'Huyện Thanh Miện' => [
                'Xã An Thượng', 'Xã Cẩm Vũ', 'Xã Cẩm Yên', 'Xã Thanh Hải', 'Xã Thanh Hương', 'Xã Thanh Phúc', 'Xã Thanh Thịnh', 'Xã Thanh Trì', 'Xã Thanh Tùng'
            ],
            'Thành phố Hải Dương' => [
                'Phường Hải Tân', 'Phường Hải Định', 'Phường Hải Phòng', 'Phường Hưng Đạo', 'Phường Nam Đồng', 'Phường Tân Hưng', 'Phường Tân Quang', 'Xã Hưng Đạo', 'Xã Tân Bình'
            ],
            //Hải Phòng
            'Quận Đồ Sơn' => [
                'Phường Hạ Độc', 'Phường Minh Đức', 'Phường Ngọc Hải', 'Phường Ngọc Xuyên', 'Phường Vạn Hương', 'Phường Vạn Sơn'
            ],
            'Quận Dương Kinh' => [
                'Phường Anh Dũng', 'Phường Dương Kinh', 'Phường Dương Nội', 'Phường Hải Thành', 'Phường Hải Đăng', 'Phường Hải An', 'Phường Tân Thành'
            ],
            'Quận Hải An' => [
                'Phường Đằng Hải', 'Phường Đằng Lâm', 'Phường Đằng Giang', 'Phường Đông Hải', 'Phường Hải An', 'Phường Hải Phòng', 'Phường Quán Trữ'
            ],
            'Quận Hồng Bàng' => [
                'Phường Hạ Lý', 'Phường Hoàng Diệu', 'Phường Hồng Bàng', 'Phường Minh Khai', 'Phường Phan Bội Châu', 'Phường Sở Dầu', 'Phường Thượng Lý'
            ],
            'Quận Kiến An' => [
                'Phường Bắc Sơn', 'Phường Đông Hải', 'Phường Hòa Nghĩa', 'Phường Kiến An', 'Phường Nghĩa Xá', 'Phường Quán Trữ', 'Phường Tân Mai'
            ],
            'Quận Lê Chân' => [
                'Phường An Dương', 'Phường An Hải', 'Phường Dư Hàng', 'Phường Lê Chân', 'Phường Lam Sơn', 'Phường Trần Nguyên Hãn', 'Phường Vĩnh Niệm'
            ],
            'Quận Ngô Quyền' => [
                'Phường An Dương', 'Phường An Hải', 'Phường Cát Dài', 'Phường Cát Linh', 'Phường Đổng Quốc', 'Phường Đông Hải', 'Phường Ngô Quyền', 'Phường Thượng Lý'
            ],
            'Quận Thủy Nguyên' => [
                'Thị trấn Minh Đức', 'Xã An Lão', 'Xã An Sơn', 'Xã Bát Trang', 'Xã Cao Nhân', 'Xã Đông Sơn', 'Xã Hưng Đạo', 'Xã Lâm Định', 'Xã Lý Học'
            ],
            'Huyện An Dương' => [
                'Xã An Dương', 'Xã An Hồng', 'Xã An Lão', 'Xã An Sơn', 'Xã Cao Minh', 'Xã Cẩm Lộc', 'Xã Dương Kinh', 'Xã Hoàng Châu', 'Xã Tân Thành'
            ],
            'Huyện An Lão' => [
                'Xã An Lão', 'Xã An Phú', 'Xã An Tiến', 'Xã An Thủy', 'Xã An Thành', 'Xã Đông Hải', 'Xã Lưu Kiếm', 'Xã Nam Sơn', 'Xã Tây Sơn'
            ],
            'Huyện Bạch Long Vĩ' => [
                'Thị trấn Bạch Long Vĩ', 'Xã Hoàng Sa'
            ],
            'Huyện Cát Hải' => [
                'Thị trấn Cát Bà', 'Xã Gia Luận', 'Xã Hiền Hào', 'Xã Phù Long', 'Xã Trân Châu', 'Xã Việt Hải'
            ],
            'Huyện Tiên Lãng' => [
                'Xã Cấp Tiến', 'Xã Đoàn Lập', 'Xã Đông Hưng', 'Xã Hồng Tiến', 'Xã Kiến Thiết', 'Xã Nam Hưng', 'Xã Tiên Cường', 'Xã Tiên Hưng', 'Xã Tiên Minh'
            ],
            'Huyện Vĩnh Bảo' => [
                'Xã An Lạc', 'Xã An Thắng', 'Xã Dũng Tiến', 'Xã Giang Biên', 'Xã Hiệp Hòa', 'Xã Hòa Bình', 'Xã Quang Trung', 'Xã Tân Liên', 'Xã Vĩnh Thắng'
            ],
            //Hòa Bình
            'Huyện Đà Bắc' => [
                'Thị trấn Đà Bắc', 'Xã Cao Sơn', 'Xã Cư Yên', 'Xã Đoàn Kết', 'Xã Mường Chiềng', 'Xã Mường Đen', 'Xã Mường Mèo', 'Xã Mường Ngần', 'Xã Sơn Thủy'
            ],
            'Huyện Cao Phong' => [
                'Xã Bắc Phong', 'Xã Cao Phong', 'Xã Hòa Bình', 'Xã Hưng Đạo', 'Xã Thạch Yên', 'Xã Tân Phong', 'Xã Tân Xuân'
            ],
            'Huyện Kim Bôi' => [
                'Xã Bình Cảng', 'Xã Bình Sơn', 'Xã Đú', 'Xã Kim Bôi', 'Xã Nhuận Trạch', 'Xã Ngọc Lương', 'Xã Sơn Thủy', 'Xã Tân Pheo', 'Xã Tân Lập'
            ],
            'Huyện Lạc Sơn' => [
                'Xã An Bình', 'Xã Bình Hẻo', 'Xã Cư Yên', 'Xã Định Cư', 'Xã Định Hòa', 'Xã Định Tiến', 'Xã Hạ Bì', 'Xã Hòa Bình', 'Xã Lạc Sơn'
            ],
            'Huyện Lạc Thủy' => [
                'Xã An Lạc', 'Xã Bình Chân', 'Xã Bình Hòa', 'Xã Cố Đô', 'Xã Đồng Tâm', 'Xã Hưng Thi', 'Xã Phú Lương', 'Xã Tân Lạc', 'Xã Tân Tiến'
            ],
            'Huyện Mai Châu' => [
                'Xã Bao La', 'Xã Chiềng Châu', 'Xã Cun Pheo', 'Xã Đoàn Kết', 'Xã Mai Hạ', 'Xã Mai Châu', 'Xã Tân Thành', 'Xã Thị trấn Mai Châu'
            ],
            'Huyện Tân Lạc' => [
                'Xã Bình Hẻo', 'Xã Cao Sơn', 'Xã Cư Yên', 'Xã Hòa Bình', 'Xã Hưng Đạo', 'Xã Nhuận Trạch', 'Xã Ngọc Lương', 'Xã Sơn Thủy', 'Xã Tân Pheo'
            ],
            'Huyện Yên Thủy' => [
                'Xã An Thịnh', 'Xã Cố Đô', 'Xã Định Cư', 'Xã Định Hòa', 'Xã Định Tiến', 'Xã Hòa Bình', 'Xã Lạc Sơn', 'Xã Tân Lập', 'Xã Tân Tiến'
            ],
            'Thành phố Hòa Bình' => [
                'Phường Chăm Mát', 'Phường Hữu Nghị', 'Phường Kỳ Sơn', 'Phường Lê Hồng Phong', 'Phường Phương Lâm', 'Phường Quyết Thắng', 'Xã Thái Bình', 'Xã Thái Thịnh', 'Xã Thủy Dương'
            ],
            //Hưng Yên
            'Huyện Ân Thi' => [
                'Xã Ân Thi', 'Xã Bắc Sơn', 'Xã Cẩm Xá', 'Xã Đông Kỳ', 'Xã Đông Lĩnh', 'Xã Hòa An', 'Xã Hòa Lạc', 'Xã Ngọc Lương', 'Xã Phú Cường'
            ],
            'Huyện Khoái Châu' => [
                'Xã An Vỹ', 'Xã Bình Minh', 'Xã Đông Tảo', 'Xã Hồng Tiến', 'Xã Khoái Châu', 'Xã La Tiến', 'Xã Phùng Chí Kiên', 'Xã Tân Dân', 'Xã Tân Hưng'
            ],
            'Huyện Kim Động' => [
                'Xã Bình Định', 'Xã Cẩm Xá', 'Xã Đông Kinh', 'Xã Kim Động', 'Xã Mễ Sở', 'Xã Phù Vân', 'Xã Tân Dân', 'Xã Tân Hưng', 'Xã Thị trấn Kim Động'
            ],
            'Huyện Mỹ Hào' => [
                'Xã Bãi Sậy', 'Xã Cẩm Xá', 'Xã Đặng Lễ', 'Xã Dương Quang', 'Xã Hưng Long', 'Xã Hưng Yên', 'Xã Tân Quang', 'Xã Tân Yên', 'Xã Văn Lâm'
            ],
            'Huyện Phù Cừ' => [
                'Xã An Vỹ', 'Xã Cẩm Xá', 'Xã Đông Tảo', 'Xã Hòa Lạc', 'Xã Khoái Châu', 'Xã Phù Cừ', 'Xã Tân Dân', 'Xã Tân Hưng', 'Xã Văn Lâm'
            ],
            'Huyện Tiên Lữ' => [
                'Xã An Viễn', 'Xã Cẩm Xá', 'Xã Đông Kinh', 'Xã Hòa Lạc', 'Xã Tiên Lữ', 'Xã Tân Dân', 'Xã Tân Hưng', 'Xã Thị trấn Tiên Lữ'
            ],
            'Huyện Văn Giang' => [
                'Xã Bình Minh', 'Xã Cẩm Xá', 'Xã Hồng Tiến', 'Xã Khoái Châu', 'Xã Phùng Chí Kiên', 'Xã Tân Dân', 'Xã Tân Hưng', 'Xã Thị trấn Văn Giang'
            ],
            'Huyện Văn Lâm' => [
                'Xã Bãi Sậy', 'Xã Cẩm Xá', 'Xã Hưng Long', 'Xã Hưng Yên', 'Xã Tân Quang', 'Xã Tân Yên', 'Xã Thị trấn Văn Lâm'
            ],
            'Huyện Văn Môn' => [
                'Xã An Vỹ', 'Xã Cẩm Xá', 'Xã Đông Kinh', 'Xã Khoái Châu', 'Xã Phù Cừ', 'Xã Tân Dân', 'Xã Tân Hưng'
            ],
            'Thành phố Hưng Yên' => [
                'Phường An Tảo', 'Phường Hiến Nam', 'Phường Lê Lợi', 'Phường Minh Khai', 'Phường Quang Trung', 'Phường Tân Hưng', 'Phường Tân Phúc', 'Xã Bãi Sậy', 'Xã Cẩm Xá'
            ],
            //Hậu Giang
            'Huyện Châu Thành' => [
                'Xã Châu Thành A', 'Xã Châu Thành B', 'Xã Đông Thạnh', 'Xã Hòa An', 'Xã Hòa Bình', 'Xã Long Thạnh', 'Xã Tân Thành', 'Xã Tân Phú', 'Xã Thị trấn Châu Thành'
            ],
            'Huyện Châu Thành A' => [
                'Xã Châu Thành', 'Xã Đông Thạnh', 'Xã Hòa An', 'Xã Hòa Bình', 'Xã Tân Thành', 'Xã Thị trấn Châu Thành'
            ],
            'Huyện Long Mỹ' => [
                'Xã Long Mỹ', 'Xã Long Thạnh', 'Xã Long Thành', 'Xã Long Trị', 'Xã Tân Phú', 'Xã Tân Thành', 'Xã Thị trấn Long Mỹ'
            ],
            'Huyện Phụng Hiệp' => [
                'Xã Bình Thành', 'Xã Phụng Hiệp', 'Xã Tân Phú', 'Xã Tân Thành', 'Xã Thị trấn Phụng Hiệp'
            ],
            'Huyện Vị Thủy' => [
                'Xã Vị Bình', 'Xã Vị Thanh', 'Xã Vị Thủy', 'Xã Thị trấn Vị Thủy'
            ],
            'Huyện Vị Thanh' => [
                'Xã Vị Bình', 'Xã Vị Hưng', 'Xã Vị Thủy', 'Xã Thị trấn Vị Thanh'
            ],
            'Thành phố Vị Thanh' => [
                'Phường An Lạc', 'Phường An Phú', 'Phường An Hòa', 'Phường An Lạc', 'Xã Hưng Phú', 'Xã Thị trấn Vị Thanh'
            ],
            //Khánh Hòa
            'Huyện Cam Lâm' => [
                'Xã Cam Hải Đông', 'Xã Cam Hải Tây', 'Xã Cam Hiệp Bắc', 'Xã Cam Hiệp Nam', 'Xã Cam Phước Đông', 'Xã Cam Phước Tây', 'Xã Cam Tân', 'Xã Cam Thành Bắc', 'Xã Cam Thành Nam'
            ],
            'Huyện Cam Ranh' => [
                'Xã Cam Bình', 'Xã Cam Phước Đông', 'Xã Cam Phước Tây', 'Xã Cam Tân', 'Xã Cam Thành Bắc', 'Xã Cam Thành Nam', 'Xã Cam Hải Đông', 'Xã Cam Hải Tây'
            ],
            'Huyện Diên Khánh' => [
                'Xã Diên An', 'Xã Diên Bình', 'Xã Diên Đồng', 'Xã Diên Hòa', 'Xã Diên Lạc', 'Xã Diên Môn', 'Xã Diên Phú', 'Xã Diên Sơn', 'Xã Diên Thạnh'
            ],
            'Huyện Khánh Sơn' => [
                'Xã Ba Cụm Bắc', 'Xã Ba Cụm Nam', 'Xã Khánh Hòa', 'Xã Khánh Nam', 'Xã Khánh Trung', 'Xã Khánh Vĩnh'
            ],
            'Huyện Khánh Vĩnh' => [
                'Xã Khánh Bình', 'Xã Khánh Hiệp', 'Xã Khánh Hòa', 'Xã Khánh Phú', 'Xã Khánh Sơn', 'Xã Khánh Vĩnh'
            ],
            'Huyện Ninh Hòa' => [
                'Xã Ninh An', 'Xã Ninh Bình', 'Xã Ninh Gia', 'Xã Ninh Hoa', 'Xã Ninh Hòa', 'Xã Ninh Quang', 'Xã Ninh Trung', 'Xã Ninh Tây', 'Xã Ninh Thọ'
            ],
            'Thành phố Nha Trang' => [
                'Phường Lộc Thọ', 'Phường Phước Hòa', 'Phường Phước Long', 'Phường Vĩnh Hải', 'Phường Vĩnh Nguyên', 'Phường Vĩnh Phước', 'Phường Vĩnh Trung', 'Phường Xương Huân', 'Xã Vĩnh Thạnh'
            ],
            //Kiên Giang
            'Huyện An Biên' => [
                'Xã An Bình', 'Xã An Hòa', 'Xã An Minh', 'Xã An Phú', 'Xã An Thạnh', 'Xã An Vĩnh', 'Xã Bình An', 'Xã Tân Hiệp', 'Xã Tân Thạnh'
            ],
            'Huyện An Minh' => [
                'Xã An Biên', 'Xã An Minh', 'Xã An Phú', 'Xã An Thạnh', 'Xã An Vĩnh', 'Xã Bình An', 'Xã Tân Hiệp', 'Xã Tân Thạnh'
            ],
            'Huyện Châu Thành' => [
                'Xã An Hòa', 'Xã Châu Thành', 'Xã Dương Hòa', 'Xã Dương Tơ', 'Xã Hòa Thuận', 'Xã Tân Hiệp', 'Xã Tân Thạnh', 'Xã Vĩnh Hoà', 'Xã Vĩnh Hòa'
            ],
            'Huyện Giang Thành' => [
                'Xã Giang Thành', 'Xã Phú Mỹ', 'Xã Phú Quốc', 'Xã Tân Hiệp', 'Xã Tân Thành', 'Xã Vĩnh Hoà'
            ],
            'Huyện Hà Tiên' => [
                'Thị trấn Hà Tiên', 'Xã Dương Đông', 'Xã Dương Tơ', 'Xã Hiệp Thành', 'Xã Mỹ Đức', 'Xã Tân Hiệp', 'Xã Tân Thành', 'Xã Vĩnh Hiệp', 'Xã Vĩnh Hòa'
            ],
            'Huyện Hòn Đất' => [
                'Xã Bình Sơn', 'Xã Hiệp Thành', 'Xã Hòn Đất', 'Xã Hòa Bình', 'Xã Tân Hiệp', 'Xã Tân Thành', 'Xã Vĩnh Phước', 'Xã Vĩnh Hòa'
            ],
            'Huyện Hòn Là' => [
                'Xã Hòn Là', 'Xã Vĩnh Phúc', 'Xã Vĩnh Hòa', 'Xã Vĩnh Sơn'
            ],
            'Huyện Kiên Hải' => [
                'Xã An Bình', 'Xã Hòn Đất', 'Xã Tân Hiệp', 'Xã Tân Thành', 'Xã Vĩnh Hiệp'
            ],
            'Huyện Kiên Lương' => [
                'Xã Bình An', 'Xã Bình Hiệp', 'Xã Bình Phú', 'Xã Bình Sơn', 'Xã Bình Thạnh', 'Xã Tân Hiệp', 'Xã Tân Thành', 'Xã Vĩnh Hòa'
            ],
            'Huyện Phú Quốc' => [
                'Xã Dương Đông', 'Xã Dương Tơ', 'Xã Gành Dầu', 'Xã Hàm Ninh', 'Xã Hòa Bình', 'Xã Tân Hiệp', 'Xã Tân Thành', 'Xã Vĩnh Hiệp'
            ],
            'Huyện Tân Hiệp' => [
                'Xã Tân Hiệp', 'Xã Tân Thành', 'Xã Vĩnh Hiệp'
            ],
            'Huyện Tịnh Biên' => [
                'Xã An Phú', 'Xã An Hòa', 'Xã An Ninh', 'Xã Hòa Bình', 'Xã Hòa Hiệp', 'Xã Tân Hiệp', 'Xã Tân Thành', 'Xã Vĩnh Hiệp'
            ],
            'Thành phố Rạch Giá' => [
                'Phường An Hòa', 'Phường An Bình', 'Phường An Phú', 'Phường Tân An', 'Phường Tân Hiệp', 'Phường Tân Thành', 'Phường Vĩnh Hiệp'
            ],
            //Kon Tum
            'Huyện Đăk Glei' => [
                'Xã Đăk Glei', 'Xã Đăk Môn', 'Xã Đăk Plong', 'Xã Đăk Pne', 'Xã Đăk Xú', 'Xã Mường Hoong', 'Xã Mường Rứt', 'Xã Ngọc Linh'
            ],
            'Huyện Đăk Hà' => [
                'Xã Đăk Blà', 'Xã Đăk Côi', 'Xã Đăk Long', 'Xã Đăk Mar', 'Xã Đăk Hring', 'Xã Đăk Kôi', 'Xã Đăk Pxi', 'Xã Đăk Tô', 'Xã Đăk Xú', 'Xã Đăk Rơ', 'Xã Măng Yang'
            ],
            'Huyện Đăk Tô' => [
                'Xã Đăk Blà', 'Xã Đăk Côi', 'Xã Đăk Long', 'Xã Đăk Mar', 'Xã Đăk Hring', 'Xã Đăk Kôi', 'Xã Đăk Pxi', 'Xã Đăk Tô', 'Xã Đăk Xú', 'Xã Đăk Rơ', 'Xã Măng Yang'
            ],
            'Huyện Kon Plông' => [
                'Xã Đăk Kôi', 'Xã Đăk Long', 'Xã Đăk Mar', 'Xã Đăk Môn', 'Xã Đăk Plong', 'Xã Đăk Pne', 'Xã Đăk Xú', 'Xã Măng Yang'
            ],
            'Huyện Kon Rẫy' => [
                'Xã Đăk Blà', 'Xã Đăk Côi', 'Xã Đăk Hring', 'Xã Đăk Kôi', 'Xã Đăk Mar', 'Xã Đăk Môn', 'Xã Đăk Plong', 'Xã Đăk Pne', 'Xã Đăk Tô', 'Xã Đăk Xú', 'Xã Măng Yang'
            ],
            'Huyện Ngọc Hồi' => [
                'Xã Đăk Ang', 'Xã Đăk Dục', 'Xã Đăk Kan', 'Xã Đăk Lao', 'Xã Đăk Môn', 'Xã Đăk Plong', 'Xã Đăk Pne', 'Xã Đăk Xú', 'Xã Đăk Tô', 'Xã Đăk Rơ', 'Xã Đăk Kôi'
            ],
            'Huyện Sa Thầy' => [
                'Xã Đăk Blà', 'Xã Đăk Côi', 'Xã Đăk Long', 'Xã Đăk Mar', 'Xã Đăk Hring', 'Xã Đăk Kôi', 'Xã Đăk Pxi', 'Xã Đăk Xú', 'Xã Măng Yang'
            ],
            'Thành phố Kon Tum' => [
                'Phường Quang Trung', 'Phường Thắng Lợi', 'Phường Ngô Mây', 'Phường Trần Hưng Đạo', 'Phường Thống Nhất', 'Phường Lê Hồng Phong', 'Xã Đăk Blà', 'Xã Đăk Côi'
            ],
            //Lai Châu
            'Huyện Mường Tè' => [
                'Xã Mường Tè', 'Xã Mường Nhé', 'Xã Mường Khun', 'Xã Mường Xén', 'Xã Mường Mô', 'Xã Mường Chà', 'Xã Mường Muôn'
            ],
            'Huyện Mường Nhé' => [
                'Xã Mường Nhé', 'Xã Mường Tè', 'Xã Mường Khun', 'Xã Mường Xén', 'Xã Mường Mô', 'Xã Mường Chà', 'Xã Mường Muôn'
            ],
            'Huyện Sìn Hồ' => [
                'Xã Sìn Hồ', 'Xã Sà Dề Phìn', 'Xã Sà Phìn', 'Xã Tả Ngảo', 'Xã Tả Phìn', 'Xã Tả Chải', 'Xã Tả Sín', 'Xã Tả Đoài', 'Xã Sốp A', 'Xã Làng Giàng'
            ],
            'Huyện Phong Thổ' => [
                'Xã Phong Thổ', 'Xã Mường Tè', 'Xã Phong Châu', 'Xã Phong Lâm', 'Xã Phong Mới', 'Xã Phong Xuân', 'Xã Phong Thượng'
            ],
            'Huyện Tam Đường' => [
                'Xã Tam Đường', 'Xã Tam Giang', 'Xã Tam Đường', 'Xã Tam Đạo', 'Xã Tam Châu', 'Xã Tam Đạo', 'Xã Tam Thành'
            ],
            'Huyện Tân Uyên' => [
                'Xã Tân Uyên', 'Xã Tân Thịnh', 'Xã Tân An', 'Xã Tân Hưng', 'Xã Tân Thành', 'Xã Tân Bình', 'Xã Tân Phú'
            ],
            'Huyện Nậm Nhùn' => [
                'Xã Nậm Nhùn', 'Xã Nậm Tị', 'Xã Nậm Chà', 'Xã Nậm Phí', 'Xã Nậm Quang', 'Xã Nậm Pì', 'Xã Nậm Mu'
            ],
            'Thành phố Lai Châu' => [
                'Phường Đoàn Kết', 'Phường Quyết Tiến', 'Phường Tân Phong', 'Xã Hợp Thành', 'Xã Vàng Ma Chải', 'Xã Quản Lĩnh', 'Xã Mường Cang', 'Xã Mường Khương'
            ],
            //Lào Cai
            'Huyện Bát Xát' => [
                'Xã Bát Xát', 'Xã Cốc Mỳ', 'Xã Lý Sơn', 'Xã Mường Hum', 'Xã Mường Khương', 'Xã Nậm Chạc', 'Xã Nậm Tị', 'Xã Nậm Pì', 'Xã Quang Kim'
            ],
            'Huyện Bắc Hà' => [
                'Xã Bắc Hà', 'Xã Cốc Ly', 'Xã Hoàng Thu Phố', 'Xã Lùng Phình', 'Xã Lùng Cải', 'Xã Nậm Đích', 'Xã Nậm Khánh', 'Xã Nậm Tị', 'Xã Phố Lu', 'Xã Tả Van Chư'
            ],
            'Huyện Bảo Thắng' => [
                'Xã Bảo Thắng', 'Xã Bảo Yên', 'Xã Bảo Thắng', 'Xã Đình Cả', 'Xã Liêm Phú', 'Xã Xuân Quang', 'Xã Vĩnh Yên', 'Xã Vĩnh Phú'
            ],
            'Huyện Bảo Yên' => [
                'Xã Bảo Yên', 'Xã Cốc Mỳ', 'Xã Đình Cả', 'Xã Liêm Phú', 'Xã Nậm Tị', 'Xã Nậm Mu', 'Xã Nậm Pì', 'Xã Vĩnh Phú'
            ],
            'Huyện Mường Khương' => [
                'Xã Bát Xát', 'Xã Cốc Mỳ', 'Xã Mường Khương', 'Xã Nậm Pì', 'Xã Quang Kim', 'Xã Tả Phìn', 'Xã Tả Van Chư'
            ],
            'Huyện Sa Pa' => [
                'Xã Bát Xát', 'Xã Cốc Mỳ', 'Xã Dền Sáng', 'Xã Mường Hoa', 'Xã Nậm Khánh', 'Xã Nậm Tị', 'Xã Phường', 'Xã Tả Phìn', 'Xã Tả Van Chư'
            ],
            'Huyện Văn Bàn' => [
                'Xã Bảo Yên', 'Xã Cốc Mỳ', 'Xã Nậm Pì', 'Xã Nậm Tị', 'Xã Phường', 'Xã Tả Van Chư', 'Xã Vĩnh Phú'
            ],
            'Thành phố Lào Cai' => [
                'Phường Bình Minh', 'Phường Cốc Lếu', 'Phường Kim Tân', 'Phường Lào Cai', 'Phường Nam Cường', 'Phường Phố Mới', 'Phường Thanh Bình', 'Xã Cam Đường'
            ],
            //Lâm Đồng
            'Huyện Bảo Lâm' => [
                'Xã Bảo Lâm', 'Xã Bảo Lộc', 'Xã Đạ Huoai', 'Xã Đạ Tẻh', 'Xã Đơn Dương', 'Xã Lạc Dương', 'Xã Lạc Sơn', 'Xã Liên Đầm', 'Xã Ninh Gia', 'Xã Ninh Sơn'
            ],
            'Huyện Bảo Lộc' => [
                'Xã Lộc An', 'Xã Lộc Châu', 'Xã Lộc Phát', 'Xã Lộc Tiến', 'Xã Lộc Tân', 'Xã Lộc Nam', 'Xã B\'lao', 'Thị trấn Bảo Lộc'
            ],
            'Huyện Di Linh' => [
                'Xã Gia Hiệp', 'Xã Gia Bắc', 'Xã Gia Lâm', 'Xã Gia Ray', 'Xã Di Linh', 'Xã Tân Châu', 'Xã Tân Nghĩa', 'Xã Tân Lâm', 'Xã Tân Tiến'
            ],
            'Huyện Đạ Huoai' => [
                'Xã Đạ Huoai', 'Xã Đạ M\'Rong', 'Xã Đạ Tẻh', 'Xã Ma Đa Guôi', 'Xã Phan Dũng'
            ],
            'Huyện Đạ Tẻh' => [
                'Xã Đạ Tẻh', 'Xã Đạ M\'Rong', 'Xã Đạ Huoai', 'Xã Phan Dũng'
            ],
            'Huyện Đức Trọng' => [
                'Xã Hiệp Thạnh', 'Xã N\'Thol', 'Xã Tân Hội', 'Xã Tân Thượng', 'Xã Tân Thành', 'Thị trấn Liên Nghĩa'
            ],
            'Huyện Lạc Dương' => [
                'Xã Đạ Sar', 'Xã Lạc Dương', 'Xã Lạc Sơn', 'Xã Lộc Phát'
            ],
            'Huyện Đơn Dương' => [
                'Xã Đơn Dương', 'Xã Tân Thạnh', 'Xã Tân Lâm', 'Xã Tân Châu'
            ],
            'Thành phố Đà Lạt' => [
                'Xã Xuân Thọ', 'Xã Xuân Trường', 'Xã Xuân Tân', 'Xã Xuân Hòa', 'Xã Xuân Cảnh'
            ],
            //Lạng Sơn
            'Huyện Bình Gia' => [
                'Xã Bình Trung', 'Xã Bình Xa', 'Xã Hưng Đạo', 'Xã Hoàng Việt', 'Xã Hòa Bình', 'Xã Tân Hương', 'Xã Hưng Đạo', 'Xã Đồng Ý', 'Xã Hồng Phong'
            ],
            'Huyện Cao Lộc' => [
                'Xã Cao Lâu', 'Xã Cao Thượng', 'Xã Hợp Thành', 'Xã Khuôn Vi', 'Xã Tân Thành', 'Xã Xuân Long', 'Xã Xuân Cường'
            ],
            'Huyện Chi Lăng' => [
                'Xã Chi Lăng', 'Xã Hữu Kiên', 'Xã Hữu Lũng', 'Xã Tân Liên', 'Xã Tân Lập', 'Xã Lâm Sơn', 'Xã Lâm Thủy'
            ],
            'Huyện Đình Lập' => [
                'Xã Bắc Lý', 'Xã Đình Lập', 'Xã Lâm Ca', 'Xã Lộc Bình', 'Xã Sơn Cẩm', 'Xã Vân An', 'Xã Vân Môn'
            ],
            'Huyện Lộc Bình' => [
                'Xã Bản Dền', 'Xã Bắc Lý', 'Xã Hữu Lũng', 'Xã Tân Lập', 'Xã Tân Liên', 'Xã Tân Lâm', 'Xã Bảo Lâm'
            ],
            'Huyện Văn Lãng' => [
                'Xã Bản Đàn', 'Xã Chiêu Lưu', 'Xã Hoàng Vi', 'Xã Tân Tĩnh', 'Xã Văn Lãng', 'Xã Vũ Lăng', 'Xã Vũ Quang'
            ],
            'Huyện Văn Quan' => [
                'Xã Bình Cường', 'Xã Đồng Tâm', 'Xã Hòa Bình', 'Xã Hồng Thái', 'Xã Tân Lập', 'Xã Tân Quang', 'Xã Tân Thành'
            ],
            'Thành phố Lạng Sơn' => [
                'Phường Chi Lăng', 'Phường Hoàng Văn Thụ', 'Phường Lê Lợi', 'Phường Vĩnh Trại', 'Phường Đông Kinh', 'Phường Tam Thanh', 'Phường Phan Đình Phùng'
            ],
            // Long An
            'Huyện Bến Lức' => [
                'Xã Bình Đức', 'Xã Bến Lức', 'Xã Long Hiệp', 'Xã Tân Bửu', 'Xã Tân Hòa', 'Xã Tân Lập', 'Xã Long Trị'
            ],
            'Huyện Cần Đước' => [
                'Xã Cần Đước', 'Xã Cần Giuộc', 'Xã Long Hậu', 'Xã Phước Đông', 'Xã Tân Chánh', 'Xã Tân Định', 'Xã Phước Lại'
            ],
            'Huyện Cần Giuộc' => [
                'Xã An Thạnh', 'Xã Cần Giuộc', 'Xã Đông Thạnh', 'Xã Phước Lại', 'Xã Tân Tập', 'Xã Phước Lý', 'Xã Phước Hậu'
            ],
            'Huyện Châu Thành' => [
                'Xã An Lạc', 'Xã Châu Thành', 'Xã Hòa Phú', 'Xã Tân Phú', 'Xã Thành Đức', 'Xã Tân Châu', 'Xã Tân Hưng'
            ],
            'Huyện Đức Hòa' => [
                'Xã An Ninh Đông', 'Xã Đức Hòa', 'Xã Hòa Khánh', 'Xã Tân Phú', 'Xã Tân Sơn', 'Xã Tân Thành', 'Xã Bình Hòa'
            ],
            'Huyện Đức Huệ' => [
                'Xã Bình Hòa', 'Xã Đức Huệ', 'Xã Mỹ Thạnh', 'Xã Tân Thành', 'Xã Thạnh Hòa', 'Xã Thạnh Phú', 'Xã Thạnh Tân'
            ],
            'Huyện Mộc Hóa' => [
                'Xã Bình Hòa', 'Xã Mộc Hóa', 'Xã Tân Lập', 'Xã Tân Thành', 'Xã Thạnh Phú', 'Xã Thạnh Hòa', 'Xã Thạnh Tân'
            ],
            'Huyện Tân Hưng' => [
                'Xã Hưng Hà', 'Xã Tân Hưng', 'Xã Tân Thành', 'Xã Vĩnh Bình', 'Xã Vĩnh Hưng', 'Xã Vĩnh Thuận', 'Xã Vĩnh Phú'
            ],
            'Huyện Tân Thạnh' => [
                'Xã Bình Hòa', 'Xã Tân Thạnh', 'Xã Thạnh An', 'Xã Thạnh Hòa', 'Xã Thạnh Phú', 'Xã Thạnh Tân', 'Xã Thạnh Đức'
            ],
            'Huyện Tân Trụ' => [
                'Xã Bình Tâm', 'Xã Hòa Hưng', 'Xã Long Khê', 'Xã Tân Trụ', 'Xã Thạnh Đức', 'Xã Thạnh Phú', 'Xã Thạnh Hưng'
            ],
            'Huyện Thạnh Hóa' => [
                'Xã Bình An', 'Xã Thạnh Hóa', 'Xã Tân Bình', 'Xã Tân Phú', 'Xã Tân Thành', 'Xã Thạnh Phú', 'Xã Thạnh Tân'
            ],
            'Huyện Vĩnh Hưng' => [
                'Xã Bình Hưng', 'Xã Vĩnh Hưng', 'Xã Tân Quý', 'Xã Tân Thành', 'Xã Thạnh Phú', 'Xã Thạnh Hòa', 'Xã Thạnh Tân'
            ],
            'Huyện Vĩnh Long' => [
                'Xã Bình Phong', 'Xã Long An', 'Xã Tân Bình', 'Xã Tân Hưng', 'Xã Tân Thành', 'Xã Thạnh Hòa', 'Xã Thạnh Phú'
            ],
            'Thành phố Tân An' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5', 'Phường 6', 'Phường 7'
            ],

            // Nam Định
            'Huyện Giao Thủy' => [
                'Xã Bạch Long', 'Xã Giao Hải', 'Xã Giao Hương', 'Xã Giao Thịnh', 'Xã Giao Xuân', 'Xã Giao Yến', 'Xã Hải Đường', 'Xã Hải Phong'
            ],
            'Huyện Hải Hậu' => [
                'Xã An Hòa', 'Xã Hải Bắc', 'Xã Hải Châu', 'Xã Hải Chính', 'Xã Hải Hưng', 'Xã Hải Minh', 'Xã Hải Phú', 'Xã Hải Tân'
            ],
            'Huyện Mỹ Lộc' => [
                'Xã Mỹ Hưng', 'Xã Mỹ Lộc', 'Xã Mỹ Thành', 'Xã Mỹ Xá', 'Xã Mỹ Trung'
            ],
            'Huyện Nam Trực' => [
                'Xã Bình Minh', 'Xã Đồng Sơn', 'Xã Nam Dương', 'Xã Nam Hồng', 'Xã Nam Thanh', 'Xã Nam Tiến', 'Xã Trực Cường'
            ],
            'Huyện Nghĩa Hưng' => [
                'Xã Bình Minh', 'Xã Nghĩa Bình', 'Xã Nghĩa Châu', 'Xã Nghĩa Hưng', 'Xã Nghĩa Sơn'
            ],
            'Huyện Trực Ninh' => [
                'Xã Trực Đạo', 'Xã Trực Chính', 'Xã Trực Hưng', 'Xã Trực Khang', 'Xã Trực Nội'
            ],
            'Huyện Vụ Bản' => [
                'Xã Cộng Hòa', 'Xã Đoài', 'Xã Liên Bảo', 'Xã Tân Bình', 'Xã Thanh Hương'
            ],
            'Thành phố Nam Định' => [
                'Phường Cửa Bắc', 'Phường Cửa Nam', 'Phường Hải Hưng', 'Phường Hưng Trung', 'Phường Vị Hoàng'
            ],
            // Nghệ An
            'Huyện Anh Sơn' => [
                'Xã Đỉnh Sơn', 'Xã Hội Sơn', 'Xã Khe Mo', 'Xã Phúc Sơn', 'Xã Tân Kỳ', 'Xã Thạch Sơn'
            ],
            'Huyện Con Cuông' => [
                'Xã Bồng Khê', 'Xã Đôn Phục', 'Xã Môn Sơn', 'Xã Thạch Ngọc', 'Xã Tân Kỳ'
            ],
            'Huyện Diễn Châu' => [
                'Xã Diễn An', 'Xã Diễn Bích', 'Xã Diễn Đoài', 'Xã Diễn Hạnh', 'Xã Diễn Kim'
            ],
            'Huyện Đô Lương' => [
                'Xã Bảo Thành', 'Xã Đà Sơn', 'Xã Hương Sơn', 'Xã Lam Sơn', 'Xã Quang Sơn'
            ],
            'Huyện Hưng Nguyên' => [
                'Xã Hưng Đạo', 'Xã Hưng Trung', 'Xã Hưng Yên', 'Xã Long Sơn', 'Xã Thượng Tân'
            ],
            'Huyện Kỳ Sơn' => [
                'Xã Hữu Kiệm', 'Xã Kỳ Sơn', 'Xã Mường Xén', 'Xã Na Loi', 'Xã Tà Cạ'
            ],
            'Huyện Nam Đàn' => [
                'Xã Khánh Sơn', 'Xã Nam Giang', 'Xã Nam Trung', 'Xã Nam Hưng', 'Xã Nam Khang'
            ],
            'Huyện Nghi Lộc' => [
                'Xã Nghi Đức', 'Xã Nghi Hưng', 'Xã Nghi Kiều', 'Xã Nghi Long', 'Xã Nghi Thuận'
            ],
            'Huyện Quế Phong' => [
                'Xã Châu Kim', 'Xã Hạnh Dịch', 'Xã Mường Nọc', 'Xã Quế Sơn', 'Xã Thông Thụ'
            ],
            'Huyện Quỳ Châu' => [
                'Xã Châu Hạnh', 'Xã Châu Bình', 'Xã Quỳ Châu', 'Xã Quỳ Hợp', 'Xã Quỳ Thượng'
            ],
            'Huyện Quỳ Hợp' => [
                'Xã Châu Thái', 'Xã Hồng Long', 'Xã Nghĩa Hợp', 'Xã Quỳ Hợp', 'Xã Tây Sơn'
            ],
            'Huyện Quỳnh Lưu' => [
                'Xã An Hòa', 'Xã Quỳnh Vinh', 'Xã Quỳnh Long', 'Xã Quỳnh Lưu', 'Xã Quỳnh Thọ'
            ],
            'Huyện Tân Kỳ' => [
                'Xã Hương Sơn', 'Xã Kỳ Sơn', 'Xã Tân Kỳ', 'Xã Tân An', 'Xã Tân Hợp'
            ],
            'Huyện Thanh Chương' => [
                'Xã Đô Lương', 'Xã Thanh Khê', 'Xã Thanh Liên', 'Xã Thanh Sơn', 'Xã Thanh Thủy'
            ],
            'Huyện Thanh Hà' => [
                'Xã Thanh Ba', 'Xã Thanh Sơn', 'Xã Thanh Thủy', 'Xã Thanh Xá', 'Xã Thanh Yên'
            ],
            'Huyện Thái Hòa' => [
                'Xã Hưng Đạo', 'Xã Hưng Lợi', 'Xã Hưng Sơn', 'Xã Hưng Tây', 'Xã Thái Hòa'
            ],
            'Huyện Yên Thành' => [
                'Xã Bảo Thành', 'Xã Đức Thành', 'Xã Lý Sơn', 'Xã Sơn Thành', 'Xã Yên Thành'
            ],
            'Thành phố Vinh' => [
                'Phường Cửa Nam', 'Phường Cửa Bắc', 'Phường Hưng Phúc', 'Phường Hưng Bình', 'Phường Hưng Dũng'
            ],

            // Ninh Bình
            'Huyện Gia Viễn' => [
                'Xã Gia Hưng', 'Xã Gia Lập', 'Xã Gia Minh', 'Xã Gia Vượng', 'Xã Gia Viễn'
            ],
            'Huyện Hoa Lư' => [
                'Xã Bích Đào', 'Xã Cúc Phương', 'Xã Hoa Lư', 'Xã Ninh Hòa', 'Xã Trường Yên'
            ],
            'Huyện Kim Sơn' => [
                'Xã Kim Trung', 'Xã Kim Tân', 'Xã Kim Thành', 'Xã Kim Thịnh', 'Xã Kim Đông'
            ],
            'Huyện Nho Quan' => [
                'Xã Gia Tân', 'Xã Nho Quan', 'Xã Thạch Bình', 'Xã Thạch Giám', 'Xã Thạch Hà'
            ],
            'Huyện Yên Khánh' => [
                'Xã Khánh An', 'Xã Khánh Cư', 'Xã Khánh Dương', 'Xã Khánh Hòa', 'Xã Khánh Hòa'
            ],
            'Huyện Yên Mô' => [
                'Xã Yên Mô', 'Xã Yên Phong', 'Xã Yên Trung', 'Xã Yên Hưng', 'Xã Yên Tân'
            ],
            'Thành phố Ninh Bình' => [
                'Phường Ba Đình', 'Phường Cửa Bắc', 'Phường Hưng Phúc', 'Phường Hưng Bình', 'Phường Nam Thành'
            ],
            // Ninh Thuận
            'Huyện Bác Ái' => [
                'Xã Phước Bình', 'Xã Phước Dinh', 'Xã Phước Hòa', 'Xã Phước Tân', 'Xã Phước Thái'
            ],
            'Huyện Cà Ná' => [
                'Xã Cà Ná'
            ],
            'Huyện Ninh Hải' => [
                'Xã Nhơn Hải', 'Xã Vĩnh Hải', 'Xã Vĩnh Hảo', 'Xã Vĩnh Tân', 'Xã Vĩnh Thuận'
            ],
            'Huyện Ninh Phước' => [
                'Xã Phước Dân', 'Xã Phước Hữu', 'Xã Phước Nam', 'Xã Phước Thuận', 'Xã Phước Tân'
            ],
            'Huyện Ninh Sơn' => [
                'Xã Ba Cụm Bắc', 'Xã Ba Cụm Nam', 'Xã Lâm Sơn', 'Xã Sơn Hải', 'Xã Tân Sơn'
            ],
            'Huyện Thuận Bắc' => [
                'Xã Bắc Sơn', 'Xã Lợi Hải', 'Xã Thuận Bắc', 'Xã Thuận Minh', 'Xã Thuận Nam'
            ],
            'Huyện Thuận Nam' => [
                'Xã Cà Ná', 'Xã Phước Diêm', 'Xã Phước Nam', 'Xã Phước Sơn', 'Xã Phước Tân'
            ],
            'Thành phố Phan Rang-Tháp Chàm' => [
                'Phường Bảo An', 'Phường Bảo Bình', 'Phường Bảo Hải', 'Phường Bảo Thạnh', 'Phường Bảo Trung'
            ],

            // Phú Thọ
            'Huyện Cẩm Khê' => [
                'Xã Cẩm Khê', 'Xã Cẩm Điền', 'Xã Cẩm Hưng', 'Xã Cẩm Lương', 'Xã Cẩm Quân'
            ],
            'Huyện Đoan Hùng' => [
                'Xã Bằng Luân', 'Xã Đoan Hùng', 'Xã Hữu Đô', 'Xã Phú Lộc', 'Xã Quế Lâm'
            ],
            'Huyện Hạ Hòa' => [
                'Xã Bằng Cường', 'Xã Hạ Hòa', 'Xã Hiền Lương', 'Xã Linh Sơn', 'Xã Thanh Sơn'
            ],
            'Huyện Lâm Thao' => [
                'Xã Cổ Tiết', 'Xã Hợp Hải', 'Xã Lâm Thao', 'Xã Xuân Huy', 'Xã Xuân Hòa'
            ],
            'Huyện Thanh Ba' => [
                'Xã Bản Cái', 'Xã Cẩm Thịnh', 'Xã Hiền Quan', 'Xã Thanh Ba', 'Xã Thanh Xá'
            ],
            'Huyện Thanh Sơn' => [
                'Xã Cao Xá', 'Xã Đào Xá', 'Xã Hương Nộn', 'Xã Sơn Hà', 'Xã Thanh Sơn'
            ],
            'Huyện Thanh Thủy' => [
                'Xã Bảo Yên', 'Xã Thanh Lâm', 'Xã Thanh Thủy', 'Xã Thạch Đà', 'Xã Thượng Nông'
            ],
            'Huyện Tân Sơn' => [
                'Xã Bản Nguyên', 'Xã Tân Sơn', 'Xã Tân Hương', 'Xã Tân Lập', 'Xã Tân Phú'
            ],
            'Huyện Yên Lập' => [
                'Xã Chí Đám', 'Xã Hùng Lương', 'Xã Yên Lập', 'Xã Yên Thái', 'Xã Yên Thịnh'
            ],
            'Thành phố Việt Trì' => [
                'Phường Bạch Hạc', 'Phường Dữu Lâu', 'Phường Gia Cẩm', 'Phường Nông Trang', 'Phường Tân Dân'
            ],
            // Phú Yên
            'Huyện Đồng Xuân' => [
                'Xã Đa Lộc', 'Xã Đa Phước', 'Xã Xuân Phước', 'Xã Xuân Sơn'
            ],
            'Huyện Đông Hòa' => [
                'Xã Hòa Hiệp Bắc', 'Xã Hòa Hiệp Nam', 'Xã Hòa Tân Đông', 'Xã Hòa Tân Tây', 'Xã Hòa Xuân Tây'
            ],
            'Huyện Phú Hòa' => [
                'Xã Hòa Định Đông', 'Xã Hòa Định Tây', 'Xã Hòa Tân Tây', 'Xã Phú Hòa', 'Xã Phú Mỹ'
            ],
            'Huyện Tuy An' => [
                'Xã An Chấn', 'Xã An Hải', 'Xã An Ninh Đông', 'Xã An Ninh Tây', 'Xã An Thạch'
            ],
            'Huyện Tuy Hòa' => [
                'Xã Bình Kiến', 'Xã Bình Ngọc', 'Xã Phú Đông', 'Xã Phú Lâm', 'Xã Phú Xuân'
            ],
            'Huyện Sông Cầu' => [
                'Xã An Ninh Đông', 'Xã Xuân Phương', 'Xã Xuân Sơn', 'Xã Xuân Thành', 'Xã Xuân Thịnh'
            ],
            'Thành phố Tuy Hòa' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5'
            ],

            // Quảng Bình
            'Huyện Bố Trạch' => [
                'Xã Cự Nẫm', 'Xã Đức Trạch', 'Xã Hưng Trạch', 'Xã Phú Trạch', 'Xã Sơn Trạch'
            ],
            'Huyện Minh Hóa' => [
                'Xã Hóa Sơn', 'Xã Minh Hóa', 'Xã Tân Hóa', 'Xã Trọng Hóa', 'Xã Yên Hóa'
            ],
            'Huyện Quảng Ninh' => [
                'Xã An Ninh', 'Xã Cảnh Dương', 'Xã Hải Ninh', 'Xã Hiền Ninh', 'Xã Quảng Ninh'
            ],
            'Huyện Quảng Trạch' => [
                'Xã Bình Minh', 'Xã Quảng Trạch', 'Xã Quảng Tùng', 'Xã Sơn Trạch', 'Xã Tân Trạch'
            ],
            'Huyện Tuyên Hóa' => [
                'Xã Hòa Hải', 'Xã Hương Hóa', 'Xã Kim Hóa', 'Xã Phong Hóa', 'Xã Tân Hóa'
            ],
            'Thành phố Đồng Hới' => [
                'Phường Bắc Lý', 'Phường Đồng Hải', 'Phường Đồng Phú', 'Phường Hải Thành', 'Phường Nam Lý'
            ],
            // Quảng Nam
            'Huyện Đại Lộc' => [
                'Xã Đại Hưng', 'Xã Đại Hiệp', 'Xã Đại Minh', 'Xã Đại Nghĩa', 'Xã Đại Phong'
            ],
            'Huyện Duy Xuyên' => [
                'Xã Duy Châu', 'Xã Duy Hải', 'Xã Duy Phước', 'Xã Duy Tân', 'Xã Duy Trinh'
            ],
            'Huyện Đông Giang' => [
                'Xã Ba', 'Xã Ch’Ơm', 'Xã Đắc Pring', 'Xã Jơ Ngây', 'Xã Sông Kôn'
            ],
            'Huyện Hiệp Đức' => [
                'Xã Bình Sơn', 'Xã Hiệp Hòa', 'Xã Hiệp Thuận', 'Xã Phước Mỹ', 'Xã Quế Lâm'
            ],
            'Huyện Nam Giang' => [
                'Xã Cà Dy', 'Xã Đắc My', 'Xã La Dê', 'Xã Tà Pơ', 'Xã Tà Pơ'
            ],
            'Huyện Nam Trà My' => [
                'Xã Trà Don', 'Xã Trà Linh', 'Xã Trà Tân', 'Xã Trà Xinh', 'Xã Trà My'
            ],
            'Huyện Núi Thành' => [
                'Xã Tam Anh Bắc', 'Xã Tam Anh Nam', 'Xã Tam Hải', 'Xã Tam Nghĩa', 'Xã Tam Thăng', 'Xã Tam Xuân', 'Xã Tam Xuân I', 'Xã Tam Xuân II'
            ],
            'Huyện Phú Ninh' => [
                'Xã Phú Bình', 'Xã Phú Hiệp', 'Xã Phú Ninh', 'Xã Phú Quý', 'Xã Phú Thọ'
            ],
            'Huyện Tây Giang' => [
                'Xã A Xan', 'Xã Bồng Miêu', 'Xã Giao Bình', 'Xã Giao Quang', 'Xã La Dê'
            ],
            'Huyện Thăng Bình' => [
                'Xã Bình An', 'Xã Bình Đào', 'Xã Bình Phục', 'Xã Bình Trị', 'Xã Bình Trung'
            ],
            'Thành phố Tam Kỳ' => [
                'Phường An Sơn', 'Phường An Mỹ', 'Phường An Phú', 'Phường Hòa Hương', 'Phường Tân Thạnh'
            ],
            'Thành phố Hội An' => [
                'Phường Cẩm An', 'Phường Cẩm Châu', 'Phường Cẩm Kim', 'Phường Cẩm Nam', 'Phường Cẩm Phô'
            ],

            // Quảng Ngãi
            'Huyện Bình Sơn' => [
                'Xã Bình Chánh', 'Xã Bình Dương', 'Xã Bình Hòa', 'Xã Bình Long', 'Xã Bình Phước'
            ],
            'Huyện Đức Phổ' => [
                'Xã Đức Chánh', 'Xã Đức Hòa', 'Xã Đức Nhuận', 'Xã Đức Phú', 'Xã Đức Thạnh'
            ],
            'Huyện Lý Sơn' => [
                'Xã An Hải', 'Xã An Vĩnh', 'Xã An Bình', 'Xã An Hiệp', 'Xã An Hòa'
            ],
            'Huyện Mộ Đức' => [
                'Xã Đức Chánh', 'Xã Đức Dân', 'Xã Đức Hòa', 'Xã Đức Phú', 'Xã Đức Tân'
            ],
            'Huyện Nghĩa Hành' => [
                'Xã Hành Dũng', 'Xã Hành Minh', 'Xã Hành Phước', 'Xã Hành Thiện', 'Xã Hành Tín'
            ],
            'Huyện Sơn Hà' => [
                'Xã Ba Trang', 'Xã Ba Điền', 'Xã Ba Tơ', 'Xã Ba Lế', 'Xã Ba Ngạc'
            ],
            'Huyện Sơn Tịnh' => [
                'Xã Tịnh Ấn', 'Xã Tịnh Bắc', 'Xã Tịnh Đông', 'Xã Tịnh Hòa', 'Xã Tịnh Kỳ'
            ],
            'Huyện Trà Bồng' => [
                'Xã Trà Bình', 'Xã Trà Giang', 'Xã Trà Khê', 'Xã Trà Phong', 'Xã Trà Sơn'
            ],
            'Huyện Trà My' => [
                'Xã Trà Don', 'Xã Trà Tân', 'Xã Trà Sơn', 'Xã Trà Giang', 'Xã Trà My'
            ],
            'Huyện Tư Nghĩa' => [
                'Xã Nghĩa An', 'Xã Nghĩa Dõng', 'Xã Nghĩa Lâm', 'Xã Nghĩa Phú', 'Xã Nghĩa Trung'
            ],
            'Thành phố Quảng Ngãi' => [
                'Phường Chánh Lộ', 'Phường Lê Hồng Phong', 'Phường Nghĩa Chánh', 'Phường Nguyễn Nghiêm', 'Phường Quảng Phú'
            ],
            // Quảng Ninh
            'Huyện Cô Tô' => [
                'Xã Cô Tô', 'Xã Cô Tô Con', 'Xã Đảo Cô Tô', 'Xã Minh Châu', 'Xã Thanh Lân'
            ],
            'Huyện Đầm Hà' => [
                'Xã Đầm Hà', 'Xã Đầm Trà', 'Xã Đông Sơn', 'Xã Khánh Trung', 'Xã Quảng Lợi'
            ],
            'Huyện Đông Triều' => [
                'Xã An Sinh', 'Xã Bình Dương', 'Xã Đông Triều', 'Xã Hồng Thái Đông', 'Xã Hồng Thái Tây'
            ],
            'Huyện Hải Hà' => [
                'Xã Hải Hà', 'Xã Hải Long', 'Xã Hải Lộc', 'Xã Hải Phong', 'Xã Hải Sơn'
            ],
            'Huyện Hoành Bồ' => [
                'Xã Bằng Cả', 'Xã Hòa Bình', 'Xã Lê Lợi', 'Xã Quảng La', 'Xã Quảng Khê'
            ],
            'Huyện Móng Cái' => [
                'Xã Bắc Sơn', 'Xã Hải Yên', 'Xã Móng Cái', 'Xã Tân Thanh', 'Xã Vạn Ninh'
            ],
            'Huyện Quảng Yên' => [
                'Xã Cộng Hòa', 'Xã Đoàn Kết', 'Xã Hà An', 'Xã Quảng Yên', 'Xã Tân An'
            ],
            'Huyện Tiên Yên' => [
                'Xã Đông Ngũ', 'Xã Tiên Yên', 'Xã Tiên Lương', 'Xã Tiên Sơn', 'Xã Tiên Trung'
            ],
            'Huyện Uông Bí' => [
                'Xã Đông Triều', 'Xã Kim Sơn', 'Xã Quảng Thành', 'Xã Uông Bí', 'Xã Yên Thanh'
            ],
            'Thành phố Hạ Long' => [
                'Phường Bãi Cháy', 'Phường Cao Thắng', 'Phường Hồng Gai', 'Phường Hà Khẩu', 'Phường Yết Kiêu'
            ],
            'Thành phố Cẩm Phả' => [
                'Phường Cẩm Bình', 'Phường Cẩm Châu', 'Phường Cẩm Thủy', 'Phường Cẩm Trung', 'Phường Cẩm Tây'
            ],

            // Quảng Trị
            'Huyện Cam Lộ' => [
                'Xã Cam Chính', 'Xã Cam Nghĩa', 'Xã Cam Thủy', 'Xã Cam Tuyền', 'Xã Cam Thanh'
            ],
            'Huyện Cồn Cỏ' => [
                'Xã Cồn Cỏ', 'Xã Đảo Cồn Cỏ', 'Xã Vân Cốc', 'Xã Vân Đình', 'Xã Vân Phong'
            ],
            'Huyện Đa Krông' => [
                'Xã A Bung', 'Xã A Đớt', 'Xã A Rồng', 'Xã A Túc', 'Xã Ba Nang'
            ],
            'Huyện Hải Lăng' => [
                'Xã Hải An', 'Xã Hải Dương', 'Xã Hải Hòa', 'Xã Hải Phú', 'Xã Hải Quế'
            ],
            'Huyện Hướng Hóa' => [
                'Xã A Ngo', 'Xã A Túc', 'Xã Hướng Lộc', 'Xã Hướng Phùng', 'Xã Hướng Tân'
            ],
            'Huyện Gio Linh' => [
                'Xã Gio An', 'Xã Gio Châu', 'Xã Gio Hải', 'Xã Gio Linh', 'Xã Gio Việt'
            ],
            'Huyện Vĩnh Linh' => [
                'Xã Hiền Thành', 'Xã Hải Thái', 'Xã Vĩnh Hòa', 'Xã Vĩnh Lâm', 'Xã Vĩnh Quang'
            ],
            'Thành phố Đông Hà' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5'
            ],
            'Thị xã Quảng Trị' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5'
            ],
            // Sóc Trăng
            'Huyện Cù Lao Dung' => [
                'Xã An Thạnh 1', 'Xã An Thạnh 2', 'Xã An Thạnh 3', 'Xã Cù Lao Dung', 'Xã Đại Ân',
                'Xã An Thạnh 4', 'Xã An Thạnh 5', 'Xã An Thạnh 6', 'Xã An Thạnh 7', 'Xã An Thạnh 8'
            ],
            'Huyện Kế Sách' => [
                'Xã An Lạc Tây', 'Xã Kế Thành', 'Xã Kế Tân', 'Xã Kế Xuyên', 'Xã Thới An',
                'Xã An Lạc Đông', 'Xã An Lạc Nam', 'Xã An Lạc Bắc', 'Xã Kế Hòa', 'Xã Kế Vinh'
            ],
            'Huyện Long Phú' => [
                'Xã Châu Hưng', 'Xã Đại Tâm', 'Xã Long Phú', 'Xã Tân Hưng', 'Xã Tân Thạnh',
                'Xã Châu Hưng A', 'Xã Châu Hưng B', 'Xã Long Mỹ', 'Xã Long Trị', 'Xã Long Hưng'
            ],
            'Huyện Mỹ Xuyên' => [
                'Xã Hòa Tú 1', 'Xã Hòa Tú 2', 'Xã Mỹ Xuyên', 'Xã Tham Đôn', 'Xã Vĩnh Quới',
                'Xã Mỹ Hòa', 'Xã Mỹ Phước', 'Xã Mỹ An', 'Xã Mỹ Thạnh', 'Xã Mỹ Thành'
            ],
            'Huyện Mỹ Tú' => [
                'Xã Mỹ Tú', 'Xã Mỹ Phước', 'Xã Mỹ An', 'Xã Mỹ Tân', 'Xã Mỹ Hòa',
                'Xã Mỹ Xuyên', 'Xã Mỹ Đức', 'Xã Mỹ Long', 'Xã Mỹ Quới', 'Xã Mỹ Thạnh'
            ],
            'Huyện Ngã Năm' => [
                'Xã An Nhơn', 'Xã Bình Thạnh', 'Xã Ngã Năm', 'Xã Tân Long', 'Xã Thạnh Phú',
                'Xã Mỹ Quới', 'Xã Mỹ Hưng', 'Xã Tân Thành', 'Xã Thạnh Xuân', 'Xã Thạnh Mỹ'
            ],
            'Huyện Thạnh Trị' => [
                'Xã An Hiệp', 'Xã An Ninh', 'Xã Thạnh Phú', 'Xã Thạnh Trị', 'Xã Thủy Nguyên',
                'Xã Thạnh Hiệp', 'Xã Thạnh Bình', 'Xã Thạnh Hoà', 'Xã Thạnh Thanh', 'Xã Thạnh Hưng'
            ],
            'Huyện Trần Đề' => [
                'Xã Đại Nữ', 'Xã Lịch Hội Thượng', 'Xã Lịch Hội Trung', 'Xã Trần Đề', 'Xã Vĩnh Quới',
                'Xã Vĩnh Hải', 'Xã Trí Lực', 'Xã Vĩnh Châu', 'Xã Lịch Hội Hạ', 'Xã Lịch Hội Đông'
            ],
            'Thành phố Sóc Trăng' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5',
                'Phường 6', 'Phường 7', 'Phường 8', 'Phường 9', 'Phường 10'
            ],

            // Sơn La
            'Huyện Bắc Yên' => [
                'Xã Bắc Yên', 'Xã Háng Đồng', 'Xã Háng Tranh', 'Xã Làng Chánh', 'Xã Phiêng Luông',
                'Xã Bắc Sơn', 'Xã Háng Giàng', 'Xã Háng Tranh', 'Xã Háng Dính', 'Xã Bắc Lý'
            ],
            'Huyện Mai Sơn' => [
                'Xã Cò Nòi', 'Xã Chiềng Mung', 'Xã Hát Lót', 'Xã Mai Sơn', 'Xã Tà Hộc',
                'Xã Chiềng Kheo', 'Xã Chiềng Chăn', 'Xã Chiềng Mung', 'Xã Chiềng Xuân', 'Xã Mai Sơn'
            ],
            'Huyện Mộc Châu' => [
                'Xã Mộc Châu', 'Xã Tân Lập', 'Xã Tân Sơn', 'Xã Vân Hồ', 'Xã Đông Sang',
                'Xã Mường Sang', 'Xã Mường Khương', 'Xã Mường Chanh', 'Xã Mường Cang', 'Xã Mường Sang'
            ],
            'Huyện Mường La' => [
                'Xã Chiềng Ơn', 'Xã Chiềng Lao', 'Xã Mường La', 'Xã Tân Xuân', 'Xã Vân Hồ',
                'Xã Mường La', 'Xã Mường Tè', 'Xã Chiềng Bôn', 'Xã Chiềng Yên', 'Xã Mường Pồn'
            ],
            'Huyện Sông Mã' => [
                'Xã Bó Sinh', 'Xã Cà Sâu', 'Xã Chăn Mộc', 'Xã Mường Lựm', 'Xã Sông Mã',
                'Xã Mường Sang', 'Xã Mường Động', 'Xã Mường Làng', 'Xã Mường Chanh', 'Xã Mường Lâm'
            ],
            'Huyện Sông Sơn' => [
                'Xã Cà Thoong', 'Xã Cửa Khẩu', 'Xã Hưng Sơn', 'Xã Sông Sơn', 'Xã Tà Số',
                'Xã Tà Số', 'Xã Tà Chìa', 'Xã Cà Dinh', 'Xã Cà Dinh', 'Xã Hòa Sơn'
            ],
            'Huyện Thuận Châu' => [
                'Xã Bản Lầm', 'Xã Chiềng Cọ', 'Xã Chiềng Hặc', 'Xã Thuận Châu', 'Xã Xuân Hòa',
                'Xã Bản Mới', 'Xã Bản Nưa', 'Xã Chiềng Xôm', 'Xã Chiềng Hạ', 'Xã Chiềng Lưu'
            ],
            'Huyện Yên Châu' => [
                'Xã Chiềng Đông', 'Xã Chiềng Hặc', 'Xã Chiềng Sơ', 'Xã Yên Châu', 'Xã Yên Hòa',
                'Xã Chiềng Sơ', 'Xã Chiềng Cọ', 'Xã Yên Sơn', 'Xã Yên Thắng', 'Xã Yên Châu'
            ],
            'Thành phố Sơn La' => [
                'Phường Chiềng An', 'Phường Chiềng Cơi', 'Phường Chiềng Đen', 'Phường Chiềng Lề', 'Phường Tô Hiệu',
                'Phường Chiềng Cọ', 'Phường Chiềng Bôm', 'Phường Chiềng Xôm', 'Phường Chiềng Đen', 'Phường Tô Hiệu'
            ],
            // TP.Hồ Chí Minh
            'Quận 1' => [
                'Phường Bến Nghé', 'Phường Bến Thành', 'Phường Cầu Ông Lãnh', 'Phường Nguyễn Cư Trinh', 'Phường Nguyễn Thái Bình'
            ],
            'Quận 2' => [
                'Phường An Khánh', 'Phường An Lợi Đông', 'Phường Bình An', 'Phường Bình Khánh', 'Phường Thảo Điền'
            ],
            'Quận 3' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5'
            ],
            'Quận 4' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5'
            ],
            'Quận 5' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5'
            ],
            'Quận 6' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5'
            ],
            'Quận 7' => [
                'Phường Tân Kiểng', 'Phường Tân Hưng', 'Phường Tân Phong', 'Phường Tân Quy', 'Phường Phú Mỹ'
            ],
            'Quận 8' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5'
            ],
            'Quận 9' => [
                'Phường Hiệp Phú', 'Phường Long Bình', 'Phường Long Thạnh Mỹ', 'Phường Phú Hữu', 'Phường Tân Phú'
            ],
            'Quận 10' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5'
            ],
            'Quận 11' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5'
            ],
            'Quận 12' => [
                'Phường An Phú Đông', 'Phường Đông Hưng Thuận', 'Phường Hiệp Thành', 'Phường Tân Chánh Hiệp', 'Phường Tân Thới Hiệp'
            ],
            'Quận Bình Tân' => [
                'Phường Bình Hưng Hòa', 'Phường Bình Hưng Hòa A', 'Phường Bình Hưng Hòa B', 'Phường Bình Trị Đông', 'Phường Bình Trị Đông A'
            ],
            'Quận Bình Thạnh' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5',
                'Phường 6', 'Phường 7', 'Phường 8', 'Phường 9', 'Phường 10'
            ],
            'Quận Gò Vấp' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5',
                'Phường 6', 'Phường 7', 'Phường 8', 'Phường 9'
            ],
            'Quận Phú Nhuận' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5',
                'Phường 6', 'Phường 7'
            ],
            'Quận Tân Bình' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5',
                'Phường 6', 'Phường 7', 'Phường 8'
            ],
            'Quận Tân Phú' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5',
                'Phường 6', 'Phường 7'
            ],
            'Quận Thủ Đức' => [
                'Phường Bình Thọ', 'Phường Linh Chiểu', 'Phường Linh Đông', 'Phường Tam Bình', 'Phường Tam Phú',
                'Phường Hiệp Bình Chánh', 'Phường Hiệp Bình Phước', 'Phường Linh Xuân', 'Phường Tăng Nhơn Phú A', 'Phường Tăng Nhơn Phú B'
            ],
            'Huyện Củ Chi' => [
                'Xã An Phú', 'Xã Bình Mỹ', 'Xã Hòa Phú', 'Xã Tân Thông Hội', 'Xã Tân Phú Trung',
                'Xã Phú Hòa', 'Xã Phước Vĩnh', 'Xã Tân An Hội', 'Xã Tân Thạnh Đông', 'Xã Tân Thạnh Tây'
            ],
            'Huyện Cần Giờ' => [
                'Xã Bình Khánh', 'Xã Cần Thạnh', 'Xã An Thới Đông', 'Xã Long Hòa', 'Xã Tam Thôn Hiệp',
                'Xã Vàm Sát', 'Xã Thạnh An', 'Xã Phước Khánh', 'Xã Long Hòa'
            ],
            'Huyện Hóc Môn' => [
                'Xã Bà Điểm', 'Xã Đông Thạnh', 'Xã Hóc Môn', 'Xã Nhị Bình', 'Xã Tân Thới Nhất',
                'Xã Tân Hiệp', 'Xã Tân Xuân', 'Xã Xuân Thới Sơn', 'Xã Xuân Thới Thượng', 'Xã Xuân Thới Đông'
            ],
            'Huyện Nhà Bè' => [
                'Xã Hiệp Phước', 'Xã Long Thới', 'Xã Nhơn Đức', 'Xã Phú Xuân', 'Xã Tân Quý Tây',
                'Xã Phước Kiển', 'Xã Phước Lộc', 'Xã Tân Thuận Đông', 'Xã Tân Thuận Tây'
            ],
            // Thừa Thiên Huế
            'Huyện A Lưới' => [
                'Xã A Đớt', 'Xã A Ngo', 'Xã A Roàng', 'Xã A Túc', 'Xã Hương Lâm'
            ],
            'Huyện Hương Thủy' => [
                'Xã Hương An', 'Xã Hương Chữ', 'Xã Hương Hoà', 'Xã Hương Phong', 'Xã Hương Vân'
            ],
            'Huyện Hương Trà' => [
                'Xã Hương An', 'Xã Hương Chữ', 'Xã Hương Đô', 'Xã Hương Hòa', 'Xã Hương Phong'
            ],
            'Huyện Phú Lộc' => [
                'Xã Lộc Bình', 'Xã Lộc Điền', 'Xã Lộc Hòa', 'Xã Lộc Vĩnh', 'Xã Phú Lộc'
            ],
            'Huyện Phú Vang' => [
                'Xã Phú An', 'Xã Phú Dương', 'Xã Phú Hải', 'Xã Phú Lương', 'Xã Phú Thanh'
            ],
            'Thành phố Huế' => [
                'Phường An Cựu', 'Phường An Đông', 'Phường An Hòa', 'Phường Hương Sơ', 'Phường Tây Lộc'
            ],
            // Tây Ninh
            'Huyện Bến Cầu' => [
                'Xã Bến Cầu', 'Xã Bến Đình', 'Xã Bến Thành', 'Xã Long Chữ', 'Xã Long Phước'
            ],
            'Huyện Bến Thành' => [
                'Xã Bến Thành', 'Xã Long Khánh', 'Xã Long Thành', 'Xã Phước Ninh', 'Xã Tân Đông'
            ],
            'Huyện Dương Minh Châu' => [
                'Xã Dương Minh Châu', 'Xã Hòa Hiệp', 'Xã Phước Minh', 'Xã Phước Ninh', 'Xã Tân Đông'
            ],
            'Huyện Gò Dầu' => [
                'Xã Cẩm Giang', 'Xã Dầu Tiếng', 'Xã Hiệp Thạnh', 'Xã Phước Thạnh', 'Xã Tân Phú'
            ],
            'Huyện Hòa Thành' => [
                'Xã Hòa Thành', 'Xã Hòa Hiệp', 'Xã Hòa Hội', 'Xã Hòa Hưng', 'Xã Hòa Khương'
            ],
            'Huyện Tân Biên' => [
                'Xã Tân Biên', 'Xã Tân Lập', 'Xã Tân Phong', 'Xã Tân Quý', 'Xã Tân Thanh'
            ],
            'Huyện Tân Châu' => [
                'Xã Tân Châu', 'Xã Tân Hiệp', 'Xã Tân Hưng', 'Xã Tân Lập', 'Xã Tân Quý'
            ],
            'Thành phố Tây Ninh' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5'
            ],
            // Thái Bình
            'Huyện Đông Hưng' => [
                'Xã Đông Cường', 'Xã Đông Hưng', 'Xã Đông La', 'Xã Đông Minh', 'Xã Đông Sơn', 'Xã Đông Hòa', 'Xã Đông Quang'
            ],
            'Huyện Hưng Hà' => [
                'Xã Canh Tân', 'Xã Hưng Hà', 'Xã Hưng Nhân', 'Xã Hưng Vũ', 'Xã Minh Khai', 'Xã Hưng Đạo', 'Xã Hưng Thịnh'
            ],
            'Huyện Kiến Xương' => [
                'Xã Bình Thanh', 'Xã Hồng Tiến', 'Xã Kiến Xương', 'Xã Quang Trung', 'Xã Vũ Ninh', 'Xã Vũ Tiến', 'Xã Vũ Phúc'
            ],
            'Huyện Quỳnh Phụ' => [
                'Xã An Ấp', 'Xã Quỳnh Phụ', 'Xã Quỳnh Hải', 'Xã Quỳnh Hoa', 'Xã Quỳnh Lưu', 'Xã Quỳnh Tân', 'Xã Quỳnh Xuân'
            ],
            'Huyện Thái Thụy' => [
                'Xã Thái Thụy', 'Xã Thái Hà', 'Xã Thái Hòa', 'Xã Thái Phương', 'Xã Thái Sơn', 'Xã Thái Bình', 'Xã Thái Giang'
            ],
            'Huyện Vũ Thư' => [
                'Xã Vũ Đoài', 'Xã Vũ Hòa', 'Xã Vũ Phúc', 'Xã Vũ Tiến', 'Xã Vũ Thư', 'Xã Vũ Trung', 'Xã Vũ Lạc'
            ],
            'Thành phố Thái Bình' => [
                'Phường Bồ Xuyên', 'Phường Đề Thám', 'Phường Kỳ Bá', 'Phường Quang Trung', 'Phường Trần Hưng Đạo', 'Phường Hoàng Diệu', 'Phường Tiền Phong'
            ],
            // Thái Nguyên
            'Huyện Đại Từ' => [
                'Xã Đại Lộc', 'Xã Đại Từ', 'Xã Hòa Bình', 'Xã Phú Lạc', 'Xã Tân Thịnh', 'Xã Tân Cương', 'Xã Phú Bình'
            ],
            'Huyện Định Hóa' => [
                'Xã Định Hóa', 'Xã Hòa Bình', 'Xã Kim Phượng', 'Xã Quyết Thắng', 'Xã Thanh Định', 'Xã Trung Lương', 'Xã Phú Linh'
            ],
            'Huyện Đồng Hỷ' => [
                'Xã Đồng Hỷ', 'Xã Hòa Bình', 'Xã Hợp Thành', 'Xã Thái Hòa', 'Xã Tân Lập', 'Xã Bảo Cường', 'Xã Tân Thái'
            ],
            'Huyện Phú Bình' => [
                'Xã Phú Bình', 'Xã Phú Lương', 'Xã Phú Thịnh', 'Xã Tân Đức', 'Xã Tân Hòa', 'Xã Phú Xuyên', 'Xã Phú Cường'
            ],
            'Huyện Phú Lương' => [
                'Xã Phú Lương', 'Xã Phú Thịnh', 'Xã Phú Thành', 'Xã Tân Lập', 'Xã Tân Thành', 'Xã Phú Thọ', 'Xã Phú Lâm'
            ],
            'Huyện Võ Nhai' => [
                'Xã Võ Nhai', 'Xã Hòa Bình', 'Xã Định Hóa', 'Xã Tân Thịnh', 'Xã Phú Lạc', 'Xã Nam Ninh', 'Xã Tân Cương'
            ],
            'Thành phố Thái Nguyên' => [
                'Phường Cải Đan', 'Phường Hương Sơn', 'Phường Hoàng Văn Thụ', 'Phường Tân Thành', 'Phường Trưng Vương', 'Phường Gia Sàng', 'Phường Tân Cương'
            ],
            // Thanh Hóa
            'Huyện Bá Thước' => [
                'Xã Bá Thước', 'Xã Cẩm Lương', 'Xã Cẩm Thủy', 'Xã Lâm Xa', 'Xã Tân Xuân', 'Xã Điền Trung', 'Xã Điền Hạ'
            ],
            'Huyện Cẩm Thủy' => [
                'Xã Cẩm Lương', 'Xã Cẩm Thủy', 'Xã Cẩm Tân', 'Xã Cẩm Xuân', 'Xã Cẩm Yên', 'Xã Cẩm Thành', 'Xã Cẩm Liên'
            ],
            'Huyện Đông Sơn' => [
                'Xã Đông Sơn', 'Xã Đông Thọ', 'Xã Đông Tiến', 'Xã Đông Văn', 'Xã Đông Xuân', 'Xã Đông Cương', 'Xã Đông Hòa'
            ],
            'Huyện Hà Trung' => [
                'Xã Hà Trung', 'Xã Hà Hải', 'Xã Hà Sơn', 'Xã Hà Tân', 'Xã Hà Thanh', 'Xã Hà Ngọc', 'Xã Hà Long'
            ],
            'Huyện Hậu Lộc' => [
                'Xã Hậu Lộc', 'Xã Hậu Tân', 'Xã Hậu Thành', 'Xã Hậu Thọ', 'Xã Hậu Xuân', 'Xã Hậu Lộc', 'Xã Hậu Tiến'
            ],
            'Huyện Lang Chánh' => [
                'Xã Lang Chánh', 'Xã Giao An', 'Xã Giao Đức', 'Xã Lang Môn', 'Xã Lang Môn', 'Xã Giao Long', 'Xã Giao Phong'
            ],
            'Huyện Mường Lát' => [
                'Xã Mường Lát', 'Xã Mường Lý', 'Xã Mường Tôn', 'Xã Tân Xuân', 'Xã Tân Thanh', 'Xã Mường Chanh', 'Xã Mường Khoa'
            ],
            'Huyện Ngọc Lặc' => [
                'Xã Ngọc Lặc', 'Xã Ngọc Liên', 'Xã Ngọc Sơn', 'Xã Ngọc Tân', 'Xã Ngọc Thọ', 'Xã Ngọc Trung', 'Xã Ngọc Hòa'
            ],
            'Huyện Ngọc Sơn' => [
                'Xã Ngọc Sơn', 'Xã Ngọc Lặc', 'Xã Ngọc Tân', 'Xã Ngọc Liên', 'Xã Ngọc Thọ', 'Xã Ngọc Hưng', 'Xã Ngọc Long'
            ],
            'Huyện Quảng Xương' => [
                'Xã Quảng Xương', 'Xã Quảng Tâm', 'Xã Quảng Trạch', 'Xã Quảng Thọ', 'Xã Quảng Thắng', 'Xã Quảng Hải', 'Xã Quảng Đại'
            ],
            'Huyện Thạch Thành' => [
                'Xã Thạch Thành', 'Xã Thạch Định', 'Xã Thạch Động', 'Xã Thạch Cẩm', 'Xã Thạch Bình', 'Xã Thạch Long', 'Xã Thạch Lâm'
            ],
            'Huyện Thiệu Hóa' => [
                'Xã Thiệu Hóa', 'Xã Thiệu Hưng', 'Xã Thiệu Khánh', 'Xã Thiệu Thịnh', 'Xã Thiệu Viên', 'Xã Thiệu Long', 'Xã Thiệu Thành'
            ],
            'Huyện Tĩnh Gia' => [
                'Xã Tĩnh Gia', 'Xã Tĩnh Sơn', 'Xã Tĩnh Trung', 'Xã Tĩnh Hải', 'Xã Tĩnh Lộc', 'Xã Tĩnh Minh', 'Xã Tĩnh Tiến'
            ],
            'Huyện Vĩnh Lộc' => [
                'Xã Vĩnh Lộc', 'Xã Vĩnh Lộc A', 'Xã Vĩnh Lộc B', 'Xã Vĩnh Hòa', 'Xã Vĩnh Long', 'Xã Vĩnh Tân', 'Xã Vĩnh Khang'
            ],
            'Thành phố Thanh Hóa' => [
                'Phường Ba Đình', 'Phường Lam Sơn', 'Phường Đông Hương', 'Phường Quảng Thành', 'Phường Trường Thi', 'Phường Ngọc Trạo', 'Phường Thanh Hương'
            ],
            // Tiền Giang
            'Huyện Cái Bè' => [
                'Xã An Hữu', 'Xã An Thái Đông', 'Xã An Thái Trung', 'Xã Cái Bè', 'Xã Hòa Khánh', 'Xã Hòa Hưng', 'Xã Tân Thanh'
            ],
            'Huyện Châu Thành' => [
                'Xã Bình Đức', 'Xã Bình Phú', 'Xã Châu Thành', 'Xã Long An', 'Xã Tân Hương', 'Xã Tân Lập', 'Xã Tân Hội'
            ],
            'Huyện Gò Công Đông' => [
                'Xã An Thạnh', 'Xã Bình Nhì', 'Xã Bình Tân', 'Xã Gò Công Đông', 'Xã Tân Trung', 'Xã Tân Đông', 'Xã Tân Tây'
            ],
            'Huyện Gò Công Tây' => [
                'Xã Bình Đông', 'Xã Bình Xuân', 'Xã Gò Công Tây', 'Xã Tân Hòa', 'Xã Tân Phú', 'Xã Tân Thành', 'Xã Tân Linh'
            ],
            'Huyện Tân Phước' => [
                'Xã Tân Phước', 'Xã Tân Thành', 'Xã Thạnh Tân', 'Xã Thạnh Phú', 'Xã Tân Hưng', 'Xã Tân Lập', 'Xã Tân Hòa'
            ],
            'Huyện Cai Lậy' => [
                'Xã Cai Lậy', 'Xã Mỹ Hạnh Đông', 'Xã Mỹ Hạnh Trung', 'Xã Phú Nhuận', 'Xã Tân Hưng', 'Xã Long Khánh', 'Xã Tân Phú'
            ],
            'Huyện Tân Thành' => [
                'Xã Tân Thành', 'Xã Thạnh Tân', 'Xã Tân Hưng', 'Xã Tân Phú', 'Xã Tân Xuân', 'Xã Thạnh Phú', 'Xã Tân Hội'
            ],
            'Thành phố Mỹ Tho' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5', 'Phường 6', 'Phường 7', 'Phường 8'
            ],
            'Thị xã Gò Công' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5', 'Xã Bình Đông', 'Xã Bình Xuân', 'Xã Tân Hòa'
            ],
            // Trà Vinh
            'Huyện Cầu Kè' => [
                'Xã An Phú Tân', 'Xã Cầu Kè', 'Xã Hòa Ân', 'Xã Hòa Lợi', 'Xã Tam Ngãi', 'Xã Phong Phú', 'Xã Thạnh Phú'
            ],
            'Huyện Cầu Ngang' => [
                'Xã Cầu Ngang', 'Xã Duyên Hải', 'Xã Hiệp Mỹ Đông', 'Xã Hiệp Mỹ Tây', 'Xã Long Hòa', 'Xã Tân Phú', 'Xã Tân Hòa'
            ],
            'Huyện Châu Thành' => [
                'Xã An Phú', 'Xã Bình Phú', 'Xã Châu Thành', 'Xã Hòa Lợi', 'Xã Phú Cần', 'Xã Phú Hưng', 'Xã Phú Mỹ'
            ],
            'Huyện Duyên Hải' => [
                'Xã Duyên Hải', 'Xã Long Hòa', 'Xã Long Mỹ', 'Xã Tân Hải', 'Xã Tân Quý', 'Xã Long Điền', 'Xã Tân Thành'
            ],
            'Huyện Tiểu Cần' => [
                'Xã Hiệp Mỹ Đông', 'Xã Hiệp Mỹ Tây', 'Xã Tiểu Cần', 'Xã Tân An', 'Xã Tân Phú', 'Xã Thanh Hòa', 'Xã Tân Xuân'
            ],
            'Huyện Trà Cú' => [
                'Xã An Quảng Hữu', 'Xã Đôn Xuân', 'Xã Long Hiệp', 'Xã Trà Cú', 'Xã Tân Xuân', 'Xã Phước Hưng', 'Xã Tân Hòa'
            ],
            'Thành phố Trà Vinh' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5', 'Phường 6', 'Phường 7', 'Phường 8'
            ],
            // Tuyên Quang
            'Huyện Chiêm Hóa' => [
                'Xã Chiêm Hóa', 'Xã Đội Cấn', 'Xã Hòa An', 'Xã Ngọc Hội', 'Xã Tân Mỹ', 'Xã Yên Lâm', 'Xã Hòa Phú', 'Xã Linh Phú'
            ],
            'Huyện Hàm Yên' => [
                'Xã Hàm Yên', 'Xã Hương Nỉ', 'Xã Minh Khai', 'Xã Thái Bình', 'Xã Tân An', 'Xã Yên Phú', 'Xã Tân Thành', 'Xã Hòa An'
            ],
            'Huyện Na Hang' => [
                'Xã Na Hang', 'Xã Thanh Tương', 'Xã Thượng Lâm', 'Xã Hòa An', 'Xã Khâu Tinh', 'Xã Yên Hoa', 'Xã Minh Dân', 'Xã Thượng Giáp'
            ],
            'Huyện Sơn Dương' => [
                'Xã Sơn Dương', 'Xã Đội Cấn', 'Xã Hòa An', 'Xã Minh Thanh', 'Xã Thanh Sơn', 'Xã Hương Lâm', 'Xã Tân Hương', 'Xã Tân Tiến'
            ],
            'Huyện Yên Sơn' => [
                'Xã Yên Sơn', 'Xã Thái Long', 'Xã Trung Môn', 'Xã Yên Phú', 'Xã Yên Sơn', 'Xã Kim Quan', 'Xã Tân Long', 'Xã Yên Hòa'
            ],
            'Thành phố Tuyên Quang' => [
                'Phường Hưng Thành', 'Phường Tân Quang', 'Phường Tân Hà', 'Phường Tân Bình', 'Phường Tân Phú', 'Phường Minh Xuân', 'Phường Ỷ La', 'Phường Đội Cấn'
            ],
            // Vĩnh Long
            'Huyện Bình Tân' => [
                'Xã Bình Tân', 'Xã Bình Minh', 'Xã Long Hồ', 'Xã Mang Thít', 'Xã Tam Bình', 'Xã Tân Thành', 'Xã Tân Phú', 'Xã Phú Quới'
            ],
            'Huyện Cái Bè' => [
                'Xã An Hữu', 'Xã An Thái Đông', 'Xã An Thái Trung', 'Xã Cai Lậy', 'Xã Hòa Khánh', 'Xã Hòa Hưng', 'Xã Hòa Lộc', 'Xã Tân Thanh'
            ],
            'Huyện Long Hồ' => [
                'Xã Bình Minh', 'Xã Long Hồ', 'Xã Long Phước', 'Xã Phú Quới', 'Xã Tân Hạnh', 'Xã Tân Mỹ', 'Xã Vĩnh Bình', 'Xã Vĩnh Long'
            ],
            'Huyện Mang Thít' => [
                'Xã Mang Thít', 'Xã Phú Quới', 'Xã Tân An', 'Xã Tân Hòa', 'Xã Tân Phước', 'Xã Vĩnh Xuân', 'Xã Mỹ An', 'Xã Tân Quý'
            ],
            'Huyện Tam Bình' => [
                'Xã Tam Bình', 'Xã Tam Hoà', 'Xã Tam Quí', 'Xã Tân Phú', 'Xã Tân Quý', 'Xã Bình Tân', 'Xã An Phú', 'Xã Mỹ Thạnh'
            ],
            'Huyện Trà Ôn' => [
                'Xã Trà Ôn', 'Xã Long Khánh', 'Xã Phú Thành', 'Xã Tam Bình', 'Xã Tân An', 'Xã An Phú', 'Xã Long Mỹ', 'Xã Vĩnh Long'
            ],
            'Huyện Vũng Liêm' => [
                'Xã Bình Minh', 'Xã Vũng Liêm', 'Xã Vĩnh Bình', 'Xã Vĩnh Phú', 'Xã Vĩnh Long', 'Xã Trung Hiệp', 'Xã Hiếu Nhơn', 'Xã Hiếu Phụng'
            ],
            'Thành phố Vĩnh Long' => [
                'Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5', 'Phường 6', 'Phường 7', 'Phường 8'
            ],
            // Vĩnh Phúc
            'Huyện Bình Xuyên' => [
                'Xã Bình Xuyên', 'Xã Hương Sơn', 'Xã Tam Hợp', 'Xã Trung Mỹ', 'Xã Vân Xuân', 'Xã Hương Sơn', 'Xã Tam Hợp', 'Xã Trung Mỹ', 'Xã Vân Xuân'
            ],
            'Huyện Lập Thạch' => [
                'Xã Đình Chu', 'Xã Lập Thạch', 'Xã Liễn Sơn', 'Xã Sơn Đông', 'Xã Tân Hương', 'Xã Đình Chu', 'Xã Lập Thạch', 'Xã Liễn Sơn', 'Xã Sơn Đông', 'Xã Tân Hương'
            ],
            'Huyện Tam Dương' => [
                'Xã An Hòa', 'Xã Bình Dương', 'Xã Đạo Tú', 'Xã Hợp Thịnh', 'Xã Tam Dương', 'Xã An Hòa', 'Xã Bình Dương', 'Xã Đạo Tú', 'Xã Hợp Thịnh', 'Xã Tam Dương'
            ],
            'Huyện Tam Đảo' => [
                'Xã Đại Đình', 'Xã Hợp Châu', 'Xã Tam Đảo', 'Xã Tam Quan', 'Xã Vân Hòa', 'Xã Đại Đình', 'Xã Hợp Châu', 'Xã Tam Đảo', 'Xã Tam Quan', 'Xã Vân Hòa'
            ],
            'Huyện Vĩnh Tường' => [
                'Xã Bình Dương', 'Xã Vĩnh Tường', 'Xã Vĩnh Thịnh', 'Xã Vĩnh Yên', 'Xã Yên Lạc', 'Xã Bình Dương', 'Xã Vĩnh Tường', 'Xã Vĩnh Thịnh', 'Xã Vĩnh Yên', 'Xã Yên Lạc'
            ],
            'Huyện Yên Lạc' => [
                'Xã Bạch Lưu', 'Xã Định Trung', 'Xã Yên Lạc', 'Xã Yên Phương', 'Xã Yên Thạch', 'Xã Bạch Lưu', 'Xã Định Trung', 'Xã Yên Lạc', 'Xã Yên Phương', 'Xã Yên Thạch'
            ],
            'Thành phố Vĩnh Yên' => [
                'Phường Đống Đa', 'Phường Liên Bảo', 'Phường Khai Quang', 'Phường Tích Sơn', 'Phường Trưng Trắc', 'Phường Đống Đa', 'Phường Liên Bảo', 'Phường Khai Quang', 'Phường Tích Sơn', 'Phường Trưng Trắc'
            ],
            // Yên Bái
            'Huyện Đại Từ' => [
                'Xã Đại Từ', 'Xã Định Hóa', 'Xã Phú Lạc', 'Xã Tân Thành', 'Xã Tân Phú', 'Xã Đại Từ', 'Xã Định Hóa', 'Xã Phú Lạc', 'Xã Tân Thành', 'Xã Tân Phú'
            ],
            'Huyện Lục Yên' => [
                'Xã An Phú', 'Xã Cao Phạ', 'Xã Lục Yên', 'Xã Minh Khai', 'Xã Tân Lập', 'Xã An Phú', 'Xã Cao Phạ', 'Xã Lục Yên', 'Xã Minh Khai', 'Xã Tân Lập'
            ],
            'Huyện Mù Cang Chải' => [
                'Xã Chế Cu Nha', 'Xã Mù Cang Chải', 'Xã Nậm Có', 'Xã Nậm Khánh', 'Xã Tà Si Láng', 'Xã Chế Cu Nha', 'Xã Mù Cang Chải', 'Xã Nậm Có', 'Xã Nậm Khánh', 'Xã Tà Si Láng'
            ],
            'Huyện Trấn Yên' => [
                'Xã An Lạc', 'Xã Báo Đáp', 'Xã Minh Quân', 'Xã Trấn Yên', 'Xã Việt Hồng', 'Xã An Lạc', 'Xã Báo Đáp', 'Xã Minh Quân', 'Xã Trấn Yên', 'Xã Việt Hồng'
            ],
            'Huyện Văn Chấn' => [
                'Xã Bình Thuận', 'Xã Hồng Ca', 'Xã Mường Thín', 'Xã Văn Chấn', 'Xã Vân Hồ', 'Xã Bình Thuận', 'Xã Hồng Ca', 'Xã Mường Thín', 'Xã Văn Chấn', 'Xã Vân Hồ'
            ],
            'Huyện Văn Yên' => [
                'Xã An Bình', 'Xã Đức Ninh', 'Xã Văn Yên', 'Xã Yên Bình', 'Xã Yên Thịnh', 'Xã An Bình', 'Xã Đức Ninh', 'Xã Văn Yên', 'Xã Yên Bình', 'Xã Yên Thịnh'
            ],
            'Thành phố Yên Bái' => [
                'Phường Hồng Hà', 'Phường Minh Tân', 'Phường Nguyễn Thái Học', 'Phường Tân Thịnh', 'Phường Yên Ninh', 'Phường Hồng Hà', 'Phường Minh Tân', 'Phường Nguyễn Thái Học', 'Phường Tân Thịnh', 'Phường Yên Ninh'
            ],
        ];

        foreach ($wards as $districtName => $wardNames) {
            $district = District::where('name', $districtName)->first();
            if ($district) {
                foreach ($wardNames as $wardName) {
                    Ward::firstOrCreate([
                        'name' => $wardName,
                        'district_id' => $district->id,
                    ]);
                }
            }
        }
    }
}
