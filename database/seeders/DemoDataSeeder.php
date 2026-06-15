<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Child;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        $childrenData = [
            ['name' => 'Nguyễn Minh An', 'gender' => 'male', 'dob' => '2014-05-21', 'bio' => 'Em An rất chăm ngoan, thích học Toán và vẽ tranh.', 'photo' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=700&q=80'],
            ['name' => 'Trần Thị Bích', 'gender' => 'female', 'dob' => '2013-08-10', 'bio' => 'Bích mơ ước trở thành cô giáo và yêu thích đọc sách.', 'photo' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=700&q=80'],
            ['name' => 'Lê Văn Cường', 'gender' => 'male', 'dob' => '2015-02-18', 'bio' => 'Cường là một cậu bé vui tính, thích đá bóng và chăm học.', 'photo' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=700&q=80'],
            ['name' => 'Phạm Thị Dung', 'gender' => 'female', 'dob' => '2014-11-05', 'bio' => 'Dung thích ca hát và luôn giúp mẹ việc nhà.', 'photo' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=700&q=80'],
            ['name' => 'Vũ Đức Huy', 'gender' => 'male', 'dob' => '2013-06-30', 'bio' => 'Huy có khả năng vẽ rất tốt và luôn mơ ước được đi học.', 'photo' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?auto=format&fit=crop&w=700&q=80'],
            ['name' => 'Hoàng Thị Kim', 'gender' => 'female', 'dob' => '2015-09-12', 'bio' => 'Kim là học sinh chăm ngoan, yêu thích văn học và âm nhạc.', 'photo' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=700&q=80'],
            ['name' => 'Đặng Minh Long', 'gender' => 'male', 'dob' => '2014-03-25', 'bio' => 'Long có ước mơ trở thành kỹ sư và rất ham học hỏi.', 'photo' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?auto=format&fit=crop&w=700&q=80'],
            ['name' => 'Ngô Thị Mai', 'gender' => 'female', 'dob' => '2013-12-02', 'bio' => 'Mai luôn tham gia các hoạt động tập thể và thân thiện với bạn bè.', 'photo' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=700&q=80'],
            ['name' => 'Bùi Văn Nam', 'gender' => 'male', 'dob' => '2014-07-08', 'bio' => 'Nam thích học ngoại ngữ và luôn say mê khám phá công nghệ.', 'photo' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?auto=format&fit=crop&w=700&q=80'],
            ['name' => 'Lý Thị Oanh', 'gender' => 'female', 'dob' => '2015-01-14', 'bio' => 'Oanh là một cô bé hiền hậu và rất ngoan ngoãn.', 'photo' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=700&q=80'],
        ];

        $children = collect($childrenData)->map(function ($data) {
            return Child::create(array_merge($data, [
                'uuid' => (string) Str::uuid(),
                'status' => 'active',
                'metadata' => ['region' => 'Vùng cao', 'school' => 'Trường Tiểu học địa phương'],
            ]));
        });

        $campaignsData = [
            [
                'title' => 'Quỹ Học Bổng Vùng Cao',
                'description' => 'Hỗ trợ học phí, sách vở và đồng phục cho các em học sinh vùng cao.',
                'target_amount' => 150000000,
            ],
            [
                'title' => 'Gói Giáo Dục Cho Em',
                'description' => 'Trang bị thiết bị học tập và học bổng hàng tháng cho những em có hoàn cảnh khó khăn.',
                'target_amount' => 120000000,
            ],
            [
                'title' => 'Chương Trình Sức Khỏe Trẻ Em',
                'description' => 'Hỗ trợ khám sức khỏe, tiêm chủng và dinh dưỡng cho trẻ em tại vùng khó khăn.',
                'target_amount' => 100000000,
            ],
        ];

        $campaigns = collect($campaignsData)->map(function ($data) use ($children) {
            $title = $data['title'];
            $campaign = Campaign::create([
                'uuid' => (string) Str::uuid(),
                'title' => $title,
                'slug' => Str::slug($title) . '-' . now()->timestamp,
                'description' => $data['description'],
                'target_amount' => $data['target_amount'],
                'collected_amount' => 0,
                'start_at' => now()->subDays(7),
                'end_at' => now()->addDays(45),
                'status' => 'published',
                'metadata' => ['theme' => 'education'],
            ]);

            $relatedChildren = $children->random(3)->pluck('id');
            $campaign->children()->attach($relatedChildren);

            return $campaign;
        });

        $donorUsers = User::factory(5)->create()->each(function ($user) {
            $user->assignRole('donor');
        });

        $donorNames = ['Phạm Thanh Hà', 'Trần Thuý Linh', 'Lê Đức Kiên', 'Vũ Mỹ Hạnh', 'Đỗ Hoài Nam'];
        foreach ($donorUsers as $index => $user) {
            $user->update(['name' => $donorNames[$index]]);
        }

        foreach ($campaigns as $campaign) {
            $childIds = $campaign->children()->pluck('children.id')->all();

            foreach (range(1, 4) as $number) {
                $childId = $childIds[array_rand($childIds)];
                $user = $donorUsers->random();
                $amount = rand(5000000, 25000000);

                Donation::create([
                    'uuid' => (string) Str::uuid(),
                    'user_id' => $user->id,
                    'campaign_id' => $campaign->id,
                    'child_id' => $childId,
                    'amount' => $amount,
                    'currency' => 'VND',
                    'status' => 'success',
                    'gateway' => 'manual',
                    'gateway_ref' => 'DON-' . strtoupper(Str::random(8)),
                    'metadata' => ['note' => 'Ủng hộ chiến dịch'],
                    'paid_at' => now()->subDays(rand(1, 14)),
                ]);

                $campaign->increment('collected_amount', $amount);
            }
        }
    }
}
