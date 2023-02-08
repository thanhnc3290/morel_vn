<div id="content" class="site-content">
    <div class="technology_container">
        <div class="technology-top">
            <div class="open-down-container-button" id="open-down-container-button" onclick="openTechTopContainer()">
            </div>
            <div class="section-tabs-wrapper">
                <div onclick="openInfographicTab('woofer','wooblock')" class="tab"><a id="woofer-tab" class="active">Woofer</a></div>
                <div onclick="openInfographicTab('integra','intblock')" class="tab"><a id="integra-tab">Integra</a></div>
                <div onclick="openInfographicTab('tweeter','twtblock')" class="tab"><a id="tweeter-tab">Tweeter</a></div>
            </div>
            <div class="section-tabs-wrapper-mobile">
                <div class="main-tab">
                    <a class="active">Woofer</a> 
                    <img src="<?php echo public_url('site/images') ?>/arrow_down_mobile_svg.svg" />
                </div>
                <div class="sub-tabs">
                    <div onclick="openInfographicTab('woofer','wooblock')" class="tab"><a id="woofer-tab">Woofer</a></div>
                    <div onclick="openInfographicTab('integra','intblock')" class="tab"><a id="integra-tab">Integra</a></div>
                    <div onclick="openInfographicTab('tweeter','twtblock')" class="tab"><a id="tweeter-tab">Tweeter</a></div>
                </div>
            </div>
            <div class="woofer-section">
                <div class="woofer-video">
                    <video width="100%" height="670" id="woofer-video" muted="muted">
                        <source src="<?php echo public_url('site/video') ?>/woofer-video.mp4" type="video/mp4"> Your browser does not support the video tag.
                    </video>
                    <div class="numbers-wrapper" id="woofer-numbers-wrapper">
                        <div class="number"><a href="#wooblock-1" class="wooblock-1 active"><span class="line">&nbsp;</span><span class="inner-number">1</span></a></div>
                        <div class="number"><a href="#wooblock-2" class="wooblock-2"><span class="inner-number">2</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#wooblock-3" class="wooblock-3"><span class="inner-number">3</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#wooblock-4" class="wooblock-4"><span class="inner-number">4</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#wooblock-5" class="wooblock-5"><span class="line">&nbsp;</span><span class="inner-number">5</span></a></div>
                        <div class="number"><a href="#wooblock-6" class="wooblock-6"><span class="line">&nbsp;</span><span class="inner-number">6</span></a></div>
                        <div class="number"><a href="#wooblock-7" class="wooblock-7"><span class="line">&nbsp;</span><span class="inner-number">7</span></a></div>
                        <div class="number"><a href="#wooblock-8" class="wooblock-8"><span class="inner-number">8</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#wooblock-9" class="wooblock-9"><span class="inner-number">9</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#wooblock-10" class="wooblock-10"><span class="inner-number">10</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#wooblock-11" class="wooblock-11"><span class="inner-number">11</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#wooblock-12" class="wooblock-12"><span class="inner-number">12</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#wooblock-13" class="wooblock-13"><span class="line">&nbsp;</span><span class="inner-number">13</span></a></div>
                        <div class="number"><a href="#wooblock-14" class="wooblock-14"><span class="line">&nbsp;</span><span class="inner-number">14</span></a></div>
                        <div class="number"><a href="#wooblock-15" class="wooblock-15"><span class="inner-number">15</span><span class="line">&nbsp;</span></a></div>
                    </div>
                </div>
            </div>
            <div class="integra-section">
                <div class="integra-video">
                    <video width="100%" height="670" id="integra-video" muted="muted">
                        <source src="<?php echo public_url('site/video') ?>/integra-video.mp4" type="video/mp4"> Your browser does not support the video tag.
                    </video>
                    <div class="numbers-wrapper" id="integra-numbers-wrapper">
                        <div class="number"><a href="#intblock-1" class="intblock-1 active"><span class="line">&nbsp;</span><span class="inner-number">1</span></a></div>
                        <div class="number"><a href="#intblock-2" class="intblock-2"><span class="inner-number">2</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#intblock-3" class="intblock-3"><span class="line">&nbsp;</span><span class="inner-number">3</span></a></div>
                        <div class="number"><a href="#intblock-4" class="intblock-4"><span class="inner-number">4</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#intblock-5" class="intblock-5"><span class="inner-number">5</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#intblock-6" class="intblock-6"><span class="line">&nbsp;</span><span class="inner-number">6</span></a></div>
                        <div class="number"><a href="#intblock-7" class="intblock-7"><span class="line">&nbsp;</span><span class="inner-number">7</span></a></div>
                    </div>
                </div>
            </div>
            <div class="tweeter-section">
                <div class="tweeter-video">
                    <video width="100%" height="670" id="tweeter-video" muted="muted">
                        <source src="<?php echo public_url('site/video') ?>/tweeter-video.mp4" type="video/mp4"> Your browser does not support the video tag.
                    </video>
                    <div class="numbers-wrapper" id="tweeter-numbers-wrapper">
                        <div class="number"><a href="#twtblock-1" class="twtblock-1 active"><span class="inner-number">1</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#twtblock-2" class="twtblock-2"><span class="line">&nbsp;</span><span class="inner-number">2</span></a></div>
                        <div class="number"><a href="#twtblock-3" class="twtblock-3"><span class="line">&nbsp;</span><span class="inner-number">3</span></a></div>
                        <div class="number"><a href="#twtblock-4" class="twtblock-4"><span class="inner-number">4</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#twtblock-5" class="twtblock-5"><span class="inner-number">5</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#twtblock-6" class="twtblock-6"><span class="inner-number">6</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#twtblock-7" class="twtblock-7"><span class="inner-number">7</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#twtblock-8" class="twtblock-8"><span class="line">&nbsp;</span><span class="inner-number">8</span></a></div>
                        <div class="number"><a href="#twtblock-9" class="twtblock-9"><span class="line">&nbsp;</span><span class="inner-number">9</span></a></div>
                        <div class="number"><a href="#twtblock-10" class="twtblock-10"><span class="inner-number">10</span><span class="line">&nbsp;</span></a></div>
                        <div class="number"><a href="#twtblock-11" class="twtblock-11"><span class="inner-number">11</span><span class="line">&nbsp;</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="technology_wrapper">
            <div class="container">
                <div class="scrolling-btn" id="jsScroll" onclick="scrollToTop();"> <i class="dashicons-arrow-up-alt2"></i></div>
                <div class="woofer-content">
                    <div class="block wooblock-1" id="wooblock-1">
                        <div class="block-title"> <span class="block-number">1.</span>
                            <h3>Lotus Grille</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Lưới tản nhiệt Morel mới có một kiểu lỗ cụ thể với các hình dạng khác nhau và
                                 đường kính được thiết kế để giảm thiểu sừng hiệu ứng (đỉnh tần số cao
                                 gây ra bởi tần số cộng hưởng của nhiều lỗ cùng kích thước).</p>
                            <p style="font-family: Roboto;">Xử lý kim loại sáng tạo cho phép xây dựng một lớp vỏ rất mỏng gần như
                                 lưới tản nhiệt trong suốt hầu như không ảnh hưởng đến âm thanh ở mọi tần số trong khi
                                 duy trì tính toàn vẹn cấu trúc để bảo vệ các trình điều khiển. Lưới tản nhiệt Lotus là một
                                 thiết kế đã đăng ký bảo vệ tài sản trí tuệ của Morel.</p>
                        </div>
                    </div>
                    <div class="block wooblock-2" id="wooblock-2">
                        <div class="block-title"> <span class="block-number">2.</span>
                            <h3>Woofer Cones</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Sức mạnh, hình dạng, trọng lượng và giảm xóc - tìm mối tương quan chính xác giữa những điều này
                                 bốn khía cạnh của một hình nón đòi hỏi kinh nghiệm kỹ thuật và bí quyết thực tế. Của chúng tôi
                                 thế hệ trình điều khiển mới nhất đưa các thông số được cân bằng cẩn thận này lên một tầm cao mới
                                 mức độ, sử dụng các cấu trúc hình nón nông, một mảnh để phân tán rộng, độ chính xác
                                 và biến dạng thấp.</p>
                            <p style="font-family: Roboto;"><strong>Sợi các-bon</strong><br /> Bắt nguồn từ các trình điều khiển của chất béo giành giải thưởng của chúng tôi
                                 hệ thống loa lady, thiết kế hình nón này bao gồm hai sợi carbon bên ngoài
                                 da kẹp một lớp Rohacell, một loại bọt có độ bền cao, nhẹ như lông vũ. Các
                                 sự kết hợp tạo thành một hình nón nhẹ, mạnh mẽ và giảm chấn phù hợp để tự nhiên
                                 tái tạo âm thanh không màu.</p>
                            <p style="font-family: Roboto;"><strong>DPC</strong><br /> DPC, hay Damped Polymer Cone, là dẫn xuất trực tiếp của
                                 hình nón Morel đã tạo dựng được danh tiếng của mình. Với đặc tính tự giảm xóc cao,
                                 nón này cung cấp chất lượng âm thanh đặc biệt mà không có màu sắc hoặc chói tai.</p>
                            <p style="font-family: Roboto;"><strong>Giấy tổng hợp</strong><br /> Được sử dụng kể từ những chiếc loa đầu tiên, giấy
                                 tiếp tục là một vật liệu đặc biệt của sự lựa chọn. Bài báo mới nhất của Morel
                                 nón composite siêu nhẹ, làm cho chúng trở thành một cặp đặc biệt cho
                                 trình điều khiển sử dụng động cơ nhỏ hơn và cuộn dây bằng giọng nói.</p>
                        </div>
                    </div>
                    <div class="block wooblock-3" id="wooblock-3">
                        <div class="block-title"> <span class="block-number">3.</span>
                            <h3>Hexatech™ Aluminium Voice Coil</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Được làm từ 100% dây nhôm có hình tổ ong, cuộn dây âm thanh HexatechTM
                                 giảm khe hở không khí trong cuộn dây, do đó tăng hiệu suất lên tới 20%.
                                 Trọng lượng nhẹ, cuộn dây âm thanh HexatechTM chịu trách nhiệm chính cho
                                 phản ứng tức thời nhanh phi thường Các đơn vị truyền động Morel được biết đến với.</p>
                        </div>
                    </div>
                    <div class="block wooblock-4" id="wooblock-4">
                        <div class="block-title"> <span class="block-number">4.</span>
                            <h3>Titanium Bobbin</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Vật liệu suốt chỉ có ảnh hưởng đến các thông số âm thanh của trình điều khiển, nó
                                 xử lý năng lượng và chất lượng âm thanh được tái tạo. Bằng cách sử dụng suốt chỉ titan, Morel
                                 nhằm nâng cao Hệ số cơ học (QMS) để cho phép lựa chọn rộng hơn
                                 của các loại bao vây và kích cỡ. Đối với chất lượng âm thanh, người ta có thể nhận ra một
                                 âm thanh sắc nét hơn rõ rệt khi so sánh với một trình điều khiển tương đương với
                                 suốt chỉ nhôm. Đặc tính cứng của titan, cùng với các đặc tính khác của nó
                                 lợi thế tạo ra một trình điều khiển được cân bằng âm sắc và chính xác, với
                                 phản ứng thoáng qua đặc biệt nhanh.</p>
                        </div>
                    </div>
                    <div class="block wooblock-5" id="wooblock-5">
                        <div class="block-title"> <span class="block-number">5.</span>
                            <h3>Magnet Technology</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Kinh nghiệm của Morel trong thiết kế động cơ đã cho phép nó khai thác từ trường
                                 năng lượng theo cách cực kỳ hiệu quả. Thông thường nam châm càng lớn thì càng nhiều
                                 năng lượng tuy nhiên; trong ô tô, thường không có không gian cho vật lý lớn
                                 nam châm. Morel đưa ra một số giải pháp để giải quyết vấn đề này.</p>
                            <p style="font-family: Roboto;"><strong>Ferrite</strong><br /> Nam châm Ferrite được sử dụng phổ biến nhất trong
                                 diễn giả. Mặc dù chúng trông giống nhau, nhưng có một số loại nam châm. Morel sử dụng
                                 chỉ có cường độ cao nhất có sẵn trong các thiết kế của nó. Kết quả là, Morel
                                 hệ thống từ tính rất nhỏ gọn nhưng cung cấp nhiều từ thông hơn so với thông thường
                                 nam châm ferit.</p>
                            <p style="font-family: Roboto;"><strong>Neodymium</strong><br /> Nam châm mạnh nhất hiện có, neodymium
                                 cho phép Morel tạo ra các loa nhỏ gọn về mặt vật lý, chẳng hạn như loa tweeter và loa tầm trung,
                                 phù hợp với không gian rất hạn chế mà không hạn chế chất lượng âm thanh.</p>
                            <p style="font-family: Roboto;"><strong>Double Ferrite</strong><br /> Hệ thống truyền động ferrite kép của Morel
                                 tạo ra nhiều năng lượng từ trường hơn một nam châm có kích thước tương tự, tăng
                                 hiệu quả và phạm vi năng động. Vị trí của nam châm phụ cố định ở trên
                                 tấm trên cùng trong động cơ là chìa khóa trong việc kiểm soát từ thông đi lạc, do đó
                                 tạo ra một từ trường tập trung hơn đồng thời góp phần vào
                                 che chắn đặc trưng của loa của chúng tôi.</p>
                        </div>
                    </div>
                    <div class="block wooblock-6" id="wooblock-6">
                        <div class="block-title"> <span class="block-number">6.</span>
                            <h3>External Voice Coil (EVC)™ Technology</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Loa Morel với công nghệ EVC™ sử dụng cuộn dây âm thanh gấp ba lần
                                 lớn hơn so với những gì được sử dụng trong loa truyền thống. Thiết kế EVC™ di chuyển
                                 hệ thống ổ đĩa từ bên trong cuộn dây âm thanh, loại bỏ từ thông đi lạc bằng cách
                                 hướng hiệu quả tất cả năng lượng từ tính đến cuộn dây âm thanh. Kết quả là một
                                 thiết kế cực kỳ hiệu quả và mạnh mẽ, rất nhỏ gọn với nhiệt hiệu quả
                                 tiêu tán và giảm sự phá vỡ hình nón cho độ méo thấp hơn.</p>
                        </div>
                    </div>
                    <div class="block wooblock-7" id="wooblock-7">
                        <div class="block-title"> <span class="block-number">7.</span>
                            <h3>Under-Hung Voice Coil</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Cuộn dây âm thanh treo dưới có chiều cao cuộn dây âm thanh ngắn hơn chiều cao cuộn dây âm thanh
                                 khe hở từ. Điều này có nghĩa là cuộn dây âm thanh hoàn toàn nằm trong trường năng lượng từ trường.
                                 lần dẫn đến khớp nối lớn hơn và phản ứng nhất thời.</p>
                        </div>
                    </div>
                    <div class="block wooblock-8" id="wooblock-8">
                        <div class="block-title"> <span class="block-number">8.</span>
                            <h3>Shielded Magnet Technology</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Môi trường ô tô hiện đại rất nhạy cảm với từ trường đi lạc. Xe bây giờ
                                 sử dụng một số thiết bị điều khiển máy tính trên khắp xe và thông thường
                                 loa không được che chắn có thể là mối đe dọa đối với tính toàn vẹn về điện của xe.
                                 Loa Morel có công nghệ EVC™ của công ty còn hơn 90%
                                 được che chắn—an toàn để lắp đặt trên các phương tiện công nghệ cao ngày nay.</p>
                        </div>
                    </div>
                    <div class="block wooblock-9" id="wooblock-9">
                        <div class="block-title"> <span class="block-number">9.</span>
                            <h3>C.A.R. Filter™(Controlled Acoustic Resistance)</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Trong hầu hết các ứng dụng ô tô, loa được cài đặt trong không khí ảo tự do
                                 môi trường, chẳng hạn như một cánh cửa, cung cấp tải âm thanh tối thiểu. Xe ô tô.
                                 FilterTM cải thiện tải âm thanh bằng cách kiểm soát luồng không khí bên trong trình điều khiển,
                                 bắt chước hiệu ứng của tủ đồng thời cải thiện khả năng xử lý điện năng thêm 30%. Cái này
                                 cung cấp khả năng kiểm soát tốt hơn đối với chuyển động hình nón để cải thiện động lực của âm trầm.</p>
                        </div>
                    </div>
                    <div class="block wooblock-10" id="wooblock-10">
                        <div class="block-title"> <span class="block-number">10.</span>
                            <h3>Uniflow™ Chassis</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Sử dụng một thiết kế mở hiệu quả về mặt khí động học, cho phép không khí và sóng âm
                                 chảy đều và trôi chảy. Hình dạng hình học của nó cũng giúp loại bỏ nhiễu
                                 với các thành phần chuyển động của loa trầm, cho phép sử dụng một con nhện cấu hình thấp
                                 để được hỗ trợ và ổn định hơn.</p>
                        </div>
                    </div>
                    <div class="block wooblock-11" id="wooblock-11">
                        <div class="block-title"> <span class="block-number">11.</span>
                            <h3>PFS™ - Progression Field Symmetry engineering</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Tạo ra hành trình tuyến tính dài hơn cho phép nhện và vòm đạt mức tối ưu
                                 đặc biệt là ở mức sản lượng cao. Trong điều kiện khắc nghiệt, nhện
                                 và bao quanh dần dần hoạt động như bộ giảm xóc để ngăn giọng nói
                                 dịch chuyển và đáy của cuộn dây, đồng thời cải thiện độ tuyến tính của cuộn dây bằng giọng nói.</p>
                        </div>
                    </div>
                    <div class="block wooblock-12" id="wooblock-12">
                        <div class="block-title"> <span class="block-number">12.</span>
                            <h3>IDR (Improved Dispersion Recess)</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Thiết kế IDR cho phép phân tán tần số cao ngoài trục rộng hơn cho tổng thể
                                 màn trình diễn mượt mà.</p>
                        </div>
                    </div>
                    <div class="block wooblock-13" id="wooblock-13">
                        <div class="block-title"> <span class="block-number">13.</span>
                            <h3>ONE PIECE CONE CONSTRUCTION</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Hầu hết các nón loa đều được cấu tạo từ hai thành phần - cốc chứa bụi và màng loa. sử dụng
                                 xây dựng thống nhất làm tăng tính toàn vẹn cấu trúc và sức mạnh của hình nón,
                                 làm cho nó ít bị vỡ hình nón và biến dạng không mong muốn.</p>
                        </div>
                    </div>
                    <div class="block wooblock-14" id="wooblock-14">
                        <div class="block-title"> <span class="block-number">14.</span>
                            <h3>COPPER SLEEVE/RING</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Cũng được đặt tên là shorting ring và có một số lợi ích rõ ràng:<br /> 1. Giảm trở kháng
                                 tăng và tăng độ nhạy.<br /> 2. Giảm độ tự cảm của cuộn dây bằng giọng nói, điều này
                                 giảm thiểu sự phi tuyến tính trong quá trình hoạt động.<br /> 3. Cải thiện loa tổng thể
                                 hiệu suất trên băng tần.</p>
                        </div>
                    </div>
                    <div class="block wooblock-15" id="wooblock-15">
                        <div class="block-title"> <span class="block-number">15.</span>
                            <h3>GOLD PLATED TERMINALS</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Thiết bị đầu cuối mạ vàng được thiết kế tốt để đảm bảo độ dẫn cao giữa chì
                                 dây điện và dây loa.</p>
                            <p style="font-family: Roboto;">Đặt bất cứ nơi nào trên hình ảnh - đó là chung chung</p>
                            <p style="font-family: Roboto;"><strong>Grand Dome</strong><br /> Công nghệ màng Grand Dome Geometry là một công nghệ cứng,
                                 thiết kế hình nón lồi cung cấp hiệu suất ngoài trục tuyệt vời cho phép
                                 nhiều vị trí gắn loa trong ô tô. Thiết kế hình nón cứng, giảm chấn tốt
                                 cho phép loa tạo ra tần số âm trầm trung bình tuyệt vời.</p>
                        </div>
                    </div>
                </div>
                <div class="integra-content">
                    <div class="block intblock-1" id="intblock-1">
                        <div class="block-title"> <span class="block-number">1.</span>
                            <h3>Hexatech™ Aluminium Voice Coil</h3>
                        </div>
                        <div class="block-content">
                            <p  style="font-family: Roboto;">Được làm từ 100% dây nhôm có hình tổ ong, cuộn dây âm thanh HexatechTM
                                 giảm khe hở không khí trong cuộn dây, do đó tăng hiệu suất lên tới 20%.
                                 Trọng lượng nhẹ, cuộn dây âm thanh HexatechTM chịu trách nhiệm chính cho
                                 phản ứng tức thời nhanh phi thường Các đơn vị truyền động Morel được biết đến với.</p>
                        </div>
                    </div>
                    <div class="block intblock-2" id="intblock-2">
                        <div class="block-title"> <span class="block-number">2.</span>
                            <h3>Acuflex™ Technology</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Một hợp chất giảm chấn được thiết kế đặc biệt áp dụng cho các vòm mềm của Morel cụ thể
                                 loa tweeter và âm trung. Sự kết hợp của các vật liệu này tạo ra một màng ngăn
                                 thể hiện sự chia tay hủy bỏ có kiểm soát (chính xác–uốn cong), nghĩa là mỗi lần chia tay
                                 chế độ bị chống lại bởi một chế độ khác theo hướng ngược lại. Việc hủy bỏ này
                                 các chế độ chia nhỏ không để lại gì ngoài âm thanh thuần khiết, tự nhiên của loa tweeter Morel và
                                 tầm trung nổi tiếng với.</p>
                        </div>
                    </div>
                    <div class="block intblock-3" id="intblock-3">
                        <div class="block-title"> <span class="block-number">3.</span>
                            <h3>Integra</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Bắt nguồn từ từ tích hợp, Integra là loa bao gồm cả hai
                                 một loa trầm và loa tweeter có chung một khung gầm. Không giống như một đồng trục, hốc của nó sed
                                 loa tweeter được căn chỉnh đồng tâm với nón loa trầm. Điều này giảm thiểu lỗi pha
                                 và cho phép trường âm thanh không đổi theo mọi hướng, tạo ra âm thanh gần như hoàn hảo
                                 căn chỉnh thời gian.</p>
                        </div>
                    </div>
                    <div class="block intblock-4" id="intblock-4">
                        <div class="block-title"> <span class="block-number">4.</span>
                            <h3>Neodymium Magnet Technology</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Nam châm mạnh nhất hiện có, neodymium cho phép Morel tạo ra vật chất
                                 loa nhỏ gọn, chẳng hạn như loa tweeter và loa tầm trung, phù hợp với không gian rất hạn chế
                                 không giới hạn chất lượng âm thanh.</p>
                        </div>
                    </div>
                    <div class="block intblock-5" id="intblock-5">
                        <div class="block-title"> <span class="block-number">5.</span>
                            <h3>Hybrid</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Hệ thống truyền động động cơ Hybrid sử dụng một nam châm ferit cùng với một lực đẩy rất mạnh
                                 nam châm neodymium. Kết hợp chúng tạo ra một hệ thống động cơ nhỏ gọn, nhẹ
                                 mạnh hơn tới bốn lần so với các thiết kế thông thường có cùng kích thước. Với
                                 Công suất lai, được khuếch đại nhiều hơn được chuyển đổi thành năng lượng âm thanh hoàn hảo
                                 hiệu suất, ngay cả trong một trình điều khiển nhỏ.</p>
                        </div>
                    </div>
                    <div class="block intblock-6" id="intblock-6">
                        <div class="block-title"> <span class="block-number">6.</span>
                            <h3>External Voice Coil (EVC)™ Technology</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Loa Morel với công nghệ EVC™ sử dụng cuộn dây âm thanh gấp ba lần
                                 lớn hơn so với những gì được sử dụng trong loa truyền thống. Thiết kế EVC™ di chuyển
                                 hệ thống ổ đĩa từ bên trong cuộn dây âm thanh, loại bỏ từ thông đi lạc bằng cách
                                 hướng hiệu quả tất cả năng lượng từ tính đến cuộn dây âm thanh. Kết quả là một
                                 thiết kế cực kỳ hiệu quả và mạnh mẽ, rất nhỏ gọn với nhiệt hiệu quả
                                 tiêu tán và giảm sự phá vỡ hình nón cho độ méo thấp hơn.</p>
                        </div>
                    </div>
                    <div class="block intblock-7" id="intblock-7">
                        <div class="block-title"> <span class="block-number">7.</span>
                            <h3>Shielded Magnet Technology</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Môi trường ô tô hiện đại rất nhạy cảm với từ trường đi lạc. Xe bây giờ
                                 sử dụng một số thiết bị điều khiển máy tính trên khắp xe và thông thường
                                 loa không được che chắn có thể là mối đe dọa đối với tính toàn vẹn về điện của xe.
                                 Loa Morel có công nghệ EVC™ của công ty còn hơn 90%
                                 được che chắn—an toàn để lắp đặt trên các phương tiện công nghệ cao ngày nay.</p>
                        </div>
                    </div>
                    <div class="block intblock-8" id="intblock-8">
                        <div class="block-title"> <span class="block-number">8.</span>
                            <h3>IDR (Improved Dispersion Recess)</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Thiết kế IDR cho phép phân tán tần số cao ngoài trục rộng hơn cho tổng thể
                                 màn trình diễn mượt mà</p>
                        </div>
                    </div>
                </div>
                <div class="tweeter-content">
                    <div class="block twtblock-1" id="twtblock-1">
                        <div class="block-title"> <span class="block-number">1.</span>
                            <h3>Lotus Grille</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Lưới tản nhiệt Morel mới có một kiểu lỗ cụ thể với các hình dạng khác nhau và
                                 đường kính được thiết kế để giảm thiểu hiệu ứng còi (đỉnh tần số cao
                                 gây ra bởi tần số cộng hưởng của nhiều lỗ cùng kích thước). kim loại sáng tạo
                                 quá trình xử lý cho phép xây dựng một lưới tản nhiệt gần như trong suốt rất mỏng
                                 hầu như không ảnh hưởng đến âm thanh ở tất cả các tần số trong khi vẫn duy trì tính toàn vẹn của cấu trúc
                                 để bảo vệ người lái xe. Lưới tản nhiệt Lotus là một thiết kế đã đăng ký bảo vệ
                                 Tài sản trí tuệ của Morel.</p>
                        </div>
                    </div>
                    <div class="block twtblock-2" id="twtblock-2">
                        <div class="block-title"> <span class="block-number">2.</span>
                            <h3>Titanium Bobbin</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Vật liệu suốt chỉ có ảnh hưởng đến các thông số âm thanh của trình điều khiển, nó
                                 xử lý năng lượng và chất lượng âm thanh được tái tạo. Bằng cách sử dụng suốt chỉ titan, Morel
                                 nhằm nâng cao Hệ số cơ học (QMS) để cho phép lựa chọn rộng hơn
                                 của các loại bao vây và kích cỡ. Đối với chất lượng âm thanh, người ta có thể nhận ra một
                                 âm thanh sắc nét hơn rõ rệt khi so sánh với một trình điều khiển tương đương với
                                 suốt chỉ nhôm. Đặc tính cứng của titan, cùng với các đặc tính khác của nó
                                 lợi thế tạo ra một trình điều khiển được cân bằng âm sắc và chính xác, với
                                 phản ứng thoáng qua đặc biệt nhanh.</p>
                        </div>
                    </div>
                    <div class="block twtblock-3" id="twtblock-3">
                        <div class="block-title"> <span class="block-number">3.</span>
                            <h3>Hexatech™ Aluminium Voice Coil</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Được làm từ 100% dây nhôm có hình tổ ong, cuộn dây âm thanh HexatechTM
                                 giảm khe hở không khí trong cuộn dây, do đó tăng hiệu suất lên tới 20%.
                                 Trọng lượng nhẹ, cuộn dây âm thanh HexatechTM chịu trách nhiệm chính cho
                                 phản ứng tức thời nhanh phi thường Các đơn vị truyền động Morel được biết đến với.</p>
                        </div>
                    </div>
                    <div class="block twtblock-4" id="twtblock-4">
                        <div class="block-title"> <span class="block-number">4.</span>
                            <h3>Acuflex™ Technology</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Một hợp chất giảm chấn được thiết kế đặc biệt áp dụng cho các vòm mềm của Morel cụ thể
                                 loa tweeter và âm trung. Sự kết hợp của các vật liệu này tạo ra một màng ngăn
                                 thể hiện sự chia tay hủy bỏ có kiểm soát (chính xác - uốn cong), nghĩa là mỗi lần chia tay
                                 chế độ bị chống lại bởi một chế độ khác theo hướng ngược lại. Việc hủy bỏ này
                                 các chế độ chia nhỏ không để lại gì ngoài âm thanh thuần khiết, tự nhiên của loa tweeter Morel và
                                 tầm trung nổi tiếng với.</p>
                        </div>
                    </div>
                    <div class="block twtblock-5" id="twtblock-5">
                        <div class="block-title"> <span class="block-number">5.</span>
                            <h3>Magnet Technology</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Kinh nghiệm của Morel trong thiết kế động cơ đã cho phép nó khai thác từ trường
                                 năng lượng theo cách cực kỳ hiệu quả. Thông thường nam châm càng lớn thì càng nhiều
                                 năng lượng tuy nhiên; trong ô tô, thường không có không gian cho vật lý lớn
                                 nam châm. Morel đưa ra một số giải pháp để giải quyết vấn đề này.</p>
                            <p style="font-family: Roboto;"><strong>Ferrite</strong><br /> Nam châm Ferrite được sử dụng phổ biến nhất trong
                                 diễn giả. Mặc dù chúng trông giống nhau, nhưng có một số loại nam châm. Morel sử dụng
                                 chỉ có cường độ cao nhất có sẵn trong các thiết kế của nó. Kết quả là, Morel
                                 hệ thống từ tính rất nhỏ gọn nhưng cung cấp nhiều từ thông hơn so với thông thường
                                 nam châm ferit.</p>
                            <p style="font-family: Roboto;"><strong>Neodymium</strong><br /> Nam châm mạnh nhất hiện có, neodymium
                                 cho phép Morel tạo ra các loa nhỏ gọn về mặt vật lý, chẳng hạn như loa tweeter và loa tầm trung,
                                 phù hợp với không gian rất hạn chế mà không hạn chế chất lượng âm thanh.</p>
                            <p style="font-family: Roboto;"><strong>Double Ferrite</strong><br /> Hệ thống truyền động ferrite kép của Morel
                                 tạo ra nhiều năng lượng từ trường hơn một nam châm có kích thước tương tự, tăng
                                 hiệu quả và phạm vi năng động. Vị trí của nam châm phụ cố định ở trên
                                 tấm trên cùng trong động cơ là chìa khóa trong việc kiểm soát từ thông đi lạc, do đó
                                 tạo ra một từ trường tập trung hơn đồng thời góp phần vào
                                 che chắn đặc trưng của loa của chúng tôi.</p>
                        </div>
                    </div>
                    <div class="block twtblock-6" id="twtblock-6">
                        <div class="block-title"> <span class="block-number">6.</span>
                            <h3>External Voice Coil (EVC)™ Technology</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Loa Morel với công nghệ EVC™ sử dụng cuộn dây âm thanh gấp ba lần
                                 lớn hơn so với những gì được sử dụng trong loa truyền thống. Thiết kế EVC™ di chuyển
                                 hệ thống ổ đĩa từ bên trong cuộn dây âm thanh, loại bỏ từ thông đi lạc bằng cách
                                 hướng hiệu quả tất cả năng lượng từ tính đến cuộn dây âm thanh. Kết quả là một
                                 thiết kế cực kỳ hiệu quả và mạnh mẽ, rất nhỏ gọn với nhiệt hiệu quả
                                 tiêu tán và giảm sự phá vỡ hình nón cho độ méo thấp hơn.</p>
                        </div>
                    </div>
                    <div class="block twtblock-7" id="twtblock-7">
                        <div class="block-title"> <span class="block-number">7.</span>
                            <h3>Under-Hung Voice Coil</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Cuộn dây âm thanh treo dưới có chiều cao cuộn dây âm thanh ngắn hơn chiều cao cuộn dây âm thanh
                                 khe hở từ. Điều này có nghĩa là cuộn dây âm thanh hoàn toàn nằm trong trường năng lượng từ trường.
                                 thời gian dẫn đến khớp nối lớn hơn và phản ứng nhất thời.</p>
                        </div>
                    </div>
                    <div class="block twtblock-8" id="twtblock-8">
                        <div class="block-title"> <span class="block-number">8.</span>
                            <h3>Shielded Magnet Technology</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Môi trường ô tô hiện đại rất nhạy cảm với từ trường đi lạc. Xe bây giờ
                                 sử dụng một số thiết bị điều khiển máy tính trên khắp xe và thông thường
                                 loa không được che chắn có thể là mối đe dọa đối với tính toàn vẹn về điện của xe.
                                 Loa Morel có công nghệ EVC™ của công ty còn hơn 90%
                                 được che chắn—an toàn để lắp đặt trên các phương tiện công nghệ cao ngày nay.</p>
                        </div>
                    </div>
                    <div class="block twtblock-9" id="twtblock-9">
                        <div class="block-title"> <span class="block-number">9.</span>
                            <h3>Uniflow™ Chassis</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Sử dụng một thiết kế mở hiệu quả về mặt khí động học, cho phép không khí và sóng âm
                                 chảy đều và trôi chảy. Hình dạng hình học của nó cũng giúp loại bỏ nhiễu
                                 với các thành phần chuyển động của loa trầm, cho phép sử dụng một con nhện cấu hình thấp
                                 để được hỗ trợ và ổn định hơn.</p>
                        </div>
                    </div>
                    <div class="block twtblock-10" id="twtblock-10">
                        <div class="block-title"> <span class="block-number">10.</span>
                            <h3> SEALED TWEETER CAVITY</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Bằng cách sử dụng một miếng cực thông hơi phía sau màng ngăn, các sóng âm thanh phía sau truyền xuống
                                 lỗ thông hơi của mảnh cực và vào một vỏ bọc phía sau nam châm. âm thanh phía sau
                                 sóng phần lớn được hấp thụ bởi các vật liệu bên trong vỏ bọc phía sau và không
                                 phản xạ trở lại ra phía trước của cơ hoành. Do đó làm giảm méo và
                                 cải thiện đáp ứng tần số.</p>
                        </div>
                    </div>
                    <div class="block twtblock-11" id="twtblock-11">
                        <div class="block-title"> <span class="block-number">11.</span>
                            <h3>COPPER SLEEVE/RING</h3>
                        </div>
                        <div class="block-content">
                            <p style="font-family: Roboto;">Cũng được đặt tên là shorting ring và có một số lợi ích rõ ràng:<br /> 1. Giảm trở kháng
                                 tăng và tăng độ nhạy.<br /> 2. Giảm độ tự cảm của cuộn dây bằng giọng nói, điều này
                                 giảm thiểu sự phi tuyến tính trong quá trình hoạt động.<br /> 3. Cải thiện loa tổng thể
                                 hiệu suất trên băng tần.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function openTechTopContainer() {
        jQuery('.technology-top').animate({
            height: "700px"
        }, 1000);
        jQuery('.technology_wrapper').animate({
            top: "700px"
        }, 1000);
        jQuery('.woofer-video').animate({
            opacity: 1
        }, 1000);
        jQuery('.open-down-container-button').animate({
            opacity: 0.1
        }, 1000);
    }
    let GlobalVideoClass;
    let GlobalPinClass;
    window.onresize = function(event) {
        setinfoGraphicWooblocks(GlobalVideoClass, GlobalPinClass);
        setWooferSectionWidth();
        setIntegraSectionWidth();
        setTweeterSectionWidth();
    };

    jQuery(".number a").click(function(event) {

        var classvar = jQuery(this).attr("class");
        console.log("this", this);
        jQuery(".number a").removeClass('active');
        jQuery("a." + classvar).addClass('active');
        console.log("classvar", classvar);
        if (true) {
            jQuery('.technology-top').addClass('show-content');
            jQuery('.technology_wrapper').addClass('show-content');
            jQuery('.technology-top').animate({
                height: "180px"
            }, 1000);
            jQuery('.technology_wrapper').animate({
                top: "180px"
            }, 1000);
            jQuery('.page-template-template-technology-php .site-content').css('height', '100%');
            jQuery('.woofer-video').animate({
                opacity: 0.1
            }, 1000);
            jQuery('.open-down-container-button').animate({
                opacity: 1
            }, 1000);
            jQuery("#" + classvar)[0].scrollIntoView();
        } else {
            jQuery('.technology-top').css('position', 'fixed');
            jQuery('.technology_wrapper').css('position', 'fixed');
            jQuery('.technology_wrapper').css('top', '720px');
            jQuery('.technology_wrapper').css('height', 'calc(100vh - 730px)');
            jQuery('.page-template-template-technology-php .site-content').css('height', '100%');
        }

    })

    jQuery(".main-tab").click(function() {
        jQuery('.sub-tabs').toggleClass('open');
        // jQuery(this).css('border-bottom', '1px solid');
        jQuery('.main-tab img').toggleClass('open');
        jQuery(this).toggleClass('btmborder');
        // jQuery(".main-tab img").css('transform', 'rotate(0deg)');
    });

    let initialPosition = [];
    let wooferNumbers;
    let twtblockNumbers;
    let intblockNumbers;
    (function() {

        setWooferSectionWidth();
        setIntegraSectionWidth();
        setTweeterSectionWidth();

        getWooblocksInitialPositions("woofer", "wooblock");
        getWooblocksInitialPositions("integra", "intblock");
        getWooblocksInitialPositions("tweeter", "twtblock");
        //getWooblocksInitialPositions("twtblock");
        //getWooblocksInitialPositions("intblock");

        setTimeout(function() {
            openInfographicTab("woofer", "wooblock");
            //
            //getPositionsK("tweeter","twtblock"); 	
        }, 500)



        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            jQuery(".number a").removeClass('active');
        }
    })();

    function openInfographicTab(videoClass, pinClass) {

        jQuery('.sub-tabs').removeClass('open');
        jQuery('.main-tab img').removeClass('open');
        jQuery('.main-tab').removeClass('btmborder');
        clearActiveTabs();
        jQuery('#' + videoClass + '-tab').addClass("active");
        console.log("set text for button videoClass", videoClass);
        jQuery('.main-tab a').text(videoClass);

        closeAllTabs();
        //setinfoGraphicWooblocks(videoClass,pinClass);
        jQuery('.' + videoClass + '-section').css("display", "block");
        jQuery('.technology-top').css("visibility", "visible");
        setinfoGraphicWooblocks(videoClass, pinClass);
        GlobalVideoClass = videoClass;
        GlobalPinClass = pinClass;
        wooferNumbers = jQuery('#' + videoClass + '-numbers-wrapper');
        wooferNumbers.css("opacity", "0");

        setTimeout(function() {
            console.log("looks like a first play");
            jQuery(wooferNumbers).animate({
                opacity: 1.0
            }, 1000);
        }, 3000);
        var video = jQuery('#' + videoClass + '-video').get(0);
        video.play(); // open first play
        //video.addEventListener('ended',function(){


        //});



    }

    function clearActiveTabs() {
        jQuery('#tweeter-tab').removeClass("active");
        jQuery('#integra-tab').removeClass("active");
        jQuery('#woofer-tab').removeClass("active");
    }

    function closeAllTabs() {
        jQuery('.tweeter-section').css("display", "none");
        jQuery('.integra-section').css("display", "none");
        jQuery('.woofer-section').css("display", "none");
    }

    function getWooblocksInitialPositions(videoClass, pinClass) {
        const initialPositionsVar = [];

        for (let i = 1; i < 16; i++) {
            if (jQuery(".numbers-wrapper ." + pinClass + "-" + i).position() != null) {
                initialPositionsVar[i] = jQuery(".numbers-wrapper ." + pinClass + "-" + i).position().top;
                //console.log("initialPositionsVar[i]",initialPositionsVar[i]);
            }
        }
        //console.log("initialPositionsVar",initialPositionsVar);
        initialPosition[videoClass] = initialPositionsVar;
        console.log(initialPosition);
    }

    function setWooferSectionWidth() {
        const vgrScreenWidth = window.innerWidth;

        if (document.getElementsByClassName("woofer-section")[0] != null) {
            document.getElementsByClassName("woofer-section")[0].style.width = vgrScreenWidth + "px";
        }
    }

    function setIntegraSectionWidth() {
        const vgrScreenWidth = window.innerWidth;

        if (document.getElementsByClassName("integra-section")[0] != null) {
            document.getElementsByClassName("integra-section")[0].style.width = vgrScreenWidth + "px";
        }
    }

    function setTweeterSectionWidth() {
        const vgrScreenWidth = window.innerWidth;

        if (document.getElementsByClassName("tweeter-section")[0] != null) {
            document.getElementsByClassName("tweeter-section")[0].style.width = vgrScreenWidth + "px";
        }
    }

    function getPositionsK(videoClass, pinClass) {
        const infoGraphicContainer = jQuery("." + videoClass + "-video .numbers-wrapper").width();
        for (let i = 1; i < 16; i++) {
            if (jQuery(".numbers-wrapper ." + pinClass + "-" + i).position() != null) {
                let infoGraphicWooblock = jQuery(".numbers-wrapper ." + pinClass + "-" + i).position().top;
                Wooblock12K = infoGraphicWooblock / infoGraphicContainer;
                console.log("Wooblock12K_" + i, Wooblock12K);
            }

        }
    }

    function setinfoGraphicWooblocks(videoClass, pinClass) {
        const infoGraphicAdapter = jQuery(".position-adapter").width();
        const infoGraphicContainer = jQuery("." + videoClass + "-video .numbers-wrapper").width();

        /* for(let i = 1; i < 16; i++){
        	let infoGraphicWooblock = jQuery(".numbers-wrapper ." + mode + "-" + i).position().top;
        	Wooblock12K = infoGraphicWooblock/infoGraphicContainer;
        	//console.log("Wooblock12K_"+ i,Wooblock12K);
        } */

        let Wooblock = [];
        Wooblock["woofer"] = [];
        Wooblock["integra"] = [];
        Wooblock["tweeter"] = [];
        Wooblock["woofer"][1] = 0.9968553459119497;
        Wooblock["woofer"][2] = 0.39308176100628933;
        Wooblock["woofer"][3] = 0.3867924528301887;
        Wooblock["woofer"][4] = 0.5062893081761006;
        Wooblock["woofer"][5] = 0.8176100628930818;
        Wooblock["woofer"][6] = 0.8710691823899371;
        Wooblock["woofer"][7] = 0.8584905660377359;
        Wooblock["woofer"][8] = 0.36163522012578614;
        Wooblock["woofer"][9] = 0.3867924528301887;
        Wooblock["woofer"][10] = 0.4025157232704403;
        Wooblock["woofer"][11] = 0.4779874213836478;
        Wooblock["woofer"][12] = 0.37735849056603776;
        Wooblock["woofer"][13] = 0.9622641509433962;
        Wooblock["woofer"][14] = 0.8459119496855346;
        Wooblock["woofer"][15] = 0.286163522012578;
        /*Wooblock12K_1 
        (index):1113 Wooblock12K_2 
        (index):1113 Wooblock12K_3 
        (index):1113 Wooblock12K_4 
        (index):1113 Wooblock12K_5 
        (index):1113 Wooblock12K_6 
        (index):1113 Wooblock12K_7 
        (index):1113 Wooblock12K_8 
        (index):1113 Wooblock12K_9 
        (index):1113 Wooblock12K_10 
        (index):1113 Wooblock12K_11   */
        Wooblock["integra"][1] = 0.8081761006289309;
        Wooblock["integra"][2] = 0.5;
        Wooblock["integra"][3] = 0.9591194968553459;
        Wooblock["integra"][4] = 0.4811320754716981;
        Wooblock["integra"][5] = 0.3867924528301887;
        Wooblock["integra"][6] = 0.8050314465408805;
        Wooblock["integra"][7] = 0.8270440251572327;

        Wooblock["tweeter"][1] = 0.44339622641509435;
        Wooblock["tweeter"][2] = 0.8207547169811321;
        Wooblock["tweeter"][3] = 0.8270440251572327;
        Wooblock["tweeter"][4] = 0.5471698113207547;
        Wooblock["tweeter"][5] = 0.37735849056603776;
        Wooblock["tweeter"][6] = 0.4371069182389937;
        Wooblock["tweeter"][7] = 0.559748427672956;
        Wooblock["tweeter"][8] = 0.7767295597484277;
        Wooblock["tweeter"][9] = 0.779874213836478;
        Wooblock["tweeter"][10] = 0.39937106918238996;
        Wooblock["tweeter"][11] = 0.44339622641509435;
        let shortPins = [];
        shortPins['woofer'] = [11, 10, 4];
        shortPins['integra'] = [];
        shortPins['tweeter'] = [];
        if (window.innerWidth <= 768) {
            for (let i = 1; i < 16; i++) {
                if (Wooblock[videoClass][i]) {
                    const addedPosition = initialPosition[videoClass][i] - infoGraphicContainer * Wooblock[
                        videoClass][i];

                    if (shortPins[videoClass].includes(i)) {
                        const Wooblock12Top = initialPosition[videoClass][i] - addedPosition / 2.65;
                        jQuery(".numbers-wrapper ." + pinClass + "-" + i).css("top", Wooblock12Top + "px");
                        //if(i == 1)console.log("upper case addedPosition",addedPosition);
                    } else {

                        const Wooblock12Top = initialPosition[videoClass][i] - addedPosition / 1.65;
                        jQuery(".numbers-wrapper ." + pinClass + "-" + i).css("top", Wooblock12Top + "px");
                        //if(i == 1)	console.log("regular case addedPosition",addedPosition);
                    }

                }
            }
        }



    }
    </script>
</div>