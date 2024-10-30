<?php
// database/seeders/DistrictSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;
use App\Models\Province;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        $districts = [
            // An Giang
            'An Giang' => [
                'Huyện An Phú', 'Huyện Châu Phú', 'Huyện Châu Thành', 'Huyện Châu Thành A', 'Huyện Chợ Mới', 'Huyện Phú Tân', 'Huyện Tân Châu', 'Huyện Tân Hiệp', 'Huyện Tân Phú', 'Huyện Tân Qui', 'Thành phố Long Xuyên', 'Thành phố Châu Đốc'
            ],
            // Bà Rịa - Vũng Tàu
            'Bà Rịa - Vũng Tàu' => [
                'Huyện Châu Đức', 'Huyện Côn Đảo', 'Huyện Đất Đỏ', 'Huyện Long Điền', 'Huyện Tân Thành', 'Thành phố Bà Rịa', 'Thành phố Vũng Tàu'
            ],
            // Bình Dương
            'Bình Dương' => [
                'Huyện Bàu Bàng', 'Huyện Bắc Tân Uyên', 'Huyện Dầu Tiếng', 'Huyện Phú Giáo', 'Huyện Tân Uyên', 'Thành phố Dĩ An', 'Thành phố Thủ Dầu Một', 'Thành phố Thuận An'
            ],
            // Bình Phước
            'Bình Phước' => [
                'Huyện Bù Đăng', 'Huyện Bù Gia Mập', 'Huyện Bù Đốp', 'Huyện Chơn Thành', 'Huyện Đồng Phú', 'Huyện Đồng Xoài', 'Huyện Hớn Quản', 'Huyện Phú Riềng', 'Thành phố Đồng Xoài'
            ],
            // Bình Thuận
            'Bình Thuận' => [
                'Huyện Bắc Bình', 'Huyện Đức Linh', 'Huyện Hàm Thuận Bắc', 'Huyện Hàm Thuận Nam', 'Huyện Hàm Tân', 'Huyện Tánh Linh', 'Huyện Tuy Phong', 'Thành phố Phan Thiết'
            ],
            // Bắc Giang
            'Bắc Giang' => [
                'Huyện Bắc Giang', 'Huyện Bắc Sơn', 'Huyện Hiệp Hòa', 'Huyện Lạng Giang', 'Huyện Lục Nam', 'Huyện Lục Ngạn', 'Huyện Sơn Động', 'Huyện Tân Yên', 'Huyện Việt Yên', 'Thành phố Bắc Giang'
            ],
            // Bắc Kạn
            'Bắc Kạn' => [
                'Huyện Ba Bể', 'Huyện Bạch Thông', 'Huyện Chợ Đồn', 'Huyện Chợ Mới', 'Huyện Na Rì', 'Huyện Ngân Sơn', 'Huyện Pác Nặm', 'Thành phố Bắc Kạn'
            ],
            // Bắc Ninh
            'Bắc Ninh' => [
                'Huyện Gia Bình', 'Huyện Lương Tài', 'Huyện Quế Võ', 'Huyện Thuận Thành', 'Huyện Tiên Du', 'Huyện Yên Phong', 'Huyện Yên Thế', 'Thành phố Bắc Ninh'
            ],
            // Bạc Liêu
            'Bạc Liêu' => [
                'Huyện Đông Hải', 'Huyện Hồng Dân', 'Huyện Phước Long', 'Huyện Vĩnh Lợi', 'Huyện Vĩnh Phú', 'Thành phố Bạc Liêu'
            ],
            // Bến Tre
            'Bến Tre' => [
                'Huyện Bình Đại', 'Huyện Ba Tri', 'Huyện Châu Thành', 'Huyện Chợ Lách', 'Huyện Mỏ Cày Bắc', 'Huyện Mỏ Cày Nam', 'Huyện Thạnh Phú', 'Thành phố Bến Tre'
            ],
            // Bình Định
            'Bình Định' => [
                'Huyện An Lão', 'Huyện An Nhơn', 'Huyện Hoài Ân', 'Huyện Hoài Nhơn', 'Huyện Phù Cát', 'Huyện Phù Mỹ', 'Huyện Tuy Phước', 'Huyện Vân Canh', 'Thành phố Quy Nhơn'
            ],
            // Cà Mau
            'Cà Mau' => [
                'Huyện Cái Nước', 'Huyện Đầm Dơi', 'Huyện Năm Căn', 'Huyện Ngọc Hiển', 'Huyện Phú Tân', 'Huyện Thới Bình', 'Huyện U Minh', 'Thành phố Cà Mau'
            ],
            // Cao Bằng
            'Cao Bằng' => [
                'Huyện Bảo Lâm', 'Huyện Bảo Lạc', 'Huyện Hạ Lang', 'Huyện Nguyên Bình', 'Huyện Phục Hòa', 'Huyện Quảng Uyên', 'Huyện Thông Nông', 'Huyện Trà Lĩnh', 'Huyện Trùng Khánh', 'Thành phố Cao Bằng'
            ],
            // Cần Thơ
            'Cần Thơ' => [
                'Huyện Cờ Đỏ', 'Huyện Phong Điền', 'Huyện Thới Lai', 'Huyện Vĩnh Thạnh', 'Quận Bình Thủy', 'Quận Cái Răng', 'Quận Ninh Kiều', 'Quận Ô Môn', 'Quận Thốt Nốt', 'Thành phố Cần Thơ'
            ],
            // Đắk Lắk
            'Đắk Lắk' => [
                'Huyện Buôn Đôn', 'Huyện Buôn Hồ', 'Huyện Cư Kuin', 'Huyện Cư M’gar', 'Huyện Ea H’leo', 'Huyện Ea Kar', 'Huyện Ea Súp', 'Huyện Krông Búk', 'Huyện Krông Ana', 'Huyện Krông Bông', 'Huyện Krông Nô', 'Huyện M’Đrắk', 'Huyện Tuy Đức', 'Thành phố Buôn Ma Thuột'
            ],
            // Đắk Nông
            'Đắk Nông' => [
                'Huyện Cư Jút', 'Huyện Cư Kuin', 'Huyện Đắk Glong', 'Huyện Đắk Mil', 'Huyện Đắk R’lấp', 'Huyện Đắk Song', 'Huyện Krông Nô', 'Huyện Tuy Đức', 'Thành phố Gia Nghĩa'
            ],
            // Đà Nẵng
            'Đà Nẵng' => [
                'Quận Cẩm Lệ', 'Quận Hải Châu', 'Quận Liên Chiểu', 'Quận Ngũ Hành Sơn', 'Quận Sơn Trà', 'Quận Thanh Khê', 'Huyện Hoà Vang'
            ],
            // Đà Lạt
            'Đà Lạt' => [
                'Huyện Đơn Dương', 'Huyện Đơn Dương', 'Huyện Đức Trọng', 'Huyện Lạc Dương', 'Huyện Lâm Hà', 'Huyện Ninh Sơn', 'Huyện Đức Trọng', 'Thành phố Đà Lạt'
            ],

            // Điện Biên
            'Điện Biên' => [
                'Huyện Điện Biên', 'Huyện Điện Biên Đông', 'Huyện Mường Chà', 'Huyện Mường Nhé', 'Huyện Mường Lay', 'Huyện Tủa Chùa', 'Huyện Tuần Giáo', 'Thành phố Điện Biên Phủ'
            ],
            // Đồng Nai
            'Đồng Nai' => [
                'Huyện Cẩm Mỹ', 'Huyện Định Quán', 'Huyện Long Thành', 'Huyện Nhơn Trạch', 'Huyện Tân Phú', 'Huyện Trảng Bom', 'Huyện Vĩnh Cửu', 'Thành phố Biên Hòa'
            ],
            // Đồng Tháp
            'Đồng Tháp' => [
                'Huyện Cao Lãnh', 'Huyện Châu Thành', 'Huyện Hồng Ngự', 'Huyện Lai Vung', 'Huyện Lấp Vò', 'Huyện Tân Hồng', 'Huyện Tam Nông', 'Huyện Thanh Bình', 'Huyện Tháp Mười', 'Thành phố Cao Lãnh', 'Thành phố Sa Đéc'
            ],
            // Gia Lai
            'Gia Lai' => [
                'Huyện An Khê', 'Huyện Chư Prong', 'Huyện Chư Păh', 'Huyện Chư Sê', 'Huyện Đăk Đoa', 'Huyện Đăk Pơ', 'Huyện Đăk Tô', 'Huyện Kbang', 'Huyện Krông Pa', 'Huyện Mang Yang', 'Huyện Phú Thiện', 'Huyện Ia Grai', 'Thành phố Pleiku'
            ],
            // Hà Giang
            'Hà Giang' => [
                'Huyện Bắc Mê', 'Huyện Bắc Quang', 'Huyện Đồng Văn', 'Huyện Hoàng Su Phì', 'Huyện Mèo Vạc', 'Huyện Quản Bạ', 'Huyện Quang Bình', 'Huyện Xín Mần', 'Huyện Vị Xuyên', 'Thành phố Hà Giang'
            ],
            // Hà Nam
            'Hà Nam' => [
                'Huyện Bình Lục', 'Huyện Duy Tiên', 'Huyện Kim Bảng', 'Huyện Lý Nhân', 'Huyện Thanh Liêm', 'Thành phố Phủ Lý'
            ],
            // Hà Nội
            'Hà Nội' => [
                'Quận Ba Đình', 'Quận Bắc Từ Liêm', 'Quận Cầu Giấy', 'Quận Đống Đa', 'Quận Hà Đông', 'Quận Hai Bà Trưng', 'Quận Hoàn Kiếm', 'Quận Hoàng Mai', 'Quận Long Biên', 'Quận Nam Từ Liêm', 'Quận Tây Hồ', 'Quận Thanh Xuân', 'Huyện Ba Vì', 'Huyện Đông Anh', 'Huyện Gia Lâm', 'Huyện Hoài Đức', 'Huyện Mê Linh', 'Huyện Mỹ Đức', 'Huyện Sóc Sơn', 'Huyện Thanh Trì', 'Huyện Thanh Oai', 'Huyện Thanh Thuỷ', 'Huyện Thường Tín', 'Huyện Thường Tín', 'Huyện Từ Liêm'
            ],
            // Hà Tĩnh
            'Hà Tĩnh' => [
                'Huyện Cẩm Xuyên', 'Huyện Đức Thọ', 'Huyện Hương Khê', 'Huyện Hương Sơn', 'Huyện Kỳ Anh', 'Huyện Lộc Hà', 'Huyện Nghi Xuân', 'Huyện Thạch Hà', 'Huyện Vũ Quang', 'Thành phố Hà Tĩnh'
            ],
            // Hải Dương
            'Hải Dương' => [
                'Huyện Cẩm Giàng', 'Huyện Gia Lộc', 'Huyện Kim Thành', 'Huyện Kinh Môn', 'Huyện Ninh Giang', 'Huyện Thanh Hà', 'Huyện Thanh Miện', 'Thành phố Hải Dương'
            ],
            // Hải Phòng
            'Hải Phòng' => [
                'Quận Đồ Sơn', 'Quận Dương Kinh', 'Quận Hải An', 'Quận Hồng Bàng', 'Quận Kiến An', 'Quận Lê Chân', 'Quận Ngô Quyền', 'Quận Thủy Nguyên', 'Huyện An Dương', 'Huyện An Lão', 'Huyện Bạch Long Vĩ', 'Huyện Cát Hải', 'Huyện Tiên Lãng', 'Huyện Vĩnh Bảo'
            ],
            // Hòa Bình
            'Hòa Bình' => [
                'Huyện Đà Bắc', 'Huyện Cao Phong', 'Huyện Kim Bôi', 'Huyện Lạc Sơn', 'Huyện Lạc Thủy', 'Huyện Mai Châu', 'Huyện Tân Lạc', 'Huyện Yên Thủy', 'Thành phố Hòa Bình'
            ],
            // Hưng Yên
            'Hưng Yên' => [
                'Huyện Ân Thi', 'Huyện Khoái Châu', 'Huyện Kim Động', 'Huyện Mỹ Hào', 'Huyện Phù Cừ', 'Huyện Tiên Lữ', 'Huyện Văn Giang', 'Huyện Văn Lâm', 'Huyện Văn Môn', 'Thành phố Hưng Yên'
            ],
            // Hậu Giang
            'Hậu Giang' => [
                'Huyện Châu Thành', 'Huyện Châu Thành A', 'Huyện Long Mỹ', 'Huyện Phụng Hiệp', 'Huyện Vị Thủy', 'Huyện Vị Thanh', 'Thành phố Vị Thanh'
            ],
            // Khánh Hòa
            'Khánh Hòa' => [
                'Huyện Cam Lâm', 'Huyện Cam Ranh', 'Huyện Diên Khánh', 'Huyện Khánh Sơn', 'Huyện Khánh Vĩnh', 'Huyện Ninh Hòa', 'Thành phố Nha Trang'
            ],
            // Kiên Giang
            'Kiên Giang' => [
                'Huyện An Biên', 'Huyện An Minh', 'Huyện Châu Thành', 'Huyện Giang Thành', 'Huyện Hà Tiên', 'Huyện Hòn Đất', 'Huyện Hòn Là', 'Huyện Kiên Hải', 'Huyện Kiên Lương', 'Huyện Phú Quốc', 'Huyện Tân Hiệp', 'Huyện Tịnh Biên', 'Thành phố Rạch Giá'
            ],
            // Kon Tum
            'Kon Tum' => [
                'Huyện Đăk Glei', 'Huyện Đăk Hà', 'Huyện Đăk Tô', 'Huyện Kon Plông', 'Huyện Kon Rẫy', 'Huyện Ngọc Hồi', 'Huyện Sa Thầy', 'Thành phố Kon Tum'
            ],
            // Lai Châu
            'Lai Châu' => [
                'Huyện Mường Tè', 'Huyện Mường Nhé', 'Huyện Sìn Hồ', 'Huyện Phong Thổ', 'Huyện Tam Đường', 'Huyện Tân Uyên', 'Huyện Nậm Nhùn', 'Thành phố Lai Châu'
            ],
            // Lào Cai
            'Lào Cai' => [
                'Huyện Bát Xát', 'Huyện Bắc Hà', 'Huyện Bảo Thắng', 'Huyện Bảo Yên', 'Huyện Mường Khương', 'Huyện Sa Pa', 'Huyện Văn Bàn', 'Thành phố Lào Cai'
            ],
            // Lâm Đồng
            'Lâm Đồng' => [
                'Huyện Bảo Lâm', 'Huyện Bảo Lộc', 'Huyện Di Linh', 'Huyện Đạ Huoai', 'Huyện Đạ Tẻh', 'Huyện Đức Trọng', 'Huyện Lạc Dương', 'Huyện Lạc Sơn', 'Huyện Đơn Dương', 'Thành phố Đà Lạt'
            ],
            // Lạng Sơn
            'Lạng Sơn' => [
                'Huyện Bình Gia', 'Huyện Cao Lộc', 'Huyện Chi Lăng', 'Huyện Đình Lập', 'Huyện Lộc Bình', 'Huyện Văn Lãng', 'Huyện Văn Quan', 'Thành phố Lạng Sơn'
            ],
            // Long An
            'Long An' => [
                'Huyện Bến Lức', 'Huyện Cần Đước', 'Huyện Cần Giuộc', 'Huyện Châu Thành', 'Huyện Đức Hòa', 'Huyện Đức Huệ', 'Huyện Mộc Hóa', 'Huyện Tân Hưng', 'Huyện Tân Thạnh', 'Huyện Tân Trụ', 'Huyện Thạnh Hóa', 'Huyện Vĩnh Hưng', 'Huyện Vĩnh Long', 'Thành phố Tân An'
            ],
            // Nam Định
            'Nam Định' => [
                'Huyện Giao Thủy', 'Huyện Hải Hậu', 'Huyện Mỹ Lộc', 'Huyện Nam Trực', 'Huyện Nghĩa Hưng', 'Huyện Trực Ninh', 'Huyện Vụ Bản', 'Thành phố Nam Định'
            ],
            // Nghệ An
            'Nghệ An' => [
                'Huyện Anh Sơn', 'Huyện Con Cuông', 'Huyện Diễn Châu', 'Huyện Đô Lương', 'Huyện Hưng Nguyên', 'Huyện Kỳ Sơn', 'Huyện Nam Đàn', 'Huyện Nghi Lộc', 'Huyện Quế Phong', 'Huyện Quỳ Châu', 'Huyện Quỳ Hợp', 'Huyện Quỳnh Lưu', 'Huyện Tân Kỳ', 'Huyện Thanh Chương', 'Huyện Thanh Hà', 'Huyện Thái Hòa', 'Huyện Yên Thành', 'Thành phố Vinh'
            ],
            // Ninh Bình
            'Ninh Bình' => [
                'Huyện Gia Viễn', 'Huyện Hoa Lư', 'Huyện Kim Sơn', 'Huyện Nho Quan', 'Huyện Yên Khánh', 'Huyện Yên Mô', 'Thành phố Ninh Bình'
            ],
            // Ninh Thuận
            'Ninh Thuận' => [
                'Huyện Bác Ái', 'Huyện Cà Ná', 'Huyện Ninh Hải', 'Huyện Ninh Phước', 'Huyện Ninh Sơn', 'Huyện Thuận Bắc', 'Huyện Thuận Nam', 'Thành phố Phan Rang-Tháp Chàm'
            ],
            // Phú Thọ
            'Phú Thọ' => [
                'Huyện Cẩm Khê', 'Huyện Đoan Hùng', 'Huyện Hạ Hòa', 'Huyện Lâm Thao', 'Huyện Thanh Ba', 'Huyện Thanh Sơn', 'Huyện Thanh Thủy', 'Huyện Tân Sơn', 'Huyện Yên Lập', 'Thành phố Việt Trì'
            ],
            // Phú Yên
            'Phú Yên' => [
                'Huyện Đồng Xuân', 'Huyện Đông Hòa', 'Huyện Phú Hòa', 'Huyện Tuy An', 'Huyện Tuy Hòa', 'Huyện Sông Cầu', 'Thành phố Tuy Hòa'
            ],
            // Quảng Bình
            'Quảng Bình' => [
                'Huyện Bố Trạch', 'Huyện Minh Hóa', 'Huyện Quảng Ninh', 'Huyện Quảng Trạch', 'Huyện Tuyên Hóa', 'Thành phố Đồng Hới'
            ],

            // Quảng Nam
            'Quảng Nam' => [
                'Huyện Đại Lộc', 'Huyện Duy Xuyên', 'Huyện Đông Giang', 'Huyện Hiệp Đức', 'Huyện Nam Giang', 'Huyện Nam Trà My', 'Huyện Núi Thành', 'Huyện Phú Ninh', 'Huyện Tây Giang', 'Huyện Thăng Bình', 'Thành phố Tam Kỳ', 'Thành phố Hội An'
            ],
            // Quảng Ngãi
            'Quảng Ngãi' => [
                'Huyện Bình Sơn', 'Huyện Đức Phổ', 'Huyện Lý Sơn', 'Huyện Mộ Đức', 'Huyện Nghĩa Hành', 'Huyện Sơn Hà', 'Huyện Sơn Tịnh', 'Huyện Trà Bồng', 'Huyện Trà My', 'Huyện Tư Nghĩa', 'Thành phố Quảng Ngãi'
            ],
            // Quảng Ninh
            'Quảng Ninh' => [
                'Huyện Cô Tô', 'Huyện Đầm Hà', 'Huyện Đông Triều', 'Huyện Hải Hà', 'Huyện Hoành Bồ', 'Huyện Móng Cái', 'Huyện Quảng Yên', 'Huyện Tiên Yên', 'Huyện Uông Bí', 'Thành phố Hạ Long', 'Thành phố Cẩm Phả'
            ],
            // Quảng Trị
            'Quảng Trị' => [
                'Huyện Cam Lộ', 'Huyện Cồn Cỏ', 'Huyện Đa Krông', 'Huyện Hải Lăng', 'Huyện Hướng Hóa', 'Huyện Gio Linh', 'Huyện Vĩnh Linh', 'Thành phố Đông Hà', 'Thị xã Quảng Trị'
            ],
            // Sóc Trăng
            'Sóc Trăng' => [
                'Huyện Cù Lao Dung', 'Huyện Kế Sách', 'Huyện Long Phú', 'Huyện Mỹ Xuyên', 'Huyện Mỹ Tú', 'Huyện Ngã Năm', 'Huyện Thạnh Trị', 'Huyện Trần Đề', 'Thành phố Sóc Trăng'
            ],
            // Sơn La
            'Sơn La' => [
                'Huyện Bắc Yên', 'Huyện Mai Sơn', 'Huyện Mộc Châu', 'Huyện Mường La', 'Huyện Sông Mã', 'Huyện Sông Sơn', 'Huyện Thuận Châu', 'Huyện Yên Châu', 'Thành phố Sơn La'
            ],
            // TP.Hồ Chí Minh
            'TP.Hồ Chí Minh' => [
                'Quận 1', 'Quận 2', 'Quận 3', 'Quận 4', 'Quận 5', 'Quận 6', 'Quận 7', 'Quận 8', 'Quận 9', 'Quận 10', 'Quận 11', 'Quận 12', 'Quận Bình Tân', 'Quận Bình Thạnh', 'Quận Gò Vấp', 'Quận Phú Nhuận', 'Quận Tân Bình', 'Quận Tân Phú', 'Quận Thủ Đức', 'Huyện Củ Chi', 'Huyện Cần Giờ', 'Huyện Hóc Môn', 'Huyện Nhà Bè'
            ],
            // Thừa Thiên Huế
            'Thừa Thiên Huế' => [
                'Huyện A Lưới', 'Huyện A Lưới', 'Huyện Hương Thủy', 'Huyện Hương Trà', 'Huyện Phú Lộc', 'Huyện Phú Vang', 'Thành phố Huế'
            ],
            // Tây Ninh
            'Tây Ninh' => [
                'Huyện Bến Cầu', 'Huyện Bến Thành', 'Huyện Dương Minh Châu', 'Huyện Gò Dầu', 'Huyện Hòa Thành', 'Huyện Tân Biên', 'Huyện Tân Châu', 'Thành phố Tây Ninh'
            ],
            // Thái Bình
            'Thái Bình' => [
                'Huyện Đông Hưng', 'Huyện Hưng Hà', 'Huyện Kiến Xương', 'Huyện Quỳnh Phụ', 'Huyện Thái Thụy', 'Huyện Vũ Thư', 'Thành phố Thái Bình'
            ],
            // Thái Nguyên
            'Thái Nguyên' => [
                'Huyện Đại Từ', 'Huyện Định Hóa', 'Huyện Đồng Hỷ', 'Huyện Phú Bình', 'Huyện Phú Lương', 'Huyện Võ Nhai', 'Thành phố Thái Nguyên'
            ],
            // Thanh Hóa
            'Thanh Hóa' => [
                'Huyện Bá Thước', 'Huyện Cẩm Thủy', 'Huyện Đông Sơn', 'Huyện Hà Trung', 'Huyện Hậu Lộc', 'Huyện Lang Chánh', 'Huyện Mường Lát', 'Huyện Ngọc Lặc', 'Huyện Ngọc Sơn', 'Huyện Quảng Xương', 'Huyện Thạch Thành', 'Huyện Thiệu Hóa', 'Huyện Tĩnh Gia', 'Huyện Vĩnh Lộc', 'Thành phố Thanh Hóa'
            ],
            // Tiền Giang
            'Tiền Giang' => [
                'Huyện Cái Bè', 'Huyện Châu Thành', 'Huyện Gò Công Đông', 'Huyện Gò Công Tây', 'Huyện Tân Phước', 'Huyện Tân Thành', 'Huyện Cai Lậy', 'Thành phố Mỹ Tho', 'Thị xã Gò Công'
            ],
            // Trà Vinh
            'Trà Vinh' => [
                'Huyện Cầu Kè', 'Huyện Cầu Ngang', 'Huyện Châu Thành', 'Huyện Duyên Hải', 'Huyện Tiểu Cần', 'Huyện Trà Cú', 'Thành phố Trà Vinh'
            ],
            // Tuyên Quang
            'Tuyên Quang' => [
                'Huyện Chiêm Hóa', 'Huyện Hàm Yên', 'Huyện Na Hang', 'Huyện Sơn Dương', 'Huyện Yên Sơn', 'Thành phố Tuyên Quang'
            ],
            // Vĩnh Long
            'Vĩnh Long' => [
                'Huyện Bình Tân', 'Huyện Cái Bè', 'Huyện Long Hồ', 'Huyện Mang Thít', 'Huyện Tam Bình', 'Huyện Trà Ôn', 'Huyện Vũng Liêm', 'Thành phố Vĩnh Long'
            ],
            // Vĩnh Phúc
            'Vĩnh Phúc' => [
                'Huyện Bình Xuyên', 'Huyện Lập Thạch', 'Huyện Tam Dương', 'Huyện Tam Đảo', 'Huyện Vĩnh Tường', 'Huyện Yên Lạc', 'Thành phố Vĩnh Yên'
            ],
            // Yên Bái
            'Yên Bái' => [
                'Huyện Đại Từ', 'Huyện Lục Yên', 'Huyện Mù Cang Chải', 'Huyện Trấn Yên', 'Huyện Văn Chấn', 'Huyện Văn Yên', 'Thành phố Yên Bái'
            ],
        ];

        foreach ($districts as $provinceName => $districtNames) {
            $province = Province::where('name', $provinceName)->first();
            if ($province) {
                foreach ($districtNames as $districtName) {
                    District::create([
                        'name' => $districtName,
                        'province_id' => $province->id,
                    ]);
                }
            }
        }
    }
}
