<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(DetailProductSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(OrderSeeder::class);
    }
}

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            ['name'=>'admin', 'email'=>'admin@gmail.com', 'password'=>Hash::make('123')],
            ['name'=>'Thắng Quang', 'email'=>'thanghokdps@gmail.com', 'password'=>Hash::make('123')]
        ]);
    }
}

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'customer', 'email'=>'customer', 'password'=>Hash::make('123'), 'gender'=>1, 'address'=>'null', 'phone'=>'null'],
            ['name'=>'Thắng Quang', 'email'=>'thanghorit@gmail.com', 'password'=>Hash::make('123'),'gender'=>1, 'address'=>'141 đường Nguyễn Xí, phường Hòa Minh, quận Liên Chiểu, thành phố Đà Nẵng', 'phone'=>'0971504302'],
            ['name'=>'Thường Duy', 'email'=>'thuongduy24111998@gmail.com', 'password'=>Hash::make('123'), 'gender'=>0, 'address'=>'25 đường 12/5, thị trấn Khâm Đức, huyện Phước Sơn, tỉnh Quảng Nam', 'phone'=>'0708539115'],
        ]);
    }
}

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name'=>'Adidas', 'type'=>null],
            ['name'=>'Adidas NEO', 'type'=>null],
            ['name'=>'Adidas Bóng Đá', 'type'=>null],
            ['name'=>'Adidas Bóng Rổ', 'type'=>null],
            ['name'=>'Adidas 4D', 'type'=>1],
            ['name'=>'Adidas Adizero', 'type'=>1],
            ['name'=>'Adidas Falcon', 'type'=>1],
            ['name'=>'Adidas StanSmith', 'type'=>1],
            ['name'=>'Adidas Superstar', 'type'=>1],
            ['name'=>'Adidas Ultraboost', 'type'=>1],
            ['name'=>'Adidas ZX 2K', 'type'=>1],
            ['name'=>'Adidas 90s', 'type'=>2],
            ['name'=>'Adidas Advantage', 'type'=>2],
            ['name'=>'Adidas Questar', 'type'=>2],
            ['name'=>'Adidas Nova', 'type'=>2],
            ['name'=>'Adidas Runfalcon', 'type'=>2],
            ['name'=>'Adidas X_PLR', 'type'=>2],
            ['name'=>'Adidas Nemeziz', 'type'=>3],
            ['name'=>'Adidas Predator', 'type'=>3],
            ['name'=>'Adidas D.O.N', 'type'=>4],
            ['name'=>'Adidas Dame', 'type'=>4],
            ['name'=>'Adidas Marquee', 'type'=>4],
        ]);
    }
}

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['name'=>'Giày Sneaker Nam Adidas ZX 2K 4D FW2002 “Cloud White” – Hàng Chính Hãng', 'category_id'=>5, 'price'=>2990000, 'description'=>'MẪU GIÀY CHẠY BỘ TƯƠNG LẠI MANG ĐẬM DẤU ẤN HOÀI CỔ THẬP NIÊN 80. Hàng nghìn vận động viên. Nhiều năm trời thu thập dữ liệu. adidas 4D chính là công nghệ cho tương lai. Đế giữa in kỹ thuật số không chỉ mang vẻ ngoài tân tiến, từng mảng lưới làm bằng nhựa lỏng cho cảm giác độc đáo dưới chân. Phom giày được chế tác bằng ánh sáng và hoàn thiện bằng nhiệt. Tất cả tạo nên một đôi giày chạy bộ với thiết kế riêng thúc đẩy bạn tiến lên phía trước. Phiên bản đường phố này có phom dáng tối ưu, bề mặt sần và màu sắc neon vui mắt, gợi nhớ đến dòng giày ZX lần đầu ra mắt vào thập niên 80.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/03/zx-2k-4d-shoes-white-fw2002-01-standard.jpg'],
            ['name'=>'Giày Adidas Nam Adidas ZX 2K 4D “Triple Black” – Hàng Chính Hãng', 'category_id'=>5,'price'=>2990000, 'description'=>'MẪU GIÀY CHẠY BỘ TƯƠNG LẠI MANG ĐẬM DẤU ẤN HOÀI CỔ THẬP NIÊN 80. Hàng nghìn vận động viên. Nhiều năm trời thu thập dữ liệu. adidas 4D chính là công nghệ cho tương lai. Đế giữa in kỹ thuật số không chỉ mang vẻ ngoài tân tiến, từng mảng lưới làm bằng nhựa lỏng cho cảm giác độc đáo dưới chân. Phom giày được chế tác bằng ánh sáng và hoàn thiện bằng nhiệt. Tất cả tạo nên một đôi giày chạy bộ với thiết kế riêng thúc đẩy bạn tiến lên phía trước. Phiên bản đường phố này có phom dáng tối ưu, bề mặt sần và màu sắc neon vui mắt, gợi nhớ đến dòng giày ZX lần đầu ra mắt vào thập niên 80.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/01/FZ3561-01.jpg'],
            ['name'=>'Giày Nam Adidas Adizero Bekoji 2.0 ”Royal Blue” – Hàng Chính Hãng', 'category_id'=>6,'price'=>990000, 'description'=>'GIÀY CHẠY BỘ HIỆU NĂNG CAO VỚI THIẾT KẾ KIỂM SOÁT NHIỆT. Cảm nhận làn gió mát. Đôi giày chạy bộ adidas này mang đến cảm giác mát mẻ cho những buổi chạy nóng bức với thân giày bằng vải dệt kim siêu thoáng khí. Các ô khoét trong suốt khoe đôi tất sáng màu bên trong. Lớp đệm đàn hồi kết hợp với đế ngoài mềm dẻo cho sải bước êm ái và nguồn năng lượng bất tận. Cảm giác mát lạnh cực chất với đế ngoài trong suốt và 3 Sọc xuyên thấu..', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/02/EG1192-1.jpg'],
            ['name'=>'Adidas Falcon W “Olympic 2020” Nữ – Hàng Chính Hãng', 'category_id'=>7,'price'=>1050000, 'description'=>'ĐÔI GIÀY NÂNG ĐỠ CHO NHỮNG BUỔI CHẠY HÀNG NGÀY CỦA BẠN. Bắt đầu chinh phục đường chạy với đôi giày chạy bộ nhẹ nhàng này. Dù trên máy chạy bộ hay trên đường phố, đôi giày này cũng mang đến sự thoải mái cho từng bước chạy với lớp đệm mềm mại. Đôi giày tập nâng đỡ này có phần thân giày kết hợp các loại chất liệu thoáng mát và khung giữa bàn chân tăng cường hỗ trợ.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2020/12/Q47262-1.jpg'],
            ['name'=>'Giày Adidas Nam Adidas Stansmith Trefoil “Black” – Hàng Chính Hãng', 'category_id'=>8,'price'=>1450000, 'description'=>'ĐÔI GIÀY CÁ TÍNH DÀNH CHO PHÁI ĐẸP. The Stan Smith là dòng sản phẩm giày quần vợt cổ điển cho nữ, lần đầu tiên xuất hiện vào năm 1971 và đã trở thành một biểu tượng thời trang và nhìn thấy từ sân tennis đến văn phòng trên toàn thế giới. Lớp lót bằng da, với sockliner OrthoLite® mang lại cho giày một cái nhìn cao cấp, gót chân được giữ trong da lộn cho một cái nhìn cổ điển và 3-sọc đục lỗ mang tính biểu tượng tự hào ở hai bên.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2020/12/FW2443-1.jpg'],
            ['name'=>'Giày Nữ Adidas Stansmith x HER W “Glow Pink” – Hàng Chính Hãng', 'category_id'=>8,'price'=>1150000, 'description'=>'ĐÔI GIÀY CÁ TÍNH DÀNH CHO PHÁI ĐẸP. The Stan Smith là dòng sản phẩm giày quần vợt cổ điển cho nữ, lần đầu tiên xuất hiện vào năm 1971 và đã trở thành một biểu tượng thời trang và nhìn thấy từ sân tennis đến văn phòng trên toàn thế giới. Lớp lót bằng da, với sockliner OrthoLite® mang lại cho giày một cái nhìn cao cấp, gót chân được giữ trong da lộn cho một cái nhìn cổ điển và 3-sọc đục lỗ mang tính biểu tượng tự hào ở hai bên.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2020/12/FW2522-01.jpg'],
            ['name'=>'Giày Nữ Adidas Superstar 20 ”Silver” – Hàng Chính Hãng', 'category_id'=>9,'price'=>1450000, 'description'=>'ĐÔI GIÀY CÁ TÍNH DÀNH CHO PHÁI ĐẸP. The Stan Smith là dòng sản phẩm giày quần vợt cổ điển cho nữ, lần đầu tiên xuất hiện vào năm 1971 và đã trở thành một biểu tượng thời trang và nhìn thấy từ sân tennis đến văn phòng trên toàn thế giới. Lớp lót bằng da, với sockliner OrthoLite® mang lại cho giày một cái nhìn cao cấp, gót chân được giữ trong da lộn cho một cái nhìn cổ điển và 3-sọc đục lỗ mang tính biểu tượng tự hào ở hai bên.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/01/FW3915-01.jpg'],
            ['name'=>'Giày Nữ Adidas Superstar Slip-On “White/Orange” – Hàng Chính Hãng', 'category_id'=>9,'price'=>990000, 'description'=>'ĐÔI SNEAKER VỚI MŨI GIÀY CỨNG, DÀNH CHO GIỚI TRẺ. Là biểu tượng đường phố và biểu tượng văn hóa, giày adidas Superstar có một câu chuyện được kể lại nhiều lần theo những cách mới mẻ khác nhau. Trở lại như đồ trượt, đôi giày này mang lại một cái nhìn mới mẻ, hoàn toàn mới. Chúng có một kết cấu waffle kéo dài và vỏ bọc ở mũi giày đặc trưng.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2020/02/zz-D96704-01.jpg'],
            ['name'=>'Giày Sneaker Nam Adidas Ultraboost 20 City Pack FX7815 “Osaka” – Hàng Chính Hãng', 'category_id'=>10,'price'=>2350000, 'description'=>'KIỂM SOÁT LỰC KHI CHẠM ĐẤT, THOẢI MÁI TRONG TỪNG BƯỚC CHẠY. Mỗi ngày mới. Mỗi buổi chạy mới. Hãy tận dụng tối đa. Đôi giày Adidas Ultraboost 20 FX7815 hiệu năng cao này có thân giày bằng vải dệt kim ôm chân. Các đường may trong trợ lực được bố trí chuẩn xác để tạo độ nâng đỡ ở đúng những vị trí cần thiết. Gót giày làm từ chất liệu elastane mềm mại cho độ ôm thoải mái hơn. Lớp đệm đàn hồi hoàn trả năng lượng cho từng sải bước tạo cảm giác như có thể chạy mãi mãi', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/03/ultraboost-20-city-pack-hype-djen-fx7815-01-standard.jpg'],
            ['name'=>'Giày Sneaker Nam Adidas Ultraboost 4.0 DNA FU9993 “5th Anniversary” – Hàng Chính Hãng', 'category_id'=>10,'price'=>2350000, 'description'=>'KIỂM SOÁT LỰC KHI CHẠM ĐẤT, THOẢI MÁI TRONG TỪNG BƯỚC CHẠY. Mỗi ngày mới. Mỗi buổi chạy mới. Hãy tận dụng tối đa. Đôi giày Adidas Ultraboost 20 FX7815 hiệu năng cao này có thân giày bằng vải dệt kim ôm chân. Các đường may trong trợ lực được bố trí chuẩn xác để tạo độ nâng đỡ ở đúng những vị trí cần thiết. Gót giày làm từ chất liệu elastane mềm mại cho độ ôm thoải mái hơn. Lớp đệm đàn hồi hoàn trả năng lượng cho từng sải bước tạo cảm giác như có thể chạy mãi mãi', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/03/ultraboost-20-city-pack-hype-djen-fx7815-01-standard.jpg'],
            ['name'=>'Giày Nữ Adidas Ultraboost 20 J “Black Reflective/Bronze Boost” – Hàng Chính Hãng', 'category_id'=>10,'price'=>1950000, 'description'=>'KIỂM SOÁT LỰC KHI CHẠM ĐẤT, THOẢI MÁI TRONG TỪNG BƯỚC CHẠY. Mỗi ngày mới. Mỗi buổi chạy mới. Hãy tận dụng tối đa. Đôi giày Adidas Ultraboost 20 FX7815 hiệu năng cao này có thân giày bằng vải dệt kim ôm chân. Các đường may trong trợ lực được bố trí chuẩn xác để tạo độ nâng đỡ ở đúng những vị trí cần thiết. Gót giày làm từ chất liệu elastane mềm mại cho độ ôm thoải mái hơn. Lớp đệm đàn hồi hoàn trả năng lượng cho từng sải bước tạo cảm giác như có thể chạy mãi mãi', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/02/FX0455-01.jpg'],
            ['name'=>'Giày Nữ Adidas Ultraboost 20 J “Cloud White/Signal Pink” – Hàng Chính Hãng', 'category_id'=>10,'price'=>2350000, 'description'=>'KIỂM SOÁT LỰC KHI CHẠM ĐẤT, THOẢI MÁI TRONG TỪNG BƯỚC CHẠY. Mỗi ngày mới. Mỗi buổi chạy mới. Hãy tận dụng tối đa. Đôi giày Adidas Ultraboost 20 FX7815 hiệu năng cao này có thân giày bằng vải dệt kim ôm chân. Các đường may trong trợ lực được bố trí chuẩn xác để tạo độ nâng đỡ ở đúng những vị trí cần thiết. Gót giày làm từ chất liệu elastane mềm mại cho độ ôm thoải mái hơn. Lớp đệm đàn hồi hoàn trả năng lượng cho từng sải bước tạo cảm giác như có thể chạy mãi mãi', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/02/FX0456-1.jpg'],
            ['name'=>'Giày Adidas Nam Adidas Ultraboost 5.0 DNA “Glow In The Dark” – Hàng Chính Hãng', 'category_id'=>10,'price'=>2350000, 'description'=>'KIỂM SOÁT LỰC KHI CHẠM ĐẤT, THOẢI MÁI TRONG TỪNG BƯỚC CHẠY. Mỗi ngày mới. Mỗi buổi chạy mới. Hãy tận dụng tối đa. Đôi giày Adidas Ultraboost 20 FX7815 hiệu năng cao này có thân giày bằng vải dệt kim ôm chân. Các đường may trong trợ lực được bố trí chuẩn xác để tạo độ nâng đỡ ở đúng những vị trí cần thiết. Gót giày làm từ chất liệu elastane mềm mại cho độ ôm thoải mái hơn. Lớp đệm đàn hồi hoàn trả năng lượng cho từng sải bước tạo cảm giác như có thể chạy mãi mãi', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/01/G58760-1.jpg'],
            ['name'=>'Giày Nam Adidas Ultraboost 20 NASA “Halo Silver”', 'category_id'=>10,'price'=>2350000, 'description'=>'KIỂM SOÁT LỰC KHI CHẠM ĐẤT, THOẢI MÁI TRONG TỪNG BƯỚC CHẠY. Mỗi ngày mới. Mỗi buổi chạy mới. Hãy tận dụng tối đa. Đôi giày Adidas Ultraboost 20 FX7815 hiệu năng cao này có thân giày bằng vải dệt kim ôm chân. Các đường may trong trợ lực được bố trí chuẩn xác để tạo độ nâng đỡ ở đúng những vị trí cần thiết. Gót giày làm từ chất liệu elastane mềm mại cho độ ôm thoải mái hơn. Lớp đệm đàn hồi hoàn trả năng lượng cho từng sải bước tạo cảm giác như có thể chạy mãi mãi', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/01/FX7957-1.jpg'],
            ['name'=>'Giày Adidas Nam Adidas Ultraboost 20 “Cloud White/Sharp Blue”', 'category_id'=>10,'price'=>2850000, 'description'=>'KIỂM SOÁT LỰC KHI CHẠM ĐẤT, THOẢI MÁI TRONG TỪNG BƯỚC CHẠY. Mỗi ngày mới. Mỗi buổi chạy mới. Hãy tận dụng tối đa. Đôi giày Adidas Ultraboost 20 FX7815 hiệu năng cao này có thân giày bằng vải dệt kim ôm chân. Các đường may trong trợ lực được bố trí chuẩn xác để tạo độ nâng đỡ ở đúng những vị trí cần thiết. Gót giày làm từ chất liệu elastane mềm mại cho độ ôm thoải mái hơn. Lớp đệm đàn hồi hoàn trả năng lượng cho từng sải bước tạo cảm giác như có thể chạy mãi mãi', 'image'=>'https://adidasstore.vn/wp-content/uploads/2020/09/EG0768-01.jpg'],
            ['name'=>'Giày Adidas Nam Adidas Ultraboost 20 “Royal Blue/Scarlet” – Hàng Chính Hãng', 'category_id'=>10,'price'=>2150000, 'description'=>'KIỂM SOÁT LỰC KHI CHẠM ĐẤT, THOẢI MÁI TRONG TỪNG BƯỚC CHẠY. Mỗi ngày mới. Mỗi buổi chạy mới. Hãy tận dụng tối đa. Đôi giày Adidas Ultraboost 20 FX7815 hiệu năng cao này có thân giày bằng vải dệt kim ôm chân. Các đường may trong trợ lực được bố trí chuẩn xác để tạo độ nâng đỡ ở đúng những vị trí cần thiết. Gót giày làm từ chất liệu elastane mềm mại cho độ ôm thoải mái hơn. Lớp đệm đàn hồi hoàn trả năng lượng cho từng sải bước tạo cảm giác như có thể chạy mãi mãi', 'image'=>'https://adidasstore.vn/wp-content/uploads/2020/09/EG0758-01.jpg'],
            ['name'=>'Giày Nam Addias X9000L4 “Black Red” – Hàng Chính Hãng', 'category_id'=>11,'price'=>1850000, 'description'=>'GIÀY PHONG CÁCH CHẠY BỘ VỚI THIẾT KẾ MỚI MẺ, ĐỘT PHÁ. Khi mang đôi giày adidas X9000L3 Boost đậm chất công nghệ này chính là lúc bạn hòa mình nguồn năng lượng của thành phố. Bạn cảm nhận thấy điều đó trong từng bước chân xuống phố. Cảm nhận rõ hơn về bản thân cũng như mọi người. Trọn vẹn trong từng khoảnh khắc. Cảm nhận mãnh liệt ấy. Suy nghĩ sẽ không vướng bận về bất kỳ điều gì khác nữa.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/02/FW8389-01.jpg'],
            ['name'=>'Giày Adidas Nam Addias X9000L3 “Black Grey” – Hàng Chính Hãng', 'category_id'=>11,'price'=>1480000, 'description'=>'GIÀY PHONG CÁCH CHẠY BỘ VỚI THIẾT KẾ MỚI MẺ, ĐỘT PHÁ. Khi mang đôi giày adidas X9000L3 Boost đậm chất công nghệ này chính là lúc bạn hòa mình nguồn năng lượng của thành phố. Bạn cảm nhận thấy điều đó trong từng bước chân xuống phố. Cảm nhận rõ hơn về bản thân cũng như mọi người. Trọn vẹn trong từng khoảnh khắc. Cảm nhận mãnh liệt ấy. Suy nghĩ sẽ không vướng bận về bất kỳ điều gì khác nữa.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/01/EH0050-01.jpg'],
            ['name'=>'Giày Adidas Nam Adidas ZX 2K Boost “Legacy Blue” – Hàng Chính Hãng', 'category_id'=>11,'price'=>2050000, 'description'=>'GIÀY PHONG CÁCH CHẠY BỘ VỚI THIẾT KẾ MỚI MẺ, ĐỘT PHÁ. Khi mang đôi giày adidas X9000L3 Boost đậm chất công nghệ này chính là lúc bạn hòa mình nguồn năng lượng của thành phố. Bạn cảm nhận thấy điều đó trong từng bước chân xuống phố. Cảm nhận rõ hơn về bản thân cũng như mọi người. Trọn vẹn trong từng khoảnh khắc. Cảm nhận mãnh liệt ấy. Suy nghĩ sẽ không vướng bận về bất kỳ điều gì khác nữa.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2020/12/FX8836-01.jpg'],
            ['name'=>'Adidas 90s Valation “Grey/Active Orange” – Hàng Chính Hãng', 'category_id'=>12,'price'=>990000, 'description'=>'MẪU GIÀY SANG TRỌNG NHẸ NHƯ BAY MANG PHONG CÁCH CỦA PHONG TRÀO CHẠY BỘ THẬP NIÊN 90. Tôn vinh thời đại nơi chạy bộ đã trở thành phong trào. Đôi giày với cảm hứng chạy bộ này hiện đại hóa nét cổ điển từ những năm 90 với đệm Cloudfoam siêu êm và miếng lót giày OrthoLite® mềm mại để tạo sự thoải mái. Thân giày bằng vải lưới mang kiểu dáng công nghệ với miếng đáp giữa giày bằng nhựa TPU và gót giày bằng cao su neoprene mềm.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2020/04/zz-EE9894-01.jpg'],
            ['name'=>'Giày Adidas Nam Adidas Advantage Base “White/Glow Pink” – Hàng Chính Hãng', 'category_id'=>13,'price'=>950000, 'description'=>'ADIDAS ADVANTAGE BASE. Giày T-toe đích thực nổi bật từ trong nhà ra ngoài phố. Giày thể thao da lộn trẻ trung này nổi trên một đế ngoài cao su đã sẵn sàng để chơi. Vải lót trên thân giày thoải mái nhẹ nhàng ôm lấy chân.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/01/EE7510-01.jpg'],
            ['name'=>'Giày Adidas Nam Adidas Advantage Base “All White/Green” – Hàng Chính Hãng', 'category_id'=>13,'price'=>990000, 'description'=>'ADIDAS ADVANTAGE BASE. Giày T-toe đích thực nổi bật từ trong nhà ra ngoài phố. Giày thể thao da lộn trẻ trung này nổi trên một đế ngoài cao su đã sẵn sàng để chơi. Vải lót trên thân giày thoải mái nhẹ nhàng ôm lấy chân.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2020/12/EE7690_01_standard.jpg'],
            ['name'=>'Giày Adidas Nam Adidas Questar Flow “Grey” – Hàng Chính Hãng', 'category_id'=>14,'price'=>970000, 'description'=>'ĐÔI GIÀY CHẠY THAY ĐỔI MÀU SẮC ĐẶC BIỆT. Một đôi giày bóng bảy với một cảm giác thời trang, sành điệu. Đôi giày nữ này có thân giày đan lưới cùng màu sắc đặc biệt – tạo ra hiệu ứng hình học chuyển màu 3D. Đế kép Cloudfoam mang lại cảm giác thoải mái cả ngày.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2020/03/F36240-01.jpg'],
            ['name'=>'Giày Adidas Nam Adidas Supernova Athleisure “Royal Blue” – Hàng Chính Hãng', 'category_id'=>14,'price'=>1250000, 'description'=>'ĐÔI GIÀY CHẠY MANG PHONG CÁCH MỚI LẠ. Một cảm giác chạy hoàn thành mới lạ trên từng bước chạy . Giày chạy bộ có đệm mềm và hình dạng quấn quanh bàn chân hỗ trợ trong lúc chạy. Hỗ trợ từ chân trước đến gót chân cung cấp sự ổn định kiểm soát từng bước sải chân. Thiết kế lưới trên thân giày thoáng khí và điểm nhấn ba sọc đặc trưng.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/01/FY1427-1.jpg'],
            ['name'=>'Giày Nữ Adidas Supernova “Glory Grey” - Hàng Chính Hãng', 'category_id'=>14,'price'=>1300000, 'description'=>'ĐÔI GIÀY CHẠY MANG PHONG CÁCH MỚI LẠ. Một cảm giác chạy hoàn thành mới lạ trên từng bước chạy . Giày chạy bộ có đệm mềm và hình dạng quấn quanh bàn chân hỗ trợ trong lúc chạy. Hỗ trợ từ chân trước đến gót chân cung cấp sự ổn định kiểm soát từng bước sải chân. Thiết kế lưới trên thân giày thoáng khí và điểm nhấn ba sọc đặc trưng.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2020/12/FV6018-1.jpg'],
            ['name'=>'Giày Adidas Nam Adidas Supernova “Glory Grey” – Hàng Chính Hãng', 'category_id'=>14,'price'=>1490000, 'description'=>'ĐÔI GIÀY CHẠY MANG PHONG CÁCH MỚI LẠ. Một cảm giác chạy hoàn thành mới lạ trên từng bước chạy . Giày chạy bộ có đệm mềm và hình dạng quấn quanh bàn chân hỗ trợ trong lúc chạy. Hỗ trợ từ chân trước đến gót chân cung cấp sự ổn định kiểm soát từng bước sải chân. Thiết kế lưới trên thân giày thoáng khí và điểm nhấn ba sọc đặc trưng.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2020/12/FV6018-1.jpg'],
            ['name'=>'Giày Nam Adidas Supernova “Cloud White” – Hàng Chính Hãng', 'category_id'=>15,'price'=>1490000, 'description'=>'ĐÔI GIÀY CHẠY MANG PHONG CÁCH MỚI LẠ. Một cảm giác chạy hoàn thành mới lạ trên từng bước chạy . Giày chạy bộ có đệm mềm và hình dạng quấn quanh bàn chân hỗ trợ trong lúc chạy. Hỗ trợ từ chân trước đến gót chân cung cấp sự ổn định kiểm soát từng bước sải chân. Thiết kế lưới trên thân giày thoáng khí và điểm nhấn ba sọc đặc trưng.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/02/FW9112-1.jpg'],
            ['name'=>'Giày Nữ Adidas Runfalcon W “Real Magenta” – Hàng Chính Hãng', 'category_id'=>16,'price'=>950000, 'description'=>'ĐÔI GIÀY CHẠY THAY ĐỔI MÀU SẮC ĐẶC BIỆT. Một đôi giày bóng bảy với một cảm giác thời trang, sành điệu. Đôi giày nữ này có thân giày đan lưới cùng màu sắc đặc biệt – tạo ra hiệu ứng hình học chuyển màu 3D. Đế kép Cloudfoam mang lại cảm giác thoải mái cả ngày.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/02/F36219-1.jpg'],
            ['name'=>'Giày Sneaker Nữ Adidas X_PLR FY6600 ”Silver” – Hàng Chính Hãng', 'category_id'=>17,'price'=>1150000, 'description'=>'ĐÔI GIÀY CHẠY THAY ĐỔI MÀU SẮC ĐẶC BIỆT. Một đôi giày bóng bảy với một cảm giác thời trang, sành điệu. Đôi giày nữ này có thân giày đan lưới cùng màu sắc đặc biệt – tạo ra hiệu ứng hình học chuyển màu 3D. Đế kép Cloudfoam mang lại cảm giác thoải mái cả ngày.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2021/03/x-plr-shoes-white-fy6600-01-standard.jpg'],
            ['name'=>'Giày BÓNG ĐÁ NEMEZIZ.3 FIRM GROUND – Hàng Chính Hãng', 'category_id'=>18,'price'=>1000000, 'description'=>'ĐÔI GIÀY BÓNG ĐÁ NÂNG ĐỠ CHO LỐI CHƠI LINH HOẠT. Đối thủ tưởng rằng có thể lên kịch bản đấu lại bạn, nhưng bạn lại hoàn toàn phá bỏ luật chơi. Trái, phải, qua, lại, rồi biến mất. Hãy định nghĩa lại thế nào linh hoạt với đôi giày bóng đá adidas Nemeziz.3 này. Lấy cảm hứng từ băng dán cơ thể thao, thân giày cổ cao vừa bằng vải lưới Agility Mesh nâng đỡ ôm chân cho cảm giác nhạy bén. Đế ngoài đúc phun TPU bên dưới sẵn sàng cho những màn chơi quyết liệt trên mặt cỏ tự nhiên.', 'image'=>'https://assets.adidas.com/images/h_2000,f_auto,q_auto:sensitive,fl_lossy,c_fill,g_auto/15a937e6593643ebb5ffac7201057e09_9366/Giay_bong_dja_Nemeziz.3_Firm_Ground_Mau_xanh_da_troi_FW7349_01_standard.jpg'],
            ['name'=>'Giày BÓNG ĐÁ SÂN CỎ TỰ NHIÊN PREDATOR FREAK.1 – Hàng Chính Hãng', 'category_id'=>19,'price'=>5000000, 'description'=>'LÀM CHỦ TRẬN ĐẤU TRÊN SÂN CỎ TỰ NHIÊN VỚI ĐÔI GIÀY BÓNG ĐÁ CỔ THẤP NÀY. Mỗi khi vượt qua đường biên trắng là bạn bước vào một thế giới hoàn toàn mới. Một thực tại song song nơi bạn có toàn quyền quyết định. Sân bóng thuộc quyền kiểm soát của bạn. Bung tỏa nội lực dữ dội trong bạn với đôi giày adidas Predator. Đôi giày bóng đá này có thiết kế cổ thấp và cổ giày không đường may để bạn xỏ chân dễ dàng. Thân giày adidas Primeknit ôm chân giúp cố định chắc chắn. Phần phủ gai Demonskin 2.0 mở rộng đầy táo bạo đảm bảo tác động của bạn lên bóng cũng mạnh mẽ không kém tác động của bạn đối lên đối thủ.', 'image'=>'https://assets.adidas.com/images/h_840,f_auto,q_auto:sensitive,fl_lossy,c_fill,g_auto/e4d6e938854444d9bfd5acc2010d8303_9366/Giay_Bong_DJa_San_Co_Tu_Nhien_Predator_Freak.1_DJo_FY6266_01_standard.jpg'],
            ['name'=>'Giày Adidas Nam Adidas D.O.N Issue#1 “Black Volt” – Hàng Chính Hãng', 'category_id'=>20,'price'=>1750000, 'description'=>'ĐÔI GIÀY BÓNG RỔ THIẾT KẾ CHO TỐC ĐỘ VÀ SỰ NHANH NHẸN. Bảo vệ gót chân người chơi trong suốt trận đấu với đôi giày bóng rổ đặc biệt này. Thân giày Mess với cổ có đệm để nâng cao mắt cá chân. Đệm đáp ứng ở đế giữa cho phép bạn lên xuống sân thoải mái. Một đế ngoài xương cá cung cấp độ bám mở rộng giúp bạn có được cú ăn điểm hoàn hảo.', 'image'=>'https://adidasstore.vn/wp-content/uploads/2020/05/D.O.N._Issue_1_Shoes_Black_EF2805_01_standard.jpg'],
            ['name'=>'Giày DAME 7 EXTPLY SULLEY – Hàng Chính Hãng', 'category_id'=>21,'price'=>2590000, 'description'=>'SỰ HỢP TÁC GIỮA ADIDAS BASKETBALL, DAMIAN LILLARD VÀ DISNEY PIXAR. Thật không dễ dàng để đứng đầu trò chơi của bạn trong bóng rổ và hip hop. Bộ sưu tập DAME 7 EXTPLY pha trộn tình yêu cho cả hai niềm đam mê của Damian Lillard. Mỗi "ca khúc" đều được lấy cảm hứng từ studio. Dame không bao giờ gian lận xay, khẳng định mình là baller tốt nhất bao giờ ân sủng gian hàng, thời gian. Giới thiệu: Dame D.O.L.L.A. Phiên bản giày Dame 7 của đàn em này có đồ họa lấy cảm hứng từ Sulley, người hùng cổ yêu thích của mọi người từ Monsters, Inc của Disney Pixar.', 'image'=>'https://assets.adidas.com/images/h_840,f_auto,q_auto:sensitive,fl_lossy,c_fill,g_auto/2c4e319f9b434a8ebef7ad4e017baa38_9366/Dame_7_EXTPLY_Sulley_Shoes_Turquoise_S42807_01_standard.jpg'],
            ['name'=>'Giày BÓNG RỔ ADIDAS MARQUEE BOOST GRAFFITI EF1230 – Hàng Chính Hãng', 'category_id'=>22,'price'=>1700000, 'description'=>'ĐÔI GIÀY CHẠY MANG PHONG CÁCH MỚI LẠ. Adidas Marquee Boost có thiết kế được biến hoá từ đôi giày bóng rổ cổ điển với những nét chấm phá hiện đại. Những chuyển động đòi hỏi sự nhanh nhạy và tính linh hoạt sẽ không bị hạn chế đối với đôi giày bóng rổ này. Phần độc đáo nhất của thiết kế là cổ giày được bao bọc một cách thoải mái với đệm nhằm đảm bảo mắt cá của người mang không bị cạ sát. Đế giữa có khả năng chuyển hồi năng lượng cao cho từng bước nhảy và bật xa.', 'image'=>'https://sneaker-house.com.vn/image/cache/catalog/adidas/EF1230/adidas-marquee-graffiti-EF1230-1-720x720.jpg'],
        ]);
    }
}

class DetailProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('detail_products')->insert([
            ['product_id'=>1, 'size'=>38, 'quantity'=>5],
            ['product_id'=>1, 'size'=>39, 'quantity'=>5],
            ['product_id'=>1, 'size'=>40, 'quantity'=>5],
            ['product_id'=>1, 'size'=>41, 'quantity'=>5],
            ['product_id'=>1, 'size'=>42, 'quantity'=>5],
            ['product_id'=>1, 'size'=>43, 'quantity'=>5],
            ['product_id'=>1, 'size'=>44, 'quantity'=>5],
            ['product_id'=>2, 'size'=>38, 'quantity'=>5],
            ['product_id'=>2, 'size'=>39, 'quantity'=>5],
            ['product_id'=>2, 'size'=>40, 'quantity'=>5],
            ['product_id'=>2, 'size'=>41, 'quantity'=>5],
            ['product_id'=>2, 'size'=>42, 'quantity'=>5],
            ['product_id'=>2, 'size'=>43, 'quantity'=>5],
            ['product_id'=>2, 'size'=>44, 'quantity'=>5],
            ['product_id'=>3, 'size'=>38, 'quantity'=>5],
            ['product_id'=>3, 'size'=>39, 'quantity'=>5],
            ['product_id'=>3, 'size'=>40, 'quantity'=>5],
            ['product_id'=>3, 'size'=>41, 'quantity'=>5],
            ['product_id'=>3, 'size'=>42, 'quantity'=>5],
            ['product_id'=>3, 'size'=>43, 'quantity'=>5],
            ['product_id'=>3, 'size'=>44, 'quantity'=>5],
            ['product_id'=>4, 'size'=>38, 'quantity'=>5],
            ['product_id'=>4, 'size'=>39, 'quantity'=>5],
            ['product_id'=>4, 'size'=>40, 'quantity'=>5],
            ['product_id'=>4, 'size'=>41, 'quantity'=>5],
            ['product_id'=>4, 'size'=>42, 'quantity'=>5],
            ['product_id'=>4, 'size'=>43, 'quantity'=>5],
            ['product_id'=>4, 'size'=>44, 'quantity'=>5],
            ['product_id'=>5, 'size'=>38, 'quantity'=>5],
            ['product_id'=>5, 'size'=>39, 'quantity'=>5],
            ['product_id'=>5, 'size'=>40, 'quantity'=>5],
            ['product_id'=>5, 'size'=>41, 'quantity'=>5],
            ['product_id'=>5, 'size'=>42, 'quantity'=>5],
            ['product_id'=>5, 'size'=>43, 'quantity'=>5],
            ['product_id'=>5, 'size'=>44, 'quantity'=>5],
            ['product_id'=>6, 'size'=>38, 'quantity'=>5],
            ['product_id'=>6, 'size'=>39, 'quantity'=>5],
            ['product_id'=>6, 'size'=>40, 'quantity'=>5],
            ['product_id'=>6, 'size'=>41, 'quantity'=>5],
            ['product_id'=>6, 'size'=>42, 'quantity'=>5],
            ['product_id'=>6, 'size'=>43, 'quantity'=>5],
            ['product_id'=>6, 'size'=>44, 'quantity'=>5],
            ['product_id'=>7, 'size'=>38, 'quantity'=>5],
            ['product_id'=>7, 'size'=>39, 'quantity'=>5],
            ['product_id'=>7, 'size'=>40, 'quantity'=>5],
            ['product_id'=>7, 'size'=>41, 'quantity'=>5],
            ['product_id'=>7, 'size'=>42, 'quantity'=>5],
            ['product_id'=>7, 'size'=>43, 'quantity'=>5],
            ['product_id'=>7, 'size'=>44, 'quantity'=>5],
            ['product_id'=>8, 'size'=>38, 'quantity'=>5],
            ['product_id'=>8, 'size'=>39, 'quantity'=>5],
            ['product_id'=>8, 'size'=>40, 'quantity'=>5],
            ['product_id'=>8, 'size'=>41, 'quantity'=>5],
            ['product_id'=>8, 'size'=>42, 'quantity'=>5],
            ['product_id'=>8, 'size'=>43, 'quantity'=>5],
            ['product_id'=>8, 'size'=>44, 'quantity'=>5],
            ['product_id'=>9, 'size'=>38, 'quantity'=>5],
            ['product_id'=>9, 'size'=>39, 'quantity'=>5],
            ['product_id'=>9, 'size'=>40, 'quantity'=>5],
            ['product_id'=>9, 'size'=>41, 'quantity'=>5],
            ['product_id'=>9, 'size'=>42, 'quantity'=>5],
            ['product_id'=>9, 'size'=>43, 'quantity'=>5],
            ['product_id'=>9, 'size'=>44, 'quantity'=>5],
            ['product_id'=>10, 'size'=>38, 'quantity'=>5],
            ['product_id'=>10, 'size'=>39, 'quantity'=>5],
            ['product_id'=>10, 'size'=>40, 'quantity'=>5],
            ['product_id'=>10, 'size'=>41, 'quantity'=>5],
            ['product_id'=>10, 'size'=>42, 'quantity'=>5],
            ['product_id'=>10, 'size'=>43, 'quantity'=>5],
            ['product_id'=>10, 'size'=>44, 'quantity'=>5],
            ['product_id'=>11, 'size'=>38, 'quantity'=>5],
            ['product_id'=>11, 'size'=>39, 'quantity'=>5],
            ['product_id'=>11, 'size'=>40, 'quantity'=>5],
            ['product_id'=>11, 'size'=>41, 'quantity'=>5],
            ['product_id'=>11, 'size'=>42, 'quantity'=>5],
            ['product_id'=>11, 'size'=>43, 'quantity'=>5],
            ['product_id'=>11, 'size'=>44, 'quantity'=>5],
            ['product_id'=>12, 'size'=>38, 'quantity'=>5],
            ['product_id'=>12, 'size'=>39, 'quantity'=>5],
            ['product_id'=>12, 'size'=>40, 'quantity'=>5],
            ['product_id'=>12, 'size'=>41, 'quantity'=>5],
            ['product_id'=>12, 'size'=>42, 'quantity'=>5],
            ['product_id'=>12, 'size'=>43, 'quantity'=>5],
            ['product_id'=>12, 'size'=>44, 'quantity'=>5],
            ['product_id'=>13, 'size'=>38, 'quantity'=>5],
            ['product_id'=>13, 'size'=>39, 'quantity'=>5],
            ['product_id'=>13, 'size'=>40, 'quantity'=>5],
            ['product_id'=>13, 'size'=>41, 'quantity'=>5],
            ['product_id'=>13, 'size'=>42, 'quantity'=>5],
            ['product_id'=>13, 'size'=>43, 'quantity'=>5],
            ['product_id'=>13, 'size'=>44, 'quantity'=>5],
            ['product_id'=>14, 'size'=>38, 'quantity'=>5],
            ['product_id'=>14, 'size'=>39, 'quantity'=>5],
            ['product_id'=>14, 'size'=>40, 'quantity'=>5],
            ['product_id'=>14, 'size'=>41, 'quantity'=>5],
            ['product_id'=>14, 'size'=>42, 'quantity'=>5],
            ['product_id'=>14, 'size'=>43, 'quantity'=>5],
            ['product_id'=>14, 'size'=>44, 'quantity'=>5],
            ['product_id'=>15, 'size'=>38, 'quantity'=>5],
            ['product_id'=>15, 'size'=>39, 'quantity'=>5],
            ['product_id'=>15, 'size'=>40, 'quantity'=>5],
            ['product_id'=>15, 'size'=>41, 'quantity'=>5],
            ['product_id'=>15, 'size'=>42, 'quantity'=>5],
            ['product_id'=>15, 'size'=>43, 'quantity'=>5],
            ['product_id'=>15, 'size'=>44, 'quantity'=>5],
            ['product_id'=>16, 'size'=>38, 'quantity'=>5],
            ['product_id'=>16, 'size'=>39, 'quantity'=>5],
            ['product_id'=>16, 'size'=>40, 'quantity'=>5],
            ['product_id'=>16, 'size'=>41, 'quantity'=>5],
            ['product_id'=>16, 'size'=>42, 'quantity'=>5],
            ['product_id'=>16, 'size'=>43, 'quantity'=>5],
            ['product_id'=>16, 'size'=>44, 'quantity'=>5],
            ['product_id'=>17, 'size'=>38, 'quantity'=>5],
            ['product_id'=>17, 'size'=>39, 'quantity'=>5],
            ['product_id'=>17, 'size'=>40, 'quantity'=>5],
            ['product_id'=>17, 'size'=>41, 'quantity'=>5],
            ['product_id'=>17, 'size'=>42, 'quantity'=>5],
            ['product_id'=>17, 'size'=>43, 'quantity'=>5],
            ['product_id'=>17, 'size'=>44, 'quantity'=>5],
            ['product_id'=>18, 'size'=>38, 'quantity'=>5],
            ['product_id'=>18, 'size'=>39, 'quantity'=>5],
            ['product_id'=>18, 'size'=>40, 'quantity'=>5],
            ['product_id'=>18, 'size'=>41, 'quantity'=>5],
            ['product_id'=>18, 'size'=>42, 'quantity'=>5],
            ['product_id'=>18, 'size'=>43, 'quantity'=>5],
            ['product_id'=>18, 'size'=>44, 'quantity'=>5],
            ['product_id'=>19, 'size'=>38, 'quantity'=>5],
            ['product_id'=>19, 'size'=>39, 'quantity'=>5],
            ['product_id'=>19, 'size'=>40, 'quantity'=>5],
            ['product_id'=>19, 'size'=>41, 'quantity'=>5],
            ['product_id'=>19, 'size'=>42, 'quantity'=>5],
            ['product_id'=>19, 'size'=>43, 'quantity'=>5],
            ['product_id'=>19, 'size'=>44, 'quantity'=>5],
            ['product_id'=>20, 'size'=>38, 'quantity'=>5],
            ['product_id'=>20, 'size'=>39, 'quantity'=>5],
            ['product_id'=>20, 'size'=>40, 'quantity'=>5],
            ['product_id'=>20, 'size'=>41, 'quantity'=>5],
            ['product_id'=>20, 'size'=>42, 'quantity'=>5],
            ['product_id'=>20, 'size'=>43, 'quantity'=>5],
            ['product_id'=>20, 'size'=>44, 'quantity'=>5],
            ['product_id'=>21, 'size'=>38, 'quantity'=>5],
            ['product_id'=>21, 'size'=>39, 'quantity'=>5],
            ['product_id'=>21, 'size'=>40, 'quantity'=>5],
            ['product_id'=>21, 'size'=>41, 'quantity'=>5],
            ['product_id'=>21, 'size'=>42, 'quantity'=>5],
            ['product_id'=>21, 'size'=>43, 'quantity'=>5],
            ['product_id'=>21, 'size'=>44, 'quantity'=>5],
            ['product_id'=>22, 'size'=>38, 'quantity'=>5],
            ['product_id'=>22, 'size'=>39, 'quantity'=>5],
            ['product_id'=>22, 'size'=>40, 'quantity'=>5],
            ['product_id'=>22, 'size'=>41, 'quantity'=>5],
            ['product_id'=>22, 'size'=>42, 'quantity'=>5],
            ['product_id'=>22, 'size'=>43, 'quantity'=>5],
            ['product_id'=>22, 'size'=>44, 'quantity'=>5],
            ['product_id'=>23, 'size'=>38, 'quantity'=>5],
            ['product_id'=>23, 'size'=>39, 'quantity'=>5],
            ['product_id'=>23, 'size'=>40, 'quantity'=>5],
            ['product_id'=>23, 'size'=>41, 'quantity'=>5],
            ['product_id'=>23, 'size'=>42, 'quantity'=>5],
            ['product_id'=>23, 'size'=>43, 'quantity'=>5],
            ['product_id'=>23, 'size'=>44, 'quantity'=>5],
            ['product_id'=>24, 'size'=>38, 'quantity'=>5],
            ['product_id'=>24, 'size'=>39, 'quantity'=>5],
            ['product_id'=>24, 'size'=>40, 'quantity'=>5],
            ['product_id'=>24, 'size'=>41, 'quantity'=>5],
            ['product_id'=>24, 'size'=>42, 'quantity'=>5],
            ['product_id'=>24, 'size'=>43, 'quantity'=>5],
            ['product_id'=>24, 'size'=>44, 'quantity'=>5],
            ['product_id'=>25, 'size'=>38, 'quantity'=>5],
            ['product_id'=>25, 'size'=>39, 'quantity'=>5],
            ['product_id'=>25, 'size'=>40, 'quantity'=>5],
            ['product_id'=>25, 'size'=>41, 'quantity'=>5],
            ['product_id'=>25, 'size'=>42, 'quantity'=>5],
            ['product_id'=>25, 'size'=>43, 'quantity'=>5],
            ['product_id'=>25, 'size'=>44, 'quantity'=>5],
            ['product_id'=>26, 'size'=>38, 'quantity'=>5],
            ['product_id'=>26, 'size'=>39, 'quantity'=>5],
            ['product_id'=>26, 'size'=>40, 'quantity'=>5],
            ['product_id'=>26, 'size'=>41, 'quantity'=>5],
            ['product_id'=>26, 'size'=>42, 'quantity'=>5],
            ['product_id'=>26, 'size'=>43, 'quantity'=>5],
            ['product_id'=>26, 'size'=>44, 'quantity'=>5],
            ['product_id'=>27, 'size'=>38, 'quantity'=>5],
            ['product_id'=>27, 'size'=>39, 'quantity'=>5],
            ['product_id'=>27, 'size'=>40, 'quantity'=>5],
            ['product_id'=>27, 'size'=>41, 'quantity'=>5],
            ['product_id'=>27, 'size'=>42, 'quantity'=>5],
            ['product_id'=>27, 'size'=>43, 'quantity'=>5],
            ['product_id'=>27, 'size'=>44, 'quantity'=>5],
            ['product_id'=>28, 'size'=>38, 'quantity'=>5],
            ['product_id'=>28, 'size'=>39, 'quantity'=>5],
            ['product_id'=>28, 'size'=>40, 'quantity'=>5],
            ['product_id'=>28, 'size'=>41, 'quantity'=>5],
            ['product_id'=>28, 'size'=>42, 'quantity'=>5],
            ['product_id'=>28, 'size'=>43, 'quantity'=>5],
            ['product_id'=>28, 'size'=>44, 'quantity'=>5],
            ['product_id'=>29, 'size'=>38, 'quantity'=>5],
            ['product_id'=>29, 'size'=>39, 'quantity'=>5],
            ['product_id'=>29, 'size'=>40, 'quantity'=>5],
            ['product_id'=>29, 'size'=>41, 'quantity'=>5],
            ['product_id'=>29, 'size'=>42, 'quantity'=>5],
            ['product_id'=>29, 'size'=>43, 'quantity'=>5],
            ['product_id'=>29, 'size'=>44, 'quantity'=>5],
            ['product_id'=>30, 'size'=>38, 'quantity'=>5],
            ['product_id'=>30, 'size'=>39, 'quantity'=>5],
            ['product_id'=>30, 'size'=>40, 'quantity'=>5],
            ['product_id'=>30, 'size'=>41, 'quantity'=>5],
            ['product_id'=>30, 'size'=>42, 'quantity'=>5],
            ['product_id'=>30, 'size'=>43, 'quantity'=>5],
            ['product_id'=>30, 'size'=>44, 'quantity'=>5],
            ['product_id'=>31, 'size'=>38, 'quantity'=>5],
            ['product_id'=>31, 'size'=>39, 'quantity'=>5],
            ['product_id'=>31, 'size'=>40, 'quantity'=>5],
            ['product_id'=>31, 'size'=>41, 'quantity'=>5],
            ['product_id'=>31, 'size'=>42, 'quantity'=>5],
            ['product_id'=>31, 'size'=>43, 'quantity'=>5],
            ['product_id'=>31, 'size'=>44, 'quantity'=>5],
            ['product_id'=>32, 'size'=>38, 'quantity'=>5],
            ['product_id'=>32, 'size'=>39, 'quantity'=>5],
            ['product_id'=>32, 'size'=>40, 'quantity'=>5],
            ['product_id'=>32, 'size'=>41, 'quantity'=>5],
            ['product_id'=>32, 'size'=>42, 'quantity'=>5],
            ['product_id'=>32, 'size'=>43, 'quantity'=>5],
            ['product_id'=>32, 'size'=>44, 'quantity'=>5],
            ['product_id'=>33, 'size'=>38, 'quantity'=>5],
            ['product_id'=>33, 'size'=>39, 'quantity'=>5],
            ['product_id'=>33, 'size'=>40, 'quantity'=>5],
            ['product_id'=>33, 'size'=>41, 'quantity'=>5],
            ['product_id'=>33, 'size'=>42, 'quantity'=>5],
            ['product_id'=>33, 'size'=>43, 'quantity'=>5],
            ['product_id'=>33, 'size'=>44, 'quantity'=>5],
            ['product_id'=>34, 'size'=>38, 'quantity'=>5],
            ['product_id'=>34, 'size'=>39, 'quantity'=>5],
            ['product_id'=>34, 'size'=>40, 'quantity'=>5],
            ['product_id'=>34, 'size'=>41, 'quantity'=>5],
            ['product_id'=>34, 'size'=>42, 'quantity'=>5],
            ['product_id'=>34, 'size'=>43, 'quantity'=>5],
            ['product_id'=>34, 'size'=>44, 'quantity'=>5],
        ]);
    }
}
class TransactionSeeder extends Seeder
{
    public function run()
    {
        DB::table('transactions')->insert([
            ['status'=>1, 'user_id'=>2, 'user_name'=>'Thắng Quang', 'user_email'=>'thanghorit@gmail.com', 'user_address'=>'141 đường Nguyễn Xí, phường Hòa Minh, quận Liên Chiểu, thành phố Đà Nẵng', 'user_phone'=>'0971504302', 'amount'=>4040000, 'payment'=>'Thanh toán bằng ví momo', 'shipping'=>'Giao hàng nhanh'],
            ['status'=>0, 'user_id'=>2, 'user_name'=>'Thắng Quang', 'user_email'=>'thanghorit@gmail.com', 'user_address'=>'141 đường Nguyễn Xí, phường Hòa Minh, quận Liên Chiểu, thành phố Đà Nẵng', 'user_phone'=>'0971504302', 'amount'=>9840000, 'payment'=>'Thanh toán sau khi nhận hàng', 'shipping'=>'Giao hàng nhanh'],
        ]);
    }
}

class OrderSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            ['transaction_id'=>1, 'product_id'=>2, 'quantity'=>'1'],
            ['transaction_id'=>1, 'product_id'=>4, 'quantity'=>'1'],
            ['transaction_id'=>2, 'product_id'=>1, 'quantity'=>'1'],
            ['transaction_id'=>2, 'product_id'=>10, 'quantity'=>'1'],
            ['transaction_id'=>2, 'product_id'=>11, 'quantity'=>'1'],
            ['transaction_id'=>2, 'product_id'=>24, 'quantity'=>'1'],
            ['transaction_id'=>2, 'product_id'=>25, 'quantity'=>'1'],
        ]);
    }
}
