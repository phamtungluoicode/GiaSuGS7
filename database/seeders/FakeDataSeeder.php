<?php

namespace Database\Seeders;

use App\Models\ClassLevel;
use App\Models\Connect;
use App\Models\Contact;
use App\Models\Feedback;
use App\Models\History;
use App\Models\School;
use App\Models\Subject;
use App\Models\TeacherClass;
use App\Models\TeacherSubject;
use App\Models\Transaction;
use App\Models\TutorJob;
use App\Models\User;
use Illuminate\Database\Seeder;

class FakeDataSeeder extends Seeder
{
    public function run(): void
    {
        // === Trường học ===
        $schools = [
            'Đại học Giao thông Vận tải',
            'Đại học Bách khoa Hà Nội',
            'Đại học Quốc gia Hà Nội',
            'Đại học Sư phạm Hà Nội',
            'Đại học Kinh tế Quốc dân',
            'Đại học Ngoại thương',
            'Đại học Y Hà Nội',
            'Đại học Công nghệ - ĐHQGHN',
            'Học viện Tài chính',
            'Học viện Ngân hàng',
        ];
        foreach ($schools as $s) {
            School::firstOrCreate(['name' => $s]);
        }

        // === Admin (đã có từ AdminSeeder) ===
        // admin@gs7.com / password

        // === CTV ===
        $ctv1 = User::firstOrCreate(
            ['email' => 'ctv01@gs7.com'],
            [
                'name' => 'Phạm Minh Đức',
                'password' => '123456',
                'role' => 'ctv',
                'gender' => 'Nam',
                'phone' => '0912345678',
                'address' => '15 Nguyễn Trãi, Thanh Xuân, Hà Nội',
                'status' => 1,
                'DistrictID' => 6,
                'coin' => 0,
            ]
        );

        $ctv2 = User::firstOrCreate(
            ['email' => 'ctv02@gs7.com'],
            [
                'name' => 'Lê Thị Hoa',
                'password' => '123456',
                'role' => 'ctv',
                'gender' => 'Nữ',
                'phone' => '0912345679',
                'address' => '20 Lê Duẩn, Đống Đa, Hà Nội',
                'status' => 1,
                'DistrictID' => 4,
                'coin' => 0,
            ]
        );

        // === Gia sư đã duyệt (status=1) ===
        $teachers = [
            [
                'email' => 'giasu01@gs7.com',
                'name' => 'Nguyễn Văn An',
                'gender' => 'Nam',
                'phone' => '0987654321',
                'address' => '10 Cầu Giấy, Cầu Giấy, Hà Nội',
                'school_id' => 1,
                'education_level' => 'Cử nhân',
                'Citizen_card' => '001099012345',
                'exp' => '3 năm dạy Toán cấp 3',
                'description' => 'Giáo viên có 3 năm kinh nghiệm dạy Toán cấp 3. Tốt nghiệp Đại học Giao thông Vận tải với bằng giỏi. Phương pháp dạy dễ hiểu, tận tâm với học sinh.',
                'DistrictID' => 5,
                'salary_id' => 2,
                'status' => 1,
                'coin' => 200,
                'assign_user' => 'Admin GS7',
                'time_accept' => now()->subDays(30),
                'subjects' => [1, 3],       // Toán, Hóa
                'classes' => [10, 11, 12],   // Lớp 10, 11, 12
            ],
            [
                'email' => 'giasu02@gs7.com',
                'name' => 'Trần Thị Bích Ngọc',
                'gender' => 'Nữ',
                'phone' => '0987654322',
                'address' => '25 Thái Hà, Đống Đa, Hà Nội',
                'school_id' => 4,
                'education_level' => 'Thạc sĩ',
                'Citizen_card' => '001099012346',
                'exp' => '5 năm dạy Tiếng Anh',
                'description' => 'Thạc sĩ Ngôn ngữ Anh, Đại học Sư phạm Hà Nội. 5 năm kinh nghiệm luyện thi IELTS và dạy Tiếng Anh giao tiếp. Nhiều học sinh đạt IELTS 7.0+.',
                'DistrictID' => 4,
                'salary_id' => 3,
                'status' => 1,
                'coin' => 150,
                'assign_user' => 'Admin GS7',
                'time_accept' => now()->subDays(25),
                'subjects' => [8, 10],       // Tiếng Anh, IELTS
                'classes' => [9, 10, 11, 12, 13], // Lớp 9-12, Đại học
            ],
            [
                'email' => 'giasu03@gs7.com',
                'name' => 'Lê Hoàng Nam',
                'gender' => 'Nam',
                'phone' => '0987654323',
                'address' => '30 Kim Mã, Ba Đình, Hà Nội',
                'school_id' => 2,
                'education_level' => 'Kỹ sư',
                'Citizen_card' => '001099012347',
                'exp' => '2 năm dạy Lý và Toán',
                'description' => 'Kỹ sư Điện tử - Viễn thông, Đại học Bách khoa Hà Nội. Dạy kèm Vật lý và Toán cho học sinh cấp 2 và cấp 3. Dạy logic, bắt đầu từ nền tảng.',
                'DistrictID' => 1,
                'salary_id' => 2,
                'status' => 1,
                'coin' => 300,
                'assign_user' => 'Phạm Minh Đức',
                'time_accept' => now()->subDays(20),
                'subjects' => [1, 2],        // Toán, Lý
                'classes' => [7, 8, 9, 10, 11],
            ],
            [
                'email' => 'giasu04@gs7.com',
                'name' => 'Phạm Thị Mai Anh',
                'gender' => 'Nữ',
                'phone' => '0987654324',
                'address' => '5 Hoàng Quốc Việt, Cầu Giấy, Hà Nội',
                'school_id' => 3,
                'education_level' => 'Cử nhân',
                'Citizen_card' => '001099012348',
                'exp' => '4 năm dạy Hóa học',
                'description' => 'Cử nhân Hóa học, Đại học Quốc gia Hà Nội. 4 năm dạy kèm Hóa học cấp 3, chuyên luyện thi đại học. Nhiều học sinh đỗ vào trường Y và Bách khoa.',
                'DistrictID' => 5,
                'salary_id' => 3,
                'status' => 1,
                'coin' => 100,
                'assign_user' => 'Admin GS7',
                'time_accept' => now()->subDays(15),
                'subjects' => [3, 4],        // Hóa, Sinh
                'classes' => [10, 11, 12],
            ],
            [
                'email' => 'giasu05@gs7.com',
                'name' => 'Vũ Đức Mạnh',
                'gender' => 'Nam',
                'phone' => '0987654325',
                'address' => '40 Xuân Thủy, Cầu Giấy, Hà Nội',
                'school_id' => 8,
                'education_level' => 'Thạc sĩ',
                'Citizen_card' => '001099012349',
                'exp' => '6 năm dạy Tin học',
                'description' => 'Thạc sĩ Công nghệ thông tin. 6 năm kinh nghiệm dạy Tin học văn phòng, lập trình Python và C++. Dạy từ cơ bản đến nâng cao, phù hợp mọi trình độ.',
                'DistrictID' => 10,
                'salary_id' => 4,
                'status' => 1,
                'coin' => 500,
                'assign_user' => 'Lê Thị Hoa',
                'time_accept' => now()->subDays(10),
                'subjects' => [9],           // Tin học
                'classes' => [10, 11, 12, 13],
            ],
            [
                'email' => 'giasu06@gs7.com',
                'name' => 'Hoàng Thị Lan Hương',
                'gender' => 'Nữ',
                'phone' => '0987654326',
                'address' => '18 Đội Cấn, Ba Đình, Hà Nội',
                'school_id' => 4,
                'education_level' => 'Cử nhân',
                'Citizen_card' => '001099012350',
                'exp' => '3 năm dạy Văn và Sử',
                'description' => 'Cử nhân Sư phạm Ngữ văn. Dạy Văn và Sử cho học sinh cấp 2 và cấp 3. Phương pháp dạy sáng tạo, giúp học sinh yêu thích môn Văn và đạt điểm cao.',
                'DistrictID' => 7,
                'salary_id' => 2,
                'status' => 1,
                'coin' => 180,
                'assign_user' => 'Admin GS7',
                'time_accept' => now()->subDays(18),
                'subjects' => [5, 6, 15],    // Văn, Sử, Ngữ văn
                'classes' => [6, 7, 8, 9, 10, 11, 12],
            ],
            [
                'email' => 'giasu07@gs7.com',
                'name' => 'Đặng Quang Huy',
                'gender' => 'Nam',
                'phone' => '0987654327',
                'address' => '55 Nguyễn Chí Thanh, Đống Đa, Hà Nội',
                'school_id' => 6,
                'education_level' => 'Cử nhân',
                'Citizen_card' => '001099012351',
                'exp' => '2 năm dạy Tiếng Nhật',
                'description' => 'Tốt nghiệp cử nhân Ngoại thương, chứng chỉ JLPT N2. 2 năm kinh nghiệm dạy tiếng Nhật từ N5 đến N3. Giảng dạy kết hợp văn hóa Nhật Bản.',
                'DistrictID' => 4,
                'salary_id' => 3,
                'status' => 1,
                'coin' => 120,
                'assign_user' => 'Phạm Minh Đức',
                'time_accept' => now()->subDays(12),
                'subjects' => [12],          // Tiếng Nhật
                'classes' => [13],
            ],
            [
                'email' => 'giasu08@gs7.com',
                'name' => 'Nguyễn Thị Thanh Huyền',
                'gender' => 'Nữ',
                'phone' => '0987654328',
                'address' => '22 Trần Duy Hưng, Cầu Giấy, Hà Nội',
                'school_id' => 5,
                'education_level' => 'Thạc sĩ',
                'Citizen_card' => '001099012352',
                'exp' => '4 năm dạy Toán cấp 2',
                'description' => 'Thạc sĩ Toán ứng dụng, Đại học Kinh tế Quốc dân. Chuyên dạy Toán cấp 2, giúp học sinh nắm vững kiến thức nền tảng và phát triển tư duy logic.',
                'DistrictID' => 12,
                'salary_id' => 2,
                'status' => 1,
                'coin' => 250,
                'assign_user' => 'Admin GS7',
                'time_accept' => now()->subDays(22),
                'subjects' => [1],           // Toán
                'classes' => [6, 7, 8, 9],
            ],
        ];

        // Gia sư chờ duyệt (status=0)
        $pendingTeachers = [
            [
                'email' => 'giasu09@gs7.com',
                'name' => 'Bùi Văn Thành',
                'gender' => 'Nam',
                'phone' => '0987654329',
                'address' => '60 Lê Văn Lương, Thanh Xuân, Hà Nội',
                'school_id' => 9,
                'education_level' => 'Cử nhân',
                'Citizen_card' => '001099012353',
                'exp' => '1 năm dạy Toán',
                'description' => 'Sinh viên mới tốt nghiệp Học viện Tài chính. 1 năm kinh nghiệm dạy kèm Toán và Kinh tế vi mô cho sinh viên đại học.',
                'DistrictID' => 6,
                'salary_id' => 1,
                'status' => 0,
                'coin' => 0,
                'subjects' => [1],
                'classes' => [11, 12, 13],
            ],
            [
                'email' => 'giasu10@gs7.com',
                'name' => 'Đỗ Thị Phương Thảo',
                'gender' => 'Nữ',
                'phone' => '0987654330',
                'address' => '35 Tây Sơn, Đống Đa, Hà Nội',
                'school_id' => 4,
                'education_level' => 'Cử nhân',
                'Citizen_card' => '001099012354',
                'exp' => '2 năm dạy Địa lý',
                'description' => 'Cử nhân Sư phạm Địa lý, Đại học Sư phạm Hà Nội. 2 năm kinh nghiệm dạy Địa lý cấp 3, phương pháp giảng dạy trực quan bằng bản đồ và sơ đồ tư duy.',
                'DistrictID' => 4,
                'salary_id' => 1,
                'status' => 0,
                'coin' => 0,
                'subjects' => [7],           // Địa
                'classes' => [10, 11, 12],
            ],
        ];

        $createdTeachers = [];

        foreach (array_merge($teachers, $pendingTeachers) as $t) {
            $subjects = $t['subjects'];
            $classes = $t['classes'];
            unset($t['subjects'], $t['classes']);

            $user = User::firstOrCreate(
                ['email' => $t['email']],
                array_merge($t, [
                    'password' => '123456',
                    'role' => 'teacher',
                    'current_role' => 'Gia sư',
                ])
            );

            foreach ($subjects as $subjectId) {
                TeacherSubject::firstOrCreate([
                    'TeacherID' => $user->id,
                    'SubjectID' => $subjectId,
                ]);
            }

            foreach ($classes as $classId) {
                TeacherClass::firstOrCreate([
                    'TeacherID' => $user->id,
                    'ClassID' => $classId,
                ]);
            }

            $createdTeachers[$t['email']] = $user;
        }

        // === Người dùng (User) ===
        $users = [
            [
                'email' => 'phuhuynh01@gs7.com',
                'name' => 'Trần Văn Hùng',
                'gender' => 'Nam',
                'phone' => '0901234561',
                'address' => '8 Phố Huế, Hai Bà Trưng, Hà Nội',
                'DistrictID' => 3,
                'coin' => 500,
            ],
            [
                'email' => 'phuhuynh02@gs7.com',
                'name' => 'Nguyễn Thị Lan',
                'gender' => 'Nữ',
                'phone' => '0901234562',
                'address' => '45 Láng Hạ, Đống Đa, Hà Nội',
                'DistrictID' => 4,
                'coin' => 300,
            ],
            [
                'email' => 'phuhuynh03@gs7.com',
                'name' => 'Lê Quang Vinh',
                'gender' => 'Nam',
                'phone' => '0901234563',
                'address' => '12 Hoàng Hoa Thám, Ba Đình, Hà Nội',
                'DistrictID' => 1,
                'coin' => 800,
            ],
            [
                'email' => 'phuhuynh04@gs7.com',
                'name' => 'Phạm Thị Thu Hà',
                'gender' => 'Nữ',
                'phone' => '0901234564',
                'address' => '70 Trường Chinh, Thanh Xuân, Hà Nội',
                'DistrictID' => 6,
                'coin' => 200,
            ],
            [
                'email' => 'phuhuynh05@gs7.com',
                'name' => 'Võ Minh Tuấn',
                'gender' => 'Nam',
                'phone' => '0901234565',
                'address' => '33 Nguyễn Phong Sắc, Cầu Giấy, Hà Nội',
                'DistrictID' => 5,
                'coin' => 1000,
            ],
        ];

        $createdUsers = [];
        foreach ($users as $u) {
            $user = User::firstOrCreate(
                ['email' => $u['email']],
                array_merge($u, [
                    'password' => '123456',
                    'role' => 'user',
                    'status' => 1,
                ])
            );
            $createdUsers[$u['email']] = $user;
        }

        // === Giao dich nap tien ===
        $txns = [
            ['user' => 'phuhuynh01@gs7.com', 'coin' => 500, 'code' => 'VNP20260101001', 'days_ago' => 20],
            ['user' => 'phuhuynh02@gs7.com', 'coin' => 300, 'code' => 'VNP20260105002', 'days_ago' => 18],
            ['user' => 'phuhuynh03@gs7.com', 'coin' => 500, 'code' => 'VNP20260107003', 'days_ago' => 15],
            ['user' => 'phuhuynh03@gs7.com', 'coin' => 300, 'code' => 'VNP20260120004', 'days_ago' => 7],
            ['user' => 'phuhuynh04@gs7.com', 'coin' => 200, 'code' => 'VNP20260110005', 'days_ago' => 12],
            ['user' => 'phuhuynh05@gs7.com', 'coin' => 1000, 'code' => 'VNP20260115006', 'days_ago' => 10],
            ['user' => 'giasu01@gs7.com', 'coin' => 200, 'code' => 'VNP20260108007', 'days_ago' => 14],
            ['user' => 'giasu02@gs7.com', 'coin' => 200, 'code' => 'VNP20260109008', 'days_ago' => 13],
            ['user' => 'giasu03@gs7.com', 'coin' => 300, 'code' => 'VNP20260110009', 'days_ago' => 11],
            ['user' => 'giasu05@gs7.com', 'coin' => 500, 'code' => 'VNP20260112010', 'days_ago' => 9],
        ];

        foreach ($txns as $t) {
            $uid = $createdUsers[$t['user']]->id ?? $createdTeachers[$t['user']]->id ?? null;
            if (!$uid) continue;

            Transaction::create([
                'user_id' => $uid,
                'coin' => $t['coin'],
                'bank' => 'VNPay',
                'code' => $t['code'],
                'status' => 'success',
                'created_at' => now()->subDays($t['days_ago']),
                'updated_at' => now()->subDays($t['days_ago']),
            ]);

            History::create([
                'id_client' => $uid,
                'coint' => $t['coin'],
                'type' => 'Nạp tiền qua VNPay',
                'created_at' => now()->subDays($t['days_ago']),
                'updated_at' => now()->subDays($t['days_ago']),
            ]);
        }

        // === Lượt thuê gia sư (TutorJob) ===
        $subjectNames = Subject::pluck('name', 'id')->toArray();
        $classNames = ClassLevel::pluck('class', 'id')->toArray();

        // Job 1: Hùng thuê An dạy Toán lớp 12 - đã duyệt, gia sư nhận
        $job1 = TutorJob::create([
            'id_user' => $createdUsers['phuhuynh01@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu01@gs7.com']->id,
            'subject' => $subjectNames[1],
            'class' => $classNames[12],
            'description' => 'Con trai tôi học lớp 12, cần gia sư dạy Toán để luyện thi đại học. Học 3 buổi/tuần vào tối.',
            'status' => 1,
            'created_at' => now()->subDays(15),
            'updated_at' => now()->subDays(14),
        ]);

        History::create([
            'id_client' => $createdUsers['phuhuynh01@gs7.com']->id,
            'coint' => -100,
            'type' => 'Thuê gia sư',
            'created_at' => now()->subDays(15),
        ]);

        // Connect cho job1 - đã kết nối thành công
        Connect::create([
            'id_job' => $job1->id,
            'id_user' => $createdUsers['phuhuynh01@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu01@gs7.com']->id,
            'confirm_user' => 1,
            'confirm_teacher' => 1,
            'status' => 2,
            'created_at' => now()->subDays(13),
        ]);

        History::create([
            'id_client' => $createdTeachers['giasu01@gs7.com']->id,
            'coint' => -50,
            'type' => 'Nhận lớp - Job #' . $job1->id,
            'created_at' => now()->subDays(14),
        ]);

        History::create([
            'id_client' => $createdUsers['phuhuynh01@gs7.com']->id,
            'coint' => 50,
            'type' => 'Hoàn tiền kết nối thành công',
            'created_at' => now()->subDays(13),
        ]);

        // Job 2: Lan thuê Ngọc dạy Tiếng Anh lớp 11 - đã duyệt, gia sư nhận, đang chờ xác nhận kết nối
        $job2 = TutorJob::create([
            'id_user' => $createdUsers['phuhuynh02@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu02@gs7.com']->id,
            'subject' => $subjectNames[8],
            'class' => $classNames[11],
            'description' => 'Con gái tôi cần học Tiếng Anh giao tiếp và luyện IELTS. Hiện tại đang học lớp 11.',
            'status' => 1,
            'created_at' => now()->subDays(10),
            'updated_at' => now()->subDays(9),
        ]);

        History::create([
            'id_client' => $createdUsers['phuhuynh02@gs7.com']->id,
            'coint' => -100,
            'type' => 'Thuê gia sư',
            'created_at' => now()->subDays(10),
        ]);

        // Connect cho job2 - chỉ gia sư xác nhận, user chưa
        Connect::create([
            'id_job' => $job2->id,
            'id_user' => $createdUsers['phuhuynh02@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu02@gs7.com']->id,
            'confirm_user' => 0,
            'confirm_teacher' => 1,
            'status' => 1,
            'created_at' => now()->subDays(9),
        ]);

        History::create([
            'id_client' => $createdTeachers['giasu02@gs7.com']->id,
            'coint' => -50,
            'type' => 'Nhận lớp - Job #' . $job2->id,
            'created_at' => now()->subDays(9),
        ]);

        // Job 3: Vinh thuê Nam dạy Lý lớp 10 - đang chờ gia sư xác nhận
        $job3 = TutorJob::create([
            'id_user' => $createdUsers['phuhuynh03@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu03@gs7.com']->id,
            'subject' => $subjectNames[2],
            'class' => $classNames[10],
            'description' => 'Cần gia sư dạy Vật lý cho con trai tôi. Cháu học lớp 10 trường chuyên, cần người dạy nâng cao.',
            'status' => 0,
            'created_at' => now()->subDays(3),
            'updated_at' => now()->subDays(3),
        ]);

        History::create([
            'id_client' => $createdUsers['phuhuynh03@gs7.com']->id,
            'coint' => -100,
            'type' => 'Thuê gia sư',
            'created_at' => now()->subDays(3),
        ]);

        // Job 4: Vinh thuê Mai Anh dạy Hóa lớp 12 - đã duyệt
        $job4 = TutorJob::create([
            'id_user' => $createdUsers['phuhuynh03@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu04@gs7.com']->id,
            'subject' => $subjectNames[3],
            'class' => $classNames[12],
            'description' => 'Con gái tôi học lớp 12, cần luyện thi Hóa học để thi vào trường Y.',
            'status' => 1,
            'created_at' => now()->subDays(8),
            'updated_at' => now()->subDays(7),
        ]);

        History::create([
            'id_client' => $createdUsers['phuhuynh03@gs7.com']->id,
            'coint' => -100,
            'type' => 'Thuê gia sư',
            'created_at' => now()->subDays(8),
        ]);

        Connect::create([
            'id_job' => $job4->id,
            'id_user' => $createdUsers['phuhuynh03@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu04@gs7.com']->id,
            'confirm_user' => 0,
            'confirm_teacher' => 0,
            'status' => 1,
            'created_at' => now()->subDays(7),
        ]);

        History::create([
            'id_client' => $createdTeachers['giasu04@gs7.com']->id,
            'coint' => -50,
            'type' => 'Nhận lớp - Job #' . $job4->id,
            'created_at' => now()->subDays(7),
        ]);

        // Job 5: Hà thuê Lan Hương dạy Văn lớp 9 - gia sư từ chối
        $job5 = TutorJob::create([
            'id_user' => $createdUsers['phuhuynh04@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu06@gs7.com']->id,
            'subject' => $subjectNames[5],
            'class' => $classNames[9],
            'description' => 'Con gái tôi học lớp 9, cần gia sư dạy Văn để chuẩn bị thi chuyên Văn.',
            'status' => 2,
            'created_at' => now()->subDays(12),
            'updated_at' => now()->subDays(11),
        ]);

        History::create([
            'id_client' => $createdUsers['phuhuynh04@gs7.com']->id,
            'coint' => -100,
            'type' => 'Thuê gia sư',
            'created_at' => now()->subDays(12),
        ]);

        History::create([
            'id_client' => $createdUsers['phuhuynh04@gs7.com']->id,
            'coint' => 100,
            'type' => 'Hoàn tiền - Gia sư từ chối Job #' . $job5->id,
            'created_at' => now()->subDays(11),
        ]);

        // Job 6: Tuấn thuê Mạnh dạy Tin học lớp 12 - đã duyệt và kết nối thành công
        $job6 = TutorJob::create([
            'id_user' => $createdUsers['phuhuynh05@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu05@gs7.com']->id,
            'subject' => $subjectNames[9],
            'class' => $classNames[12],
            'description' => 'Tôi muốn học lập trình Python cơ bản. Hiện là sinh viên năm 1 cần bổ sung kiến thức Tin học.',
            'status' => 1,
            'created_at' => now()->subDays(6),
            'updated_at' => now()->subDays(5),
        ]);

        History::create([
            'id_client' => $createdUsers['phuhuynh05@gs7.com']->id,
            'coint' => -100,
            'type' => 'Thuê gia sư',
            'created_at' => now()->subDays(6),
        ]);

        Connect::create([
            'id_job' => $job6->id,
            'id_user' => $createdUsers['phuhuynh05@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu05@gs7.com']->id,
            'confirm_user' => 1,
            'confirm_teacher' => 1,
            'status' => 2,
            'created_at' => now()->subDays(4),
        ]);

        History::create([
            'id_client' => $createdTeachers['giasu05@gs7.com']->id,
            'coint' => -50,
            'type' => 'Nhận lớp - Job #' . $job6->id,
            'created_at' => now()->subDays(5),
        ]);

        History::create([
            'id_client' => $createdUsers['phuhuynh05@gs7.com']->id,
            'coint' => 50,
            'type' => 'Hoàn tiền kết nối thành công',
            'created_at' => now()->subDays(4),
        ]);

        // Job 7: Tuấn thuê Huyền dạy Toán lớp 8 - đang chờ gia sư xác nhận
        $job7 = TutorJob::create([
            'id_user' => $createdUsers['phuhuynh05@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu08@gs7.com']->id,
            'subject' => $subjectNames[1],
            'class' => $classNames[8],
            'description' => 'Em trai tôi học lớp 8, Toán yếu cần gia sư kèm. Học 2 buổi/tuần.',
            'status' => 0,
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(2),
        ]);

        History::create([
            'id_client' => $createdUsers['phuhuynh05@gs7.com']->id,
            'coint' => -100,
            'type' => 'Thuê gia sư',
            'created_at' => now()->subDays(2),
        ]);

        // Job 8: Hùng thuê Huy dạy Tiếng Nhật - đang chờ gia sư xác nhận
        $job8 = TutorJob::create([
            'id_user' => $createdUsers['phuhuynh01@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu07@gs7.com']->id,
            'subject' => $subjectNames[12],
            'class' => $classNames[13],
            'description' => 'Tôi muốn học tiếng Nhật từ đầu. Mục tiêu đạt N4 trong 6 tháng.',
            'status' => 0,
            'created_at' => now()->subDays(1),
            'updated_at' => now()->subDays(1),
        ]);

        History::create([
            'id_client' => $createdUsers['phuhuynh01@gs7.com']->id,
            'coint' => -100,
            'type' => 'Thuê gia sư',
            'created_at' => now()->subDays(1),
        ]);

        // === Nhận xét (Feedback) ===
        Feedback::create([
            'id_sender' => $createdUsers['phuhuynh01@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu01@gs7.com']->id,
            'point' => '5',
            'description' => 'Thầy An dạy Toán rất hay, con trai tôi tiến bộ rõ rệt sau 1 tháng học. Phương pháp dạy dễ hiểu, rất tận tâm.',
            'created_at' => now()->subDays(5),
        ]);

        Feedback::create([
            'id_sender' => $createdUsers['phuhuynh05@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu05@gs7.com']->id,
            'point' => '5',
            'description' => 'Thầy Mạnh dạy Tin học rất chuyên nghiệp. Tôi đã học được Python cơ bản chỉ sau 2 tuần. Rất hài lòng!',
            'created_at' => now()->subDays(2),
        ]);

        Feedback::create([
            'id_sender' => $createdUsers['phuhuynh03@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu04@gs7.com']->id,
            'point' => '4',
            'description' => 'Cô Mai Anh dạy Hóa tốt, con gái tôi hiểu bài hơn nhiều. Chỉ là đôi khi cô đến trễ 10 phút.',
            'created_at' => now()->subDays(3),
        ]);

        Feedback::create([
            'id_sender' => $createdUsers['phuhuynh02@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu02@gs7.com']->id,
            'point' => '5',
            'description' => 'Cô Ngọc dạy Tiếng Anh tuyệt vời. Con gái tôi từ không dám nói chuyện bằng tiếng Anh giờ đã tự tin giao tiếp. Rất hài lòng!',
            'created_at' => now()->subDays(4),
        ]);

        Feedback::create([
            'id_sender' => $createdUsers['phuhuynh01@gs7.com']->id,
            'id_teacher' => $createdTeachers['giasu03@gs7.com']->id,
            'point' => '4',
            'description' => 'Thầy Nam dạy Lý khá tốt, giải thích rõ ràng. Nhưng thời gian học đôi khi không cố định.',
            'created_at' => now()->subDays(6),
        ]);

        // === Liên hệ (Contact) ===
        Contact::create([
            'name' => 'Hoàng Văn Bình',
            'phone' => '0933456789',
            'note' => 'Tôi muốn tìm gia sư dạy kèm Toán cho con trai học lớp 5 ở quận Hoàng Mai. Xin liên hệ lại.',
            'created_at' => now()->subDays(3),
        ]);

        Contact::create([
            'name' => 'Trần Thị Nga',
            'phone' => '0944567890',
            'note' => 'Tôi là gia sư muốn đăng ký nhưng gặp lỗi khi tạo tài khoản. Cần hỗ trợ.',
            'created_at' => now()->subDays(1),
        ]);

        Contact::create([
            'name' => 'Nguyễn Đức Long',
            'phone' => '0955678901',
            'note' => 'Website rất hay. Tôi muốn hỏi về chi phí thuê gia sư IELTS dạy tại nhà.',
            'created_at' => now()->subDays(5),
        ]);
    }
}
