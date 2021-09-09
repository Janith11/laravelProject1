<?php

use App\ShedulingType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // class all seeders here
        $this->call([UsersTableSeeder::class,
                    RoleTableSeeder::class,
                    StudentTableSeeder::class,
                    OwnerSheduleSeed::class,
                    WeekDaySeed::class,
                    InstructorSeeder::class,
                    CompanyDetailsSeeder::class,
                    OpenHoursSeeder::class,
                    ShedulingTypeSeeder::class,
                    ExamTableSeeder::class,
                    SheduledStudentSeed::class,
                    ExpenseSeeder::class,
                    SalarySeeder::class,
                    VahicleCategorySeeder::class,
                    StudentCategorySeeder::class,
                    PaymentLogSeeder::class,
                    CommentSeeder::class,
                    AttendancesSeeder::class,
                    SheduleAlertSeeder::class,
                    AlertForStudentSeeder::class,
                    PostSeeder::class,
                    TimeSlotSeeder::class,
                    InstructorforTimeSlot::class,
                    SheduleSeeder::class
                ]);
    }
}
