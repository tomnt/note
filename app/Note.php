<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Note
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereUserId($value)
 * @mixin \Eloquent
 */
class Note extends Model
{
    //
    public function user(){
        $this->belongsTo('App\User');
    }
}
