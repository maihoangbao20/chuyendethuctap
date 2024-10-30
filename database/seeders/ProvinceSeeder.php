<?php
// database/seeders/ProvinceSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        $provinces = [
            'An Giang',
            'Bà Rịa - Vũng Tàu',
            'Bình Dương',
            'Bình Phước',
            'Bình Thuận',
            'Bắc Giang',
            'Bắc Kạn',
            'Bắc Ninh',
            'Bạc Liêu',
            'Bến Tre',
            'Bình Định',
            'Cà Mau',
            'Cao Bằng',
            'Cần Thơ',
            'Đắk Lắk',
            'Đắk Nông',
            'Đà Nẵng',
            'Đà Lạt',
            'Điện Biên',
            'Đồng Nai',
            'Đồng Tháp',
            'Gia Lai',
            'Hà Giang',
            'Hà Nam',
            'Hà Nội',
            'Hà Tĩnh',
            'Hải Dương',
            'Hải Phòng',
            'Hòa Bình',
            'Hưng Yên',
            'Hậu Giang',
            'Khánh Hòa',
            'Kiên Giang',
            'Kon Tum',
            'Lai Châu',
            'Lào Cai',
            'Lâm Đồng',
            'Lạng Sơn',
            'Long An',
            'Nam Định',
            'Nghệ An',
            'Ninh Bình',
            'Ninh Thuận',
            'Phú Thọ',
            'Phú Yên',
            'Quảng Bình',
            'Quảng Nam',
            'Quảng Ngãi',
            'Quảng Ninh',
            'Quảng Trị',
            'Sóc Trăng',
            'Sơn La',
            'TP.Hồ Chí Minh',
            'Thừa Thiên Huế',
            'Tây Ninh',
            'Thái Bình',
            'Thái Nguyên',
            'Thanh Hóa',
            'Tiền Giang',
            'Trà Vinh',
            'Tuyên Quang',
            'Vĩnh Long',
            'Vĩnh Phúc',
            'Yên Bái'
        ];

        foreach ($provinces as $province) {
            Province::create(['name' => $province]);
        }
    }
}
