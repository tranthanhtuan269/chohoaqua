-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2017 at 06:40 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chohoaqua`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent`) VALUES
(1, 'Dưa lưới', 'Dưa lưới', 0),
(2, 'Mít ruột đỏ', '<p>Mít ruột đỏ<br></p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `flag`, `created_at`) VALUES
(1, 'Trồng cây ăn trái theo tiêu chuẩn Vietgap', '<p><strong>Mô hình ứng dụng công nghệ sản xuất dưa lưới chất lượng cao, \r\nsạch bệnh và an toàn thực phẩm, áp dụng quy trình thực hành sản xuất \r\nnông nghiệp theo tiêu chuẩn VietGap của chị Văn Thị Cẩm Lệ (ấp Suối Sâu,\r\n xã An Tịnh, Trảng Bàng) là ví dụ điển hình.</strong></p><p>Trước những thông tin rau cải, trái cây bị tẩm quá nhiều hoá chất \r\ntrước khi đưa đến tay người tiêu dùng đã làm người dân hoang mang, từ đó\r\n việc lựa chọn thực phẩm an toàn được các gia đình ưu tiên hàng đầu nên \r\nvấn đề sản xuất rau an toàn, xây dựng vườn cây ăn trái đạt tiêu chuẩn là\r\n hướng sản xuất bền vững được các nhà vườn lựa chọn, đầu tư. Mô hình ứng\r\n dụng công nghệ sản xuất dưa lưới chất lượng cao, sạch bệnh và an toàn \r\nthực phẩm, áp dụng quy trình thực hành sản xuất nông nghiệp theo tiêu \r\nchuẩn VietGap của chị Văn Thị Cẩm Lệ (ấp Suối Sâu, xã An Tịnh, Trảng \r\nBàng) là ví dụ điển hình.</p><p>\r\n\r\n\r\n\r\n</p><p>Theo lời chị Lệ, khi áp dụng phương pháp này, dưa được trồng trong \r\nnhà màng, có lưới ngăn côn trùng, có mái bằng vải nhựa che mưa gió. Mỗi \r\ncây trồng trong một bầu giá thể tơi xốp, nhiều dinh dưỡng và được lót \r\nbạt cao su cách ly với nền đất. Việc bón phân kết hợp với tưới nước được\r\n dẫn đến tận gốc theo đúng mức độ yêu cầu, tạo điều kiện tốt nhất cho \r\ncây phát triển và hoàn toàn tự động. Ngoài tác dụng cung cấp nước sạch \r\ncho cây, tưới nước theo phương pháp này sẽ giúp chủ động phân phối đều \r\ndinh dưỡng được hòa tan cùng nước tưới, đồng thời có thể tiết kiệm một \r\nlượng nước, phân bón khá lớn.</p><p><img src="http://localhost:8000/images/161257mo-hinh.jpg" style="width: 100%; float: none;"></p><p>                                <strong>Chị Lệ trong vườn dưa lưới trồng theo tiêu chuẩn Vietgap</strong></p><p>Chị Lệ cho biết, hiện mô hình dưa của chị được bao tiêu sản phẩm cung\r\n cấp cho hệ thống các siêu thị tại Tp.HCM. Mỗi năm chị thu hoạch ít nhất\r\n 4 đợt, năng suất bình quân khoảng 3 tấn/1.000m2, Với giá bán từ 28.000 –\r\n 32.000 đ/kg như hiện nay, trừ chi phí đầu tư, nếu làm khéo thì khoảng \r\n1,5 – 2 năm là có thể hoàn vốn.<br>\r\nTuy nhiên, theo chị Lệ, mô hình khó áp dụng rộng rãi vì để có sản phẩm \r\nđạt yêu cầu phải tốn rất nhiều công chăm sóc và vốn đầu tư cao, đòi hỏi \r\nngười sản xuất phải nắm bắt kỹ thuật, ý thức tự giác áp dụng các biện \r\npháp quản lý chất lượng, an toàn sản phẩm nghiêm ngặt.</p><p>Thực tế, sản xuất nông nghiệp theo tiêu chuẩn VietGap chỉ có thể \r\nthành công khi tay nghề của nông dân được nâng cao, cùng với sự đồng bộ \r\ncủa các mục đầu tư về cơ sở hạ tầng, hỗ trợ thương mại. Do đó Nhà nước \r\ncần có chính sách hỗ trợ hợp lý, tạo môi trường thuận lợi cho ngành sản \r\nxuất thực phẩm an toàn ứng dụng công nghệ cao phát triển ổn định và bền \r\nvững.</p><p>Theo lời chị Lệ, khi áp dụng phương pháp này, dưa được trồng trong \r\nnhà màng, có lưới ngăn côn trùng, có mái bằng vải nhựa che mưa gió. Mỗi \r\ncây trồng trong một bầu giá thể tơi xốp, nhiều dinh dưỡng và được lót \r\nbạt cao su cách ly với nền đất. Việc bón phân kết hợp với tưới nước được\r\n dẫn đến tận gốc theo đúng mức độ yêu cầu, tạo điều kiện tốt nhất cho \r\ncây phát triển và hoàn toàn tự động. Ngoài tác dụng cung cấp nước sạch \r\ncho cây, tưới nước theo phương pháp này sẽ giúp chủ động phân phối đều \r\ndinh dưỡng được hòa tan cùng nước tưới, đồng thời có thể tiết kiệm một \r\nlượng nước, phân bón khá lớn.</p><p>Chị Lệ cho biết, hiện mô hình dưa của chị được bao tiêu sản phẩm cung\r\n cấp cho hệ thống các siêu thị tại Tp.HCM. Mỗi năm chị thu hoạch ít nhất\r\n 4 đợt, năng suất bình quân khoảng 3 tấn/1.000m2, Với giá bán từ 28.000 –\r\n 32.000 đ/kg như hiện nay, trừ chi phí đầu tư, nếu làm khéo thì khoảng \r\n1,5 – 2 năm là có thể hoàn vốn.<br>\r\nTuy nhiên, theo chị Lệ, mô hình khó áp dụng rộng rãi vì để có sản phẩm \r\nđạt yêu cầu phải tốn rất nhiều công chăm sóc và vốn đầu tư cao, đòi hỏi \r\nngười sản xuất phải nắm bắt kỹ thuật, ý thức tự giác áp dụng các biện \r\npháp quản lý chất lượng, an toàn sản phẩm nghiêm ngặt.</p><p>Thực tế, sản xuất nông nghiệp theo tiêu chuẩn VietGap chỉ có thể \r\nthành công khi tay nghề của nông dân được nâng cao, cùng với sự đồng bộ \r\ncủa các mục đầu tư về cơ sở hạ tầng, hỗ trợ thương mại. Do đó Nhà nước \r\ncần có chính sách hỗ trợ hợp lý, tạo môi trường thuận lợi cho ngành sản \r\nxuất thực phẩm an toàn ứng dụng công nghệ cao phát triển ổn định và bền \r\nvững.</p>', '162421mo-hinh.jpg', 1, '2017-06-07 16:48:28'),
(2, 'Làm giàu với dưa lưới trong nhà màng', '<p>Hai vợ chồng anh Trần Hữu Vũ và Văn Thị Cẩm Lệ là những người đầu \r\ntiên lập trang trại trồng dưa lưới trong nhà màng ở Tây Ninh, mỗi năm \r\nthu hoạch 36-40 tấn với giá bán 22.000 – 28.000 đồng một kg.</p><p>Từng gắn bó với ngành địa ốc hơn 10 năm, rồi chuyển sang điều hành cơ\r\n sở kinh doanh gia đình, giờ đây vợ chồng chị Văn Thị Cẩm Lệ và anh Trần\r\n Hữu Vũ lại hướng sang lĩnh vực nông nghiệp tại ấp Suối Sâu, xã An Tịnh,\r\n Trảng Bàng – Tây Ninh với mô hình trồng dưa lưới trong các nhà màng.</p><p>\r\n\r\n\r\n\r\n</p><p>Cách đây hai năm, vợ chồng chị Lệ có dịp tham quan Khu Nông nghiệp \r\ncông nghệ cao TP HCM, rất ấn tượng khi thấy dưa lưới treo lủng lẳng trên\r\n các dây, quy trình trồng bài bản, không tốn nhiều nhân công, phù hợp \r\nvới khí hậu nhiệt đới. Hơn nữa, trồng dưa lưới trong nhà màng lợi gấp 3 \r\nlần diện tích trồng ngoài ruộng.</p><p><img src="http://localhost:8000/images/162852vuon-O-JPG-6323-1392427232.jpg" style="width: 100%;"></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Dưa lưới từ lúc trồng cho đến thu hoạch khoảng 55-65 ngày.</strong></p><p>Từ buổi trải nghiệm đó, anh chị bắt đầu tìm hiểu cặn kẽ về dưa lưới, \r\ntừ kỹ thuật trồng bán thủy canh theo công nghệ tưới nhỏ giọt kiểu \r\nIsrael, đến lựa chọn các kiểu xây dựng nhà màng thế nào cho phù hợp với \r\ncây dưa lưới trong điều kiện khí hậu nóng ẩm của vùng đất Tây Ninh.</p><p>Chị Lệ cho biết, lâu nay nông dân ở các tỉnh như Long An, Đồng Nai, \r\nBà Rịa Vũng Tàu… trồng dưa lưới ngoài ruộng theo từng luống. Trồng cách \r\nnày, dưa thường bị nám một bên do nằm dưới đất, dễ bị sâu bệnh, côn \r\ntrùng phá hoại, rụng trái hàng loạt bởi sương muối…</p><p>Năm đầu tiên, anh Vũ cho biết, do chưa có kinh nghiệm, cộng với sử \r\ndụng màng lưới không đúng kỹ thuật, khiến vườn bị bọ trĩ nhiều, tỷ lệ \r\nhao hụt gần 50% dù trái thu hoạch vẫn đạt khoảng 2 – 3 kg một trái.</p><p>Sau thất bại này, anh chị tiếp tục học kinh nghiệm từ các kỹ sư nông \r\nnghiệp về các loại bệnh trên cây, rong ruổi lên Đà Lạt xem các mô hình \r\nhệ thống nhà màng và quyết định xây thêm 2 nhà màng nữa. Lần này, anh \r\nchị cho gia cố thêm sắt thép để giàn khung có thể chịu lực 5-6 tấn dây \r\nvà trái treo trên cáp cho mỗi khu nhà màng.<br>\r\nHiện tại, trang trại của anh chị rộng khoảng 7.000 mét vuông, trong đó \r\ndiện tích nhà lưới 4.500 mét vuông, làm đúng tiêu chuẩn, không thưa cũng\r\n không quá dày, nhiệt độ bên trong duy trì không quá 45 độ C, có bổ sung\r\n thêm hệ thống phun sương. Mỗi cây trồng trong một bầu giá thể, được lót\r\n bạt cao su cách ly với nền đất. Đồng thời, bón phân kết hợp với tưới \r\nnước nhỏ giọt được dẫn đến tận gốc theo đúng mức độ yêu cầu và hoàn toàn\r\n tự động. Từ lúc trồng cho đến thu hoạch khoảng 55-65 ngày, tùy thời \r\ntiết, hoặc 90-100 ngày, tùy giống.</p><p>Theo chị Lệ, dù trồng trong nhà lưới, côn trùng không vào được, nhưng\r\n vẫn phải rất kỹ khâu vệ sinh để tránh vi nấm lây lan. Cụ thể khi tỉa, \r\ncắt cành trên cây xong, phải đem ra ngoài ngay. Ngoài ra, chăm tỉa quấn \r\ncành trong giai đoạn đầu phải rất tỉ mỉ, để dây dưa bò thẳng trên dây. \r\nViệc thụ phấn cũng cần đúng lúc và kịp thời (thường vào sáng sớm), để \r\ntrái tăng trưởng đồng loạt, tròn đều, lưới trên trái đẹp.</p><p><img src="http://localhost:8000/images/162940vuon-O-JPG-6323-1392427232.jpg" style="width: 100%;"><br></p><p>Vợ chồng anh chị Lệ đang dự định mở rộng thêm 10.000 mét vuông nhà lưới, với kỳ vọng thu hoạch 15-25 tấn dưa mỗi tháng</p><p>Hiện tại, mỗi năm trang trại thu hoạch ít nhất 4 vụ, năng suất bình \r\nquân khoảng 3 tấn trên 1.000 mét vuông cho mỗi vụ, với trên 90% là dưa \r\nloại một, trọng lượng khoảng một kg trở lên tùy giống.</p><p>Anh Vũ cho hay, ngày càng nhiều người biết đến trang trại, ghé thăm \r\nvà tìm hiểu về cách trồng dưa lưới trong nhà màng.Cách đây 3 tháng, anh \r\nchị đã nhận được giấy chứng nhận VietGap cho trang trại.</p><p>Giá bán dưa lưới ngay tại nhà vườn hiện khoảng 22.000 – 28.000 đồng \r\nmột kg, tùy theo giống. Thông thường, người mua thích chọn loại dưa 2 kg\r\n trở xuống. Dưa của anh chị hiện được bao tiêu, cung cấp cho hệ thống \r\ncác siêu thị lớn tại TP HCM.</p><p>Chi phí đầu tư trong phạm vi nhà lưới trung bình 350.000 đồng một mét\r\n vuông. Hệ thống ống tưới khoảng 350 triệu đồng cho 1.000 mét vuông, \r\nchưa kể các khoản chi khác cho nhà điều hành, sân bãi, bể ngầm… Hiện \r\ntại, nhà vườn có 5 công nhân làm việc với trang thiết bị phần lớn là tự \r\nđộng hóa theo công nghệ tưới Israel.</p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p>Với năng suất và giá bán như hiện nay, anh Vũ tính toán, sau 2-3 năm,\r\n có thể thu hồi vốn đầu tư. Anh chị đang dự định mở rộng thêm 10.000 mét\r\n vuông nhà lưới, với kỳ vọng thu hoạch 15-25 tấn dưa mỗi tháng.</p>', '163002vuon-O-JPG-6323-1392427232.jpg', 1, '2017-06-07 16:51:10'),
(3, 'Công nghệ hóa trồng dưa lưới', '<p><strong>Từng hoạt động đầu tư trong lĩnh vực bất động sản nhưng hiện \r\nvợ chồng anh chị Vũ – Lệ, chủ trang trại dưa lưới Hoàng Xuân (Trảng \r\nBàng, Tây Ninh) lại thu hàng tỉ đồng mỗi năm từ một lĩnh vực hoàn toàn \r\nkhác biệt: nông nghiệp.</strong></p><p>Trong những ngày này, vợ chồng anh Trần Hữu Vũ, chị Văn Thị Cẩm Lệ \r\ncùng 5 người phụ việc đang tất bật với việc thụ phấn cho lứa dưa mới – \r\ncông đoạn tốn nhiều sức lao động nhất cho vườn dưa gần như hoàn toàn “tự\r\n động” này. Đây là lứa dưa mới trồng sau vụ tết. Thụ phấn xong chỉ \r\nkhoảng 30 ngày là đến lúc thu hoạch. Trung bình cứ 3 tuần trại Hoàng \r\nXuân lại xuất hàng một lần.</p><p>\r\n\r\n\r\n\r\n</p><p>Nhờ sản xuất theo công nghệ hiện đại với số lượng lớn, đạt các tiêu \r\nchí an toàn nên sản phẩm vào được các hệ thống phân phối lớn của thành \r\nphố. Gần đây nhiều nhà bán lẻ còn đặt hàng theo yêu cầu nên Hoàng Xuân \r\nyên tâm về đầu ra, chỉ tập trung cho sản xuất. Hiện nay, mỗi năm Hoàng \r\nXuân xuất vườn 4 vụ khoảng 40 tấn với 90% là loại một. Giá bán tại vườn \r\ntừ 22.000 – 28.000 đồng/kg. Theo chiều hướng này, khoảng 2-3 năm nữa \r\nvườn dưa có thể thu hồi vốn.</p><p><img src="http://localhost:8000/images/163201dualuoi.jpg" style="width: 100%; float: none;"></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhờ áp dụng công nghệ, mỗi năm vợ chồng anh Vũ thu hàng tỉ đồng từ dưa lưới</p><p>Trang trại Hoàng Xuân có tổng diện tích 7.000 m2, phần diện tích nhà \r\nkính để canh tác là 4.500 m2. Nhà kính được thiết kế theo đúng tiêu \r\nchuẩn để ngăn côn trùng từ bên ngoài xâm nhập vào. Nền được lót bạt cao \r\nsu để cách ly hoàn toàn với bên ngoài. Mỗi dây dưa được trồng trong một \r\ngiá thể quấn vào một sợi dây treo thẳng đứng được trợ giúp bằng hệ thống\r\n cáp chịu lực liên kết với khung nhà. Theo chị Lệ, cách trồng này giúp \r\ntiết kiệm diện tích gấp 3 lần (năng suất gấp 3 lần) cách trồng thông \r\nthường và một dây dưa chỉ thu hoạch được một trái. Do được cách ly hoàn \r\ntoàn với môi trường bên ngoài nên dưa rất ít bị sâu bệnh tấn công, côn \r\ntrùng phá hoại hoặc thời biết bất lợi…, chính vì vậy mà rủi ro rất thấp.</p><p>Điều đặc biệt nhất ở trang trại này là việc áp dụng công nghệ tưới \r\nnhỏ giọt được nhập khẩu từ Israel. Công nghệ này giúp tiết kiệm nước và \r\nphân bón vì cây được cung cấp dinh dưỡng theo đúng nhu cầu của từng giai\r\n đoạn sinh trưởng. Theo anh Vũ, riêng phần đầu tư cho dàn máy điều khiển\r\n hệ thống tưới phân và phun sương có giá cả trăm triệu đồng hoặc cao hơn\r\n tùy loại và tính năng. Còn vốn đầu tư cho nhà kính và dây tưới nhỏ giọt\r\n trung bình 350.000 đồng/m2, đó là chưa kể các khoản chi khác cho nhà \r\nđiều hành, sân bãi, bể ngầm… Tuy chi phí đầu tư lớn nhưng tuổi thọ của \r\nhệ thống tưới và khung nhà kính cũng trên 10 năm và tiết kiệm được công,\r\n chi phí chăm sóc nên nó cũng không phải là quá đắt.</p><p>\r\n\r\n\r\n\r\n</p><p>Hiện tại vợ chồng anh chị đang chuẩn bị xây dựng 10.000 m2 nhà kính ở\r\n trang trại thứ hai trên diện tích 15.000 m2, áp dụng hệ thống tưới nhỏ \r\ngiọt hiện đại hơn có khả năng đo độ EC, pH trong đất và đặc biệt có thể \r\nđiều khiển từ xa qua mạng internet.</p>', '163241dualuoi.jpg', 1, '2017-06-08 16:32:41'),
(4, 'Những lợi ích và giá trị dinh dưỡng có trong dưa lưới', '<p>Dưa lưới là tên của một số thứ cây trồng của loài dưa có tên khoa học là\r\n Cucumis melo , một loài thuộc họ Cucurbitaceae. Quả dưa lưới có khối \r\nlượng từ 0,5 kg đến 5 kg. Dưa lưới có nguồn gốc từ Ấn Độ và châu Phi. \r\nNgười Ai Cập là những người đầu tiên trồng loài cây này, sau đó là người\r\n Hy Lạp và La Mã. Cây dưa lưới lần đầu tiên được Cristoforo Colombo đưa \r\nđến Bắc Mỹ trên hành trình lần thứ hai của ông đến Châu Mỹ vào năm 1494.\r\n Hiện tại dưa lưới được trồng khắp nơi trên thế giới, là loại thực phẩm \r\ncó giá trị dinh dưỡng cao. Dưa lưới là nguồn chứa chất chống oxy hóa \r\ndạng polyphenol, là chất có lợi cho sức khỏe trong việc phòng chống bệnh\r\n ung thư và tăng cường hệ miễn dịch. Các chất này điều tiết sự tạo thành\r\n nitric oxit, một chất quan trọng đối với nội mạc và hệ tim mạch khỏe \r\nmạnh.<img src="http://localhost:8000/images/163336b4cd6f2fecb71bdad4579e6e6a26ef6b_36540541_dualuoi.jpg" style="width: 655px;"></p><p>Bên cạnh đó dưa lưới chứa nhiều chất xơ nên có tác dụng nhuận trường, \r\nchống táo bón.Trong dưa lưới có chứa lượng Enzyme tiêu hoá lớn nhất \r\ntrong số các loại trái cây, nhiều hơn cả đu đủ và xoài. Hiệp hội ung thư\r\n Hoa Kỳ khuyến cáo nên ăn nhiều dưa lưới vì chúng được xem là một trong \r\nnhững loại thực phẩm có khả năng đánh bại căn bệnh ưng thu ruột và những\r\n khối u ác tính. Đây còn là nguồn phong phú beta-carotene, a-xít folic, \r\nkali và vitamin C, A. Nếu bạn muốn cải thiện làn da sao cho trẻ trung, \r\nkhỏe mạnh thì nên liệt kê dưa lưới trong chế độ dinh dưỡng mỗi ngày. \r\nNguồn kali trong dưa lưới còn giúp bài tiết, thải sodium (chất trong \r\nmuối) nên ăn dưa lưới có tác dụng giảm huyết áp cao. Trong 100g dưa lưới\r\n chứa hàng loạt các khoáng chất và vitamin như: Acid Folic (21 μg), \r\nNianci (0.734 mg), beta-carotene (2020 μg ), Magiê (12 mg), sắt (0,21 \r\nmg), canxi (9mg), Vitamin C (36,7 mg), vitamin A (169 μg), năng lượng \r\n(34 kcal) ….<br></p>', '163352b4cd6f2fecb71bdad4579e6e6a26ef6b_36540541_dualuoi.jpg', 1, '2017-06-08 16:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `created_at`, `status`) VALUES
(1, 1, '2017-06-14 17:03:33', 0),
(2, 1, '2017-06-14 17:07:26', 0),
(3, 1, '2017-06-14 17:08:45', 0),
(4, 1, '2017-06-14 17:09:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `name`, `number`, `price`, `order_id`, `product_id`) VALUES
(1, 'adaa', 10, 10000, 4, 3),
(2, 'adaa', 2, 10000, 4, 3),
(3, 'adaa', 2, 10000, 4, 3),
(4, 'adaa', 2, 10000, 4, 3),
(5, 'adaa', 2, 10000, 4, 3),
(6, 'adaa', 10, 10000, 4, 3),
(7, 'Dưa lưới', 10, 10000, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `images`, `price`, `description`, `category`) VALUES
(1, 'Dưa lưới', '172947mo-hinh.jpg', 10000, '1', 1),
(2, 'adaa', '172947dualuoi.jpg;172947mo-hinh.jpg;172947vochong-O-4805-1392427233.jpg;172947vuon-O-JPG-6323-1392427232.jpg;', 10000, '<p>aaa</p>', 2),
(3, 'adaa', '172947dualuoi.jpg;172947mo-hinh.jpg;172947vochong-O-4805-1392427233.jpg;172947vuon-O-JPG-6323-1392427232.jpg;', 10000, '<p>aaa</p>', 2),
(4, 'adaa', '172947dualuoi.jpg;172947mo-hinh.jpg;172947vochong-O-4805-1392427233.jpg;172947vuon-O-JPG-6323-1392427232.jpg;', 10000, '<p>aaa</p>', 2),
(5, 'adaa', '172947dualuoi.jpg;172947mo-hinh.jpg;172947vochong-O-4805-1392427233.jpg;172947vuon-O-JPG-6323-1392427232.jpg;', 10000, '<p>aaa</p>', 2),
(6, 'adaa', '172947dualuoi.jpg;172947mo-hinh.jpg;172947vochong-O-4805-1392427233.jpg;172947vuon-O-JPG-6323-1392427232.jpg;', 10000, '<p>aaa</p>', 2),
(7, 'adaa', '172947dualuoi.jpg;172947mo-hinh.jpg;172947vochong-O-4805-1392427233.jpg;172947vuon-O-JPG-6323-1392427232.jpg;', 10000, '<p>aaa</p>', 2),
(8, 'adaa', '172947dualuoi.jpg;172947mo-hinh.jpg;172947vochong-O-4805-1392427233.jpg;172947vuon-O-JPG-6323-1392427232.jpg;', 10000, '<p>aaa</p>', 2),
(9, 'adaa', '172947dualuoi.jpg;172947mo-hinh.jpg;172947vochong-O-4805-1392427233.jpg;172947vuon-O-JPG-6323-1392427232.jpg;', 10000, '<p>aaa</p>', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `name`, `detail`, `note`) VALUES
(1, 'gioi_thieu', '<p><img src="http://localhost:8000/images/13550815078863_167899910343340_6173497830077530915_n.jpg" style="width: 655px;"></p><p>aaaaa</p>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@chohoaqua.com', '$2y$10$dQmPKVtBOKU9XPYFppZjUeRApG8N2vzOVfKDe0GN3be9zwWYT5wDe', '0WIVoQkKwNYWorj2Z9bAqppHWSnp4zeh4qiFsnjCMXuxBYSYDmlod6lH7Hon', '2017-06-06 09:47:53', '2017-06-06 09:47:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
