<?php

namespace App\Observers;

use App\Models\User;
use App\Models\DataUser;
use App\Models\Message;
use Str;
use App\Components\Partners\Partner;
use App\Components\Partners\TCG;


class UserObserver
{
    protected $tcg;

    public function __construct(TCG $tcg)
    {
        $this->tcg = $tcg;
    }


    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $data['user_id'] = $user->id;
        $data['user']   = 'ibet66com' . Str::lower(Str::random(6));
        $data['username'] = $data['user'];
        $data['user'] = $data['user'];
        $data['password'] = Str::random(10);

        $message = [
            'title' => 'Chào mừng thành viên mới!',
            'content' => 'Xin chào [' . $user->name . '] đã đăng ký thành công tới cổng game IBET66.COM',
            'user_id' => $user->id,
            'read' => false,
        ];
        Message::create($message);
        DataUser::create($data);
        $this->tcg->create_user($user->name, $user->name);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
