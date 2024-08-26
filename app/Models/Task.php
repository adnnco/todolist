<?php

namespace App\Models;

use App\Observers\TaskObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * Class Task
 *
 * Represents a task in the to-do list application.
 */

class Task extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'parent_id', 'label_id', 'name', 'priority', 'completed', 'due_date', 'description'];

    protected static function booted()
    {
        static::addGlobalScope('user', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
    }

    /**
     * Get the user that owns the task.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the parent task of the current task.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'parent_id');
    }

    /**
     * Get the child tasks of the current task.
     */
    public function children(): HasMany
    {
        return $this->hasMany(Task::class, 'parent_id');
    }

    public function label(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Label::class, 'id', 'label_id');
    }

    /**
     * Get the subtasks of the current task.
     */
    public function subtasks(): HasMany
    {
        return $this->hasMany(Task::class, 'parent_id');
    }

    /**
     * Get the formatted due date.
     */
    protected function dueDateFormated(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->due_date ? Carbon::parse($this->due_date)->diffForHumans() : '',
        );
    }

}
