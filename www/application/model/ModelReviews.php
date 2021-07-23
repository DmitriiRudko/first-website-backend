<?php

require_once("Database.php");

class ModelReviews extends Model {
    public function getReviews($productId, $moderated = null) {
        $sql = "SELECT * FROM reviews WHERE product_id = :id";
        if(isset($moderated))
        {
            $sql .= " and moderated = :moderated";
            $data = $this->db->getReviews($sql, $productId, $moderated);
        } else{
            $data = $this->db->getReviews($sql, $productId);
        }
        return $data;
    }
}
