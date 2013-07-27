<?php
require_once('rb.php');

class ITAdminModelFormatter implements RedBean_IModelFormatter {
    public function formatModel($model) {
        return $model;
    }
}