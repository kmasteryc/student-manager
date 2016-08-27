<?php namespace App\Policies\Forum;

class ForumPolicy
{
    /**
     * Permission: Create categories.
     *
     * @param  object  $user
     * @return bool
     */
    public function createCategories($user)
    {
        return $user->role->id === 4;
    }

    /**
     * Permission: Manage category.
     *
     * @param  object  $user
     * @return bool
     */
    public function manageCategories($user)
    {
        return $this->moveCategories($user) ||
               $this->renameCategories($user);
    }

    /**
     * Permission: Move categories.
     *
     * @param  object  $user
     * @return bool
     */
    public function moveCategories($user)
    {
	    return $user->role->id === 4;
    }

    /**
     * Permission: Rename categories.
     *
     * @param  object  $user
     * @return bool
     */
    public function renameCategories($user)
    {
	    return $user->role->id === 4;
    }

    /**
     * Permission: Mark new/updated threads as read.
     *
     * @param  object  $user
     * @return bool
     */
    public function markNewThreadsAsRead($user)
    {
        return true;
    }

    /**
     * Permission: View trashed threads.
     *
     * @param  object  $user
     * @return bool
     */
    public function viewTrashedThreads($user)
    {
        return in_array($user->role->id, [3,4]);
    }

    /**
     * Permission: View trashed posts.
     *
     * @param  object  $user
     * @return bool
     */
    public function viewTrashedPosts($user)
    {
	    return in_array($user->role->id, [3,4]);
    }
}
