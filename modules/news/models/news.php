<?php

namespace app\modules\news\models;

use app\modules\user\models\User;
use app\modules\news\models\NewsDetails;

use yii\db\ActiveRecord;

/**
 * Class News
 * @package app\modules\news\models
 *
 * @property int $id
 * @property int $categorie_id
 * @property int $sub_categorie_id
 * @property int $author_id
 * @property string $dt_created
 * @property string $dt_updated
 */

class News  extends ActiveRecord
{
	/**
     * @return string
     */
    public static function tableName()
    {
        return 'news';
    }
    
    /*********** Base Getter ***********/

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCategorieId()
    {
        return $this->categorie_id;
    }

    /**
     * @return int
     */
    public function getSubCategorieId()
    {
        return $this->sub_categorie_id;
    }

    /**
     * @return int
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * @return ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id'])->one();
    }

    /**
     * @return string
     */
    public function getDtCreated()
    {
        return $this->dt_created;
    }

    /**
     * @return string
     */
    public function getDtUpdated()
    {
        return $this->dt_updated;
    }

    /**
     * @return ActiveQuery
     */
    public function getDetails()
    {
        return $this->hasOne(NewsDetails::className(), ['news_id' => 'id'])->one();
    }

    /************************ Functions ****************************/
    
    public static function getLatestNews($languageID, $count)
    {
         //News::find()->orderBy(['dt_created' => SORT_DESC])->limit(5)->all();
        $latestNews = static::find()->orderBy(['dt_created' => SORT_ASC])->limit($count)->all();

        $latestNewsData = array();

        foreach($latestNews as $nr => $news)
        {
            $newsDetails = $news->getDetails();

            $latestNewsData[$nr]['ID'] = $news->getId();
            $latestNewsData[$nr]['CategorieID'] = $news->getCategorieId();
            $latestNewsData[$nr]['SubCategorieID'] = $news->getSubCategorieId();
            $latestNewsData[$nr]['Headline'] = $newsDetails->getHeader();
            $latestNewsData[$nr]['AuthorID'] = $news->getAuthorId();
            $latestNewsData[$nr]['Author'] = $news->getAuthor()->getUsername();
            $latestNewsData[$nr]['previewImage'] =  $newsDetails->getImgTag();
            $latestNewsData[$nr]['StartingDate'] = $news->getDtCreated();
		}

        /** 3 Latest News */
        /*$latestNews[0]['ID'] = 1;
        $latestNews[0]['Headline'] = "Royale News from Clash";
        $latestNews[0]['previewImage'] = "clashNews";
        $latestNews[0]['StartingDate'] = (new DateTime())->format('d.m.Y');

        $latestNews[1]['ID'] = 2;
        $latestNews[1]['Headline'] = "New Tournament Series Arrived";
        $latestNews[1]['previewImage'] = "newTournament";
        $latestNews[1]['StartingDate'] = (new DateTime())->format('d.m.Y');

        $latestNews[2]['ID'] = 3;
        $latestNews[2]['Headline'] = "The Bug is Fixed";
        $latestNews[2]['previewImage'] = "fixedBug";
        $latestNews[2]['StartingDate'] = (new DateTime())->format('d.m.Y');*/

        return $latestNewsData;
    }
}