<?php

namespace App\Services\Parent\Teacher;

use App\Models\StudentClassEnrollment;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Throwable;

class TeacherService
{
    /**
     * Get all teachers and highlight student's enrolled classes.
     *
     * @throws Throwable
     */
    public function getAllTeachers(
        int $studentId
    ): Collection {

        try {

            // ✅ Get student's enrolled class IDs
            $studentClassIds = StudentClassEnrollment::query()
                ->where('student_id', $studentId)
                ->where('is_active', true)
                ->pluck('student_class_id')
                ->all();

            Log::info('Student enrolled classes', [
                'student_id' => $studentId,
                'class_ids' => $studentClassIds
            ]);

            $teachers = Teacher::query()
                ->select([
                    'id',
                    'custom_id',
                    'full_name',
                    'initials',
                    'mobile',
                    'email',
                    'is_active',
                ])
                ->where('is_active', true)
                ->with([
                    'classes' => function ($query) {

                        $query->select([
                            'id',
                            'teacher_id',
                            'class_name',
                            'medium',
                            'class_type',
                            'grade_id',
                            'is_active',
                            'is_ongoing',
                        ])
                        ->where('is_active', true)
                        ->with([
                            'grade:id,grade_name',
                            'categories:id,category_name',
                        ]);
                    },
                ])
                ->orderBy('full_name')
                ->get();

            $teachers->each(function ($teacher) use ($studentClassIds) {

                // ✅ Determine if this teacher has ANY enrolled class
                $hasEnrolledClass = false;

                $teacher->classes->transform(function ($class) use ($studentClassIds, &$hasEnrolledClass) {

                    // ✅ Check if THIS specific class is enrolled by student
                    $isMyClass = in_array($class->id, $studentClassIds, true);
                    
                    if ($isMyClass) {
                        $hasEnrolledClass = true;
                    }

                    $class->is_my_class = $isMyClass;

                    return $class;
                });

                // ✅ Set teacher-level flag based on actual enrollment
                $teacher->is_my_teacher = $hasEnrolledClass;

                // ✅ Sort: Enrolled classes first, then others
                $teacher->classes = $teacher->classes
                    ->sortByDesc('is_my_class')
                    ->values();

                Log::info('Teacher classes processed', [
                    'teacher_id' => $teacher->id,
                    'teacher_name' => $teacher->full_name,
                    'is_my_teacher' => $teacher->is_my_teacher,
                    'enrolled_classes' => $teacher->classes->where('is_my_class', true)->pluck('class_name')->toArray(),
                    'total_classes' => $teacher->classes->count(),
                ]);
            });

            return $teachers;

        } catch (Throwable $e) {

            Log::error('Failed to fetch teachers.', [
                'student_id' => $studentId,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            throw $e;
        }
    }
}