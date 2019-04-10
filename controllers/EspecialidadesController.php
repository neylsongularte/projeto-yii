<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Especialidade;



class EspecialidadesController extends Controller
{



    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Especialidade::find();

        $paginacao = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $especialidades = $query->orderBy('descricao')
            ->offset($paginacao->offset)
            ->limit($paginacao->limit)
            ->all();

        return $this->render('index', compact('paginacao', 'especialidades'));
    }

    public function actionCreate()
    {
        $model = new Especialidade();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Especialidade cadastrada com sucesso!');
            return $this->redirect(['index']);
        }

        return $this->render('create', compact('model'));
    }

    public function actionEdit($id)
    {
        $model = Especialidade::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Especialidade alterada com sucesso!');
            return $this->redirect(['index']);
        }

        return $this->render('create', compact('model'));
    }

    public function actionDelete($id)
    {
        $model = Especialidade::findOne($id);

        $model->delete();

        Yii::$app->session->setFlash('success', 'Especialidade removida com sucesso!');
        return $this->redirect(['index']);
    }

}
