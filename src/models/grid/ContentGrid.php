<?php

namespace stesi\cms\models\grid;

use stesi\cms\models\Content;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * ContentGrid represents the model behind the search form about `stesi\cms\models\Content`.
 */
class ContentGrid extends Content
{

    public $globalSearch;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by'], 'integer'],
            [['content_type_id', 'title', 'body', 'icon', 'tip', 'created_at', 'updated_at', 'start_date', 'end_date'], 'safe'],
            [['globalSearch'], 'safe'],
        ];
    }

    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Content::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        $query->andFilterWhere(['like', 'content_type_id', $this->content_type_id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'tip', $this->tip]);

        //GlobalSearch
        $globalSearchField = array("or");
        foreach ($this->getGlobalSearchField() as $field) {
            array_push($globalSearchField, ['like', $field, $this->globalSearch]);
            }
        $query->andFilterWhere($globalSearchField);

        return $dataProvider;
    }

    /**
    * @return array
    */
    public function getGlobalSearchField()
    {
        return [];
    }
}
