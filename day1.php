
<!-- ---------------------------------  Dummy Code---------------------------------------- -->


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function academicReportStatistics(Request $request)
    {
        try {
            // Simulated list of program IDs
            $programs = [1, 2, 3, 4, 5];
            
            // Simulated enrollment data
            $enrollments = collect([
                ['enrollment_id' => 1, 'status' => true, 'student_type' => 'New', 'programme_status' => 'Active'],
                ['enrollment_id' => 2, 'status' => true, 'student_type' => 'Returning', 'programme_status' => 'Transfer out'],
                ['enrollment_id' => 3, 'status' => false, 'student_type' => 'New', 'programme_status' => 'Withdraw'],
            ]);

            // Simulated semester registrations
            $semesterRegistrations = collect([
                1 => ['admission_status' => 'Full Time'],
                2 => ['admission_status' => 'Part Time'],
            ]);

            // Simulated final bill data
            $studentFinalBills = collect([
                1 => ['bill_paid' => true],
                2 => ['bill_paid' => true],
            ]);

            // Initialize statistics
            $statistics = [
                'enrolled_students_count' => 0,
                'register_students_count' => 0,
                'new_students_count' => 0,
                'returning_students_count' => 0,
                'transfer_in_count' => 0,
                'transfer_out_count' => 0,
                'withdraw_out_count' => 0,
                'part_time_count' => 0,
                'full_time_count' => 0,
                'faculties_count' => 0,
                'total_students' => 100, // Example total students count
            ];

            // Process each enrollment
            foreach ($enrollments as $enrollment) {
                // Count enrolled students
                if ($enrollment['status']) {
                    $statistics['enrolled_students_count']++;
                }

                // Count registered students
                if (isset($studentFinalBills[$enrollment['enrollment_id']])) {
                    $statistics['register_students_count']++;
                }

                // Count based on student type
                if ($enrollment['student_type'] == 'New') {
                    $statistics['new_students_count']++;
                } elseif ($enrollment['student_type'] == 'Returning') {
                    $statistics['returning_students_count']++;
                }

                // Count transfer out and withdraw students
                if ($enrollment['programme_status'] == 'Transfer out') {
                    $statistics['transfer_out_count']++;
                }
                if ($enrollment['programme_status'] == 'Withdraw') {
                    $statistics['withdraw_out_count']++;
                }

                // Count full-time/part-time students
                if (isset($semesterRegistrations[$enrollment['enrollment_id']])) {
                    $admissionStatus = $semesterRegistrations[$enrollment['enrollment_id']]['admission_status'];
                    if ($admissionStatus == 'Full Time') {
                        $statistics['full_time_count']++;
                    } elseif ($admissionStatus == 'Part Time') {
                        $statistics['part_time_count']++;
                    }
                }
            }

            // Return the dummy statistics
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