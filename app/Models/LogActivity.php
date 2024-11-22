<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class LogActivity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function record($event, $extra, $user_id = null, $is_broadcast = false, $role = null)
    {
        // Jika `user_id` dan `role` null, maka buat log broadcast
        if ($user_id === null && $role === null) {
            return static::create([
                'user_id' => null,
                'event' => $event,
                'extra' => $extra,
                'is_broadcast' => $is_broadcast
            ]);
        }

        // Jika `role` diberikan, kirim notifikasi ke semua pengguna dengan role tersebut
        if ($role) {
            // Ambil semua user dengan role yang sesuai
            $users = User::where('role', $role)->get();

            foreach ($users as $user) {
                static::create([
                    'user_id' => $user->id,
                    'event' => $event,
                    'extra' => $extra,
                    'is_broadcast' => false // ini ditujukan untuk pengguna tertentu berdasarkan role
                ]);
            }
            return true; // indikasi bahwa proses sudah selesai
        }

        // Jika hanya `user_id` yang diberikan
        return static::create([
            'user_id' => $user_id,
            'event' => $event,
            'extra' => $extra,
            'is_broadcast' => false
        ]);
    }
}
