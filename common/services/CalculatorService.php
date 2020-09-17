<?php

namespace common\services;

use app\models\Credit;
use yii\data\ActiveDataProvider;

class CalculatorService
{
    public function getCreditModel($creditId = null)
    {
        if(!empty($creditId)) {
            return Credit::findOne(['id' => $creditId]);
        }
        return new Credit();
    }

    public function getPaymentGraph($value, $period, $percent, $startDate)
    {
        $coefficient = $this->calculateCoefficient($period, $percent);
        $monthPayment = $this->getMonthPayment($value, $coefficient);
        return $this->createPaymentArray($value, $monthPayment, $period, $startDate, $percent);
    }

    private function calculateCoefficient($period, $percent)
    {
        $monthPercent = $this->getMonthPercent($percent);
        return ($monthPercent * (pow(1 + $monthPercent, $period)))/(pow(1 + $monthPercent, $period) - 1);
    }

    private function getMonthPercent($percent)
    {
        return ($percent / 100) / 12;
    }

    private function getMonthPayment($value, $coefficient)
    {
        return $value * $coefficient;
    }

    private function createPaymentArray($value, $monthPayment, $period, $startDate, $percent)
    {
        $creditBody = $value;
        $result = [];
        for($i = 1; $i <= $period; $i++) {
            $percentValue = $creditBody * $this->getMonthPercent($percent);
            $result[$i]['paymentDate'] = $this->addMonthsToDate($startDate, $i);
            $result[$i]['payment'] = round($monthPayment, 2);
            $result[$i]['percentValue'] = round($percentValue, 2);
            $result[$i]['bodyValue'] = $bodyValue = round($monthPayment - $percentValue, 2);
            if($i != $period) {
                $creditBody -= $bodyValue;
            } else {
                $creditBody = 0;
            }
            $result[$i]['remainderBody'] = $creditBody;
        }
        return $result;
    }

    private function addMonthsToDate($startDate, $amount)
    {
        return date('d-m-Y', strtotime( '+'.$amount.' month', strtotime( $startDate ) ));
    }

    public function saveCalculation($postRequest)
    {
        $creditModel = $this->getCreditModel();
        $creditModel->load($postRequest);
        $creditModel->save();
    }

    public function getDataProvider()
    {
        $query = Credit::find();
        return new ActiveDataProvider(['query' => $query]);
    }
}