<?php

namespace App\Interfaces;

/**
 * Interface TaskComplexRepositoryInterface
 *
 * This interface defines the methods for retrieving tasks with various filters and pagination.
 */
interface TaskComplexRepositoryInterface
{
    /**
     * Retrieve all tasks with their subtasks, limited by the specified number.
     *
     * @param int $limit The maximum number of tasks to retrieve.
     * @return mixed The collection of tasks with their subtasks.
     */
    public function getAllWithSubTasks(int $limit = 10): mixed;

    /**
     * Retrieve inbox tasks with pagination, limited by the specified number.
     *
     * @param int $limit The maximum number of tasks per page.
     * @return mixed The paginated collection of inbox tasks.
     */
    public function getInboxWithPaginate(int $limit = 10): mixed;

    /**
     * Retrieve today's tasks with pagination, limited by the specified number.
     *
     * @param int $limit The maximum number of tasks per page.
     * @return mixed The paginated collection of today's tasks.
     */
    public function getTodayWithPaginate(int $limit = 10): mixed;

    /**
     * Retrieve upcoming tasks with pagination, limited by the specified number.
     *
     * @param int $limit The maximum number of tasks per page.
     * @return mixed The paginated collection of upcoming tasks.
     */
    public function getUpcomingWithPaginate(int $limit = 10): mixed;

    /**
     * Retrieve overdue tasks with pagination, limited by the specified number.
     *
     * @param int $limit The maximum number of tasks per page.
     * @return mixed The paginated collection of overdue tasks.
     */
    public function getOverDueWithPaginate(int $limit = 10): mixed;

    /**
     * Retrieve completed tasks with pagination, limited by the specified number.
     *
     * @param int $limit The maximum number of tasks per page.
     * @return mixed The paginated collection of completed tasks.
     */
    public function getCompletedWithPaginate(int $limit = 10): mixed;


    public function getLabelWithPaginate(int $label_id,int $limit = 10): mixed;


}
