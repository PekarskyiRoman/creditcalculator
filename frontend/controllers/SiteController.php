<?php
namespace frontend\controllers;

use yii\web\Controller;
use yii\base\Module;
use common\services\CalculatorService;
use Yii;

/**
 * Site controller
 */
class SiteController extends Controller
{
    private $service;

    public function __construct($id, Module $module, array $config = [])
    {
        $this->service = new CalculatorService();
        parent::__construct($id, $module, $config);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $creditModel = $this->service->getCreditModel();
        return $this->render('index', ['model' => $creditModel]);
    }

    public function actionGetPaymentGraph()
    {
        $post = Yii::$app->request->post();
        return $this->renderAjax('payment-graph', [
            'data' => $this->service->getPaymentGraph($post['value'], $post['monthPeriod'], $post['percent'], $post['startDate'])
        ]);
    }

    public function actionSaveCalculation()
    {
        $post = Yii::$app->request->post();
        $this->service->saveCalculation($post);
        return $this->redirect(['/site/view-calculations']);
    }

    public function actionViewCalculations()
    {
        return $this->render('all-credits', ['dataProvider' => $this->service->getDataProvider()]);
    }

    public function actionViewGraph($id)
    {
        $credit = $this->service->getCreditModel($id);
        $graphData = $this->service->getPaymentGraph($credit->value, $credit->month_count, $credit->percent, $credit->start_date);
        return $this->render('payment-graph', ['data' => $graphData]);
    }
}
