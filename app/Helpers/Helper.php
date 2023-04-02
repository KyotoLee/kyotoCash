<?php

namespace App\Helpers;

use App\Consts;

class Helper
{
    public static function showStatusAsset($status) {
        switch ($status) {
            case Consts::ASSET_STATUS_ACTIVE:
                return "Đang hoạt động";
            case Consts::ASSET_STATUS_SCRATCH:
                return "Hư hỏng nhẹ (trầy, xước,...)";
            case Consts::ASSET_STATUS_BROKEN:
                return "Hư hỏng nặng (vỡ, va đập,...)";
            case Consts::ASSET_STATUS_BLOCK:
                return "Bị khóa";
        }
    }

    public static function showInterestType($status) {
        switch ($status) {
            case Consts::PAWN_INTEREST_TYPE_MILLION:
                return "k/1 triệu";
            case Consts::PAWN_INTEREST_TYPE_DAY:
                return "k/1 ngày";
        }
    }

    public static function showPawnTypeDate($status) {
        switch ($status) {
            case Consts::PAWN_TYPE_BEFORE:
                return "Thu lãi sau";
            case Consts::PAWN_TYPE_AFTER:
                return "Thu lãi trước";
        }
    }

    public static function showPawnType($status) {
        switch ($status) {
            case Consts::PAWN_TYPE_DAY:
                return "Lãi ngày";
            case Consts::PAWN_TYPE_WEEK:
                return "Lãi tuần";
            case Consts::PAWN_TYPE_MONTH:
                return "Lãi tháng";
        }
    }
}
