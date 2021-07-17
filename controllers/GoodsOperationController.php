<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\db\ar\GoodsHistoryOperation;
use app\models\db\search\GoodsHistoryOperationSearch;
use yii\web\NotFoundHttpException;

class GoodsOperationController extends Controller
{

    public function actionIndex()
    {

        $searchModel = new GoodsHistoryOperationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    protected function findModel($id)
    {
        if (($model = GoodsHistoryOperation::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
