<?php

namespace App\Policies;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
    }

    public function delete(User $user, Answer $answer)
    {
        // Seul l'administateur ou le créateur du commentaire peut supprimer un commentaire
        return $user->id === $answer->user_id;
    }
}
