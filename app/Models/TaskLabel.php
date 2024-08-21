<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TaskLabel
 *
 * Represents the pivot table for the many-to-many relationship between tasks and labels.
 *
 * @package App\Models
 */
class TaskLabel extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['task_id', 'label_id'];

    /**
     * Get the task associated with the TaskLabel.
     *
     * @return BelongsTo
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * Get the label associated with the TaskLabel.
     *
     * @return BelongsTo
     */
    public function label(): BelongsTo
    {
        return $this->belongsTo(Label::class);
    }

}
