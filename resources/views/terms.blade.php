@extends('layouts.app')

@section('title', 'Điều khoản sử dụng - GS7')

@section('content')
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm border p-6 md:p-10">
                <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Điều khoản sử dụng</h1>
                <p class="text-gray-500 text-center mb-10">Cập nhật lần cuối: {{ date('d/m/Y') }}</p>

                {{-- Dieu khoan su dung --}}
                <div class="mb-10">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">1. Điều khoản sử dụng</h2>

                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p>
                            Chào mừng bạn đến với GS7. Khi sử dụng dịch vụ của chúng tôi, bạn đồng ý tuân thủ các điều khoản được nêu dưới đây.
                            Vui lòng đọc kỹ trước khi sử dụng.
                        </p>

                        <h3 class="text-lg font-medium text-gray-700 mt-6 mb-2">1.1 Điều kiện sử dụng</h3>
                        <ul class="list-disc list-inside space-y-2 pl-4">
                            <li>Người dùng phải từ 18 tuổi trở lên hoặc có sự đồng ý của phụ huynh/người giám hộ.</li>
                            <li>Thông tin đăng ký phải chính xác và đầy đủ. Người dùng chịu trách nhiệm về tính chính xác của thông tin.</li>
                            <li>Mỗi người chỉ được sở hữu một tài khoản. Việc tạo nhiều tài khoản có thể dẫn đến việc bị khóa tài khoản.</li>
                            <li>Người dùng không được sử dụng dịch vụ cho bất kỳ mục đích bất hợp pháp nào.</li>
                        </ul>

                        <h3 class="text-lg font-medium text-gray-700 mt-6 mb-2">1.2 Tài khoản và bảo mật</h3>
                        <ul class="list-disc list-inside space-y-2 pl-4">
                            <li>Người dùng có trách nhiệm bảo mật thông tin tài khoản của mình.</li>
                            <li>GS7 không chịu trách nhiệm về bất kỳ thiệt hại nào do việc mất mật khẩu hoặc truy cập trái phép.</li>
                            <li>Người dùng phải thông báo ngay cho GS7 khi phát hiện tài khoản bị truy cập trái phép.</li>
                        </ul>

                        <h3 class="text-lg font-medium text-gray-700 mt-6 mb-2">1.3 Quy định về gia sư</h3>
                        <ul class="list-disc list-inside space-y-2 pl-4">
                            <li>Gia sư đăng ký trên hệ thống phải cung cấp thông tin trung thực về trình độ, kinh nghiệm và bằng cấp.</li>
                            <li>GS7 có quyền xác minh thông tin và từ chối những hồ sơ không đáp ứng yêu cầu.</li>
                            <li>Gia sư phải tuân thủ các quy định về giảng dạy và ứng xử chuyên nghiệp.</li>
                        </ul>
                    </div>
                </div>

                {{-- Chinh sach hoan tien --}}
                <div class="mb-10">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">2. Chính sách hoàn tiền</h2>

                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p>
                            GS7 cam kết bảo vệ quyền lợi của người dùng thông qua chính sách hoàn tiền minh bạch và công bằng.
                        </p>

                        <h3 class="text-lg font-medium text-gray-700 mt-6 mb-2">2.1 Điều kiện hoàn tiền</h3>
                        <ul class="list-disc list-inside space-y-2 pl-4">
                            <li>Hoàn tiền được áp dụng khi gia sư không đáp ứng yêu cầu đã thỏa thuận.</li>
                            <li>Yêu cầu hoàn tiền phải được gửi trong vòng 7 ngày kể từ ngày phát sinh vấn đề.</li>
                            <li>GS7 sẽ xem xét và phản hồi yêu cầu hoàn tiền trong vòng 3-5 ngày làm việc.</li>
                        </ul>

                        <h3 class="text-lg font-medium text-gray-700 mt-6 mb-2">2.2 Trường hợp không hoàn tiền</h3>
                        <ul class="list-disc list-inside space-y-2 pl-4">
                            <li>Người dùng tự ý hủy buổi học mà không thông báo trước ít nhất 24 giờ.</li>
                            <li>Người dùng vi phạm các điều khoản sử dụng của GS7.</li>
                            <li>Yêu cầu hoàn tiền được gửi sau thời hạn 7 ngày.</li>
                        </ul>

                        <h3 class="text-lg font-medium text-gray-700 mt-6 mb-2">2.3 Phương thức hoàn tiền</h3>
                        <ul class="list-disc list-inside space-y-2 pl-4">
                            <li>Hoàn tiền sẽ được chuyển vào số dư coin của tài khoản người dùng.</li>
                            <li>Người dùng có thể sử dụng coin để thuê gia sư khác hoặc yêu cầu rút tiền.</li>
                            <li>Thời gian xử lý rút tiền là 5-7 ngày làm việc.</li>
                        </ul>
                    </div>
                </div>

                {{-- Quyen va nghia vu --}}
                <div class="mb-10">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">3. Quyền và nghĩa vụ</h2>

                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <h3 class="text-lg font-medium text-gray-700 mt-6 mb-2">3.1 Quyền của người dùng</h3>
                        <ul class="list-disc list-inside space-y-2 pl-4">
                            <li>Được sử dụng đầy đủ các tính năng của nền tảng sau khi đăng ký thành công.</li>
                            <li>Được bảo vệ thông tin cá nhân theo chính sách bảo mật của GS7.</li>
                            <li>Được quyền khiếu nại và yêu cầu giải quyết tranh chấp.</li>
                            <li>Được quyền xóa tài khoản và dữ liệu cá nhân bất kỳ lúc nào.</li>
                        </ul>

                        <h3 class="text-lg font-medium text-gray-700 mt-6 mb-2">3.2 Nghĩa vụ của người dùng</h3>
                        <ul class="list-disc list-inside space-y-2 pl-4">
                            <li>Cung cấp thông tin chính xác và cập nhật khi có thay đổi.</li>
                            <li>Thanh toán đầy đủ và đúng hạn các khoản phí phát sinh.</li>
                            <li>Tôn trọng quyền lợi của gia sư và các người dùng khác.</li>
                            <li>Không sử dụng dịch vụ cho mục đích bất hợp pháp hoặc vi phạm đạo đức.</li>
                        </ul>

                        <h3 class="text-lg font-medium text-gray-700 mt-6 mb-2">3.3 Quyền của GS7</h3>
                        <ul class="list-disc list-inside space-y-2 pl-4">
                            <li>GS7 có quyền thay đổi, cập nhật điều khoản sử dụng bất kỳ lúc nào.</li>
                            <li>GS7 có quyền tạm khóa hoặc xóa tài khoản vi phạm điều khoản.</li>
                            <li>GS7 có quyền từ chối cung cấp dịch vụ cho những trường hợp không phù hợp.</li>
                        </ul>

                        <h3 class="text-lg font-medium text-gray-700 mt-6 mb-2">3.4 Nghĩa vụ của GS7</h3>
                        <ul class="list-disc list-inside space-y-2 pl-4">
                            <li>Đảm bảo nền tảng hoạt động ổn định và bảo mật.</li>
                            <li>Hỗ trợ người dùng khi gặp vấn đề trong quá trình sử dụng.</li>
                            <li>Xử lý khiếu nại và tranh chấp một cách công bằng, minh bạch.</li>
                            <li>Bảo vệ thông tin cá nhân của người dùng theo quy định pháp luật.</li>
                        </ul>
                    </div>
                </div>

                {{-- Contact note --}}
                <div class="bg-gray-50 rounded-lg p-6 text-center">
                    <p class="text-gray-600">
                        Nếu bạn có bất kỳ câu hỏi nào về điều khoản sử dụng, vui lòng liên hệ với chúng tôi qua email
                        <a href="mailto:noreply@gs7.vn" class="text-indigo-600 hover:text-indigo-700 font-medium">noreply@gs7.vn</a>
                        hoặc truy cập trang
                        <a href="/contact" class="text-indigo-600 hover:text-indigo-700 font-medium">Liên hệ</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
