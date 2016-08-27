<?php namespace App\Policies\Forum;

use Illuminate\Support\Facades\Gate;
use Riari\Forum\Models\Post;

class PostPolicy
{
    /**
     * Permission: Edit post.
     *
     * @param  object  $user
     * @param  Post  $post
     * @return bool
     */
    public function edit($user, Post $post)
    {
        return $user->getKey() === $post->author_id || in_array($user->role->id, [3,4]);
    }

    /**
     * Permission: Delete post.
     *
     * @param  object  $user
     * @param  Post  $post
     * @return bool
     */
    public function delete($user, Post $post)
    {
        return Gate::forUser($user)->allows('deletePosts', $post->thread) || $user->getKey() === $post->user_id;
    }
}
