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

    public static function getAll()
    {
        $links = self::query()->select('name', 'image', 'category', 'link', 'description', 'sub_category as subCategory', 'click_count as clickCount', 'id')
            ->orderByDesc('click_count')
            ->get();

        foreach ($links as $link) {
            $link->subCategory = json_decode($link->subCategory);
        }
        return $links;
    }

    public static function getByCategory($category): Collection
    {
        $gameLinks = self::query()->where('category', $category)
            ->select('name', 'image', 'category', 'link', 'description', 'sub_category as subCategory', 'click_count as clickCount', 'id')
            ->orderByDesc('click_count')
            ->get()
            ->groupBy('category');

        foreach ($gameLinks as $links) {
            foreach ($links as $link) {
                $link->subCategory = json_decode($link->subCategory);
            }
        }

        return collect($gameLinks)->collapse();
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
