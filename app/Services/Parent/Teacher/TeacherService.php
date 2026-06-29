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
     * Get all active teachers and highlight student's teachers.
     *
     * @param int $studentId
     * @return Collection
     *
     * @throws Throwable
     */
    public function getAllTeachers(int $studentId): Collection
    {
        try {

            $studentClassIds = StudentClassEnrollment::query()
                ->where('student_id', $studentId)
                ->where('is_active', true)
                ->pluck('student_class_id')
                ->toArray();

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
                        ])->with([
                            'grade:id,grade_name',
                            'categories:id,category_name',
                        ]);
                    },
                ])
                ->orderBy('full_name')
                ->get();

            return $teachers->map(function ($teacher) use ($studentClassIds) {

                $teacher->is_my_teacher = $teacher->classes
                    ->pluck('id')
                    ->intersect($studentClassIds)
                    ->isNotEmpty();

                return $teacher;
            });

        } catch (Throwable $e) {

            Log::error('Failed to fetch teachers.', [
                'student_id' => $studentId,
                'message'    => $e->getMessage(),
                'file'       => $e->getFile(),
                'line'       => $e->getLine(),
            ]);

            throw $e;
        }
    }
}