<?php namespace App\Policies\Forum;

use Illuminate\Support\Facades\Gate;
use Riari\Forum\Models\Thread;

class ThreadPolicy
{
    /**
     * Permission: Delete posts in thread.
     *
     * @param  object  $user
     * @param  Thread  $thread
     * @return bool
     */
    public function deletePosts($user, Thread $thread)
    {
	    return in_array($user->role->id, [3,4]);
    }

    /**
     * Permission: Rename thread.
     *
     * @param  object  $user
     * @param  Thread  $thread
     * @return bool
     */
    public function rename($user, Thread $thread)
    {
        return in_array($user->role->id, [3,4]) || $user->getKey() === $thread->author_id;
    }

    /**
     * Permission: Reply to thread.
     *
     * @param  object  $user
     * @param  Thread  $thread
     * @return bool
     */
    public function reply($user, Thread $thread)
    {
        return !$thread->locked;
    }

    /**
     * Permission: Delete thread.
     *
     * @param  object  $user
     * @param  Thread  $thread
     * @return bool
     */
    public function delete($user, Thread $thread)
    {
        return Gate::allows('deleteThreads', $thread->category) || $user->getKey() === $thread->author_id;
    }
}
