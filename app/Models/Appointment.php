<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'appointments';

    public $orderable = [
        'id',
        'user.user_id',
        'appointment_date',
        'masa_temu_janji.masa',
        'name',
        'email',
        'phone_number',
        'alamat_1',
        'alamat_2',
        'alamat_3',
        'postcode',
        'bahagian.bahagian',
        'appointment_status'
    ];

    public $filterable = [
        'id',
        'user.user_id',
        'appointment_date',
        'masa_temu_janji.masa',
        'name',
        'email',
        'phone_number',
        'alamat_1',
        'alamat_2',
        'alamat_3',
        'postcode',
        'bahagian.bahagian',
        'appointment_status'
    ];

    protected $dates = [
        'appointment_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'appointment_date',
        'user_id',
        'masa_temu_janji_id',
        'name',
        'email',
        'phone_number',
        'alamat_1',
        'alamat_2',
        'alamat_3',
        'postcode',
        'bahagian_id',
        'appointment_status'
    ];

    public function getAppointmentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setAppointmentDateAttribute($value)
    {
        $this->attributes['appointment_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function User()
    {
        return $this->belongTo(User::class);
    }

    public function masaTemuJanji()
    {
        return $this->belongsTo(MasaTemuJanji::class);
    }

    public function bahagian()
    {
        return $this->belongsTo(Bahagian::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
