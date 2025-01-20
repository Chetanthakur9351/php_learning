
<!-- ---------------------------------  Dummy Code---------------------------------------- -->

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class ReportController extends Controller
{
    public function academicReportStatistics(Request $request)
    {
        try {
            // Simulated user data for demonstration
            $user = collect([
                ['enrollment_id' => 1, 'status' => true, 'student_type' => 'New', 'programme_status' => 'Active'],
                ['enrollment_id' => 2, 'status' => true, 'student_type' => 'Returning', 'programme_status' => 'Transfer out'],
                ['enrollment_id' => 3, 'status' => false, 'student_type' => 'New', 'programme_status' => 'Withdraw'],
            ]);

            // Updating user credits in chunks
            DB::table('users')
                ->where(function ($query) {
                    $query->where('credits', 1)->orWhere('credits', 2);
                })
                ->chunkById(100, function (Collection $user) {
                    foreach ($user as $item) {
                        DB::table('users')
                            ->where('id', $item->id)
                            ->update(['credits' => 3]);
                    }
                });

            // Simulated user semester registration data
            $user = $user->merge([
                ['enrollment_id' => 1, 'admission_status' => 'Full Time'],
                ['enrollment_id' => 2, 'admission_status' => 'Part Time'],
            ]);

            // Simulated user billing data
            $user = $user->merge([
                ['enrollment_id' => 1, 'bill_paid' => true],
                ['enrollment_id' => 2, 'bill_paid' => true],
            ]);

            // Statistics initialization
            $statistics = [
                'total_students_count' => $user->count(),
                'registered_students_count' => $user->where('status', true)->count(),
                'new_students_count' => $user->where('student_type', 'New')->count(),
                'returning_students_count' => $user->where('student_type', 'Returning')->count(),
                'transfer_in_count' => $user->where('programme_status', 'Transfer in')->count(),
                'transfer_out_count' => $user->where('programme_status', 'Transfer out')->count(),
                'withdrawn_students_count' => $user->where('programme_status', 'Withdraw')->count(),
                'full_time_count' => $user->where('admission_status', 'Full Time')->count(),
                'part_time_count' => $user->where('admission_status', 'Part Time')->count(),
                'bill_paid_count' => $user->where('bill_paid', true)->count(),
            ];

            // Return statistics as JSON response
            return response()->json([
                'status' => true,
                'statistics' => $statistics,
            ], 200);
        } catch (\Throwable $th) {
            // Handle errors gracefully
            return response()->json([
                'status' => false,
                'errors' => ['message' => 'An error occurred: ' . $th->getMessage()],
            ], 500);
        }
    }
}
