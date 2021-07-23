<?php

class SortHelper {
    public static function parseSortType() {
        switch ($_GET["sortType"]) {
            case "price-asc":
                return [
                    "key" => "price",
                    "direction" => "asc",
                    "description" => "Cheap first"
                ];
            case "price-desc":
                return [
                    "key" => "price",
                    "direction" => "desc",
                    "description" => "Expensive first"
                ];
            case "name-asc":
                return [
                    "key" => "name",
                    "direction" => "asc",
                    "description" => "A-Z"
                ];
            case "name-desc":
                return [
                    "key" => "name",
                    "direction" => "desc",
                    "description" => "Z-A"
                ];
            case "reviews-desc":
                return [
                    "key" => "reviews",
                    "direction" => "desc",
                    "description" => "Most reviewed"
                ];
            default:
                return [
                    "key" => "price",
                    "direction" => "asc",
                    "description" => "Cheap first"
                ];
        }
    }


}