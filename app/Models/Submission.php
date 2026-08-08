<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'quiz_id',
    'user_id',
    'answers',
    'score',
    'feedback',
    'status',
    'submitted_at',
    'graded_at',
])]
class Submission extends Model
{
    use HasFactory, HasUuids;

    protected function casts(): array
    {
        return [
            'answers' => 'array',
            'score' => 'decimal:2',
            'submitted_at' => 'datetime',
            'graded_at' => 'datetime',
        ];
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function autoGrade(): void
    {
        $questions = $this->quiz->questions()->where('question_type', 'multiple_choice')->get();

        $totalPoints = $questions->sum('points');
        $earned = 0;

        foreach ($questions as $question) {
            $answer = $this->answers[$question->id] ?? null;
            if ($answer === $question->correct_answer) {
                $earned += $question->points;
            }
        }
        $this->update([
            'score' => $totalPoints > 0 ? ($earned / $totalPoints) * 100 : null,
            'status' => 'graded',
            'graded_at' => now(),
        ]);
    }
}
