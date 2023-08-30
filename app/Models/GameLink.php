<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class GameLink extends Model
{
    use HasFactory;

    public static function saveInstance(Collection $gameLink): bool
    {
        $model = new self();
        $model->name = $gameLink->get('name');
        $model->description = $gameLink->get('description');
        $model->link = $gameLink->get('link');
        $model->category = $gameLink->get('category');
        $model->sub_category = json_encode($gameLink->get('subCategory'));


        return $model->save();
    }

    public static function increaseByCategory(string $category): void
    {
        $gameLinks = self::query()->where('category', $category)->get();
        foreach ($gameLinks as $gameLink) {
            $gameLink->click_count = ++$gameLink->click_count;
            $gameLink->save();
        }
    }

    public function updateInstance(Collection $gameLink): bool
    {
        $this->name = $gameLink->get('name');
        $this->link = $gameLink->get('link');
        $this->category = $gameLink->get('category');
        $this->description = $gameLink->get('description');
        $this->sub_category = json_encode($gameLink->get('subCategory'));

        return $this->save();
    }

}
