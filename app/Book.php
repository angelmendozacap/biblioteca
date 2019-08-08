<?php

namespace App;

use App\User;
use App\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    protected $guarded = [];

    public function path()
    {
        // return route('books.update', ['book' => $this->id, 'slug' => Str::slug($this->title)]);
        return '/books/' . $this->id . '-' . $this->title;
    }

    public function checkout(User $user)
    {
        $this->reservations()->create([
            'user_id'        => $user->id,
            'checked_out_at' => now(),
        ]);
    }

    public function checkin(User $user)
    {
        $reservation = $this->reservations()->where('user_id', $user->id)
            ->whereNotNull('checked_out_at')
            ->whereNull('checked_in_at')
            ->first();

        if (is_null($reservation)) {
            throw new \Exception();
        }

        $reservation->update([
            'checked_in_at' => now(),
        ]);
    }

    public function setAuthorIdAttribute($author)
    {
        $this->attributes['author_id'] = Author::firstOrCreate([
            'name' => $author,
        ])->id;
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}