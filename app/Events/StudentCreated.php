<?php

namespace App\Events;

use App\Models\Student;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StudentCreated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Student $student)
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('students'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'student.created';
    }

    /**
     * @return array<string, mixed>
     */
    public function broadcastWith(): array
    {
        return [
            'id' => $this->student->id,
            'student_number' => $this->student->student_number,
            'first_name' => $this->student->first_name,
            'last_name' => $this->student->last_name,
            'email' => $this->student->email,
            'course' => $this->student->course,
            'year_level' => $this->student->year_level,
            'year_level_label' => $this->student->year_level_label,
            'edit_url' => route('students.edit', $this->student),
            'destroy_url' => route('students.destroy', $this->student),
        ];
    }
}