<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // ホワイトリスト
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'inquiry_type',
        'inquiry_content',
    ];

    // カテゴリーとのリレーション
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }

    // キーワード検索
    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', '%' . $keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%')
                    ->orWhere('detail', 'like', '%' . $keyword . '%');
            });
        }
    }

    // 性別検索
    public function scopeGenderSearch($query, $gender)
    {
        if ($gender !== null && $gender !== '') {
            $query->where('gender', $gender);
        }

        // 全ての性別を含む検索
        if ($gender !== null) {
            if ($gender == 'all') {
                return $query;
            } else {
                return $query->where('gender', $gender);
            }
        }
    }
}
