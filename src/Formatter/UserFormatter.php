<?php

namespace App\Formatter;

use App\Entity\User;

class UserFormatter
{
    public function format(User $user): array
    {
        return [
            'user_id' => $user->getId(),
            'user_email' => $user->getEmail(),
        ];
    }
}
