<?php

namespace app\modules\team\controllers;

use app\components\BaseController;

use app\modules\miscellaneouse\models\formModels\ProfilePicForm;

use app\modules\miscellaneouse\models\games\Games;
use app\modules\miscellaneouse\models\language\Language;
use app\modules\miscellaneouse\models\nationality\Nationality;
use app\modules\miscellaneouse\models\tournamentMode\TournamentMode;

use app\modules\organisation\models\Organisation;

use app\modules\team\models\Team;

use app\modules\team\models\formModels\CreateTeamForm;

use DateTime;
use Yii;
use yii\web\UploadedFile;

class TeamController extends BaseController
{
	/**
     * @inheritdoc
     */
    public function behavior()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['0'],
                    ]
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionDetails($teamID = 0)
    {
        /** @var Team $team */
        $team = Team::findTeamById($teamID);
        $languageID = Language::findByLocale(Yii::$app->language)->getId();

        if(!$team)
        {
            //Alert::addError('User with ID: ' . $userId . ' doesnt exists'); 
            return $this->goHome();
		}

        $teamDetails = Team::getTeamDetails($teamID, $languageID);
        $teamManager = $team->getManager();
        $teamMember = $team->getMember();

        /** @var ProfilePicForm $profilePicModel */
        $teamPicModel = new ProfilePicForm(ProfilePicForm::SCENARIO_TEAM);
        $teamPicModel->id = $teamID;

        if ($teamPicModel->load(Yii::$app->request->post())) {
            $teamPicModel->file = UploadedFile::getInstance($teamPicModel, 'file');
            if ($teamPicModel->validate()) {
                $teamPicModel->save();
            }
        }

        /** Check if User ID my own User ID */
        $isOwner = (Yii::$app->user->identity != null && Yii::$app->user->identity->getId() == $teamManager['id']) ? true : false;

        return $this->render('details', [
           'team' => $teamDetails,
           'teamManager' => $teamManager,
           'isOwner' => $isOwner,
           'teamMember' => $teamMember,
           'teamPicModel' => $teamPicModel,
        ]);
	}

    public function actionCreateTeam($orgID, $gameID)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        /** @var Language $languageID */
        $languageID = Language::findByLocale(Yii::$app->language)->getId();

        $model = new CreateTeamForm();
        $model->organisation_id = $orgID;
        $model->game_id = $gameID;

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            return $this->redirect(['/organisation/details?organisationId=' . $orgID]);
        }

        $languageList = [];
        foreach (Language::find()->all() as $language) { $languageList[$language->getId()] = $language->getName($languageID); }

        $nationalityList = [];
        foreach (Nationality::find()->all() as $nationality) { $nationalityList[$nationality->getId()] = $nationality->getName($languageID); }

        $modeList = [];
        foreach (TournamentMode::find()->where(['game_id' => $gameID])->all() as $Mode) { $modeList[$Mode->getId()] = $Mode->getName($languageID); }

        $model->gameName = Games::find()->where(['id' => $gameID])->one()->getName($languageID);

        return $this->render('createTeam', [
           'model' => $model,
            'languageList' => $languageList,
            'nationalityList' => $nationalityList,
            'modeList' => $modeList,
            'gameId' => $gameID,
        ]);
	}

    public function actionEditTeam($teamID = 0)
    {
        
	}
}