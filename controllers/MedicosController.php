<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Medico;
use app\models\Especialidade;
use yii\helpers\ArrayHelper;


class MedicosController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($busca = '')
    {
        $query = Medico::find();

        if($busca) {
            $query->where(['like', 'nome', $busca]);
        }

        $paginacao = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $medicos = $query->orderBy('nome')
            ->offset($paginacao->offset)
            ->limit($paginacao->limit)
            ->all();

        return $this->render('index', compact('paginacao', 'medicos'));
    }

    public function actionCreate()
    {
        $model = new Medico();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Médico cadastrado com sucesso!');
            return $this->redirect(['index']);
        }

        $opcoesDeEspecialidade = $this->getOpcoesDeEspecialidade();

        return $this->render('create', compact('model', 'opcoesDeEspecialidade'));
    }

    public function actionEdit($id)
    {
        $model = Medico::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Médico alterado com sucesso!');
            return $this->redirect(['index']);
        }

        $opcoesDeEspecialidade = $this->getOpcoesDeEspecialidade();

        return $this->render('create', compact('model', 'opcoesDeEspecialidade'));
    }

    public function actionDelete($id)
    {
        $model = Medico::findOne($id);
        $model->delete();

        Yii::$app->session->setFlash('success', 'Medico removido com sucesso!');
        return $this->redirect(['index']);
    }

    private function getOpcoesDeEspecialidade()
    {
        return ArrayHelper::map(Especialidade::find()->all(), 'especialidade_id', 'label');
    }

}
